<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>@yield('title')</title>

   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

   <!-- Styles -->
   <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">

   <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
   <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

   <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
</head>

<body>

   @include('layouts.inc.frontendnav')

      <div class="container-fluid py-4">
         @yield('content')
      </div>


   <!-- Scripts -->
   <script src=" {{ asset('frontend/js/jquery-3.6.2.min.js') }}"></script>
   <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
   <script src=" {{ asset('frontend/js/owl.carousel.min.js') }}"></script>

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