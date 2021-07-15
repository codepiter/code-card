@extends('theme.layout.master')
@section('scripts')

	
	<!-- Wizard -->

	<link rel="stylesheet" type="text/css" href="{{ asset ('css/minimax/wizard/multi-form.css?v2') }}">
	
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{{ asset ('js/minimax/wizard/multi-form.js?v2') }}"></script>
	
	<!-- Carousel -->	
	   <link href="{{ asset('css/minimax/carousel/style2.css') }}" rel="stylesheet">
	<script src="{{ asset('js/minimax/carousel/js.js') }}" defer></script>

	<script type="text/javascript">
	
	
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


		$(document).ready(function(){
			var val	=	{

			}
			
			$("#myForm").multiStepForm(
			{
				// defaultStep:0,
				beforeSubmit : function(form, submit){
					console.log("called before submiting the form");
					console.log(form);
					console.log(submit);
				},
				validations:val,
			}
			).navigateTo(0);
		});
	</script>
<!-- Fin Wizard -->
	

	<script>
    // Replace the <textarea> with a CKEditor
    CKEDITOR.replace('editor');
   </script>
   
   
   <script type="text/javascript">	
	   function ActivarCampoOtroTema()
	   {
		   var contenedor = document.getElementById("OtroTema");
		   contenedor.style.display = "block";
		   return true;
	   }
   </script>
   
   
 
   	<script>
	$( document ).ready(function() {
   $("#carousel").css('display','none');
   $("#ocultar").css('display','none');
	});
	$("#mostrar").click( function(e){ 

		$("#carousel").css('display','block');
		$("#ocultar").css('display','block');
		$("#mostrar").css('display','none');
		
		e.preventDefault();
	})
	
	$("#ocultar").click( function(e){ 
	
		$("#carousel").css('display','none');
		$("#mostrar").css('display','block');
		$("#ocultar").css('display','none');
			e.preventDefault();
	})


   </script>
   
   	<script>
	$("#background").on("change", function() {
		
		var back = $("#background").val();
		 $("#back-header").css("background", back); 
		 $("#background").css("background", back); 
	
	});
	
	
	$(function() {

		$('.ayuda').on('mouseover', function () {
			var modalId = $(this).data('target');
			$(modalId).modal('show');
		})

		});	
		
		
	$(function() {

		$('#enviar').on('click', function () {
			alert();
		})

	});

   	</script>   	

		
		<!-- Ajax para Modificar-->
	<script>
		$('.btnEliminar').click(function(){
			
			 var token = $("meta[name='csrf-token']").attr("content");
			 var imagen= $(this).attr("id");
			 var  imgant = $(this).closest(".imagen").find(".img-anterior");
			 var  imgborr = $(this).closest(".imagen").find(".btnEliminar");


				$.ajax({
				 url:"/personalInformation/elimina",
				 method:"POST",
				 data:{ _token: token,
						id_pi :$("#id_pi").val(),
						imagen : imagen,
				 },
				 success:function(data){
					imgant.remove();
					imgborr.css('display','none');
					console.log("it Works");
				 }
				});
		});
		
		
	</script>
	

	
	<style>
	input[type="file"] {
		padding:0px !important;
		font-size: initial;
	}
	
	h3{
		font-size:large;
		text-align:center;
	}
	
	.btn-carou{
		text-align:center;
	}
	
	@media screen and (max-width: 980px){
		#page-wrapper {
			padding-top: 35px !important;
			padding-bottom: 35px !important;
		}
	}
	
	.modal-dialog{
		padding-top: 50px !important;
	}

.modal-title {
    font-size: larger;
}
	</style>
		
		

@stop

@section('content')
 <div class="content-main">
		<div id="page-wrapper" >

				
					<!-- Header -->


