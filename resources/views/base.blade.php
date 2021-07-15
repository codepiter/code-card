<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weiswork</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
 
</head>
<body>

  <div class="content-main">
    @yield('main')
	@yield ('scripts')
  </div>

</body>
</html>