@extends('base2')
@extends('layouts.carrousel')
@extends('layouts.wizard')
@section('main')

<div class="container" >
	<div class="col-sm-8 col-md-12 col-lg-12 col-xl-8" style="overflow-x: hidden; width: 108%; margin-left: -4%;">
		<div class="row">
			<div class="col-lg-12 margin-tb">

				<!--
				<div class="pull-right">
					<a class="btn btn-primary" href=""> Back</a>
				</div>-->
				
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


		<form id="myForm" action="{{url('/personalInformation')}}" method="post" enctype="multipart/form-data" style="border: 3px solid transparent ; background:#f0f7ff; margin-left: -6%;
    margin-right: -6%; margin-top: -4%;">
			{{ csrf_field() }}


<!--1-->
<div class="tab">
				<div  style="text-align:center; font-family:'Roboto'">
						<img src="{{ asset('img/logo/logo.png') }}" alt="Texto Umg" width="250px"  />
						<h2>Elige un template</h2>
						<h4>Elige un estilo de tu primera tarjeta</h4>
					
				  <div style="text-align:center;">
						<label for="membresia">¿Qué tipo de tarjeta necesitas?</label><br>
			<select name="membresia" id="membresia"  style="font-size: 18px; margin-bottom: 15px;">
			  <option value="1" selected>Personas</option> 
			  <option value="2" >Empresas</option>
			  
			</select> 			  
			</div>


		
			
			
			<div class="container" id="slider-negocios" style="display:none">
			  
				<div id="carouselNegocios" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
					<li data-target="#carouselNegocios" data-slide-to="0" class="active"></li>
					<li data-target="#carouselNegocios" data-slide-to="1"></li>


				  </ol>
				  
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12" style="margin-left: auto; margin-right: auto;">

						<div class="carousel-inner">
					<div class="carousel-item active">
					
					  <img src="{{ asset('img/carrousel/8.jpg') }}" class="d-block w-100 template1" alt="...">
					</div>
					<div class="carousel-item">
					  <img src="{{ asset('img/carrousel/9.jpg') }}"class="d-block w-100 template2" alt="...">
					</div>

				  </div>
						  
						  <a class="carousel-control-prev" href="#carouselNegocios" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselNegocios" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
					</div>
				</div>
				</div>
			</div>	
			<!--<input style="display:block" type="text" name="template" id="template" value="1">-->
			<input style="display:none" type="text" name="template" id="template" value="1">
				 </div>
</div><!--fin 1-->


	