<!-- Main -->
<form action="{{ route('personalInformation.update',$personalInformation->id) }}" method="POST" enctype="multipart/form-data" id="myForm" style="font-family: Arial, Helvetica, sans-serif;background-color: #f0f8ff;">
									@csrf
									@method('PUT')
									{{ method_field('PATCH') }}
									
			<input type="hidden" value="{{ $personalInformation->id }}" id="id_pi">

 <!-- WIZARD PARA EMPRESAS -->
	 
	 @if($template == 18 || $template == 19 || $template == 20 || $template == 21 || $template == 22 || $template == 23 || $template == 24 || $template == 25 || $template == 26 || $template == 27 || $template == 28 )
	 
	  <!--1-->
	  <div class="tab">

		@if($template == 22)
			
		<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="margin-left:auto; margin-right:auto">

					<div style="font-size: large; margin-top: -25px !important; text-align:center;">Ingrese imagen para carrousel <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
								
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
				
					
		 
		 
		 
		   
				<div class="row" style="padding-top: 11px;">

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: auto; text-align: center;">
						
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"  style=" text-align:center; padding:0px">
						<img src="{{ asset('storage'). '/'.$personalInformation->photo}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">

					</div>
				</div>
				<div class="row" style="margin-top:0px">	
					<input type="file" class="form-control-file" name="photo" id="photo" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none">
				</div>
				
			 </div>
		</div>
					
		@else

		<div class="row">
		
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
	
				<div style="font-size: large; text-align:center;">Ingrese logo de empresa <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#myModal" id="btn1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					

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

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:justify; font-size:15px; padding:0px;">Enfatizamos que sea formato png con transparencia. De igual manera seleccione el color de fondo que irá detras del logo seleccionado.</div>

				<div class="row imagen" style="padding-top: 11px;">

					<div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-xs-10" style="margin-left: auto; margin-right:auto; text-align: center; padding-bottom: 5px;">
						<input type="color" name="background"  id="background" value="{{ $personalInformation->background }}" style="background:{{ $personalInformation->background }}; vertical-align: middle; width: 50%;" />
					</div>
					<div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-xs-10" style="padding:5px; margin-left: auto; margin-right:auto; background:{{ $personalInformation->background }}; text-align:center; padding:0	px" id="back-header">
						<img src="{{ asset('storage'). '/'.$personalInformation->header}}" alt="" style="max-height: 135px; margin-top: 15px;margin-bottom: 15px; padding:0px; " class="img-anterior">
						
				@if($personalInformation->header)
				<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="headerr" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
				@endif
						
						
					</div>
				</div>
				
	
				
				
				<div class="row" style="margin-top:5px !important">	
					<input type="file" class="form-control-file" name="header" id="file-header" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none">
				</div>
			 </div>
		 
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">

					<div style="font-size: large; text-align:center; ">Ingrese imagen para carrousel <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
								
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
				
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center; color: white;">
						<br>
						<br>
						<br>
					</div>
				<div class="row" style="padding-top: 11px;">

				
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"  style=" text-align:center; padding:0px">
						<img src="{{ asset('storage'). '/'.$personalInformation->photo}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">

					</div>
				</div>
				<div class="row" style="margin-top:0px">	
					<input type="file" class="form-control-file" name="photo" id="photo" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none" accept="image/png, .jpeg, .jpg">
				</div>
				
			 </div>
		</div>
					
		@endif
	
		

		<div class="row" style="margin-top: 10px !important;">
	
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 imagen">
			<div style="font-size: large; text-align:center;">Ingrese imagen para carousel <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
				<div class="form-group" style="text-align: center;">
					<img src="{{ asset('storage'). '/'.$personalInformation->photo2}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;" class="img-anterior">
			@if($personalInformation->photo2)
			<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="photo2" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
			@endif
			
				<input type="file" class="form-control-file" name="photo2"  value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none" accept="image/png, .jpeg, .jpg">

				
				</div>
		</div> 
		
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 imagen">
			<div style="font-size: large; text-align:center;">Ingrese imagen para carousel<button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
				<div class="form-group" style="text-align: center;">
					<img src="{{ asset('storage'). '/'.$personalInformation->photo3}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;" class="img-anterior">
					@if($personalInformation->photo3)
					<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="photo3" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
					@endif
					<input type="file" class="form-control-file" name="photo3" id="photo2" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none" accept="image/png, .jpeg, .jpg">
				</div>
		</div> 
			
	  </div> 
		 
	
	  </div>
 
	  <!--2-->

	  <div class="tab">
				
		<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Ingrese Presentación</strong>
						<textarea class="form-control" id="summary-ckeditor3" name="presentation"  rows="3" maxlength="350">{{ $personalInformation->presentation }}</textarea>
				
				
				
				</div>
			</div>
		</div>
							
							


		<div style="font-size: large; text-align:center;">Ingrese imágenes segundo carousel <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar2" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
				
				
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
					<img src="{{ asset('storage'). '/'.$personalInformation->carr1}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;" class="img-anterior">
					
					
					
					<input type="file" class="form-control-file" name="carr1" id="carr1" value="" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 imagen">
				<div class="form-group">
					<img src="{{ asset('storage'). '/'.$personalInformation->carr2}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;"class="img-anterior">
					@if($personalInformation->carr2)
					<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="carr2" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
					@endif
					<input type="file" class="form-control-file" name="carr2" id="carr2" value="" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 imagen">
				<div class="form-group">
					<img src="{{ asset('storage'). '/'.$personalInformation->carr3}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;" class="img-anterior">
					@if($personalInformation->carr3)
					<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="carr3" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
					@endif
					<input type="file" class="form-control-file" name="carr3" id="carr3" value="" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 imagen">
				<div class="form-group">
					<img src="{{ asset('storage'). '/'.$personalInformation->carr4}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;" class="img-anterior">
					@if($personalInformation->carr4)
					<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="carr4" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
					@endif
					<input type="file" class="form-control-file" name="carr4" id="carr4" value="" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 imagen">
				<div class="form-group">
					<img src="{{ asset('storage'). '/'.$personalInformation->carr5}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;" class="img-anterior">
					@if($personalInformation->carr5)
					<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="carr5" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
					@endif
					<input type="file" class="form-control-file" name="carr5" id="carr5" value="" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 imagen">
				<div class="form-group">
					<img src="{{ asset('storage'). '/'.$personalInformation->carr6}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;" class="img-anterior">
					@if($personalInformation->carr6)
					<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="carr6" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
					@endif
					<input type="file" class="form-control-file" name="carr6" id="carr6" value="" accept="image/png, .jpeg, .jpg">
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
					<input type="text" name="first_name" value="{{ $personalInformation->first_name }}" class="form-control">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="form-group">
				<!--<strong>{{__('messages.days_lab') }}</strong><br>-->
				<strong>Días Laborables</strong><br>
					<select id="days" name="days_lab[]" multiple style="width:100%" >						    
						<option value="1">Lunes</option>
						<option value="2">Martes</option>		
						<option value="3">Miercoles</option>
						<option value="4">Jueves</option>
						<option value="5">Viernes</option>
						<option value="6">Sábado</option>
						<option value="0">Domingo</option>
					</select>	
				</div>

				<input type="hidden" id="dias" class="form-control" value="{{ $personalInformation->days_lab }}">
				
			</div>		
				
			<div class="col-xl-12 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<strong>Cargo o Puesto que ocupa:</strong>
					<input type="text" name="puesto" value="{{ $personalInformation->puesto }}" class="form-control">
				</div>
			</div>
				
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
						<strong >Mostrar descargar Brochure en la Tarjeta:</strong>
						<select class ="form-control" id="cv" name="cv">
						
							<option value="{{ $cv }}" selected>  @if($cv==1) Si @else No @endif</option>


							@if($cv==1)
							<option value="2">No</option>
							   @else
							<option value="1">Si</option>
						   @endif
						</select>
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Indique que desea mostrar (Mis Productos/Mis Servicios):</strong>
					<select class ="form-control"  name="serv_prod">
					
						
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
					<textarea class="form-control" id="summary-ckeditor" name="services" rows="2">{{ $personalInformation->services }}</textarea>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<strong><label for="we">Ingrese más sobre nosotros</label></strong>
					<textarea class="form-control" id="summary-ckeditor2" name="we" rows="2" style="height:250px">{{ $personalInformation->we }}</textarea>
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
		<div class="row" style="">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Whatsapp:</strong>
					<input type="text" class="form-control" name="whatsapp" value="{{ $personalInformation->whatsapp }}" placeholder="Whatsapp">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Facebook:</strong>
					<input type="text" class="form-control" name="facebook" value="{{ $personalInformation->facebook }}" placeholder="Facebook">
				</div>
			</div>
		</div>
		
		<div class="row" style="">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Canal de Youtube:</strong>
					<input type="text" class="form-control" name="youtube" value="{{ $personalInformation->youtube }}" placeholder="Canal de Youtube">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Twitter:</strong>
					<input type="text" class="form-control" name="twitter" value="{{ $personalInformation->twitter }}" placeholder="Twitter">
				</div>
			</div>
		</div>
		
		<div class="row" style="">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Instagram:</strong>
					<input type="text" class="form-control" name="instagram" value="{{ $personalInformation->instagram }}" placeholder="Instagram">
			   </div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Linkedin:</strong>
					<input type="text" class="form-control" name="linkedin" value="{{ $personalInformation->linkedin }}" placeholder="linkedin">
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
	   
		<div class="row" style="">	
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Sitio Web:</strong>
					<input type="text" class="form-control" name="website" value="{{ $personalInformation->website }}" placeholder="website">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong >Teléfono:</strong>
					<input type="text" class="form-control" name="telephone" value="{{ $personalInformation->telephone }}" placeholder="telephone">
			   </div>
			</div>
		</div>		
		<div class="row" style="">
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Email:</strong>
					<input type="email" class="form-control" name="correo" value="{{ $personalInformation->correo }}" placeholder="Email">
				</div>
			</div>
            <div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong >País:</strong>
					<input type="text" class="form-control" name="pais" value="{{ $personalInformation->pais }}" placeholder="pais">
				</div>
			</div>
		</div>
		
		<div class="row" style="">

			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong >Dirección:</strong>
					<input type="text" class="form-control" name="address" value="{{ $personalInformation->address }}">
			    
				</div>
			</div>
			
            <div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong >Url Google Maps:</strong>
					<input type="text" class="form-control" name="url_map" value="{{ $personalInformation->url_map }}">
			    
				</div>
			</div>
		</div>
	  </div>
	  <!--6 empresa-->
	  <div class="tab">
		  <div style="font-size: large; margin-bottom: 20px; text-align:center;"><h3>Ingrese las imágenes tercer carousel <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar3" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></h3>  </div>

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
			<div class="col-lg-4 col-md-6 col-sm-12 ">
			
				<div class="form-group">
					  <img src="{{ asset('storage'). '/'.$personalInformation->logo}}" alt=""  style="padding-bottom:10px; max-height: 150px; width:auto" class="img-anterior">
					 
					
					 
					  <input type="file" class="form-control-file" name="logo" id="logo" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
				
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 imagen">
				<div class="form-group">
					  <img src="{{ asset('storage'). '/'.$personalInformation->logo2}}" alt=""  style="padding-bottom:10px; max-height: 150px; width:auto" class="img-anterior">
					  @if($personalInformation->logo2)
					  <a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="logo2" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
					  @endif
					  <input type="file" class="form-control-file" name="logo2" id="logo2" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 imagen">
				<div class="form-group">
					  <img src="{{ asset('storage'). '/'.$personalInformation->logo3}}" alt=""  style="padding-bottom:10px; max-height: 150px; width:auto" class="img-anterior">
					  @if($personalInformation->logo3)
					  <a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="logo3" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
					  @endif
					  <input type="file" class="form-control-file" name="logo3" id="logo3" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 imagen">
				<div class="form-group">
					  <img src="{{ asset('storage'). '/'.$personalInformation->logo4}}" alt="" style="padding-bottom:10px; max-height: 150px; width:auto" class="img-anterior">
				   @if($personalInformation->logo4)
					<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="logo4" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
                   @endif
					 <input type="file" class="form-control-file" name="logo4" id="logo4" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 imagen">
				<div class="form-group">
					  <img src="{{ asset('storage'). '/'.$personalInformation->logo5}}" alt=""  style="padding-bottom:10px; max-height: 150px; width:auto" class="img-anterior">
					 @if($personalInformation->logo5)
						<a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="logo5" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
                     @endif
					 <input type="file" class="form-control-file" name="logo5" id="logo5" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 imagen">
				<div class="form-group">
					  <img src="{{ asset('storage'). '/'.$personalInformation->logo6}}" alt=""  style="padding-bottom:10px; max-height: 150px; width:auto" class="img-anterior">
					  @if($personalInformation->logo6)
					  <a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="logo6" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20" ></a>
					  @endif
					  <input type="file" class="form-control-file" name="logo6" id="logo6" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;" accept="image/png, .jpeg, .jpg">
				</div>
			</div>
		  </div>	





 <div style="font-size: large; margin-bottom: 20px; text-align:center;"><h3>Ingrese Imagen de Su codigo QR para recibir pagos <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar3" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></h3>  
 </div>
 
 
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
</div>
 
 
  <!--Empresa 7-->
