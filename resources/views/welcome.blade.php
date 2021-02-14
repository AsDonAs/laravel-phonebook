<x-guest-layout>
    <x-slot name="header">
        <h2>
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="data">
        @if (Route::has('login'))
            <div class="">
                @auth
                    <a href="{{ route('phone-contacts') }}" class="underline">{{ __('Phone contacts') }}</a>
                @else
                    <a href="{{ route('login') }}" class="underline">{{ __('Login') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="underline">{{ __('Register') }}</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="text">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</x-guest-layout>
