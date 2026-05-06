<x-guest-layout>
    <span class="badge rounded-pill badge-soft px-3 py-2">Acesso ao painel</span>
    <h1 class="display-6 fw-bold mt-3 mb-2">Entre para gerenciar sua operacao no Mercado Livre</h1>
    <p class="text-secondary mb-4">
        A partir daqui voce conecta a conta, organiza o catalogo local e acompanha publicacao, notificacoes e vendas.
    </p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mt-4">
            <div class="form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label text-secondary" for="remember_me">
                    {{ __('Remember me') }}
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="fw-semibold" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="d-grid mt-4">
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-4 pt-3 border-top">
        <span class="text-secondary">Ainda nao tem conta?</span>
        <a class="fw-semibold ms-1" href="{{ route('register') }}">Crie agora</a>
    </div>
</x-guest-layout>