<div class="tab">
 <div style="font-size: large; margin-bottom: 20px; text-align:center;"><h3>Ingrese Paypal Como metodo de pago y si no usa paypal ingrese otra pasarela de pago <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#pas_pag" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></h3>  </div>
<div class="row">

<!-- The Modal -->
							<div class="modal" id="pas_pag">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" style="padding-top:50px;">
									<h4 class="modal-title">Ingrese Paypal u otra pasarela de pago</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/ayudas/pasarela.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>


            <div class="col-lg-4 col-md-6 col-sm-12" style="margin-left: auto; margin-right: auto;">
				<div class="form-group">
					  <img src="{{ asset('storage'). '/'.$personalInformation->qr}}" alt=""  style="padding-bottom:10px; max-height: 150px; width:auto">
					  @if($personalInformation->qr)
					   <a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="qr" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20"></a>
					  @endif
					  <input type="file" class="form-control-file" name="qr" id="qr" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;">
					  <strong >Url PaypalMe:</strong>
						<input type="text" class="form-control" name="paypalme" value="{{ $personalInformation->paypalme }}" placeholder="PaypalMe" style="max-width: 600px; margin-left: auto; margin-right: auto;">
				</div>
			</div>
 
</div>

<div class="row">	
	   
			<div class="col-lg-4 col-md-6 col-sm-12" style="margin-left: auto; margin-right: auto;">
			   <strong style="margin-left: 90px;">Opción 2:</strong>
			  <div class="form-group">
					
						<img src="{{ asset('storage'). '/'.$personalInformation->qr2}}" alt=""  style="padding-bottom:10px; max-height: 150px; width:auto">
						  @if($personalInformation->qr2)
						   <a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="qr2" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20"></a>
						  @endif
						  <input type="file" class="form-control-file" name="qr2" id="qr2" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;">
					
						  <input type="text" class="form-control" name="np2" value="{{ $personalInformation->np2 }}" placeholder="Nombre de su Pasarela de Pago" style="max-width: 600px; margin-left: auto; margin-right: auto;">
					
						  <input type="text" class="form-control" name="pasarela2" value="{{ $personalInformation->pasarela2 }}" placeholder="Url de  su Pasarela" style="max-width: 600px; margin-left: auto; margin-right: auto;">
				</div>
			</div>

		</div>		








