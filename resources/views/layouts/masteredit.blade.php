<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Busswe</title>

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
		<!--<script src="https://use.fontawesome.com/releases/v5.10.1/js/all.js" data-auto-replace-svg="nest"></script>-->

		<link href="https://rawgit.com/lykmapipo/themify-icons/master/css/themify-icons.css" rel="stylesheet">
	

	 
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
            <div class="navbar-brand" style="margin-top: -30px; margin-left:15px !important">
			    <img  src="{{URL::asset('/img/logo/logo.png')}}" alt="Invoicing" height="80px">

            </div>

  

            <div class="navbar navbar-right">
                <button
                    type="button"
                    class="navbar-toggler"
                    data-toggle="collapse"
                    data-target="#navSidebar"
                    aria-controls="navSidebar"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="fa fa-bars"></span>
                </button>

                <ul id="menu-mainmenu"
					class="navbar-nav"
					data-control="mainmenu"
					data-alias="mainmenu">
	   
							
        <li class="nav-item dropdown">
			<a href="#" class="nav-link" data-toggle="dropdown">
				<img class="rounded-circle" src="//www.gravatar.com/avatar/3f16a36304ef17a24f8ffff9951746cf.png?s=64&d=mm">
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

        <div class="sidebar" role="navigation">
    <div id="navSidebar" class="nav-sidebar">
        <ul  id="side-nav-menu" class="nav">
                    <li class="nav-item active">
            <a
                class="nav-link dashboard admin"
                href="#"
                aria-expanded="true"
            >
                                    <i class="fa fa-tachometer-alt fa-fw"></i>
                
                                    <span class="content">Dashboard</span>
                            </a>

                    </li>

                    <li class="nav-item">
						<a class="nav-link restaurant has-arrow" href="#" aria-expanded="false">
							<i class="fa fa-store fa-fw"></i>
								<span class="content">SETTINGS</span>
						</a>
							<ul class="nav collapse" aria-expanded="false">
								<li class="nav-item">
								<a class="nav-link locations" href="" aria-expanded="false">Settings</a>
								</li>
							</ul>
                    </li>

                    <li class="nav-item">
						<a class="nav-link restaurant has-arrow" href="#" aria-expanded="false">
							<i class="fa fa-store fa-fw"></i>
								<span class="content">CUSTOMERS</span>
						</a>
							<ul class="nav collapse" aria-expanded="false">
								<li class="nav-item">
								<a class="nav-link locations" href="" aria-expanded="false">Customers List</a>
								</li>
							</ul>
                    </li>


				
@can('statuses.index')		
		<li class="nav-item">
            <a class="nav-link users has-arrow" href="#" aria-expanded="false">
              <i class="fa fa-roles fa-fw"></i>
                <span class="content">Statuses</span>
               </a>
                  <ul  class="nav collapse" aria-expanded="false">
					<li class="nav-item">
                     <a class="nav-link" href="" aria-expanded="false">Statuses</a>
                    </li>
                  </ul>
        </li>
@endcan	
					
					
@can('roles.index')
		<li class="nav-item">
            <a class="nav-link users has-arrow" href="#" aria-expanded="false">
              <i class="fa fa-roles fa-fw"></i>
                <span class="content">Roles</span>
               </a>
                  <ul  class="nav collapse" aria-expanded="false">
					<li class="nav-item">
                     <a class="nav-link" href="" aria-expanded="false">Roles</a>
                    </li>
                  </ul>
        </li>
@endcan
					
















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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<!-- scipt 
<script src="{{ asset('js/app.js') }}"
</script>-->

 @yield('scripts')
 
 	 <!-- Js de Bootstrap -->


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
	 
	 
</body>
</html>

