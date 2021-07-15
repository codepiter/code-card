@extends('base')
@extends('layouts.style1')
@section('main')

<div class="container">

			<div class="col-xs-12 col-sm-12 col-md-12" >
					<div class="pfondo">
						  <!--<div class="cover-photo">-->
							<img src="{{ asset('storage'). '/'.$personalInformation->photo}}" class="profile" >
						  <!--</div>-->

						  <div class="profile-name">
							  {{ $personalInformation->first_name }} {{ $personalInformation->last_name }}
						  </div> 
								  <div class="profile-company">{{ $personalInformation->company }}</div>
								  <div class="profile-position">{{ $personalInformation->position }}</div>
							   <a href="{{ route('personalInformations.vcard',$personalInformation->id) }}" style="text-decoration:none;" class="msg-btn" target="_blank">Agregar al telefono</a>
						  <p class="persinf">{{ $personalInformation->presentation }}</p>
					</div>	  
			</div>


			 

		 <div class="col-xs-12 col-sm-12 col-md-12" > 
		<div class="sfondo">
		
		
		
		
		
		
		
		
		
		
		
		
		
	<div class="g2">
		<div class="contactame">CONTACTAME </div>
			 <div class="contacto">
				<div class="col-md-12">
				 <div class="rs">
				          <div class="col-md-12">
								<!--tlf-->
								<a href="tel:+{{ $personalInformation->whatsapp }}" class="btn-bus">
								 <img src="{{URL::asset('/img/telefono2.png')}}">
								</a>
								 <!--ws-->
									 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
									<a href="https://api.whatsapp.com/send?phone={{ $personalInformation->whatsapp }}&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre..." target="_blank" class="btn-bus">
										<img src="{{URL::asset('/img/whatsapp2.png')}}">
									</a>
								<!--sms-->
									 <a href="sms:+{{ $personalInformation->whatsapp }}" class="btn-bus">
									  <img src="{{URL::asset('/img/sms.png')}}">
									 </a>
			               </div>
								 
								<div>&nbsp;</div>
								 
						<div class="col-md-12">
								<!--skype-->
								<a href="" class="btn-bus">
								 <img class='skype-share' src="{{URL::asset('/img/skype1.png')}}">
								</a>
								 
								 <!--ubication-->
								 <a href="sms:+{{ $personalInformation->address }}" class="btn-bus">
								 <img src="{{URL::asset('/img/location.png')}}"></a>
								 
								 <!--messenger-->
								  <a href="http://m.me/{{ $personalInformation->facebook }}" target="_blank" class="btn-bus">
								  <img src="{{URL::asset('/img/messenger.png')}}">
								  </a>
								<!--<div class='skype-share' data-href="{{ Request::url() }}" data-lang='' data-text='' data-style='circle' ></div>-->
				          </div>	
				</div>	
			  </div>
			  <br>  
			</div>	
	</div>	
	
	
	
	
	
	
	
	
	
	
	
	
	

			<div class="duo">
			<a href="{{ $personalInformation->calend_gmail }}" class="msg-btn" style="text-decoration:none" target="_blank">Reunirnos</a>
			<a href="mailto:{{ $email }}" class="msg-btn" style="text-decoration:none" target="_blank">Enviar Email</a>
			</div>	
				
				
				
				
				
				
				
				
				
				
				
				
	<p class="misserv"><b>{{ $personalInformation->serv_prod }}</b></p>

				 <div class="serv"> {!! $personalInformation->services !!} </div>
				 
				 
				 
				 
		<!--aq-->

			   <strong>
				<p class="recom">{{ 'RECOMIENDAME' }}</p>
			   </strong>

	<div class="col-md-12">
			  <div class="rs">
						 
						 <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdcabecera.com%2F&amp;src=sdkpreparse" target="_blank">
						 <img src="{{URL::asset('/img/facebookx.png')}}" style="width: 50px;"></a>
						 
						 <a href="https://api.whatsapp.com/send?text=hola%20te%20comparto%20la%20tarjeta%20de%20{{ $personalInformation->first_name }} {{ $personalInformation->last_name }}:%20{{ Request::url() }}" target="_blank">
						 <img src="{{URL::asset('/img/whatsapp2.png')}}" style="width: 50px;"></a>
					 
						 <a href="mailto:" target="_blank">
						 <img src="{{URL::asset('/img/email.png')}}" style="width: 50px;"></a>

					 <a href="sms:?body=Hola te comparto l tarjeta de {{ $personalInformation->first_name }} {{ $personalInformation->last_name }}: {{ Request::url() }}">
					      <img src="{{URL::asset('/img/sms.png')}}" style="width: 50px;">
					 </a>

						 <a href="{{ $personalInformation->messenger }}" target="_blank">
						 <img src="{{URL::asset('/img/messenger.png')}}" style="width: 50px;"></a>
				 </div>
				
		</div>
		
		 <div class="instr">Ingresa el número de teléfono para compartir esta Tarjeta Interactiva</div>

				  <input id="nombre" style="display:none" type="text" value="{{ $personalInformation->first_name }} {{ $personalInformation->last_name }}"/>
				  <div class="d-flex justify-content-center">
			  <input id="tlf" type="text" style="height:32px; width: 185px; border-radius: 15px"/><br>
			  </div><br>
			  
			  
		<!--<button class="msg-btn" onclick="VerWa()">Compartir</button>-->
			   <a href="" class="msg-btn" style="text-decoration:none" target="_blank" onclick="VerWa()">Compartir</a>
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			 
			  
		 <!--aq-->

			   <strong>
				<p class="sigueme">{{ 'SIGUEME EN MIS RRSS' }}</p>
			   </strong>

		<div class="col-md-12">
			  <div class="rs">
						 <a href="{{ $personalInformation->dribbble }} " target="_blank">
						 <img src="{{URL::asset('/img/dribbblex.png')}}" style="width: 50px;"></a>
					 
					  
						 <a href="{{ $personalInformation->twitter }}" target="_blank">
						 <img src="{{URL::asset('/img/twitterx.png')}}" style="width: 50px;"></a>
					
					  
						 <a href="{{ $personalInformation->linkedin }}" target="_blank">
						 <img src="{{URL::asset('/img/linkedinx.png')}}" style="width: 50px;"></a>
					 
					 
						 <a href="{{ $personalInformation->facebook }}" target="_blank">
						 <img src="{{URL::asset('/img/facebookx.png')}}" style="width: 50px;"></a>
					 
					 
						 <a href="{{ $personalInformation->instagram }}" target="_blank">
						 <img src="{{URL::asset('/img/instagramx.png')}}" style="width: 50px;"></a>
						 </div>
	
		<strong>
			<div class="datos">
			  MIS DATOS
			</div>
		</strong>
		
		<div class="info">
			 <div class="website">  <a href="{{  $personalInformation->website }}" target="_blank">{{ $personalInformation->website }}</a> </div>
			 <div class="website"><i class="fa fa-envelope"></i> <a href="mailto:{{  $personalInformation->user->email }}" > {{ $personalInformation->user->email }}</a></div>
			 <div class="telephone"><i class="fa fa-phone"> </i> <a href="tel:+{{  $personalInformation->telephone }}" > {{ $personalInformation->telephone }}</a> </div>
			 <div class="address">{{ $personalInformation->address }}</div>
			 <div class="address">{{ $personalInformation->pais }}</div>
		</div>	

		</div>
















	<img src="{{ asset('storage'). '/'.$personalInformation->logo}}" class="logo">
			
					
				








				
<div class="trinidad">


					<b>
						<div class="st">
						 Asistencia y Soporte
						</div>
					</b>
		<div class="contacto">
						<div class="col-md-12">
						<div class="at">
						<div class="marca">	
				Eskyl es una Marca Registrada<br/>
				Asistencia 24 X 7 para problemas con esta tarjeta<br/>
				Requieres Adquirir una Tarjeta Clic <a href="https://dcabecera.com/">aquí</a>
					  </div>
									
									
									
									
									
									
											<!--1-->
											<a href="tel:+51973302034"  class="btn-busswe">
															<img src="{{URL::asset('/img/telefono.png')}}"></a>
											<!--2-->
													 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
															<a href="https://api.whatsapp.com/send?phone=51973302034&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre..." target="_blank"  class="btn-busswe">
															<img src="{{URL::asset('/img/whatsapp.png')}}">
															</a>
											 <!--3-->	
											 <a href="sms:+51973302034" class="btn-busswe">
															  <img src="{{URL::asset('/img/sms.png')}}">
											</a>
									</div>
							</div>
		</div>
</div>











</div><!-- fin d segundo fondo -->
</div><!-- col-xs-12 col-sm-12 col-md-12 -->
</div><!-- Container -->

@endsection