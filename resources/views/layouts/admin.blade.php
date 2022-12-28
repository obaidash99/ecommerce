
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

   <!-- Styles -->
   <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
   <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
</head>

<body>

   @include('layouts.inc.sidebar')

   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      @include("layouts.inc.adminnav")

      <div class="container-fluid py-4">
         @yield('content')

         @include("layouts.inc.adminfooter")
      </div>

   </main>


   <!-- Scripts -->
   <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
   <script src="{{ asset('admin/js/bootstrap.min.js') }}" defer></script>
   <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}" defer></script>
   <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}" defer></script>
   <script src="{{ asset('admin/js/chartjs.min.js') }}" defer></script>

   <!-- Sweet Alert -->
   <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
   @if (session('status'))
      <script>
         Swal.fire({
            title: 'Message!',
            text: "{{ session('status') }}",
            confirmButtonText: 'Cool'
         })
      </script>
   @endif

   @yield('scripts')

</body>

</html>
