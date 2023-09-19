<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | Front - Admin &amp; Dashboard Template</title>
    <link rel="shortcut icon" href="favicon.ico">
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
    (function() {
      window.onload = function () {
        new HSSideNav('.js-navbar-vertical-aside').init()
      }
    })()
  </script>
</body>
</html>