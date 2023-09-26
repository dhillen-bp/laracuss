<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="justify-content-between container flex">
            <a class="navbar-link" href="{{ route('home') }}">
                <img class="h-32px" src="{{ url('assets/images/logo-white.png') }}" alt="Laracuss Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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

    <section class="hero container">
        <div class="row align-items-center h-100">
            <div class="col-12 col-lg-6">
                <h1>The Laravel <br />Community Forum</h1>
                <p class="mb-4">
                    Empowering the Laravel community to connect, share and learn.
                </p>
                <a href="#" class="btn btn-primary mb-lg-0 mb-2 me-2">Sign Up</a>
                <a href="#" class="btn btn-secondary mb-lg-0 mb-2">Join Discussions</a>
            </div>
            <div class="col-12 col-lg-6 h-315px order-lg-last mb-lg-0 order-first mb-3">
                <img class="hero-image float-lg-end" src="{{ url('assets/images/hero-image.png') }}" alt="Hero">
            </div>
        </div>
    </section>
    <section class="min-h-372px container">
        <div class="row">
            <div class="col-12 col-lg-4 text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/discussions.png') }}" alt="Discussion">
                <h2>Discussion</h2>
                <p class="fs-3">456</p>
            </div>
            <div class="col-12 col-lg-4 text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/answers.png') }}" alt="Answers">
                <h2>Answers</h2>
                <p class="fs-3">123</p>
            </div>
            <div class="col-12 col-lg-4 text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/users.png') }}" alt="Users">
                <h2>Users</h2>
                <p class="fs-3">789</p>
            </div>
        </div>
    </section>
    <section class="bg-gray">
        <div class="py-80px container">
            <h2 class="mb-5 text-center">Help Others</h2>
            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <div class="card">
                        <a href="#">
                            <h3>How to add a custom validation in laravel?</h3>
                        </a>
                        <div>
                            <p class="mb-5">I am working on a blogging application in Laravel 8. There are 4 user
                                roles, among which, the ...</p>
                            <div class="row">
                                <div class="col me-lg-2 me-1">
                                    <a href="#"><span class="badge rounded-pill text-bg-light">Eloquent</span></a>
                                </div>
                                <div class="col-5 col-lg-7">
                                    <div class="avatar-sm-wrapper d-inline-block">
                                        <a href="#" class="me-1">
                                            <img src="{{ url('assets/images/avatar-sm.png') }}"
                                                class="avatar rounded-circle" alt="Avatar">
                                        </a>
                                    </div>
                                    <span class="fs-12px">
                                        <a href="#" class="fw-bold me-1">fajarwz</a>
                                        <span class="color-gray text-sm">7 hours ago</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="min-h-372px d-flex flex-column align-items-center justify-content-center container">
        <h2>Ready to Contribute?</h2>
        <p class="mb-4">Want to make a big impact?</p>
        <div class="text-center">
            <a href="#" class="btn btn-primary mb-lg-0 mb-2 me-2">Sign Up</a>
            <a href="#" class="btn btn-secondary mb-lg-0 mb-2">Join Discussions</a>
        </div>
    </section>
    <footer class="py-80px">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 mb-lg-0 mb-5">
                    <img src="{{ url('assets/images/logo.png') }}" alt="Laracuss Logo" class="h-32px mb-4">
                    <p class="text-white">Empowering the Laravel community
                        </br>to connect, share and learn.</p>
                </div>
                <div class="col-12 col-lg-6 me-auto">
                    <div class="d-flex flex-column flex-lg-row justify-content-end">
                        <div class="d-flex flex-column me-140px mb-lg-0 mb-3">
                            <p class="fw-bold fs-5 text-nowrap text-white">Contact Us</p>
                            <ul class="list-unstyled">
                                <li class="text-white"><a href="mailto:hi@laracuss.com">hi@laracuss.com</a></li>
                            </ul>
                        </div>
                        <div class="d-flex flex-column">
                            <p class="fw-bold fs-5 text-white">Links</p>
                            <ul class="list-unstyled">
                                <li class="mb-2 text-white"><a href="#">Home</a></li>
                                <li class="mb-2 text-white"><a href="#">Discussions</a></li>
                                <li class="mb-2 text-white"><a href="#">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
</body>

</html>
