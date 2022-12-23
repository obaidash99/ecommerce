<!-- Navbar -->
{{-- <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
   <div class="container-fluid py-1 px-3">
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
         <ul class="navbar-nav justify-content-end float-end">
            <li class="nav-item d-flex align-items-center"> --}}
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" class="nav-link text-body font-weight-bold px-0 mt-3 text-end">
                           <i class="fa fa-sign-out me-sm-1"></i>
                           <span class="d-sm-inline d-none">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>
                     </div>
                  </div>
               </div>
            {{-- </li>
         </ul>
      </div>
   </div>
</nav> --}}
<!-- End Navbar -->

{{-- If you want the rest of the nav bar go to the original dashboard files d-drive -> material-dashboard-master --}}