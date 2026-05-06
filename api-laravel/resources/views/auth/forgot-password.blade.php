<x-guest-layout>
    <span class="badge rounded-pill badge-soft px-3 py-2">Recuperacao</span>
    <h1 class="display-6 fw-bold mt-3 mb-2">Recupere o acesso ao seu laboratorio</h1>
    <p class="text-secondary mb-4">
        Informe seu email e enviaremos um link para criar uma nova senha e voltar ao painel.
    </p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="d-grid">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
