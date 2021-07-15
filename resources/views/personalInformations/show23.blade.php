@extends('base')
@extends('layouts.style23')
@section('main')

@section('scripts')
     <!--<link href="{{ asset('css/carrousel/neces/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/carrousel/neces/jquery.min.js') }}" defer></script>-->
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
	
	  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
	  
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
	  
	<script src="{{ asset('js/carrousel/neces/bootstrap.min.js') }}" defer></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js" integrity="sha512-YYiD5ZhmJ0GCdJvx6Xe6HzHqHvMpJEPomXwPbsgcpMFPW+mQEeVBU6l9n+2Y+naq+CLbujk91vHyN18q6/RSYw==" crossorigin="anonymous"></script>
	
		
	<script>

		$(document).ready(function(){
  
		  
		  $( ".carousel .carousel-inner" ).swipe( {
			swipeLeft: function ( event, direction, distance, duration, fingerCount ) {
			  this.parent( ).carousel( 'next' );
			},
			swipeRight: function ( ) {
			  this.parent( ).carousel( 'prev' );
			},
			threshold: 0,
			tap: function(event, target) {
			  window.location = $(this).find('.carousel-item.active a').attr('href');
			},

			excludedElements:"label, button, input, select, textarea, .noSwipe"
		  } );
		  
		  $('.carousel .carousel-inner').on('dragstart', 'a', function () {
			return false;
		  });  
		  
		  	/*indicadores*/
			 $(".carousel").each( function() {  
				var $this = $(this);	
				var id_c =$(this).attr("id");
				var n = "#";
				var id_car = (n + id_c);
				var items = $(this).find("div.carousel-item");		   
				var total= items.length;
				var ol = ("" +id_car + " .carousel-indicators");

					for(var i=0 ; i < total ; i++) {
						$(""+ol+"").append("<li data-target="+id_car+" data-slide-to="+ i +"></li>");
					  }
					  
				$(this).find(".carousel-indicators li:first").addClass('active');	   

			 });
			 
		   
			/*fin indicadores*/
		  
		});
	
	</script>
@stop


<div class="container" style="max-width: -webkit-fill-available;">
<div class="col-xl-8 col-sm-12 col-md-12 offset-xl-2" >

                    <div class="header" style="background: {{ $personalInformation->background }}">
						<div class="contls">
						<img src="{{ asset('storage'). '/'.$personalInformation->header}}" class="logo-sup">
						</div>
					</div>


<div class="pfondo">
                     
@if (session('creeBrochure'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Lo siento!</strong> {{ session('creeBrochure') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
					   
	 <div class="row multi-slider">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		  	<div id="theCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" > 
			
			<!--indicador-->
			<ol class="carousel-indicators"></ol>
			<!--indicador-->
			<div class="carousel-inner">
			
			               @if($personalInformation->photo)
							<div class="carousel-item active" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->photo}}');">

							</div>
							@endif
							
							@if($personalInformation->photo2)
							<div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->photo2}}');">
								
							</div>
							@endif
							
							@if($personalInformation->photo3)
							<div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->photo3}}');">
								
							</div>
							@endif
			
			</div>
			
			

		  </div>
		</div>
	 </div>	   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   

		<div class="video-container" >

		

		

						<div class="profile-name">{{ $personalInformation->first_name }} {{ $personalInformation->last_name }}</div> 
						
						@if($personalInformation->puesto)
						<div class="profile-puesto">{{ $personalInformation->puesto }}</div>
						@endif
						
						<div class="profile-company">{{ $personalInformation->company }}</div>
						<div class="profile-position">{{ $personalInformation->position }}</div>
						
						@if($personalInformation->cv == 1)
								<div class="curri">
								 <a class="btn-curri outline-info-curri" href="{{ route('brochures.pdf',$personalInformation->id) }}" target="_blank"><img src="{{URL::asset('/img/logo/cv_102350.png')}}" alt="PDF" width="35px">Brochure</a>
								</div>
							@endif 
						
						<a href="{{ route('personalInformations.vcard',$personalInformation->id) }}" style="text-decoration:none;" class="msg-btn" target="_blank">Agregar al telefono</a>
						<div class="parrpi">
						<p class="persinf">{!! $personalInformation->presentation !!}</p>


		  
		</div>
		</div>
</div>
</div>