<!--2-->
<div class="tab">	
				<div style="text-align:center;">
				   <img src="{{ asset('img/logo/logo.png') }}" alt="Texto Umg" width="250px"  />
					<h1>Information Basica </h1>
					<h4>¿quien eres y que haces?</h4>
				</div>

				<div class="row" style="display:block">
				<div class="col-sm-8" style="display:grid"> 
					<label for="photo">{{'Ingrese Foto'}}</label>
					<input type="file" class="form-control-file align-bottom" name="photo" id="seleccionArchivos" value="" style="width: 90%; ">
					
					<div class="col-sm-4" style="    text-align: center;">  <img id="lienzo" style="width: inherit;">
					 </div>
				</div>
				</div>
				
			
			
			
               <div class="row empre" >
				<div class="col-sm-8" style="display:grid"> 
					<label for="photo2">{{'Ingrese Foto 2'}}</label>
					<input type="file" class="form-control-file align-bottom" name="photo2" id="seleccionArchivos" value="" style="width: 90%; ">
					
					<div class="col-sm-4" style="    text-align: center;">  <img id="lienzo2" style="width: inherit;">
					 </div>
				</div>
				</div>
				
			   <div class="row empre" >
				<div class="col-sm-8" style="display:grid"> 
					<label for="photo3">{{'Ingrese Foto 3'}}</label>
					<input type="file" class="form-control-file align-bottom" name="photo3" id="seleccionArchivos" value="" style="width: 90%; ">
					
					<div class="col-sm-4" style="    text-align: center;">  <img id="lienzo3" style="width: inherit;">
					 </div>
				</div>
			  </div>
				
			  <div class="row empre" >
				<div class="col-sm-8" style="display:grid"> 
					<label for="carr1">{{'Ingrese Carr 1'}}</label>
					<input type="file" class="form-control-file align-bottom" name="carr1" id="seleccionArchivos" value="" style="width: 90%; ">
					
					<div class="col-sm-4" style="    text-align: center;">  <img id="lienzo4" style="width: inherit;">
					 </div>
				</div>
			 </div>
			 
			 <div class="row empre" >
				<div class="col-sm-8" style="display:grid"> 
					<label for="carr2">{{'Ingrese Carr 2'}}</label>
					<input type="file" class="form-control-file align-bottom" name="carr2" id="seleccionArchivos" value="" style="width: 90%; ">
					
					<div class="col-sm-4" style="    text-align: center;">  <img id="lienzo4" style="width: inherit;">
					 </div>
				</div>
			 </div>
			
			<div class="row empre">
				<div class="col-sm-8" style="display:grid"> 
					<label for="carr3">{{'Ingrese Carr 3'}}</label>
					<input type="file" class="form-control-file align-bottom" name="carr3" id="seleccionArchivos" value="" style="width: 90%; ">
					
					<div class="col-sm-4" style="    text-align: center;">  <img id="lienzo4" style="width: inherit;">
					 </div>
				</div>
			 </div>
			
			<div class="row empre" >
				<div class="col-sm-8" style="display:grid"> 
					<label for="carr4">{{'Ingrese Carr 4'}}</label>
					<input type="file" class="form-control-file align-bottom" name="carr4" id="seleccionArchivos" value="" style="width: 90%; ">
					
					<div class="col-sm-4" style="    text-align: center;">  <img id="lienzo4" style="width: inherit;">
					 </div>
				</div>
			 </div>
			 
			 <div class="row empre" >
				<div class="col-sm-8" style="display:grid"> 
					<label for="carr5">{{'Ingrese Carr 5'}}</label>
					<input type="file" class="form-control-file align-bottom" name="carr5" id="seleccionArchivos" value="" style="width: 90%; ">
					
					<div class="col-sm-4" style="    text-align: center;">  <img id="lienzo4" style="width: inherit;">
					 </div>
				</div>
			 </div>
			
			<div class="row empre" >
				<div class="col-sm-8" style="display:grid"> 
					<label for="carr6">{{'Ingrese Carr 6'}}</label>
					<input type="file" class="form-control-file align-bottom" name="carr6" id="seleccionArchivos" value="" style="width: 90%; ">
					
					<div class="col-sm-4" style="    text-align: center;">  <img id="lienzo4" style="width: inherit;">
					 </div>
				</div>
			 </div>
			
			
			
			
			
			
			
			
			
			

				  <div>
				  
					<label for="first_name" style="display: flex;">{{'First Name'}}</label>
					<input type="text"  name="first_name" id="first_name" value="" aria-describedby="nombreHelp" placeholder="First Name">
				  </div>
		 
				  <div>
					<label for="last_name" style="display: flex;">{{'Last Name'}}</label>
					<input type="text"  name="last_name" id="last_name" value="" aria-describedby="nombreHelp" placeholder="Last Name">
				  </div>












				   <div class="row" style="display:block">
					<div class="col-sm-8" style="display:grid"> <br>
						<label for="logo" style="display: block;">{{'Ingrese Logo unico de la empresa'}}</label>
					
						<input type="file" class="form-control-file align-bottom" name="logo" id="seleccionArchivos2" value="" style="width: 90%; "></div>
					  <div class="col-sm-4" style="    text-align: center;">  <img id="lienzo2" width="120px">
					</div>
				  </div>
				  
				  <div class="row" style="display:block">
					<div class="col-sm-8" style="display:grid"> <br>
						<label for="logo2" style="display: block;">{{'Segunda Imagen de la Empresa'}}</label>
					
						<input type="file" class="form-control-file align-bottom" name="logo2" id="logo2" value="" style="width: 90%; "></div>
					  <div class="col-sm-4" style="    text-align: center;">  <img id="lienzo2" width="120px">
					</div>
				  </div>
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  

				  <div>
					<label for="company" style="display: flex;">{{'Company'}}</label>
					<input type="text"  name="company" id="company" value="" aria-describedby="empresaHelp" placeholder="Ingrese su empresa">
				  </div>

				  <div>
					<label for="position" style="display: flex;">{{'Position'}}</label>
					<input type="text"  name="position" id="position" value="" aria-describedby="cargoHelp" placeholder="Ingrese Cargo">
				  </div>

				  <div>
					<label for="position" style="display: flex;">{{'Services'}}</label>
					 <textarea class="form-control"  name="services" id="services" value="" rows="6" cols="30"></textarea>
				  </div>

</div>	 <!--fin 2-->	  


