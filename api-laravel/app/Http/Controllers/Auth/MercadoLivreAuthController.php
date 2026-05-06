<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\MercadoLivreService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MercadoLivreAuthController extends Controller
{
    public function redirect(Request $request, MercadoLivreService $mercadoLivre): RedirectResponse
    {
        $this->ensureConfiguration();

        $state = Str::random(40);
        $codeVerifier = Str::random(96);
        $codeChallenge = rtrim(strtr(base64_encode(hash('sha256', $codeVerifier, true)), '+/', '-_'), '=');

        $request->session()->put('mercado_livre_oauth_state', $state);
        $request->session()->put('mercado_livre_oauth_code_verifier', $codeVerifier);

        return redirect()->away($mercadoLivre->authorizationUrl($state, $codeChallenge, 'S256'));
    }

    public function callback(Request $request, MercadoLivreService $mercadoLivre): RedirectResponse
    {
        $this->ensureConfiguration();

        if ($request->filled('error')) {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'mercado_livre' => 'O Mercado Livre retornou o erro: '.$request->string('error')->value(),
                ]);
        }

        $expectedState = $request->session()->pull('mercado_livre_oauth_state');
        $codeVerifier = $request->session()->pull('mercado_livre_oauth_code_verifier');
        $receivedState = $request->string('state')->value();
        $code = $request->string('code')->value();

        if (! $expectedState || ! $receivedState || ! hash_equals($expectedState, $receivedState)) {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'mercado_livre' => 'Falha na validação do state do OAuth. Tente conectar novamente.',
                ]);
        }

        if (! $code) {
            return redirect()
                ->route('dashboard')
                ->withErrors([
                    'mercado_livre' => 'O callback do Mercado Livre não retornou o code de autorização.',
                ]);
        }

        $tokenData = $mercadoLivre->exchangeCodeForToken($code, $codeVerifier);
        $mercadoLivreUser = $mercadoLivre->getAuthenticatedUser($tokenData['access_token']);

        $request->session()->put('mercado_livre.auth', [
            'user_id' => $tokenData['user_id'] ?? $mercadoLivreUser['id'] ?? null,
            'nickname' => $mercadoLivreUser['nickname'] ?? null,
            'scope' => $tokenData['scope'] ?? null,
            'expires_at' => now()->addSeconds((int) ($tokenData['expires_in'] ?? 0))->toDateTimeString(),
            'access_token' => $tokenData['access_token'],
            'refresh_token' => $tokenData['refresh_token'] ?? null,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('status', 'Conta Mercado Livre conectada com sucesso para testes.');
    }

    protected function ensureConfiguration(): void
    {
        abort_unless(
            config('services.mercado_livre.client_id')
            && config('services.mercado_livre.client_secret')
            && config('services.mercado_livre.redirect_uri'),
            500,
            'As credenciais do Mercado Livre não estão configuradas no ambiente.'
        );
    }
}