<div class="col-xl-8 col-sm-12 col-md-12 offset-xl-2" > 
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
									 <a href="sms:+{{ $personalInformation->whatsapp }}?body=Hola quisiera informacion sobre: " class="btn-bus">
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
								 <a href="{{ $personalInformation->url_map }}" target="_blank" class="btn-bus">
								 <img src="{{URL::asset('/img/locationinv.png')}}"></a>
								 
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
	<a href="/{{ $personalInformation->slug_calendar  }}" class="msg-btnduo" style="text-decoration:none" target="_blank">Reunirnos</a>
			<a href="mailto:{{ $email }}" class="msg-btnduo" style="text-decoration:none" target="_blank">Enviar Email</a>
	</div>	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 

















<p class="misserv"><b>{{ $personalInformation->serv_prod }}</b></p>

				 <div class="serv"> {!! $personalInformation->services !!} </div>
				 
				 
				 
		<!--aq-->

			  












 <div class="row multi-slider">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		  	<div id="theCarousel2" class="carousel slide" data-ride="carousel" data-interval="3000" > 
			
			<!--indicador-->
			<ol class="carousel-indicators"></ol>
			<!--indicador-->
			<div class="carousel-inner">
			 
			             @if($personalInformation->carr1)
						  <div class="carousel-item active" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->carr1}}');">
							
						  </div>
						  @endif
						  @if($personalInformation->carr2)
						 <div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->carr2}}');">
							
						  </div>
						  @endif
						  @if($personalInformation->carr3)
						  <div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->carr3}}');">
						
						  </div>
						  @endif
						  @if($personalInformation->carr4)
						  <div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->carr4}}');">
							
						  </div>
						  @endif
						  @if($personalInformation->carr5)
						  <div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->carr5}}');">
							
						  </div>
						  @endif
						  @if($personalInformation->carr6)
						 <div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->carr6}}');">
						
						  </div>
							@endif

			</div>
			
				

		  </div>
		</div>
	 </div>



			  <strong>
				<p class="recom">{{ 'RECOMIENDAME' }}</p>
			   </strong>

	<div class="col-md-12">
			  <div class="rs">
						 
						 <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fweiswork.com%2F&amp;src=sdkpreparse" target="_blank">
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
			   <a href="" class="msg-btnduo" style="text-decoration:none" target="_blank" onclick="VerWa()">Compartir</a>

	           <strong>
				<p class="sigueme">{{ 'SIGUEME EN MIS RRSS' }}</p>
			   </strong>
			   
			   
			   
	<div class="col-md-12">
			  <div class="rs">
					 @if($personalInformation->youtube)
						<a href="{{ $personalInformation->youtube }} " target="_blank">
						 <img src="{{URL::asset('/img/youtube.png')}}" style="width: 50px;"></a>
					 @endif
					  @if($personalInformation->twitter)
						 <a href="{{ $personalInformation->twitter }}" target="_blank">
						 <img src="{{URL::asset('/img/twitterx.png')}}" style="width: 50px;"></a>
					  @endif
					  @if($personalInformation->linkedin)
						 <a href="{{ $personalInformation->linkedin }}" target="_blank">
						 <img src="{{URL::asset('/img/linkedinx.png')}}" style="width: 50px;"></a>
					 @endif
					 @if($personalInformation->facebook)
						 <a href="{{ $personalInformation->facebook }}" target="_blank">
						 <img src="{{URL::asset('/img/facebookx.png')}}" style="width: 50px;"></a>
					 @endif
					 @if($personalInformation->instagram)
						 <a href="{{ $personalInformation->instagram }}" target="_blank">
						 <img src="{{URL::asset('/img/instagramx.png')}}" style="width: 50px;"></a>
					@endif
			  </div>
	
		<strong>
			<div class="datos">
			  MIS DATOS
			</div>
		</strong>
		
<div class="info">




@php($cqr = Request::url())

<div>Escanea este QR de Mi Perfil:</div>

