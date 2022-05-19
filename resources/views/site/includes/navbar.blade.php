<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="{{ route('home') }}" class="navbar-brand">
        {{-- <img class="img-fluid " src="{{ asset('site/img/NADA.png') }}" alt=""> --}}
        {{-- <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Bright</h1> --}}
        <img width="144" height="48" src="{{ asset('site/img/NADA.png') }}" alt="">
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
            <a href="about.html" class="nav-item nav-link">About Us</a>
            <a href="classes.html" class="nav-item nav-link">Classes</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                    <a href="facility.html" class="dropdown-item">School Facilities</a>
                    <a href="team.html" class="dropdown-item">Popular Teachers</a>
                    <a href="call-to-action.html" class="dropdown-item">Become A Teachers</a>
                    <a href="appointment.html" class="dropdown-item">Make Appointment</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
        </div>
        {{-- TODO: Make A dynamic login / register links --}}
        @auth
            <a href="#" class="nav-item nav-link active">{{ auth()->user()->name }}</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-primary rounded-pill px-3 d-none d-lg-block ms-1" type="submit">logout</button>
            </form>
        @endauth
        @guest
            <a href="{{ route('doctorRegistrationPage') }}" class="rounded-pill px-3 d-none d-lg-block">Join the family
                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Login<i
                        class="fa fa-arrow-right ms-3"></i></a>
                <a href="{{ route('register') }}"
                    class="btn btn-primary rounded-pill px-3 d-none d-lg-block ms-1">Register<i
                        class="fa fa-arrow-right ms-3"></i></a>
            @endguest
    </div>
</nav>
