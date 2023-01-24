<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="{{asset('/')}}">Electronics<span>.</span></a>

{{--        <div class="search-bar">--}}
{{--            <form action="{{ url('search-product') }}" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="input-group">--}}
{{--                    <input type="search" class="form-control" placeholder="Search Products" required name="product_name" id="search-product">--}}
{{--                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}

        <button class="navbar-toggler mb-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{Request::is('/') ? 'active' : ''}}"><a class="nav-link" href="{{asset('/')}}">Home</a></li>
                <li class="nav-item {{Request::is('all-products') ? 'active' : ''}}"><a class="nav-link" href="{{ asset('all-products') }}">Products</a></li>
                <li class="nav-item {{Request::is('category') ? 'active' : ''}}"><a class="nav-link" href="{{asset('category')}}">Categories</a></li>
                <li class="nav-item {{Request::is('about') ? 'active' : ''}}"><a class="nav-link" href="{{asset('about-us')}}">About us</a></li>
{{--                <li class="nav-item {{Request::is('blog') ? 'active' : ''}}"><a class="nav-link" href="{{asset('#')}}">Blog</a></li>--}}
                <li class="nav-item {{Request::is('contact') ? 'active' : ''}}"><a class="nav-link" href="{{asset('contact')}}">Contact us</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li>
                    <a class="nav-link link-number" href="{{ asset('wishlist') }}">
                        <i class="fa-regular fa-heart"></i>
                        <span class="badge badge-light wishlist-count">0</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link link-number" href="{{ asset('cart') }}">
                        <i class="fa fa-cart-shopping"></i>
                        <span class="badge badge-light cart-count">0</span>
                    </a>
                </li>

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
{{--                        <li><a class="nav-link" href="#"><i class="fa-regular fa-user"></i></a></li>--}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-user"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                   <a class="dropdown-item" href="{{ url('#') }}"><i class="fa-solid fa-user"></i> &nbsp;{{ Auth::user()->name }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('my-orders') }}"><i class="fa fa-bag-shopping"></i> &nbsp;Orders</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="dropdown-item">
                                        <i class="fa fa-sign-out me-sm-1"></i>
                                        <span class="d-sm-inline d-none">{{ __('Logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                @endguest
            </ul>
        </div>
    </div>

</nav>

