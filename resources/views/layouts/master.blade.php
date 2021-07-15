<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weiswork</title>

  <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('css/flame.css') }}" rel="stylesheet">
     <link href="{{ asset('css/admin.css') }}" rel="stylesheet"><!--Este evita el scroll down-->
	 <!-- Jquery ui-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	 
	 
    <!-- Scripts -->
    
	<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/flame.js') }}" defer></script>
    <script src="{{ asset('js/ui/flame.js') }}" defer></script>
   

             <script src="{{ asset('js/admin.js') }}" defer></script>
	        <script src="{{ asset('js/fontawesome/all.js') }}" defer></script>

		<!--<link href="https://rawgit.com/lykmapipo/themify-icons/master/css/themify-icons.css" rel="stylesheet">-->
	

	 
	 <!-- Bootstrap -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	 <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>
	


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  
</head>


<body class="page ">
  <div id="app">
    <nav class="navbar navbar-top navbar-expand navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-brand" style="margin-top: -30px;">
			    <a title="Main" href="{{ url('/personalInformation') }}">
				<img  src="{{URL::asset('/img/logo/logo.png')}}" alt="Invoicing"  width="155px" href="{{ url('/personalInformation') }}" ></a>

            </div>

  

            <div class="navbar navbar-right">
                <button
					id="btn-navbar"
                    type="button"
                    class="navbar-toggler"
                    data-toggle="collapse"
                    data-target="#navSidebar"
                    aria-controls="navSidebar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <ul id="menu-mainmenu"
					class="navbar-nav"
					data-control="mainmenu"
					data-alias="mainmenu">









<ul class="navbar-nav ml-auto" style="margin-top: 4px;">
        <!-- Notifications Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="">
                  <i class="fas fa-bell"></i>
                    @if (count(auth()->user()->unreadNotifications))
                    <span class="badge badge-warning">{{ count(auth()->user()->unreadNotifications) }}</span>
                        
                    @endif
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header" >Notificaciones</span>
                  @forelse (auth()->user()->unreadNotifications as $notification)
                  <a href="{{ route('esta') }}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> {{ $notification->data['nombre'] }}
                    <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                  </a>
                  @empty
                    <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones por leer </span>  
                  @endforelse
                  
			  

			  
                  <div class="dropdown-divider"></div>
                  <span class="dropdown-header">Read Notifications</span>
                  @forelse (auth()->user()->readNotifications as $notification)
                  <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> {{ $notification->data['asunto'] }}
                    <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                  </a>
                  @empty
                    <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones leidas                      </span>
                  @endforelse

                  
                  <div class="dropdown-divider"></div>
                   <a href="{{ route('todas') }}" class="dropdown-item dropdown-footer">Marcar todo como leido</a>
                </div>
              </li>

      </ul>

        <li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown">

		@isset(Auth::user()->personalInformation->photo)
			<img class="rounded-circle" src="{{ asset('storage'). '/'.Auth::user()->personalInformation->photo}}" alt="" width="">
		 @else
		<img class="rounded-circle" src="//www.gravatar.com/avatar/3f16a36304ef17a24f8ffff9951746cf.png?s=64&d=mm">
		@endif

			</a>
			<div class="dropdown-menu">
				
	
				
				<div class="user-info">
					<span class="text-uppercase"> Hola, {{ Auth::user()->username }}</span>
					<div class="username">  </div>
									<span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;</span>
				</div>

				
				<a class="dropdown-item " href="#">
					<i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;Edit Details        </a>
						<div role="separator" class="dropdown-divider"></div>
						                                  

									<a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off fa-fw"></i>&nbsp;
                                        {{ __('Logout') }}
                                    </a>
									    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
			</div>
		</li>
    </ul>     
