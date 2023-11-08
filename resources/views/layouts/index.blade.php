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
	<div class="main_loadding" style="display: none;">
		<svg class="spinner-container" viewBox="0 0 44 44">
			<circle class="path" cx="22" cy="22" r="20" fill="none" stroke-width="4"></circle>
		</svg>
	</div>
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
			window.onload = function() {
				new HSSideNav('.js-navbar-vertical-aside').init()
			}
		})()
	</script>
</body>

</html>