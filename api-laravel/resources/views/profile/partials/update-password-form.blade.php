<section class="market-card p-4 p-lg-5 h-100">
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="icon-tile"><i class="bi bi-shield-lock"></i></span>
        <div>
            <h2 class="h4 fw-bold mb-1">{{ __('Update Password') }}</h2>
            <p class="text-secondary mb-0">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
        </div>
    </div>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <span class="text-success fw-semibold">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
