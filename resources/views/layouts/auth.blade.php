<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('assets/img/logo-dark.png')}}">
    <title>Message Butler - {{$title}}</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/feather.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('backend/css/app-light.css')}}" id="lightTheme">
    @livewireScripts
    @livewireStyles
  </head>
  <body class="light ">
    <div class="wrapper vh-100">
      {{$slot}}
     
    </div>
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/simplebar.min.js')}}"></script>
    <script src='{{asset('backend/js/jquery.stickOnScroll.js')}}'></script>
    <script src="{{asset('backend/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('backend/js/config.js')}}"></script>
    <script src="{{asset('backend/js/apps.js')}}"></script>
  </body>
</html>
</body>
</html>