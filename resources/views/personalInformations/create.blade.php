@extends('base2')
@extends('layouts.carrousel')
@extends('layouts.wizard')
@section('main')

<div class="container" style="background: #F0F7FF;">
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="overflow-x: hidden; width: 108%; margin-left: -4%;">
		<div class="row">
			<div class="col-lg-12 margin-tb">

			</div>
		</div>

 @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	


@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Gracias!</strong> {{ session('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('mensaje'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Continuamos!</strong> {{ session('mensaje') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('errdim'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error en carga!</strong> {{ session('errdim') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif




<form id="myForm" action="{{url('/personalInformation')}}" method="post" enctype="multipart/form-data" style="border: 3px solid transparent ; background:#f0f7ff; margin-top: 20px;">
			{{ csrf_field() }}

<!--1-->


	@if (session('type') == 'persona' || ($type == 'persona' ) )
<div class="tab">
<input type="text" class="d-none" name="tipo" value="persona">
	<div  style="text-align:center; font-family:'Roboto'">
			<img src="{{ asset('img/logo/logo.png') }}" alt="Texto Umg" width="250px"  />
			<h2>Elige un template</h2>
			<h4>Elige un estilo de tu primera tarjeta</h4>
	
	
	
	
		
				<div  id="slider-personas">

			  <div id="carouselPersonas" class="container-fluid">
						 
				<div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="3000">
						
						<div class="carousel-inner row w-100 mx-auto" role="listbox">
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
								<img class="img-fluid mx-auto d-block template1" src="{{ asset('img/carrousel/1.jpg') }}" alt="slide 1">
							</div>
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template2" src="{{ asset('img/carrousel/2.jpg') }}" alt="slide 2">
							</div>
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template3" src="{{ asset('img/carrousel/3.jpg') }}" alt="slide 3">
							</div>
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template4" src="{{ asset('img/carrousel/4.jpg') }}" alt="slide 4">
							</div>
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template5" src="{{ asset('img/carrousel/5.jpg') }}" alt="slide 5">
							</div>
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template6" src="{{ asset('img/carrousel/6.jpg') }}" alt="slide 6">
							</div>
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template7" src="{{ asset('img/carrousel/7.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template8" src="{{ asset('img/carrousel/8.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template9" src="{{ asset('img/carrousel/9.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template10" src="{{ asset('img/carrousel/10.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template11" src="{{ asset('img/carrousel/11.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template12" src="{{ asset('img/carrousel/12.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template13" src="{{ asset('img/carrousel/13.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template14" src="{{ asset('img/carrousel/14.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template15" src="{{ asset('img/carrousel/15.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template16" src="{{ asset('img/carrousel/16.jpg') }}" alt="slide 7">
							</div>
							
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template17" src="{{ asset('img/carrousel/17.jpg') }}" alt="slide 7">
							</div>
							
						</div>
					<a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
						<i class="fa fa-chevron-left fa-lg text-muted"></i>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
						<i class="fa fa-chevron-right fa-lg text-muted"></i>
						<span class="sr-only">Next</span>
					</a>
				</div>
						</div>

			</div>	
			
	

			<div style="display:block"><input style="border: none;background: white; color: transparent;" readonly type="text" name="template" id="template" required></div>
	 </div>
</div>

<div class="tab"  >
	  		<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12" style="padding: 0px; margin:0px">
				<div class="form-group" style="text-align: left;">
					<label style="font-size: x-large;">Ingrese sus Datos Generales</label>
				</div>
			</div>
		</div>
	  	<div class="row">	
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Nombre:</strong>
					<input type="text" name="first_name"  class="form-control" placeholder="Nombre">
				</div>
			 </div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Apellido:</strong>
					<input type="text" name="last_name"  class="form-control nospace" placeholder="Apellido">
				</div>
			</div>
		</div>	  	
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Empresa:</strong>
					<input type="text" name="company"  class="form-control" placeholder="Empresa">
				</div>
			 </div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Cargo o Puesto:</strong>
					<input type="text" name="position"  class="form-control" placeholder="Cargo">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Ingrese Presentación</strong>
						<textarea class="form-control" name="presentation" id="presentation"  rows="3" maxlength="350"></textarea>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="padding-top: 0;">
			 <div style="margin-left: auto; margin-right: auto; "><strong>Ingrese su foto principal</strong> </div>
			 
			 							
							<!-- The Modal -->
							<div class="modal" id="modpers1">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" style="padding-top:50px;">
									<h4 class="modal-title">Posición de la imagen en la tarjeta <br>(Recuadro Azul)</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/ayudas/foto-principal-personas.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
							
							
							
				<div class="form-group" style="text-align: center;">
					
					<input type="file" class="form-control-file" name="photo" id="photo" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none" accept="image/png, .jpeg, .jpg">
				</div>
			 </div>
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="padding-top: 0;">
			<div style="margin-left: auto; margin-right: auto; "><strong>Ingrese imagen o logo </strong> </div>
			
			
										
							<!-- The Modal -->
							<div class="modal" id="modlogp">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" style="padding-top:50px;">
									<h4 class="modal-title">Posición de la imagen en la tarjeta <br>(Recuadro Azul)</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/ayudas/foto-logo-personas.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
							
							
							
				<div class="form-group">
					  
					  <input type="file" class="form-control-file" name="logo" id="logo" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;  border:none" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
		</div>

</div>

	  <!--2-->

<div class="tab">
		<div class="row">	
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group"style="text-align: left;">
						<strong >Mostrar descargar Curriculum en la Tarjeta:</strong>
						<select class ="form-control" id="cv" name="cv">
						
							<option value="">  Seleccionar</option>
							<option value="2">No</option> 
							<option value="1">Si</option>
						  
						</select>
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Que desea mostrar (Mis Productos/Mis Servicios):</strong>
					<select class ="form-control"  name="serv_prod">
					
						<option value="">  Seleccionar</option>
						<option value="Mis Productos">Productos</option>
						<option value="Mis Servicios">Servicios</option>
					  
					</select>
				</div>
			</div>
		</div>
		
		<div class="row" style="margin-top:-10px !important">	
			<div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<strong><label for="services" >Ingrese Servicios / Productos</label></strong>
					<textarea class="form-control" id="summary-ckeditor" name="services" rows="2" style="height:250px"></textarea>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<strong><label for="we">Ingrese más sobre usted</label></strong>
					<textarea class="form-control" id="summary-ckeditor2" name="we" rows="2" style="height:250px"></textarea>
				</div>
			</div>
		</div>
		
		
		
 
 </div>
 
 <!--3-->
 	<div class="tab">
			<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12" style="text-align:center">
				<strong style="text-align: left;"><h3>Redes Sociales</h3></strong>
			</div>
		</div>			
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Whatsapp:</strong>
					<input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Facebook:</strong>
					<input type="text" class="form-control" name="facebook"  placeholder="Facebook">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Canal de Youtube:</strong>
					<input type="text" class="form-control" name="youtube"  placeholder="Canal de Youtube">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Twitter:</strong>
					<input type="text" class="form-control" name="twitter"  placeholder="Twitter">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Instagram:</strong>
					<input type="text" class="form-control" name="instagram"  placeholder="Instagram">
			   </div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Linkedin:</strong>
					<input type="text" class="form-control" name="linkedin"  placeholder="linkedin">
			   </div>
			</div>		
		</div>
		
		
	</div>
	
 <!--fin 3-->
 
   <!--4-->
	  
								
	  <div class="tab">
	   
		<div class="row">	
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Sitio Web:</strong>
					<input type="text" class="form-control" name="website" placeholder="website">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong >Teléfono:</strong>
					<input type="text" class="form-control" name="telephone"  placeholder="Teléfono">
			   </div>
			</div>
		</div>		
		<div class="row">

			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong >Url Google Maps:</strong>
					<input type="text" class="form-control" name="url_map" >
			    </div>
			</div>

			
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong >País:</strong>
					<input type="text" class="form-control" name="pais" placeholder="País">
			    </div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<strong >Dirección:</strong>
					<input type="text" class="form-control" name="address"  placeholder="Dirección">
				</div>
			</div>

		</div>
		


</div>
		
	  <div style="overflow:auto;" >
		<div style="float:right; margin-top: 5px; margin-right:5px">
	      	<button type="button" class="previous">Anterior</button>
	      	<button type="button" class="next">Siguiente</button>
			<button type="button" class="submit" onclick="GuardarTrazado()">Enviar</button>
	    
		</div>
	  </div>
	  <!-- Circles which indicates the steps of the form: -->
	  <div style="margin-top:40px;">
	    <span class="step">1</span>
	    <span class="step">2</span>
	    <span class="step">3</span>
	    <span class="step">4</span>
	    <span class="step">5</span>
	  </div>



@endif

@if (session('type') == 'empresa' || ($type == 'empresa' ) )
<div class="tab">
	<input type="text" class="d-none" name="tipo" value="empresa">
	<div  style="text-align:center; font-family:'Roboto'">
			<img src="{{ asset('img/logo/logo.png') }}" alt="Texto Umg" width="250px"  />
			<h2>Elige un template</h2>
			<h4>Elige un estilo de tu primera tarjeta</h4>
	
	

			<div  id="slider-negocios">

				<div id="carouselNegocios" class="container-fluid">
					 
					<div id="carouselNeg" class="carousel slide" data-ride="carousel" data-interval="3000">
						<div class="carousel-inner row w-100 mx-auto" role="listbox">
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
								<img class="img-fluid mx-auto d-block template18" src="{{ asset('img/carrousel/18.jpg') }}" alt="slide 1">
							</div>
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template19" src="{{ asset('img/carrousel/19.jpg') }}" alt="slide 2">
							</div>
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template20" src="{{ asset('img/carrousel/20.jpg') }}" alt="slide 3">
							</div>
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template21" src="{{ asset('img/carrousel/21.jpg') }}" alt="slide 4">
							</div>		
							<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
								<img class="img-fluid mx-auto d-block template22" src="{{ asset('img/carrousel/22.jpg') }}" alt="slide 5">
							</div>
							
						</div>
						<a class="carousel-control-prev" href="#carouselNeg" role="button" data-slide="prev">
							<i class="fa fa-chevron-left fa-lg text-muted"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next text-faded" href="#carouselNeg" role="button" data-slide="next">
							<i class="fa fa-chevron-right fa-lg text-muted"></i>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>

			</div>	
	

			<div style="display:block"><input style="border: none;background: white; color: transparent;" readonly type="text" name="template" id="template" required></div>
	 </div>
</div>

<!--fin 1-->


<!--2-->
	  <div class="tab">


		<div class="row">
		
			 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">

				<div style="font-size: x-large;">Ingrese logo de empresa </div>
					

				<!-- The Modal -->
				<div class="modal" id="myModal">
				  <div class="modal-dialog">
					<div class="modal-content">

					  <!-- Modal Header -->
					  <div class="modal-header" style="padding-top:50px;">
						<h4 class="modal-title">Posición de la imagen en la tarjeta <br>(Recuadro Azul)</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					  </div>

					  <!-- Modal body -->
					  <div class="modal-body" style="text-align:center">
						<img src="{{ asset('img/ayudas/logo-empresas.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
					  </div>
					</div>
				  </div>
				</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:justify;">Enfatizamos que sea formato png con transparencia. De igual manera seleccione el color de fondo que irá detras del logo seleccionado.</div>

				<div class="row" style="padding-top: 11px;">

					<div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-xs-10" style="margin-left: auto; margin-right:auto; text-align: center; padding-bottom: 5px;">
						<input type="color" name="background"  id="background"style="vertical-align: middle; width: 50%;" />
					</div>
					<div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-xs-10" style="padding:5px; margin-left: auto; margin-right:auto; text-align:center; padding:0px" id="back-header">
						
					</div>
				</div>
				
				<div class="row" style="margin-top:0px">	
					<input type="file" class="form-control-file" name="header" id="file-header" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none" accept="image/png, .jpeg, .jpg">
				</div>
			 </div>
		 
			 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">

					<div style="font-size: x-large; ">Ingrese imagen para carrousel </div>
					
					
							<!-- The Modal -->
							<div class="modal" id="modcar1">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" style="padding-top:50px;">
									<h4 class="modal-title">Posición de la imagen en la tarjeta <br>(Recuadro Azul)</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/ayudas/carousel1-empresas.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
					
		
				<div class="row" style="margin-top:0px">	
					<input type="file" class="form-control-file" name="photo" id="photo" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none" accept="image/png, .jpeg, .jpg">
				</div>
				
			 </div>
		</div>	
		<br>

		<div class="row">
	
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div style="font-size: x-large">Ingrese imagen para carousel</div>
				<div class="form-group" style="text-align: center;">
				
					<input type="file" class="form-control-file" name="photo2" id="photo2" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none" accept="image/png, .jpeg, .jpg">
				</div>
		</div> 
		
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div style="font-size: x-large;">Ingrese imagen para carousel </div>
				<div class="form-group" style="text-align: center;">
				
					<input type="file" class="form-control-file" name="photo3" id="photo3" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none" accept="image/png, .jpeg, .jpg">
				</div>
		</div> 
			
	  </div> 
		 
	
	  </div>	 <!--fin 2-->	  


<!--3-->

<div class="tab">
				
		<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Ingrese Presentación</strong>
						<textarea class="form-control" id="summary-ckeditor3" name="presentation"  rows="3" maxlength="350"></textarea>				
				</div>
			</div>
		</div>
							
	<div style="font-size: x-large;">Ingrese imágenes segundo carousel </div>
				
				
						<!-- The Modal -->
							<div class="modal" id="modcar2">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" style="padding-top:50px;">
									<h4 class="modal-title">Posición de la imagen en la tarjeta <br>(Recuadro Azul)</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/ayudas/carousel2-empresas.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>

							
		  <div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group">
					<input type="file" class="form-control-file" name="carr1" id="carr1" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group">				
					<input type="file" class="form-control-file" name="carr2" id="carr2" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="form-group">
					<input type="file" class="form-control-file" name="carr3" id="carr3" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="form-group">
					<input type="file" class="form-control-file" name="carr4" id="carr4" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="form-group">
					<input type="file" class="form-control-file" name="carr5" id="carr5" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="form-group">
					<input type="file" class="form-control-file" name="carr6" id="carr6" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
		  </div>			


	  </div>
	
	
	
	  <!--3-->

<div class="tab">
		<div class="row" style="margin-top:-35px !important">	
			<div class="col-xl-12 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<strong>Razón Social de la Empresa:</strong>
					<input type="text" name="first_name" class="form-control">
					
				</div>
			</div>
				
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
						<strong >Mostrar descargar Brochure en la Tarjeta:</strong>
						<select class ="form-control" id="cv" name="cv">						
							<option value="">Seleccione</option>
							<option value="2">No</option>
							<option value="1">Si</option>
						</select>
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Que desea mostrar (Mis Productos/Mis Servicios):</strong>
					<select class ="form-control"  name="serv_prod">
						<option value="">Seleccione</option>
						<option value="Mis Productos">Productos</option>
						<option value="Mis Servicios">Servicios</option>					  
					</select>
				</div>
			</div>
		</div>		
		<div class="row" style="margin-top:-10px !important">	
			<div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<strong><label for="services" >Ingrese Servicios</label></strong>
					<textarea class="form-control" id="summary-ckeditor" name="services" rows="2" style="height:250px"></textarea>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<strong><label for="we">Ingrese más sobre nosotros</label></strong>
					<textarea class="form-control" id="summary-ckeditor2" name="we" rows="2" style="height:250px"></textarea>
				</div>
			</div>
		</div>
			 
</div>	

<!--4-->
<div class="tab">
	   
		<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12" style="text-align:center">
				<strong style="text-align: left;" ><h3>Redes Sociales</h3></strong>
			</div>
		</div>			
		<div class="row" >
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Whatsapp:</strong>
					<input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp">
				</div>                                                       
			</div>                                                           
			<div class="col-xl-6 col-sm-6 col-md-6">                         
				<div class="form-group" style="text-align: left;">           
					<strong>Facebook:</strong>                               
					<input type="text" class="form-control" name="facebook" placeholder="Facebook">
				</div>                                                       
			</div>                                                           
		</div>                                                               
																			 
		<div class="row" >              
			<div class="col-xl-6 col-sm-6 col-md-6">                         
				<div class="form-group" style="text-align: left;">           
					<strong>Canal de Youtube:</strong>                               
					<input type="text" class="form-control" name="youtube" placeholder="Canal de Youtube">
				</div>                                                       
			</div>                                                           
			<div class="col-xl-6 col-sm-6 col-md-6">                         
				<div class="form-group" style="text-align: left;">           
					<strong>Twitter:</strong>                                
					<input type="text" class="form-control" name="twitter"  placeholder="Twitter">
				</div>
			</div>
		</div>
		
		<div class="row" >
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Instagram:</strong>
					<input type="text" class="form-control" name="instagram" placeholder="Instagram">
			   </div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Linkedin:</strong>
					<input type="text" class="form-control" name="linkedin" placeholder="Linkedin">
			   </div>
			</div>		
		</div>
</div>

	  <!--5-->
								
<div class="tab">
	   
	   	<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12" style="text-align:center">
				<strong style="text-align: left;"><h3>Información de contacto</h3></strong>
			</div>
		</div>	
	   
		<div class="row" >	
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Sitio Web:</strong>
					<input type="text" class="form-control" name="website"  placeholder="Website">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong >Teléfono:</strong>
					<input type="text" class="form-control" name="telephone"  placeholder="Teléfono">
			   </div>
			</div>
		</div>		
		<div class="row" >
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong >País:</strong>
					<input type="text" class="form-control" name="pais" placeholder="País">
			    </div>
			</div>
			
			
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong >Url Google Maps:</strong>
					<input type="text" class="form-control" name="url_map" >
			    </div>
			</div>
		</div>
		
		<div class="row" >

			<div class="col-xl-12 col-sm-12 col-md-12">
			   <div class="form-group" style="text-align: left;">
					<strong >Dirección:</strong>
					<input type="text" class="form-control" name="address" placeholder="Dirección">
				</div>
			</div>
		</div>

		
</div>

<!--6-->
<div class="tab">

		
		  <div style="font-size: x-large;">Ingrese las imágenes tercer carousel</div>
		 
							<!-- The Modal -->
							<div class="modal" id="modcar3">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" style="padding-top:50px;">
									<h4 class="modal-title">Posición de la imagen en la tarjeta <br>(Recuadro Azul)</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/ayudas/carousel3-empresas.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
														
		  <div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
			
				<div class="form-group">
					  <input type="file" class="form-control-file" name="logo" id="logo" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
				
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="form-group">
					  <input type="file" class="form-control-file" name="logo2" id="logo2" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="form-group">
					  <input type="file" class="form-control-file" name="logo3" id="logo3" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="form-group">
					  <input type="file" class="form-control-file" name="logo4" id="logo4" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="form-group">
					  <input type="file" class="form-control-file" name="logo5" id="logo5" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="form-group">
					  <input type="file" class="form-control-file" name="logo6" id="logo6" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
		  </div>		




		  <div style="font-size: x-large;">Ingrese Imagen de Su codigo QR para recibir pagos</div>
		 
							<!-- The Modal -->
							
								  <!-- Modal Header -->
								
								        <!-- Modal body -->
								 
						

				<div class="row">
				
					<div class="col-lg-4 col-md-6 col-sm-12">

					  <div class="form-group">
						 <input type="file" class="form-control-file" name="qr" id="qr" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;">
					  </div>
						
					</div>
				
				</div>







		  

</div>
	  

	  <div style="overflow:auto;" >
		<div style="float:right; margin-top: 5px; margin-right:5px">
	      	<button type="button" class="previous">Anterior</button>
	      	<button type="button" class="next">Siguiente</button>
			<button type="button" class="submit" onclick="GuardarTrazado()">Enviar</button>
	    
		</div>
	  </div>
	  <!-- Circles which indicates the steps of the form: -->
	  <div style="margin-top:40px;">
	    <span class="step">1</span>
	    <span class="step">2</span>
	    <span class="step">3</span>
	    <span class="step">4</span>
	    <span class="step">5</span>
	    <span class="step">6</span>
	    <span class="step">7</span>
	  </div>

	  
	  
	  
	 
@endif 
</form>


@section('scripts')
<style type="text/css">
#template:focus{outline: none;}
</style>
@stop

@endsection