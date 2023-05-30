<header class="bg-white">
    <div id="logo" class="text-center">
        <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="">
    </div>
    <div id="main-menu">

        <nav class="navbar-nav container navbar-light">
            <ul class="list-unstyled d-flex justify-content-center gap-2 text-uppercase">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(Route::currentRouteName(),'comics') ? 'active' : '' }}"
                        href="{{ route('comics.index') }}">
                        Fumetti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(Route::currentRouteName(),'artists') ? 'active' : '' }}"
                        href="{{ route('artists.index') }}">
                        Artisti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(Route::currentRouteName(),'writers') ? 'active' : '' }}"
                        href="{{ route('writers.index') }}">
                        Scrittori
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