<br>
		<p style="text-align: center; font-size: large; text-align:center;">Elige un template, si deseas cambiar el actual</p>
		<div class="btn-carou">
			<button class="success" id="mostrar">Mostrar Diseños</button>
			<button class="success" id="ocultar">Ocultar Diseños</button>
		</div>

			 <div id="carousel">

				<div  id="slider-negocios" style="margin-top: 30px;">

				  <div id="carouselNegocios" class="container-fluid">
							 
					<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
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
						<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev" id="prev-neg">
							<i class="fa fa-chevron-left fa-lg text-muted"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next text-faded" href="#myCarousel" role="button" data-slide="next" id="next-neg">
							<i class="fa fa-chevron-right fa-lg text-muted"></i>
							<span class="sr-only">Next</span>
						</a>
					</div>
							</div>

				</div>	
				

				<div style="display:none"><input style="border: none;" readonly type="text" name="template" id="template" value="{{ $personalInformation->template }}" required></div>
		 </div>
		
	  </div>



	  <div style="overflow:auto;">
	    <div style="float:right; margin-top: 5px;">
	      	<button type="button" class="previous">Anterior</button>
	      	<button type="button" class="next">Siguiente</button>
			<button type="button" class="submit">Guardar</button>
	    </div>
	  </div>
	  <!-- Circles which indicates the steps of the form: -->
	  <div style="text-align:center;margin-top:40px;">
	    <span class="step">1</span>
	    <span class="step">2</span>		
	    <span class="step">3</span>
	    <span class="step">4</span>
	    <span class="step">5</span>
	    <span class="step">6</span>
	    <span class="step">7</span>

	  </div>
	

