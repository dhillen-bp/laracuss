<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
    <div class="justify-content-between container flex">
        <a class="navbar-link" href="{{ route('home') }}">
            <img class="h-32px" src="{{ url('assets/images/logo-white.png') }}" alt="Laracuss Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-lg-3 mx-0">
                <li class="nav-item d-block d-lg-none d-xl-block">
                    <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() === 'discussions.index' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('discussions.index') }}">Discussions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-nowrap" aria-current="page" href="{{ route('home') }}#about-us">About Us</a>
                </li>
            </ul>
            <form class="d-flex w-100 my-lg-0 my-2 me-4" role="search" action="{{ route('discussions.index') }}"
                method="GET">
                <div class="input-group">
                    <span class="input-group-text border-end-0 bg-white"><img
                            src="{{ url('assets/images/magnifier.png') }}" alt="Search Icon"></span>
                    <input class="form-control border-start-0 ps-0" type="search" placeholder="Search"
                        aria-label="Search" name="search" value="{{ $search ?? '' }}">
                </div>
            </form>
            <ul class="navbar-nav my-lg-0 my-2 ms-auto">
                @auth
                    <li class="nav-item dropdown my-auto">
                        <a class="nav-link d-flex align-items-center p-0" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="avatar-nav-wrapper me-2">
                                <img src="{{ filter_var(auth()->user()->picture, FILTER_VALIDATE_URL)
                                    ? auth()->user()->picture
                                    : Storage::url(auth()->user()->picture) }}"
                                    alt="{{ auth()->user()->username }}" class="avatar rounded-circle">
                            </div>
                            <span class="fw-bold">{{ auth()->user()->username }}</span>
                        </a>
                        <ul class="dropdown-menu mt-2">
                            <li>
                                <a href="{{ route('users.show', auth()->user()->username) }}" class="dropdown-item">My
                                    Profile</a>
                            </li>
                            <li>
                                <form action="{{ route('auth.login.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest

                    <li class="nav-item my-auto">
                        <a class="nav-link text-nowrap {{ Route::currentRouteName() === 'auth.login.show' ? 'active' : '' }}"
                            aria-current="page" href="{{ route('auth.login.show') }}">Log In</a>
                    </li>
                    <li class="nav-item pe-0 ps-1">
                        <a class="btn btn-primary-white" aria-current="page" href="{{ route('auth.sign-up.show') }}">Sign
                            Up</a>
                    </li>

                @endguest

            </ul>
        </div>
    </div>
</nav>
