<section id="header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{url('/home')}}">
                <img src="assets/img/logo.png" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Freelancer</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('search-freelancer') }}">Search Freelancer</a>
                            <a class="dropdown-item" href="{{ url('top-freelancer') }}">Top 20</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Agencies</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('search-agencies') }}">Search agencies</a>
                            <a class="dropdown-item" href="{{ url('top-agencies') }}">Top 20</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('forums') }}">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user/profile') }}">Profile</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link loginLink" href="{{ url('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link loginLink" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}">Join Now</a>
                    </li>
                    @endguest
                    <li class="nav-item">
                        <select name="" id="" class="language">
                            <option value="ENG">ENG</option>
                        </select>
                    </li>
                    <li class="nav-item">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>