</div>
        </div>
    </nav>






























        <div class="sidebar" role="navigation" id="sidebar">
    <div id="navSidebar" class="nav-sidebar">
        <ul  id="side-nav-menu" class="nav">
          

		  <li class="nav-item active">
				<a class="nav-link dashboard admin" href="{{ url('/personalInformation') }}" aria-expanded="true">
					
					<span class="content">Inicio</span>
				</a>
           </li>
		   
		   
		   
		   	@if (auth()->user()->is_admin == 1)
		     <li class="nav-item active">
				<a class="nav-link dashboard admin" href="{{ url('/pagos') }}" aria-expanded="true">
				
					<span class="content"> Pagos</span>
				</a>
           </li>
		   @endif
		   
		   
		   
		    <li class="nav-item active">
				<a class="nav-link dashboard admin" href="{{ url('/resumes') }}" aria-expanded="true">
					
					
					<span class="content"> Curriculum</span>
				</a>
           </li>
		   
		   <li class="nav-item active">
				<a class="nav-link dashboard admin" href="{{ route('events.index') }}" aria-expanded="true">
					<span class="content">Mi calendario</span>
				</a>
           </li>
	
	 <li class="nav-item active">
				<a class="nav-link dashboard admin" href="{{ url('/gifCards') }}" aria-expanded="true">
					<span class="content">Gifs Cards</span>
				</a>
           </li> 
			
			<li class="nav-item active">
				<a class="nav-link dashboard admin" href="{{ url('/customers') }}" aria-expanded="true">
					<span class="content"> Clientes</span>
				</a>
           </li>
	
	       <li class="nav-item active">
				<a class="nav-link dashboard admin" href="#" aria-expanded="true">
					
					
					<span class="content">Soporte</span>
				</a>
           </li>
	
	@if (auth()->user()->is_admin == 1)
          <li class="nav-item active">
				<a class="nav-link dashboard admin" href="{{ route('inviteds.index') }}" aria-expanded="true">
					<span class="content">Invitar</span>
				</a>
           </li>
    @endif

		 <!-- 
		   
		    <li class="nav-item active">
				<a class="nav-link dashboard admin" href="{{ url('/bufalo') }}" aria-expanded="true">
					<span class="content"> Paypal</span>
				</a>
           </li>
		   -->








	
		<li class="nav-item">
            <a class="nav-link users has-arrow" href="#" aria-expanded="false">
              <i class="fa fa-roles fa-fw"></i>
                <span class="content">Soporte</span>
            </a>
                  <ul  class="nav collapse" aria-expanded="false">
					<li class="nav-item">
						 <a class="nav-link" href="https://api.whatsapp.com/send?phone=51973302034&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre..." aria-expanded="false">Whatsapp</a>
						
						 
						 
						 <a class="nav-link" href="mailto:soporte@dcabecera.com">Email</a>
                
                    </li>
                  </ul>
        </li>
































	       <li class="nav-item active" style="">
				<a class="nav-link dashboard admin" href="{{ action('HomeController@term') }}" aria-expanded="true" >
					
					<span class="content">Terminos & Condiciones</span>
				</a>
           </li>
	

		    <li class="nav-item active">
				<a class="nav-link dashboard admin" href="{{ action('HomeController@polit') }}" aria-expanded="true">
					
				
					<span class="content">Politica de privacidad</span>
				</a>
           </li>

    </ul>
    </div>
</div>

























































    
    <div class="page-wrapper">
        <div class="row-fluid">
    <div data-control="dashboard-container" data-alias="dashboardContainer">
  

				<div id="dashboardcontainer-container-toolbar" class="toolbar dashboard-toolbar btn-toolbar"
					 data-container-toolbar>
				<div class="modal slideInDown fade" id="newWidgetModal" tabindex="-1" role="dialog" aria-labelledby="newWidgetModalTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div id="dashboardcontainer-new-widget-modal-content" class="modal-content">
						<div class="modal-body">
							<div class="loading">
								<span class="spinner"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></span>
							</div>
						</div>
					</div>
				</div>
			</div>

				</div>
		</div>
		</div>   
		
		
 </div>

 <div class="content-main">
  @yield('content')
 </div> 
</div>
	 <!-- Js de Bootstrap -->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha256-98vAGjEDGN79TjHkYWVD4s87rvWkdWLHPs5MC3FvFX4=" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<!-- scipt 
<script src="{{ asset('js/app.js') }}"
</script>-->
<script src="{{ asset('js/tabular/tab.js') }}" ></script>
 @yield('scripts')
 
 	 <!-- Js de Bootstrap -->


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
	 
	 
</body>
</html>

