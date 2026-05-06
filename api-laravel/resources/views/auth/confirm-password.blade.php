<x-guest-layout>
    <span class="badge rounded-pill badge-warm px-3 py-2">Confirmacao</span>
    <h1 class="display-6 fw-bold mt-3 mb-2">Area segura da aplicacao</h1>
    <p class="text-secondary mb-4">
        Confirme sua senha antes de continuar com a operacao solicitada.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="d-grid">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
