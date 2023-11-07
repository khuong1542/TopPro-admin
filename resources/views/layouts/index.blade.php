<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản trị DEVPro</title>
    <link rel="shortcut icon" href="{{ URL::asset('public/dist/images/logo.png') }}">
    @include('layouts.css')
    @include('layouts.js')

</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">
    @include('layouts.header')
    @include('layouts.sidebar')
    <main id="content" role="main" class="main">
        @yield('content')
        @include('layouts.footer')
    </main>

    <script>
      // $(".js-navbar-vertical-aside-toggle-invoker").click(function(){
      //   // $("body").toggleClass('navbar-vertical-aside-mini-mode', '');
      //   $("body").toggleClass('navbar-vertical-aside-closed-mode navbar-vertical-aside-mini-mode', '');
      // });
    (function() {
      window.onload = function () {
        new HSSideNav('.js-navbar-vertical-aside').init()
      }
    })()
  </script>
</body>
</html>