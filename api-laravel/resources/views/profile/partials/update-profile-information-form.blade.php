<section class="market-card p-4 p-lg-5 h-100">
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="icon-tile"><i class="bi bi-person-vcard"></i></span>
        <div>
            <h2 class="h4 fw-bold mb-1">{{ __('Profile Information') }}</h2>
            <p class="text-secondary mb-0">{{ __("Update your account's profile information and email address.") }}</p>
        </div>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning border-0 rounded-4">
                <div class="fw-semibold mb-2">{{ __('Your email address is unverified.') }}</div>
                <button form="send-verification" class="btn btn-outline-dark rounded-pill btn-sm">
                    {{ __('Click here to re-send the verification email.') }}
                </button>

                @if (session('status') === 'verification-link-sent')
                    <div class="small text-success mt-3">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </div>
                @endif
            </div>
        @endif

        <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <span class="text-success fw-semibold">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
