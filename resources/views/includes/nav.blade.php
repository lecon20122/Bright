<nav class="navbar navbar-expand-md">
    <div class="container">
        <a class="navbar-brand brand" href="#">BRIGHT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto d-flex flex-row-reverse ">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('slideshow') }}">الصفحة الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> للكشف</a>
                </li>
               <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">تسجيل</a>
                </li>
            -->
            </ul>
        </div>
         <!-- Right Side Of Navbar -->
 <ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('التسجيل') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>
    </div><!-- container -->
</nav>
<header class="py-2">
    <div class="container">
        <div class="row">

            <div class="col-sm-6">
                <img src="{{ asset('images/lagog ff.jfif') }}" alt="" srcset="">
            </div>

            <div class="col-sm-6 d-flex justify-content-center">
                <h1 class="my-3 text-uppercase display-4 font-weight-bold we ">WE SPECIAL</h1>
            </div>

        </div><!-- row -->
    </div><!-- container -->
</header>
