<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <link rel="icon" type="image/x-icon" href="favicon.ico">
   <title>Angle - Bootstrap Admin Template</title><!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="{{ ('themicon/vendor/@fortawesome/fontawesome-free/css/brands.css') }}">
   <link rel="stylesheet" href="{{ ('themicon/vendor/@fortawesome/fontawesome-free/css/regular.css') }}">
   <link rel="stylesheet" href="{{ ('themicon/vendor/@fortawesome/fontawesome-free/css/solid.css') }}">
   <link rel="stylesheet" href="{{ ('themicon/vendor/@fortawesome/fontawesome-free/css/fontawesome.css') }}"><!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="{{ ('themicon/vendor/simple-line-icons/css/simple-line-icons.css') }}"><!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="{{ ('themicon/css/app.css') }}" id="maincss">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
   <div class="wrapper">
      <div class="block-center mt-5 wd-xl">
         <!-- START card-->
         @yield('content')
      </div>
   </div><!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="vendor/modernizr/modernizr.custom.js"></script><!-- STORAGE API-->
   <script src="vendor/js-storage/js.storage.js"></script><!-- i18next-->
   <script src="vendor/i18next/i18next.js"></script>
   <script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script><!-- JQUERY-->
   <script src="vendor/jquery/dist/jquery.js"></script><!-- BOOTSTRAP-->
   <script src="vendor/popper.js/dist/umd/popper.js"></script>
   <script src="vendor/bootstrap/dist/js/bootstrap.js"></script><!-- PARSLEY-->
   <script src="vendor/parsleyjs/dist/parsley.js"></script><!-- =============== APP SCRIPTS ===============-->
   <script src="js/app.js"></script>
</body>

</html>