@else	 
	 
 <!-- FIN WIZARD PARA EMPRESAS  --> 
 
 
 <!-- WIZARD PARA PERSONAS -->
  <!--1-->
	  <div class="tab"  >
	  		<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12" style="padding: 0px; margin:0px">
				<div class="form-group" style="text-align: left;">
					<label style="font-size: large; text-align:center;">Ingrese sus Datos Generales</label>
				</div>
			</div>
		</div>
	  	<div class="row">	
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Nombre:</strong>
					<input type="text" name="first_name" value="{{ $personalInformation->first_name }}" class="form-control" placeholder="first_name Name">
				</div>
			 </div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Apellido:</strong>
					<input type="text" name="last_name" value="{{ $personalInformation->last_name }}" class="form-control" placeholder="Last Name">
				</div>
			</div>
		</div>	  	
		<div class="row">	
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Empresa:</strong>
					<input type="text" name="company" value="{{ $personalInformation->company }}" class="form-control" placeholder="Company">
				</div>
			 </div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Cargo o Puesto:</strong>
					<input type="text" name="position" value="{{ $personalInformation->position }}" class="form-control" placeholder="Position">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-sm-12 col-md-12" style="padding-top: 0;">
				<div class="form-group" style="text-align: left;">
					<strong>Ingrese Presentación</strong>
						<textarea class="form-control" name="presentation" id="summary-ckeditor3"  rows="3" maxlength="350">{{ $personalInformation->presentation }}</textarea>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			 <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="padding-top: 0;">
			 <div style="margin-left: auto; margin-right: auto; "><strong>Ingrese su foto principal</strong>  <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modpers1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
			 
			 							
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
					<img src="{{ asset('storage'). '/'.$personalInformation->photo}}" alt="" style="max-width: 250px; margin-top: 15px;margin-bottom: 15px;">
					<input type="file" class="form-control-file" name="photo" id="photo" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content; border:none">
				</div>
			 </div>
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12" style="padding-top: 0;">
			<div style="margin-left: auto; margin-right: auto; "><strong>Ingrese imagen o logo </strong> <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modlogp" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
			
			
										
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
					  <img src="{{ asset('storage'). '/'.$personalInformation->logo}}" alt=""  style="max-width: 250px; margin-top: 15px;margin-bottom: 15px;">
					  <input type="file" class="form-control-file" name="logo" id="logo" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;">
				</div>
			</div>
		</div>

	  </div>
 
	  <!--2-->

	  <div class="tab">
		<div class="row">	
			<div class="col-xl-4 col-sm-4 col-md-4">
				<div class="form-group"style="text-align: left;">
						<strong >Mostrar descargar Curriculum en la Tarjeta:</strong>
						<select class ="form-control" id="cv" name="cv">
						
							<option value="{{ $cv }}" selected>  @if($cv==1) Si @else No @endif</option>

							@if($cv==1)
							<option value="2">No</option>
							   @else
							<option value="1">Si</option>
						   @endif
						</select>
				</div>
			</div>
			<div class="col-xl-4 col-sm-4 col-md-4">
				<div class="form-group"style="text-align: left;">
						<strong >Estatus Laboral:</strong>
						<select class ="form-control" id="status_lab" name="status_lab">
						
							<option value="{{ $status_lab }}" selected>  @if($status_lab==1) No Disponible @else Disponible @endif</option>

							@if($status_lab==1)
							<option value="0">Disponible</option>
							   @else
							<option value="1">No Disponible</option>
						   @endif
						</select>
				</div>
			</div>
			<div class="col-xl-4 col-sm-4 col-md-4">
				<div class="form-group" style="text-align: left;">
					<strong>Indique: Productos/Servicios:</strong>
					<select class ="form-control"  name="serv_prod">
					
						
						<option value="Mis Productos">Productos</option>
						<option value="Mis Servicios">Servicios</option>
					  
					</select>
				</div>
			</div>
		</div>
		
		<div class="row" style="margin-top:-10px !important">	
			<div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<label for="services" >Ingrese Servicios / Productos</label>
					<textarea class="form-control" id="summary-ckeditor" name="services" rows="2">{{ $personalInformation->services }}</textarea>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-sm-12 col-md-12">
				<div class="form-group" style="text-align: left;">
					<label for="we">Ingrese más sobre usted</label>
					<textarea class="form-control" id="summary-ckeditor2" name="we" rows="2" style="height:250px">{{ $personalInformation->we }}</textarea>
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
					<input type="text" class="form-control" name="whatsapp" value="{{ $personalInformation->whatsapp }}" placeholder="Whatsapp">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Facebook:</strong>
					<input type="text" class="form-control" name="facebook" value="{{ $personalInformation->facebook }}" placeholder="Facebook">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Canal de Youtube:</strong>
					<input type="text" class="form-control" name="youtube" value="{{ $personalInformation->youtube }}" placeholder="Canal de Youtube">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Twitter:</strong>
					<input type="text" class="form-control" name="twitter" value="{{ $personalInformation->twitter }}" placeholder="Twitter">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Instagram:</strong>
					<input type="text" class="form-control" name="instagram" value="{{ $personalInformation->instagram }}" placeholder="Instagram">
			   </div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Linkedin:</strong>
					<input type="text" class="form-control" name="linkedin" value="{{ $personalInformation->linkedin }}" placeholder="linkedin">
			   </div>
			</div>		
		</div>
		
		
	</div>
