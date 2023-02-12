<div class="top_menu row m0">
    <div class="container">
        <div class="float-left">
            <a class="dn_btn" href="mailto:medical@example.com"><i class="ti-email"></i>{{ Auth::user()->email ?? 'Youremail@test.com'}}</a>
            <span class="dn_btn"> <i class="ti-location-pin"></i>Find our Location</span>
        </div>
        <div class="float-right">
            <ul class="list header_social">
                <li><a href="#"><i class="ti-facebook"></i></a></li>
                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                <li><a href="#"><i class="ti-skype"></i></a></li>
                <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.html"><img src="{{asset('frontend')}}/img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="department.html">Department</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctors.html">Doctors</a></li>
                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                            <li class="nav-item"><a class="nav-link" href="element.html">element</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> -->
                    @if (Route::has('login'))
                        @auth
                            @if(Auth::user()->hasRole('doctor') || Auth::user()->hasRole('patient'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('prescription') }}">Prescriptions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('appiontments') }}">Appiontments</a>
                                </li>
                            @endif
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>{{ Auth::user()->name }}</strong></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('profile') }}" >{{ __('Profile') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('register')}}">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>
</div>