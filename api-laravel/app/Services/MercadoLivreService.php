<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class MercadoLivreService
{
    public function authorizationUrl(string $state, ?string $codeChallenge = null, ?string $codeChallengeMethod = null): string
    {
        $query = http_build_query(array_filter([
            'response_type' => 'code',
            'client_id' => config('services.mercado_livre.client_id'),
            'redirect_uri' => config('services.mercado_livre.redirect_uri'),
            'state' => $state,
            'code_challenge' => $codeChallenge,
            'code_challenge_method' => $codeChallengeMethod,
        ], static fn ($value) => $value !== null && $value !== ''), '', '&', PHP_QUERY_RFC3986);

        return config('services.mercado_livre.auth_url').'?'.$query;
    }

    public function exchangeCodeForToken(string $code, ?string $codeVerifier = null): array
    {
        $payload = array_filter([
            'grant_type' => 'authorization_code',
            'client_id' => config('services.mercado_livre.client_id'),
            'client_secret' => config('services.mercado_livre.client_secret'),
            'code' => $code,
            'redirect_uri' => config('services.mercado_livre.redirect_uri'),
            'code_verifier' => $codeVerifier,
        ], static fn ($value) => $value !== null && $value !== '');

        return $this->http()
            ->asForm()
            ->post('/oauth/token', $payload)
            ->throw()
            ->json();
    }

    public function getAuthenticatedUser(string $accessToken): array
    {
        return $this->http()
            ->withToken($accessToken)
            ->get('/users/me')
            ->throw()
            ->json();
    }

    protected function http(): PendingRequest
    {
        return Http::baseUrl(config('services.mercado_livre.api_base_url'))
            ->acceptJson();
    }
}
