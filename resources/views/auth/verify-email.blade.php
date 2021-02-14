<x-guest-layout>
    <x-slot name="header">
        {{ __('Verify email') }}
    </x-slot>
    <x-auth-card>
        <div>
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div>
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="form-group">
                    <x-button class="btn btn-success">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <div class="form-group">
                    <button type="submit" class="btn btn-danger">
                        {{ __('Logout') }}
                    </button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