{!!QrCode::size(250)->generate("$cqr") !!}

			 <div class="website">  <a href="http://{{  $personalInformation->website }}" target="_blank">{{ $personalInformation->website }}</a> </div>
			 <div class="website"><i class="fa fa-envelope"></i> <a href="mailto:{{  $personalInformation->correo }}" > {{ $personalInformation->correo }}</a></div>
			 <div class="telephone"><i class="fa fa-phone"> </i> <a href="tel:+{{  $personalInformation->telephone }}" > {{ $personalInformation->telephone }}</a></div>
			 <div class="address">{{ $personalInformation->address }}</div>
		</div>	

	</div>










	 <div class="row multi-slider">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		  	<div id="theCarousel3" class="carousel slide" data-ride="carousel" data-interval="3000" > 
			
			<!--indicador-->
			<ol class="carousel-indicators"></ol>
			<!--indicador-->
			<div class="carousel-inner">
			 
			 	            @if($personalInformation->logo)
							  <div class="carousel-item active" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->logo}}');">
								
							  </div>
							  @endif
							@if($personalInformation->logo2)
							  <div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->logo2}}');">
								
							  </div>
							  @endif
			 	            @if($personalInformation->logo3)
							  <div class="carousel-item " style="background-image:url('{{ asset('storage'). '/'.$personalInformation->logo3}}');">								
							  </div>
							  @endif
							@if($personalInformation->logo4)
							  <div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->logo4}}');">
								
							  </div>
							  @endif
			 	            @if($personalInformation->logo5)
							  <div class="carousel-item " style="background-image:url('{{ asset('storage'). '/'.$personalInformation->logo5}}');">
								
							  </div>
							  @endif
							@if($personalInformation->logo6)
							  <div class="carousel-item" style="background-image:url('{{ asset('storage'). '/'.$personalInformation->logo6}}');">
								
							  </div>
							  @endif
			 
			</div>
				
		  </div>
		</div>
	 </div>




@if($personalInformation->qr)
<div class="qr" style="margin-top: 35px">
	           <strong>
				<p class="sigueme">{{ 'Recibir Pagos' }}</p>
			   </strong>
	<img src="{{ asset('storage'). '/'.$personalInformation->qr}}" class="qr">
</div>
@endif

@if($personalInformation->paypalme)

			<div class="paypalme">
				<a href="{{ $personalInformation->paypalme }} " target="_blank">
				<img src="{{URL::asset('/img/paypalme-bottom.png')}}" style="width: 150px;"></a>
			</div>	

@endif


@if($personalInformation->np2)
			<div class="np2">
		       <strong>
				<p class="sigueme">{{ $personalInformation->np2 }}</p>
			   </strong>
			</div>
@endif

@if($personalInformation->qr2)
				<img src="{{ asset('storage'). '/'.$personalInformation->qr2}}" class="qr">
@endif
				
@if($personalInformation->pasarela2)
	<div class="paypalme">
		<a class="btn-curri outline-info-curri" href="http://{{ $personalInformation->pasarela2 }} " >Pague Aquí
		</a>
	</div>
@endif

<!--collapse Agregar al inicio-->
<div class="tuto" style="background:#15181a; color: white;">

	<a class="msg-btnduo" data-toggle="collapse" href="#addInicio" role="button" aria-expanded="false" aria-controls="addInicio">Agregar al Inicio</a>


		<div class="collapse multi-collapse" id="addInicio"><br>
			<p>Para agregar esta tarjeta a su pantalla de <br/>Inicio, simplemente seleccione su sistema<br/> operativo y le mostramos como hacerlo.</p>

			<div class="duo2">
				<a href="" class="msg-btnduo" style="text-decoration:none" target="_blank"><span><i class="fa fa-android" aria-hidden="true"></i></span></a>
				<a href="" class="msg-btnduo" style="text-decoration:none" target="_blank"><span style="font-weight: bold;">iOS</span></a>	
			</div>
		</div>

	</div>
<!--fin collapse-->



<div class="trinidad">

<a class="msg-btnduo st" data-toggle="collapse" href="#asiSoporte" role="button" aria-expanded="false" aria-controls="asiSoporte">Asistencia y Soporte</a>

<div class="collapse multi-collapse" id="asiSoporte"><br>			
	<div class="contacto">
		<div class="col-md-12">
			<div class="at">
				<div class="marca">	
					Weiswork es una Marca Registrada<br/>
					Asistencia 24 X 7 para problemas con esta tarjeta<br/>
					Requieres Adquirir una Tarjeta Clic <a href="https://weiswork.com/">aquí</a>
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

</div><!-- TRINIDAD -->
			

	
</div><!-- fin d segundo fondo -->
</div><!-- col-xl-12 col-sm-12 col-md-12 -->
</div><!-- Container -->




@endsection