<!--3-->
<div class="tab" >

		<div style="text-align:center;">
		   <img src="{{ asset('img/logo/logo.png') }}" alt="Texto Umg" width="250px"  />
			<h1>Sobre ti </h1>
		<br>
		
		
		<label for="date_birth" >{{'Date Birth'}}</label>
		<p><input style="width: 145px;" type="date"  name="date_birth" id="date_birth" value="" aria-describedby="nombreHelp" placeholder="Date Birth"></p>
		<br>
		
		
		<label for="presentation" >{{'Presentation'}}</label>
		<p><textarea style="font-size: 13pt;"  name="presentation" id="presentation" value="" rows="6" cols="30"></textarea></p>
		 </div>
</div>	 

<!--4-->
<div class="tab" >
	<div  style="text-align:center;">
		    <img src="{{ asset('img/logo/logo.png') }}" alt="Texto Umg" width="250px"  />
			<h1>Info de Contacto</h1>
			<h4>Ingrese tus principales datos de contacto</h4>



            <label for="telephone" style="display: flex;">{{'Ingrese N° de telefono'}}</label>
			<p><input type="tel"  name="telephone" id="telephone" value="" aria-describedby="nombreHelp" placeholder="Telf Movil"></p>
            <label for="website" style="display: flex;">{{'Ingrese Website'}}</label>
			<p><input type="text"  name="website" id="website" value="" aria-describedby="nombreHelp" placeholder="Website"></p>

	 </div>
</div>


<!-- 5 Redes sociales -->
<div class="tab" >
		<div style="text-align:center;">
		   <img src="{{ asset('img/logo/logo.png') }}" alt="Texto Umg" width="250px"  />
			<h1>Tus redes sociales </h1>
			<h4>Comparte tus redes y consigue seguidores</h4>
        </div>
		  
		  
		  <div>
			<label for="whatsapp" style="display: flex;">{{'Ingrese N° Whatsapp'}}</label>
			<input type="text"  name="whatsapp" id="whatsapp" value="" rows="3" placeholder="+(cod-pais)(cod-area)(N°Telf)">
		  </div>
		   
		  <div>
			<label for="facebook" style="display: flex;">{{'Ingrese facebook'}}</label>
			<input type="text"  name="facebook" id="facebook" value="" rows="3" placeholder="Ingrese la url de su perfil publico de facebook  Ej. https://www.facebook.com/pedro.perez">
		  </div>
		   
		  <div>
			<label for="dribbble" style="display: flex;">{{'Ingrese dribbble'}}</label>
			<input type="text"  name="dribbble" id="dribbble" value="" rows="3"  placeholder="Ingrese la url de su perfil publico de dribbble Ej. https://www.dribbble.com/pedro.perez">
		  </div>
		   
		  <div>
			<label for="twitter" style="display: flex;">{{'Ingrese twitter'}}</label>
			<input type="text"  name="twitter" id="twitter" value="" rows="3" placeholder="Ingrese su usuario de Twitter">
		  </div>
		  
		  <div>
			<label for="instagram" style="display: flex;">{{'Ingrese instagram'}}</label>
			<input type="text"  name="instagram" id="instagram" value="" rows="3"  placeholder="Ingrese su usuario de Instagram">
		  </div>
		  
		  <div>
			<label for="linkedin" style="display: flex;">{{'Ingrese linkedin'}}</label>
			<input type="text"  name="linkedin" id="linkedin" value="" rows="3"  placeholder="Ingrese la url de su perfil publico de linkedin Ej. https://www.linkedin.com/pedro.perez">
		  </div>
		  
		  <div>
			<label for="calend_gmail" style="display: flex;">{{'Ingrese url de su Calendario Publico de Gmail'}}</label>
			<input type="text"  name="calend_gmail" id="calend_gmail" value="" rows="3" placeholder="Ingrese Url de su calendario publico de gmail">
		  </div>
		  
</div>

<div class="footer" style="position:absolute; padding-top:23px; margin-left: -13%; background-color: #0d2c37; width: -webkit-fill-available;">

 <div class="footint" style="margin-top: 5px; margin-left: 10vw; margin-right: 10vw;">
	  <div style="overflow:auto;" class="trinidad">
	   
	      	<button type="button" class="previous">Anterior</button>
	      	<button type="button" class="next">Siguiente</button>
			<button type="button" class="submit" onclick="GuardarTrazado()">Enviar</button>
	    
	  </div>
	  <!-- Circles which indicates the steps of the form: -->
	  <div style="margin-top:40px;">
	    <span class="step">1</span>
	    <span class="step">2</span>
	    <span class="step">3</span>
	    <span class="step">4</span>
	    <span class="step">5</span>
	  </div>
 </div>

</div>
	  
	  
	  
	  
</form>

</div>
</div>
@endsection