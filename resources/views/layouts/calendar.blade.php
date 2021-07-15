<!DOCTYPE html>
<html lang="en">
<head>
  <title>Weiswork</title>
  		
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />		
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- Calendario -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.css">

	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/locales-all.js"></script>

	<!--sweetalert2-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	
	<script src="{{ asset('js/bcalendar.js') }}"></script>
</head>
<body>

	<div id="wrapper" style="background-image: url('/images/background.png'); background-size: cover; background-position: center center;">
		<div class="container">
			@yield('content')
			@yield ('scripts')
		</div> 	
	</div> 

</body>
</html>