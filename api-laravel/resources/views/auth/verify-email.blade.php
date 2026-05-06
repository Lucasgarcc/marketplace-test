<x-guest-layout>
    <span class="badge rounded-pill badge-warm px-3 py-2">Verificacao</span>
    <h1 class="display-6 fw-bold mt-3 mb-2">Confirme seu email antes de continuar</h1>
    <p class="text-secondary mb-4">
        O painel usa essa confirmacao para garantir que as proximas integracoes e notificacoes estejam associadas ao usuario correto.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success border-0 rounded-4">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="d-flex flex-column flex-md-row gap-3 align-items-md-center justify-content-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary rounded-pill px-4">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
