<x-guest-layout>
    <x-slot name="header">
        {{ __('Welcome') }}
    </x-slot>

    <div class="welcome">
        <div class="container">
            @auth
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('phone-contacts') }}" class="btn btn-success" title="{{ __('Phone contacts') }}">
                            <span class="material-icons">list_alt</span>
                            {{ __('Phone contacts') }}
                        </a>
                    </div>
                    <div class="col-md-6">
                        <form class="form-inline" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-nav-link :href="route('logout')"
                                        class="btn btn-danger"
                                        title="{{ __('Logout') }}"
                                        onclick="event.preventDefault();
                            this.closest('form').submit();">
                                <span class="material-icons">logout</span>
                                {{ __('Logout') }}

                            </x-nav-link>
                        </form>
                    </div>
                </div>
            @else
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-info" title="{{ __('Register') }}">
                        <span class="material-icons">person_add_alt_1</span>
                        {{ __('Register') }}
                    </a>
                @endif
                <a href="{{ route('login') }}" class="btn btn-success" title="{{ __('Login') }}">
                    <span class="material-icons">login</span>
                    {{ __('Login') }}
                </a>
            @endauth
        </div>
    </div>
</x-guest-layout>
