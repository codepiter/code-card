<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Scripts -->
  <script src="{{ asset('js/skype/skype.js') }}" defer></script>
  <link href="{{ asset('css/style/style13.css') }}" rel="stylesheet">
  <script src="{{ asset('js/wats.js') }}" defer></script>

<script src="{{ asset('js/face/compface.js') }}" defer></script>
  <link rel="icon" href="{{ URL::asset('/img/favicon/favicon.ico') }}" type="image/x-icon"/>

<!-- MS, fb & Whatsapp -->
<!-- MS Tile - for Microsoft apps-->
<meta name="msapplication-TileImage" content="http://weiswork.com/">    
<!-- fb & Whatsapp -->

<!-- Site Name, Title, and Description to be displayed -->
<meta property="og:site_name" content="Tu Tarjeta de Presentacion">
<meta property="og:title" content="{{ $personalInformation->first_name }} {{ $personalInformation->last_name }}">
<meta property="og:description" content="{{ $personalInformation->services }}">

<!-- Image to display -->
<!-- Replace   «example.com/image01.jpg» with your own -->
<meta property="og:image" content="{{ asset('storage'). '/'.$personalInformation->favi}}">

<!-- No need to change anything here -->
<meta property="og:type" content="website" />
<meta property="og:image:type" content="image/jpeg">

<!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">

<!-- Website to visit when clicked in fb or WhatsApp-->
<meta property="og:url" content="http://weiswork.com/">

<meta property='og:locale' content='ar_AR' />
	
 @laravelPWA
</head>
<body>
    
<span itemprop="image" itemscope itemtype="image/png"> 
      <link itemprop="url" href="{{ URL::asset('/img/favicon/android-chrome-512x512.png') }}"> 
    </span>

</body>
</html>