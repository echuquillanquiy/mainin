<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <link rel="icon" type="image/x-icon" href="favicon.ico">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>{{ config ('app.name') }}</title><!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="{{ asset('themicon/vendor/@fortawesome/fontawesome-free/css/brands.css') }}">
   <link rel="stylesheet" href="{{ asset('themicon/vendor/@fortawesome/fontawesome-free/css/regular.css') }}">
   <link rel="stylesheet" href="{{ asset('themicon/vendor/@fortawesome/fontawesome-free/css/solid.css') }}">
   <link rel="stylesheet" href="{{ asset('themicon/vendor/@fortawesome/fontawesome-free/css/fontawesome.css') }}"><!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="{{ asset('themicon/vendor/simple-line-icons/css/simple-line-icons.css') }}"><!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="{{ asset('themicon/vendor/animate.css/animate.css') }}"><!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="{{ asset('themicon/vendor/whirl/dist/whirl.css') }}"><!-- =============== PAGE VENDOR STYLES ===============-->
   @yield('dropzone')
   
   <script src="{{ asset('js/app.js') }}" defer></script>
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="{{ asset('themicon/css/app.css') }}" id="maincss">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="maincss">
   @yield('file')
</head>

<body class="aside-collapsed">
   <div class="wrapper" id="app">
      @include('layouts.includes.navbar')
      @include('layouts.includes.menu')
      <section class="section-container">
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="row">
               <div class="col-12 text-center">
                  @yield('content')
               </div>
            </div>
         </div>
      </section><!-- Page footer-->
      <footer class="footer-container text-center"><span>&copy; 2020 - Mainin</span></footer>
   </div><!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="{{ asset('themicon/vendor/modernizr/modernizr.custom.js') }}"></script><!-- STORAGE API-->
   <script src="{{ asset('themicon/vendor/js-storage/js.storage.js') }}"></script><!-- SCREENFULL-->
   <script src="{{ asset('themicon/vendor/screenfull/dist/screenfull.js') }}"></script><!-- i18next-->
   <script src="{{ asset('themicon/vendor/i18next/i18next.js') }}"></script>
   <script src="{{ asset('themicon/vendor/i18next-xhr-backend/i18nextXHRBackend.js') }}"></script><!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <!-- =============== APP SCRIPTS ===============-->
   <script src="{{ asset('themicon/js/app.js') }}"></script>
   @yield('dependientes')
</body>

</html>