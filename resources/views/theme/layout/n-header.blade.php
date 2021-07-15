<div class="horizontal-menu">
  <nav class="navbar top-navbar">
    <div class="container">
      <div class="navbar-content">
        <a href="#" class="navbar-brand">
          Weis<span>Work</span>
        </a>
        {{-- <form class="search-form">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
            </div> --}}
            {{-- Input Text Buscardor --}}
            {{-- <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
          </div>
        </form> --}}
        <ul class="navbar-nav">{{-- Lista de idiomas --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1 d-none d-md-inline-block">EnglishXXX</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="languageDropdown">
              <a href="{{ url('locale/en') }}" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
              {{-- <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
              <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
              <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a> --}}
              <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
            </div>
          </li>

          <li class="nav-item"> {{-- Icono para cambio entre temas claro y oscuro --}}
            <a href="#" class="nav-link" role="button" onclick="cambiarTheme()">
              @if (isset($_COOKIE['theme_dark']))
                  @if ($_COOKIE['theme_dark'] === '1')
                    <i data-feather="sun"></i>  
                  @else
                    <i data-feather="moon"></i>
                  @endif
              @else
                  <i data-feather="moon"></i>
              @endif
            </a>
          </li>

          <li class="nav-item dropdown nav-apps"> {{-- Lista de aplicaciones, acceso directo --}}
            <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="grid"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="appsDropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">Web Apps</p>
                <a href="javascript:;" class="text-muted">Edit</a>
              </div>
             
		
			 <div class="dropdown-body">
                <div class="d-flex align-items-center apps">
                  <!--<a href="#"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>-->
                  <a href="{{ url ('/events/listado') }}" ><i data-feather="list" class="icon-lg"></i><p>Citas</p></a>
                
				  <a href="cal-{{ Auth::user()->personalInformation->slug }}" target="_blank"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>


				<!--<a href="#"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>-->

				  <a href="card/{{ Auth::user()->personalInformation->slug }}" target="_blank"><i data-feather="user" class="icon-lg"></i><p>Card</p></a>
               
			   </div>
              </div>
	
			  
			  
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="javascript:;">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown nav-messages">{{-- Icono Mensajes, bandeja de mensajes --}}
            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="mail"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="messageDropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">{{--9 New --}}Messages</p>
                <a href="javascript:;" class="text-muted">Clear all</a>
              </div>
              <div class="dropdown-body">
                {{-- <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Leonardo Payne</p>
                      <p class="sub-text text-muted">2 min ago</p>
                    </div>	
                    <p class="sub-text text-muted">Project status</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Carl Henson</p>
                      <p class="sub-text text-muted">30 min ago</p>
                    </div>	
                    <p class="sub-text text-muted">Client meeting</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Jensen Combs</p>												
                      <p class="sub-text text-muted">1 hrs ago</p>
                    </div>	
                    <p class="sub-text text-muted">Project updates</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Amiah Burton</p>
                      <p class="sub-text text-muted">2 hrs ago</p>
                    </div>
                    <p class="sub-text text-muted">Project deadline</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="figure">
                    <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="userr">
                  </div>
                  <div class="content">
                    <div class="d-flex justify-content-between align-items-center">
                      <p>Yaretzi Mayo</p>
                      <p class="sub-text text-muted">5 hr ago</p>
                    </div>
                    <p class="sub-text text-muted">New record</p>
                  </div>
                </a> --}}
              </div>
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="javascript:;">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown nav-notifications">{{-- Lista de notificaciones --}}
            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="bell"></i>
              <div class="indicator">
                <div class="circle"></div>
              </div>
            </a>
            <div class="dropdown-menu" aria-labelledby="notificationDropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">{{--6 New--}} Notifications</p>
                <a href="javascript:;" class="text-muted">Clear all</a>
              </div>
              <div class="dropdown-body">
                {{-- <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="user-plus"></i>
                  </div>
                  <div class="content">
                    <p>New customer registered</p>
                    <p class="sub-text text-muted">2 sec ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="gift"></i>
                  </div>
                  <div class="content">
                    <p>New Order Recieved</p>
                    <p class="sub-text text-muted">30 min ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="alert-circle"></i>
                  </div>
                  <div class="content">
                    <p>Server Limit Reached!</p>
                    <p class="sub-text text-muted">1 hrs ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="layers"></i>
                  </div>
                  <div class="content">
                    <p>Apps are ready for update</p>
                    <p class="sub-text text-muted">5 hrs ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="download"></i>
                  </div>
                  <div class="content">
                    <p>Download completed</p>
                    <p class="sub-text text-muted">6 hrs ago</p>
                  </div>
                </a> --}}

                @forelse (auth()->user()->unreadNotifications as $notification)
                  <a href="{{ route('esta') }}" class="dropdown-item not-render">
                    <i class="fas fa-envelope mr-2"></i> {{ $notification->data['nombre'] }}
                    <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                  </a>
							  @empty
								  <span class="ml-3 pull-right text-muted text-sm">Sin notificaciones por leer </span>  
							  @endforelse

              </div>
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="javascript:;">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown nav-profile">{{-- Icono y opciones del usuario --}}
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{-- <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile"> --}}
              @isset(Auth::user()->personalInformation->photo)
                <img class="rounded-circle" src="{{ asset('storage'). '/'.Auth::user()->personalInformation->photo}}" alt="profile" width="">
              @else
                {{-- <img class="rounded-circle" src="//www.gravatar.com/avatar/3f16a36304ef17a24f8ffff9951746cf.png?s=64&d=mm"> --}}
                <img src="{{URL::asset('/img/avatardefault64.png')}}" alt="profile">
              @endif
            </a>
            <div class="dropdown-menu" aria-labelledby="profileDropdown">
              <div class="dropdown-header d-flex flex-column align-items-center">
                <div class="figure mb-3">
                  {{-- <img src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile"> --}}
                  @isset(Auth::user()->personalInformation->photo)
                    <img class="rounded-circle" src="{{ asset('storage'). '/'.Auth::user()->personalInformation->photo}}" alt="profile" width="">
                  @else
                    <img src="{{URL::asset('/img/avatardefault64.png')}}" alt="profile">
                  @endif
                </div>
                <div class="info text-center">
                  <p class="name font-weight-bold mb-0">{{-- Amiah Burton --}}{{ Auth::user()->username }}</p>
                  <p class="email text-muted mb-3">{{-- amiahburton@gmail.com --}}{{ Auth::user()->email }}</p>
                </div>
              </div>
              <div class="dropdown-body">
                <ul class="profile-nav p-0 pt-3">
                  {{-- <li class="nav-item">
                    <a href="url('/general/profile')" class="nav-link">
                      <i data-feather="user"></i>
                      <span>ProfileXXX</span>
                    </a>
                  </li> --}}
                  @if(Auth::user()->personalInformation)
                  <li class="nav-item">
                    <a href="{{-- javascript:; --}}{{ route('personalInformation.edit', Auth::user()->personalInformation->id) }}" class="nav-link">
                      <i data-feather="edit"></i>
                      <span>Edit Profile</span>
                    </a>
                  </li>
                  @endif
                  {{-- <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                      <i data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li> --}}
                  <li class="nav-item">
                    <a href="{{-- javascript:; --}}{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      <i data-feather="log-out"></i>
                      <span>Log Out</span>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
          <i data-feather="menu"></i>					
        </button>
      </div>
    </div>
  </nav>
  <nav class="bottom-navbar">{{-- Navbar --}}
    <div class="container">
      <ul class="nav page-navigation">
        <li class="nav-item @if (Request::is('personalInformation*')) active  @endif {{-- active_class(['/']) --}}">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="link-icon" data-feather="box"></i>
            <span class="menu-title">Inicio</span>
          </a>
        </li>
        @if (auth()->user()->is_admin == 1)
        <li class="nav-item @if (Request::is('pagos*')) active  @endif {{-- active_class(['/']) --}}">
          <a class="nav-link" href="{{ url('/pagos') }}">
            <i class="link-icon" data-feather="dollar-sign"></i>
            <span class="menu-title">Pago</span>
          </a>
        </li>
        @endif
		
		
		<li class="nav-item @if (Request::is('sms*')) active  @endif {{-- active_class(['/']) --}}">
          <a class="nav-link" href="{{ url('/sms') }}">
            <i class="link-icon" data-feather="message-square"></i>
            <span class="menu-title">Sms</span>
          </a>
        </li>
		
		
        @isset(Auth::user()->payment->type_card)
					@if(Auth::user()->payment->type_card==='empresa')
            <li class="nav-item @if (Request::is('brochures*')) active  @endif {{-- active_class(['/']) --}}">
              <a class="nav-link" href="{{ url('/brochures') }}">
                <i class="link-icon" data-feather="file-text"></i>
                <span class="menu-title">Brochure</span>
              </a>
            </li>
          @else
            <li class="nav-item @if (Request::is('resumes*')) active  @endif {{-- active_class(['/']) --}}">
              <a class="nav-link" href="{{ url('/resumes') }}">
                <i class="link-icon" data-feather="file-text"></i>
                <span class="menu-title">Curriculum</span>
              </a>
            </li>
          @endif
        @endisset
        
		
		
		

		
		
		<li class="nav-item {{-- active_class(['icons/*']) --}}">
          <a href="#" class="nav-link">
            <i class="link-icon" data-feather="briefcase"></i>
            <span class="menu-title">Citas</span>
            <i class="link-arrow"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item"><a href="{{url ('/events')}}" class="nav-link {{-- active_class(['icons/feather-icons']) --}}">
                <i class="mdi mdi-calendar"></i> Calendario</a>
              </li>
              <li class="nav-item"><a href="{{url('/events/listado')}}" class="nav-link {{-- active_class(['icons/flag-icons']) --}}">
                <i class="mdi mdi-file-document-edit "></i>Listado</a>
              </li>
            </ul>
          </div>
        </li>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        @isset (Auth::user()->personalInformation->template)
					@if( Auth::user()->personalInformation->template>'17' )
            <li class="nav-item @if (Request::is('gifCards*')) active  @endif {{-- active_class(['/']) --}}">
              <a class="nav-link" href="{{ url('/gifCards') }}">
                <i class="link-icon" data-feather="gift"></i>
                <span class="menu-title">Gifs Cards</span>
              </a>
            </li>
            <li class="nav-item @if (Request::is('customers*')) active  @endif {{-- active_class(['/']) --}}">
              <a class="nav-link" href="{{ url('/customers') }}">
                <i class="link-icon" data-feather="users"></i>
                <span class="menu-title">Clientes</span>
              </a>
            </li>
          @endif
        @endisset
        @if (auth()->user()->is_admin == 1) 
        <li class="nav-item @if (Request::is('inviteds*')) active  @endif {{-- active_class(['/']) --}}">
          <a class="nav-link" href="{{ url('/inviteds') }}">
            <i class="link-icon" data-feather="send"></i>
            <span class="menu-title">Invitar</span>
          </a>
        </li>
        @endif
        
        <li class="nav-item {{-- active_class(['icons/*']) --}}">
          <a href="#" class="nav-link">
            <i class="link-icon" data-feather="server"></i>
            <span class="menu-title">Soporte</span>
            <i class="link-arrow"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item"><a href="https://api.whatsapp.com/send?phone=51973302034&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre..." class="nav-link {{-- active_class(['icons/feather-icons']) --}}">
                <i class="mdi mdi-whatsapp"></i> Whatsapp</a>
              </li>
              <li class="nav-item"><a href="mailto:soporte@dcabecera.com" class="nav-link {{-- active_class(['icons/flag-icons']) --}}">
                <i class="mdi mdi-email-outline "></i> Email</a>
              </li>
            </ul>
          </div>
        </li>
		
		
		
		
		
		
		
		
      </ul>
    </div>
  </nav>
</div>