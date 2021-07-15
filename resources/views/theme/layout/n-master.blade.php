<!DOCTYPE html>
<!-- rama premaster
Template Name: NobleUI - Laravel Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Contact: nobleui123@gmail.com
License: You must have a valid license purchased only from https://themeforest.net/user/nobleui/portfolio/ in order to legally use the theme for your project.
-->
<html lang="{{ app()->getLocale() }}">
<head>
  <title>Weiswork</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  	<meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/@mdi/css/materialdesignicons.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <!-- end plugin css -->


	<!--*** bootstrap & jquery ***-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
	
	
	
	
	
	
	
	
	
	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>

	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!--*** Calendario ***-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.css">

	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/locales-all.js"></script>
	<!-- Fin-calendario -->



	<!--*** sweetalert2 ***-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	

	@stack('plugin-styles')

  <!-- common css -->
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" /> --}}
  @if (isset($_COOKIE['theme_dark'])) {{-- Cambia entre los temas light y dark, usando los cookeis --}}

    @if ( $_COOKIE['theme_dark'] === '1' )
      <link href="{{ asset('css/app_dark.css') }}" rel="stylesheet" />
    @else
      <link href="{{ asset('css/app_light.css') }}" rel="stylesheet" />
    @endif

  @else  
    <link href="{{ asset('css/app_light.css') }}" rel="stylesheet" />
  @endif
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">
  @include('theme.layout.n-header')
    <div class="page-wrapper">
      <div class="page-content">
        @yield('content')
      </div>
      @include('theme.layout.n-footer')
    </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

	<!--*** calendar js ***-->
	<script src="{{ asset('js/agenda.js') }}"></script>
    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
</body>
</html>


@php
  if(!isset($_COOKIE['theme_dark'])) {
    //echo "Cookie named '" . 'theme_dark' . "' is not set!";
    setcookie('theme_dark', '0', time() + (86400 * 30), "/"); // 86400 = 1 day
  } /*else {
    echo "Cookie '" . 'theme_dark' . "' is set!<br>";
    echo "Value is: " . $_COOKIE['theme_dark'];
  }*/
@endphp
<script>
  //$(document).ready(function(){
    //document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    //console.log('valor theme_dark => '+getCookie('theme_dark'));
  //});

  function cambiarTheme(){
    let boolTheme = getCookie('theme_dark');
    //console.log('Antes, valor theme_dark => '+boolTheme);

    boolTheme = boolTheme === '0' ? '1' : '0';
    setCookie('theme_dark', boolTheme  , 30);
    //console.log('Despues, valor theme_dark => '+boolTheme);

    location.reload();
  }

  function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
</script>