<!--4 Personas-->
	  
<div class="tab">
	   
	<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12" style="margin-left: auto; margin-right: auto;">
					<div class="form-group">
						  <img src="{{ asset('storage'). '/'.$personalInformation->qr}}" alt=""  style="padding-bottom:10px; max-height: 150px; width:auto">
						  @if($personalInformation->qr)
						   <a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="qr" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20"></a>
						  @endif
						  <input type="file" class="form-control-file" name="qr" id="qr" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;">
						  <strong >Url PaypalMe:</strong>
							<input type="text" class="form-control" name="paypalme" value="{{ $personalInformation->paypalme }}" placeholder="PaypalMe" style="max-width: 600px; margin-left: auto; margin-right: auto;">
					</div>
				</div>
	 
	</div>
		<div class="row">	
	   
			<div class="col-lg-4 col-md-6 col-sm-12" style="margin-left: auto; margin-right: auto;">
			   <strong style="margin-left: 90px;">Opción 2:</strong>
			  <div class="form-group">
					
						<img src="{{ asset('storage'). '/'.$personalInformation->qr2}}" alt=""  style="padding-bottom:10px; max-height: 150px; width:auto">
						  @if($personalInformation->qr2)
						   <a  class="btn btn-outline-danger btnEliminar" onclick="return confirm('Seguro que desea Eliminar definitivamente')" id="qr2" ><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20"></a>
						  @endif
						  <input type="file" class="form-control-file" name="qr2" id="qr2" value="" style="margin-left: auto; margin-right: auto; max-inline-size: fit-content;">
					
						  <input type="text" class="form-control" name="np2" value="{{ $personalInformation->np2 }}" placeholder="Nombre de su Pasarela de Pago" style="max-width: 600px; margin-left: auto; margin-right: auto;">
					
						  <input type="text" class="form-control" name="pasarela2" value="{{ $personalInformation->pasarela2 }}" placeholder="Url de  su Pasarela" style="max-width: 600px; margin-left: auto; margin-right: auto;">
				</div>
			</div>

		</div>		
	
		
