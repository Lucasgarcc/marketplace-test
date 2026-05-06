<x-app-layout>
    <x-slot name="header">
        <div>
            <span class="market-subtitle">Conta</span>
            <h1 class="h2 fw-bold mt-2 mb-2">Gerencie seu perfil</h1>
            <p class="text-secondary mb-0">
                Atualize nome, email, senha e configuracoes basicas da conta que opera o painel.
            </p>
        </div>
    </x-slot>

    <div class="row g-4">
        <div class="col-lg-7">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="col-lg-5">
            @include('profile.partials.update-password-form')
        </div>

        <div class="col-12">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
