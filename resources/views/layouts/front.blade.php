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

   <script src=" {{ asset('frontend/js/jquery-3.6.2.min.js') }}"></script>
   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

   <!-- Styles -->
   <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/tiny-slider.css') }}" rel="stylesheet">

   {{-- Owl Carousel --}}
   <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
   <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">

   {{-- Google Font --}}
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

   {{-- Auto Complete --}}
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

   <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
</head>

<body>

   @include('layouts.inc.frontendnav')

         @yield('content')

      <div class="whatsapp-chat">
         <a href="https://wa.me/+201099506547?text=Could%20you%20help%20me%20with%20this%20issue?" target="_blank">
            <img src="{{ asset('assets/images/whatsapp-icon.webp') }}" alt="whatsapp-chat">
         </a>
      </div>

   @include('layouts.inc.frontendfooter')
   <!-- Scripts -->
   <script src=" {{ asset('frontend/js/jquery-3.6.2.min.js') }}"></script>
   <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
   <script src=" {{ asset('frontend/js/owl.carousel.min.js') }}"></script>
   <script src=" {{ asset('frontend/js/tiny-slider.js') }}"></script>
   <script src=" {{ asset('frontend/js/custom.js') }}"></script>
   <script src=" {{ asset('frontend/js/checkout.js') }}"></script>


   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
   <script>
      var availableTags = [];
      $.ajax({
         method: 'GET',
         url: '/product-list',
         success: function(response){
            startAutoComplete(response)
         }
      });
      function startAutoComplete(availableTags){
         $( "#search-product" ).autocomplete({
            source: availableTags
         });
      }
   </script>

   {{-- Font Awesome --}}
   <script src="https://kit.fontawesome.com/5afc627c7f.js" crossorigin="anonymous"></script>

   <!-- Sweet Alert -->
   <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
   @if (session('status'))
      <script>
         Swal.fire({
            title: 'Message!',
            text: "{{ session('status') }}",
            confirmButtonText: 'Ok'
         })
      </script>
   @endif

   @yield('scripts')

</body>

</html>
