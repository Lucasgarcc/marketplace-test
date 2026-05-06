<section class="market-card p-4 p-lg-5 border border-danger-subtle">
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="icon-tile bg-danger-subtle text-danger"><i class="bi bi-trash3"></i></span>
        <div>
            <h2 class="h4 fw-bold mb-1">{{ __('Delete Account') }}</h2>
            <p class="text-secondary mb-0">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Enter your password only if you really want to remove this account.') }}
            </p>
        </div>
    </div>

    <form method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <div class="row g-3 align-items-end">
            <div class="col-lg-8">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" name="password" type="password" autocomplete="current-password" placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="col-lg-4 d-grid">
                <x-danger-button>
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </div>
    </form>
</section>
