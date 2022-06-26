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
            {{-- <a href="about.html" class="nav-item nav-link">About Us</a> --}}
            <a href="#specialist" class="nav-item nav-link">Specialties</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Reserve</a>
                <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                    <a href="http://127.0.0.1:8000/specialists/ADHD" class="dropdown-item">ADHD</a>
                    {{-- <a href="#featered" class="dropdown-item">AUTISM</a> --}}
                    <a href="http://127.0.0.1:8000/specialists/Autism" class="dropdown-item">AUTISM</a>
                    <a href="http://127.0.0.1:8000/specialists/Down%20Syndrome" class="dropdown-item">DOWN_SYNDROM</a>
                    <a href="http://127.0.0.1:8000/specialists/Visual%20Disability" class="dropdown-item">VISUAL_DISABILITY</a>
                    {{-- <a href="404.html" class="dropdown-item">404 Error</a> --}}
                </div>
            </div>
            {{-- <a href="contact.html" class="nav-item nav-link">Contact Us</a> --}}
        </div>
        @auth
            <a href="#" class="nav-item nav-link active">{{ auth()->user()->name }}</a>
            <a href="{{ route('updateUser') }}"
                class="nav-item nav-link active">{{ auth()->user()->type == App\Enums\DataBaseEnum::PATIENT ? 'Profile' : 'Dashboard' }}</a>
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
