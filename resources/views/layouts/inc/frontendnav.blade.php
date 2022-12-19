<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">E-Shop</a>
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
            <a class="nav-link" href="{{ url('cart') }}">My Cart <i class="fa fa-cart-shopping"></i></a>
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
                  <li><a class="dropdown-item" href="#">My Profile</a></li>
                  <li class="nav-item d-flex align-items-center">
                     <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="nav-link text-body font-weight-bold px-0">
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