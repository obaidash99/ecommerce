   <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
      <div class="sidenav-header">
         <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
         <a class="navbar-brand m-0 text-center" href="{{ url('dashboard') }}">
            <!-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->
            <span class="ms-1 font-weight-bold text-white">Simple Electronics</span>
         </a>
      </div>
      <hr class="horizontal light mt-0 mb-2">
      <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link text-white {{ Request::is('dashboard') ? 'active bg-info' : '' }}" href="{{ url('dashboard') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="material-icons opacity-10">dashboard</i>
                  </div>
                  <span class="nav-link-text ms-1">Dashboard</span>
               </a>
            </li>
            <li class="nav-item active">
               <a class="nav-link text-white {{ Request::is('categories') ? 'active bg-info' : '' }}" href="{{ route('categories.index') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="material-icons opacity-10">table_view</i>
                  </div>
                  <span class="nav-link-text ms-1">Categories</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white {{ Request::routeIs('categories.create') ? 'active bg-info' : '' }}" href="{{ route('categories.create') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="material-icons opacity-10">add</i>
                  </div>
                  <span class="nav-link-text ms-1">Add Category</span>
               </a>
            </li>
            <li class="nav-item active">
               <a class="nav-link text-white {{ Request::is('products') ? 'active bg-info' : '' }}" href="{{ url('products') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="material-icons opacity-10">inventory</i>
                  </div>
                  <span class="nav-link-text ms-1">Products</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white {{ Request::is('add-product') ? 'active bg-info' : '' }}" href="{{ url('add-product') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="material-icons opacity-10">add</i>
                  </div>
                  <span class="nav-link-text ms-1">Add Product</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link text-white {{ Request::is('orders') ? 'active bg-info' : '' }}" href="{{ url('orders') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="material-icons opacity-10">inventory_2</i>
                  </div>
                  <span class="nav-link-text ms-1">Orders</span>
               </a>
            </li>
             <li class="nav-item">
                 <a class="nav-link text-white {{ Request::is('messages') ? 'active bg-info' : '' }}" href="{{ url('messages') }}">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="material-icons opacity-10">message</i>
                     </div>
                     <span class="nav-link-text ms-1">Messages</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-white {{ Request::is('home-head') ? 'active bg-info' : '' }}" href="{{ url('home-head') }}">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="material-icons opacity-10">home</i>
                     </div>
                     <span class="nav-link-text ms-1">Home Page Content</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-white {{ Request::is('static-content') ? 'active bg-info' : '' }}" href="{{ url('static-content') }}">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="material-icons opacity-10">content_copy</i>
                     </div>
                     <span class="nav-link-text ms-1">About Page Content</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-white {{ Request::is('features') ? 'active bg-info' : '' }}" href="{{ url('features') }}">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="material-icons opacity-10">star_half</i>
                     </div>
                     <span class="nav-link-text ms-1">Why Us Features</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-white {{ Request::is('team') ? 'active bg-info' : '' }}" href="{{ url('team') }}">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="material-icons opacity-10">groups</i>
                     </div>
                     <span class="nav-link-text ms-1">Team Members</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-white {{ Request::is('insert-member') ? 'active bg-info' : '' }}" href="{{ url('add-member') }}">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="material-icons opacity-10">group_add</i>
                     </div>
                     <span class="nav-link-text ms-1">Add Members</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-white {{ Request::is('testimonials') || Request::is('add-testimonial') ? 'active bg-info' : '' }}" href="{{ url('testimonials') }}">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="material-icons opacity-10">quiz</i>
                     </div>
                     <span class="nav-link-text ms-1">Testimonials</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-white {{ Request::is('newsletters') ? 'active bg-info' : '' }}" href="{{ url('newsletters') }}">
                     <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="material-icons opacity-10">feed</i>
                     </div>
                     <span class="nav-link-text ms-1">Newsletter</span>
                 </a>
             </li>
             <li class="nav-item">
               <a class="nav-link text-white {{ Request::is('users') ? 'active bg-info' : '' }}" href="{{ url('users') }}">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                     <i class="material-icons opacity-10">group</i>
                  </div>
                  <span class="nav-link-text ms-1">Users</span>
               </a>
            </li>
         </ul>
      </div>
   </aside>
