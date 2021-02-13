<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div>
        <div>
            <div>
                <!-- Logo -->
                <div>
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}">
        <!-- Responsive Settings Options -->
        <div>
            <div>
                <div>Username: {{ Auth::user()->name }}</div>
                <div>User email: {{ Auth::user()->email }}</div>
            </div>
            <div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
