<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html style="background:aliceblue;">
<head>
		<title>Weiswork</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		
		 <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="{{ asset ('css/style/indexmarq.css') }}" />
		<link rel="stylesheet" href="{{ asset ('css/minimax/main2.css') }}" />



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!--<link rel="stylesheet" href="{{ asset('css/afi/bootstrap.min.css') }}" />-->

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<script src="{{ asset('css/carrousel/font-awesome.min.css') }}"></script>


		 <script src="{{ asset('js/fontawesome/all.js') }}" defer></script>



		<!--<script src="{{ asset('js/minimax/jquery.min.js') }}"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


<!--
<script src="{{ asset('js/afi/popper.min.js') }}"></script>
<script src="{{ asset('js/afi/bootstrap.min.js') }}"></script>

-->
	
<!-- Calendario -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.css">

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/locales-all.js"></script>
<!-- Fin-calendario -->



<!--sweetalert2-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	

	

 @laravelPWA
</head>
<body>
<div id="page-wrapper">

		 
	<div id="header-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-12" id="header">
				<!-- Header and left menu -->
				
					
					<nav class="navbar navbar-expand-lg navbar-light " id="nav">
					  <a id="logo" class="navbar-brand" href="{{ url('/personalInformation') }}" title="Pricipal"><img src="{{URL::asset('/img/logo/logo.png')}}" alt="Weiswork" height="35px"></a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					  </button>

					  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						  <li class="nav-item active">
							<a class="nav-link" href="{{ url('/personalInformation') }}">Inicio <span class="sr-only"></span></a>
						  </li>
						

						@if (auth()->user()->is_admin == 1)
						   <li class="nav-item">
							<a class="nav-link" href="{{ url('/pagos') }}">Pagos <span class="sr-only"></span></a>
						   </li>
						  @endif

						  @isset(Auth::user()->payment->type_card)
						   @if(Auth::user()->payment->type_card==='empresa')
							   <li class="nav-item">
								<a class="nav-link" href="{{ url('/brochures') }}">Brochure <span class="sr-only"></span></a>
							  </li>
							  @else
								  <li class="nav-item">
								<a class="nav-link" href="{{ url('/resumes') }}">Curriculum <span class="sr-only"></span></a>
							  </li>
							  @endif
						  @endisset


						   <li class="nav-item">
							<a class="nav-link" href="{{ route('events.index') }}">Calendario <span class="sr-only"></span></a>
						  </li>
						  

						  

	                      @isset (Auth::user()->personalInformation->template)
							 @if( Auth::user()->personalInformation->template>'17' )
								 
							   <li class="nav-item">

								<a class="nav-link" href="{{ url('/gifCards') }}">Gifs Cards <span class="sr-only"></span></a>
							  </li>

							 <li class="nav-item">
								<a class="nav-link" href="{{ url('/customers') }}">Clientes <span class="sr-only"></span></a>
							  </li>	
							@endif
						 @endisset	














						  
						  
						  
						  
						  
						  
						  
						 @if (auth()->user()->is_admin == 1)      						  
						  <li class="nav-item">
							<a class="nav-link" href="{{ route('inviteds.index') }}" >Invitar <span class="sr-only"></span></a>
						  </li>
						 @endif
						  <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle not-render" id="navbarDropdown"  href="#" aria-expanded="false" role="button" data-toggle="dropdown" aria-haspopup="true"><span class="content">Soporte</span>
							</a>
							  <ul  class="dropdown-menu" aria-expanded="false" aria-labelledby="navbarDropdown">
								<li class="nav-item">
									<a class="dropdown-item not-render" href="https://api.whatsapp.com/send?phone=51973302034&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre..." aria-expanded="false">&nbsp;&nbsp;&nbsp;&nbsp;Whatsapp</a>
									<a class="dropdown-item not-render" href="mailto:soporte@dcabecera.com">&nbsp;&nbsp;&nbsp;&nbsp;Email</a>
							
								</li>
							  </ul>
						</li>

						</ul>
						
						
						<!-- Notificaciones-->
						<ul class="navbar-nav nav-noti">
						 <li class="nav-item dropdown li-noti">
							<a class="nav-link not-render" id="not" data-toggle="dropdown" href="">
							  <i class="fas fa-bell"></i>
								@if (count(auth()->user()->unreadNotifications))
								<span class="badge badge-warning">{{ count(auth()->user()->unreadNotifications) }}</span>
									
								@endif
							  </span>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<span class="dropdown-header" >Notificaciones</span>
							  @forelse (auth()->user()->unreadNotifications as $notification)
							  <a href="{{ route('esta') }}" class="dropdown-item not-render">
								<i class="fas fa-envelope mr-2"></i> {{ $notification->data['nombre'] }}
								<span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
							  </a>
							  @empty
								<span class="ml-3 pull-right text-muted text-sm">Sin notificaciones por leer </span>  
							  @endforelse
							  
						  

						  


							  
							  <div class="dropdown-divider"></div>
							   <a href="{{ route('todas') }}" class="dropdown-item dropdown-footer not-render">Marcar todo como leido</a>
							</div>
						  </li>
						</ul>
						
						<!-- Usuario -->
						<ul class="navbar-nav nav-user">
						   <li class="nav-item dropdown li-user">
								<a id="avatar" href="#" class="nav-link not-render" data-toggle="dropdown">

								@isset(Auth::user()->personalInformation->photo)
									 <img class="rounded-circle" src="{{ asset('storage'). '/'.Auth::user()->personalInformation->photo}}" alt="" width="">
								 @else
									 <img class="rounded-circle" src="{{URL::asset('/img/avatardefault64.png')}}">
								@endif

								</a>
								<div class="dropdown-menu">
									<a class="dropdown-item not-render" href="#">
									<div class="user-info">
										<span class="text-uppercase"> Hola, {{ Auth::user()->username }}</span>
										<div class="username"></div>
									</div>
									</a>
									@isset(Auth::user()->personalInformation->id)
									<a class="dropdown-item not-render" href="{{ route('personalInformation.edit', Auth::user()->personalInformation->id) }}">
									<i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;Editar Perfil</a>
									@endif
									<div role="separator" class="dropdown-divider"></div>
									<a class="dropdown-item text-danger not-render" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{ __('Logout') }}
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
									</form>
								</div>
							</li>
						</ul>
						
						
					  </div>
					</nav>		
				</div>
			</div>
		</div>
	</div><!-- Fin Header and left menu -->


	<div id="wrapper">
	 <div class="container">	
	  @yield('content')
	  @yield ('scripts')
	 </div> 	
	</div> 	
						
				
