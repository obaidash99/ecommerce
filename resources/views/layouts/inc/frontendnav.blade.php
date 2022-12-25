<nav class="navbar navbar-expand-lg sticky-top navbar-light shadow bg-light">
   <div class="container d-flex justify-content-between">
      <a class="navbar-brand" href="{{ url('/') }}">E-Shop</a>
      <div class="search-bar">
         <form action="{{ url('search-product') }}" method="POST">
            @csrf
            <div class="input-group">
               <input type="search" class="form-control" placeholder="Search Products" required name="product_name" id="search-product">
               <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
            </div>
         </form>
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ url('category') }}">Category</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ url('cart') }}">
                  Cart
                  {{-- <i class="fa fa-cart-shopping"></i> --}}
                  <span class="badge badge-light text-danger cart-count">0</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{ url('wishlist') }}">
                  Wishlist
                  {{-- <i class="fa-solid fa-heart"></i> --}}
                  <span class="badge badge-light text-danger wishlist-count">0</span>
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
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     {{ Auth::user()->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                     <a class="dropdown-item" href="{{ url('my-orders') }}"><i class="fa fa-bag-shopping"></i> &nbsp;Orders</a>
                  </li>
                     <li>
                        <a class="dropdown-item" href="{{ url('#') }}"><i class="fa-solid fa-user"></i> &nbsp;Profile</a>
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
                     {{-- <li><hr class="dropdown-divider"></li> --}}
                     <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
               </li>

            @endguest
         </ul>
      </div>
   </div>
</nav>
