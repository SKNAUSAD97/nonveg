<header class="header-part">
    <div class="container">
        <div class="header-content">
            <div class="header-media-group">
                <button class="header-user"><img src="{{ url('/') }}/frontend/images/user.png" alt="user"></button>
                <a href="{{ url('home') }}"><img src="{{ url('/') }}/frontend/images/logo.png" alt="logo"></a>
                <button class="header-src"><i class="fas fa-search"></i></button>
            </div>
            <a href="{{ url('home') }}" class="header-logo"><img src="{{ url('/') }}/frontend/images/logo.png" alt="logo"></a>
            <a href="login.html" class="header-widget" title="My Account"><img src="{{ url('/') }}/frontend/images/user.png" alt="user"><span>Login</span></a>
            <form class="header-form">
                <input type="text" placeholder="Search anything...">
                <button><i class="fas fa-search"></i></button>
            </form>
            <div class="header-widget-group">
                {{-- <a href="compare.html" class="header-widget" title="Compare List">
                    <i class="fas fa-random"></i>
                    <sup>0</sup>
                </a> --}}
                {{-- <a href="wishlist.html" class="header-widget" title="Wishlist">
                    <i class="fas fa-heart"></i>
                    <sup>0</sup>
                </a> --}}
                <button class="header-widget header-cart" title="Cartlist">
                    <i class="fas fa-shopping-basket"></i>
                    <sup>9+</sup>
                    <span>
                        total price<small>₹345.00</small>
                    </span>
                </button>
            </div>
        </div>
    </div>
</header>
<nav class="navbar-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-content">
                    <ul class="navbar-list">
                        <li class="navbar-item dropdown"><a class="navbar-link" href="{{ url('home') }}">home</a>
                        </li>
                        @foreach ($categories as $item)
                            <li class="navbar-item dropdown-megamenu"><a class="navbar-link" href="#">{{ $item->category_name }}</a></li>
                        @endforeach
                        <li class="navbar-item"><a class="navbar-link" href="faq.html">About Us</a></li>
                        <li class="navbar-item"><a class="navbar-link" href="contact.html">Contact us</a></li>
                    </ul>
                    <div class="navbar-select-group">
                        <div class="navbar-select"><i class="fas fa-flag"></i>
                            <select class="select">
                                <option value="english" selected>english</option>
                                {{-- <option value="bangali">bangali</option>
                                <option value="arabic">arabic</option> --}}
                            </select>
                        </div>
                        <div class="navbar-select"><i class="fas fa-funnel-dollar"></i>
                            <select class="select">
                                <option value="english" selected>INR</option>
                                {{-- <option value="bangali">pound</option>
                                <option value="arabic">taka</option> --}}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>