</div> 	
	


<footer>
<div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <a class="nav-link dashboard admin" href="{{ action('HomeController@term') }}" aria-expanded="true" >	
				<span class="content">Términos & Condiciones</span>
			</a>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <a class="nav-link dashboard admin" href="{{ action('HomeController@polit') }}" aria-expanded="true">
				<span class="content">Política de Privacidad</span>
			</a>
          </div>
        </div>
      </div>
</footer>


 <!-- multiselect checkbox -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/js/bootstrap-multiselect.min.js" integrity="sha512-ljeReA8Eplz6P7m1hwWa+XdPmhawNmo9I0/qyZANCCFvZ845anQE+35TuZl9+velym0TKanM2DXVLxSJLLpQWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/css/bootstrap-multiselect.css" integrity="sha512-DJ1SGx61zfspL2OycyUiXuLtxNqA3GxsXNinUX3AnvnwxbZ+YQxBARtX8G/zHvWRG9aFZz+C7HxcWMB0+heo3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
			

 	<!-- Scripts minimax -->
     <!--Minimax-->
			
			<script src="{{ asset('js/minimax/browser.min.js') }}"></script>
			<script src="{{ asset('js/minimax/breakpoints.min.js') }}"></script>
			<script src="{{ asset('js/minimax/util.js') }}"></script>
			<script src="{{ asset('js/minimax/main.js') }}"></script>
	<!--Fin Minimax-->
	



	<script>
	
	$("#log").click( function(){
		event.preventDefault(); document.getElementById('logout-form').submit();  
	});
	
	$(document).ready(function(){
			
		$(".nav-user").append($(".li-user"));
		$(".nav-noti").append($(".li-noti"));
		
		$('.dropdown-toggle').dropdown()
		$('.collaps').collapse()
	}); 

	

$(document).ready(function() {       
	$('#days').multiselect({		
		nonSelectedText: '---',	
		buttonWidth:'100%',
		allSelectedText: 'Todos los días',
		numberDisplayed: 7,
	});
	
	
	dias = $('#dias').val();
	var array = dias.split(',');
	
	$.each(array, function( index, value ) {
	  $('#days').multiselect('select', value);
	});
	
});

	
	</script>
	
	
	
	
	

	
	
	</body>

	

	
</html>