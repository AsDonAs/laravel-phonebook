<nav class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container-fluid justify-content-between">
        <a href="{{ route('welcome') }}" class="navbar-brand d-flex align-items-center">
            @include('components.application-logo')
            <strong>{{ __('PhoneBook') }}</strong>
        </a>
        <div class="navbar-text">
            <strong>{{ $header }}</strong>
        </div>
        @auth
            <div class="navbar-text">{{ __('Welcome') . ", " . Auth::user()->name }}</div>
        @endauth
        <div class="">
            @auth
                <form class="form-inline" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-link :href="route('logout')"
                                title="{{ __('Logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                        <span class="material-icons">logout</span>
                    </x-nav-link>
                </form>
            @else
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" title="{{ __('Register') }}"><span class="material-icons">person_add_alt_1</span></a>
                @endif
                <a href="{{ route('login') }}" title="{{ __('Login') }}"><span class="material-icons">login</span></a>
            @endauth
        </div>
    </div>
</nav>
