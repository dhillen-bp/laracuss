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
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Discussions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-nowrap" aria-current="page" href="#">About Us</a>
                </li>
            </ul>
            <form class="d-flex w-100 my-lg-0 my-2 me-4" role="search" action="#" method="GET">
                <div class="input-group">
                    <span class="input-group-text border-end-0 bg-white"><img
                            src="{{ url('assets/images/magnifier.png') }}" alt="Search Icon"></span>
                    <input class="form-control border-start-0 ps-0" type="search" placeholder="Search"
                        aria-label="Search">
                </div>
            </form>
            <ul class="navbar-nav my-lg-0 my-2 ms-auto">
                <li class="nav-item my-auto">
                    <a class="nav-link text-nowrap" aria-current="page" href="#">Log In</a>
                </li>
                <li class="nav-item pe-0 ps-1">
                    <a class="btn btn-primary-white" aria-current="page" href="#">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>