<footer class="py-80px" id="about-us">
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
                            <li class="mb-2 text-white"><a href="{{ route('home') }}">Home</a></li>
                            <li class="mb-2 text-white"><a href="{{ route('discussions.index') }}">Discussions</a></li>
                            <li class="mb-2 text-white"><a href="{{ route('home') }}#about-us">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</footer>