</div>
	  
<!--5-->					
	  <div class="tab">
	   
		<div class="row">	
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Sitio Web:</strong>
					<input type="text" class="form-control" name="website" value="{{ $personalInformation->website }}" placeholder="website">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong >Teléfono:</strong>
					<input type="text" class="form-control" name="telephone" value="{{ $personalInformation->telephone }}" placeholder="telephone">
			   </div>
			</div>
		</div>		
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Email:</strong>
					<input type="email" class="form-control" name="correo" value="{{ $personalInformation->correo }}" placeholder="Email">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong >Url Google Map:</strong>
					<input type="text" class="form-control" name="url_map" value="{{ $personalInformation->url_map }}" placeholder="url_map">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong >Dirección:</strong>
					<input type="text" class="form-control" name="address" value="{{ $personalInformation->address }}" placeholder="address">
				</div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong >País:</strong>
					<input type="text" class="form-control" name="pais" value="{{ $personalInformation->pais }}" placeholder="pais">
			    </div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-md-6">
				<div class="form-group" style="text-align: left;">
					<strong>Instagram:</strong>
					<input type="text" class="form-control" name="instagram" value="{{ $personalInformation->instagram }}" placeholder="Instagram">
			   </div>
			</div>
			<div class="col-xl-6 col-sm-6 col-md-6">
			   <div class="form-group" style="text-align: left;">
					<strong>Linkedin:</strong>
					<input type="text" class="form-control" name="linkedin" value="{{ $personalInformation->linkedin }}" placeholder="linkedin">
			   </div>
			</div>		
		</div>


		<p style="text-align: center; font-size: large;">Elige un template, si deseas cambiar el actual</p>
		<div class="btn-carou">
			<button class="success" id="mostrar">Mostrar Diseños</button>
			<button class="success" id="ocultar">Ocultar Diseños</button>
		</div>

			 <div id="carousel">
			
						

				<div  id="slider-personas" style="margin-top: 30px;">

				  <div id="carouselPersonas" class="container-fluid">
							 
					<div id="carouselPerson" class="carousel slide" data-ride="carousel" data-interval="3000">
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
						<a class="carousel-control-prev" href="#carouselPerson" role="button" data-slide="prev">
							<i class="fa fa-chevron-left fa-lg text-muted"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next text-faded" href="#carouselPerson" role="button" data-slide="next">
							<i class="fa fa-chevron-right fa-lg text-muted"></i>
							<span class="sr-only">Next</span>
						</a>
					</div>
							</div>

				</div>	
				

				<div style="display:none"><input style="border: none;" readonly type="text" name="template" id="template" value="{{ $personalInformation->template }}" required></div>
		 </div>		
	
	  </div>
	



	
	  	  

	  <div style="overflow:auto;">
	    <div style="float:right; margin-top: 5px;">
	      	<button type="button" class="previous">Anterior</button>
	      	<button type="button" class="next">Siguiente</button>
			<button type="button" class="submit">Guardar</button>
	    </div>
	  </div>
	  <!-- Circles which indicates the steps of the form: -->
	  <div style="text-align:center;margin-top:40px;">
	    <span class="step">1</span>
	    <span class="step">2</span>		
	    <span class="step">3</span>
	    <span class="step">4</span>
	    <span class="step">5</span>
	   

	  </div>
	 
 <!-- FIN WIZARD PARA PERSONAS  -->
@endif		 

	
	</form>

</div>
</div>
</div>
		
		

@endsection