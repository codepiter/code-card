<!DOCTYPE html>
<!--
Template Name: NobleUI - Laravel Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Contact: nobleui123@gmail.com
License: You must have a valid license purchased only from https://themeforest.net/user/nobleui/portfolio/ in order to legally use the theme for your project.
-->
<html>
<head>
  <title>NobleUI Laravel Admin Dashboard Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  	<meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
  <!-- end plugin css -->


	<!--*** bootstrap & jquery ***-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
	<!--*** Calendario ***-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.css">

	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/locales-all.js"></script>
	<!-- Fin-calendario -->



	<!--*** sweetalert2 ***-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<!--*** esto estaba en el layout cke ***-->
	<script src="{{ asset('ckeditor/ckeditor.js') }}" defer></script>
  <script src="{{ asset('ckeditor/replace.js') }}" defer></script>
  
  


    @stack('plugin-styles')


  <!-- common css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <script src="{{ asset('assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" >
  @include('theme.layout.header')
    <div class="page-wrapper">
      <div class="page-content">
        @yield('content')
		@yield ('scripts')
	  
      </div>
      @include('theme.layout.footer')
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
	
	
	
		 <!-- multiselect checkbox -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/js/bootstrap-multiselect.min.js" integrity="sha512-ljeReA8Eplz6P7m1hwWa+XdPmhawNmo9I0/qyZANCCFvZ845anQE+35TuZl9+velym0TKanM2DXVLxSJLLpQWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/css/bootstrap-multiselect.css" integrity="sha512-DJ1SGx61zfspL2OycyUiXuLtxNqA3GxsXNinUX3AnvnwxbZ+YQxBARtX8G/zHvWRG9aFZz+C7HxcWMB0+heo3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
    <!-- common js -->
	
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
</body>
</html>















