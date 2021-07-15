@extends('layouts.mm2')

@section('scripts')

<style>
html{
	background: aliceblue;
}
body{
    font-family: 'Open Sans', sans-serif;
    text-align:center;
  }
.btn-payment{
    background-color:#0070ba;
    padding:13px 24px;
    color:white;
    text-decoration: none;
    border-radius: 0.25rem;
  }
  
input[type=radio]{
	width: 1.5em;
    height: 2em;
	-webkit-appearance: radio;
	
}

.img-tarjeta{
	max-height:200px;
}

.form-check-label {
    margin-left: 1rem;
}

.form-check {
    display: flex;
    justify-content: left;
    align-items: center;
    padding: 2em;
}


html { font-size: 1rem; }

@media (min-width: 576px) {
    html { font-size: 0.80rem; }
}
@media (min-width: 768px) {
    html { font-size: 0.90rem; }
}
@media (min-width: 992px) {
    html { font-size: 1rem; }
}
@media (min-width: 1200px) {
    html { font-size: 1.15rem; }
}
</style>

<script>

	$('#monto_sus').html("29.99$");
    $('#monto_tot').html("29.99$");
    $('#pay_empre').css("display", "none");
    $('#pay_empre').prop("readOnly", "true");
			
	$('input:radio[name="suscripcion"]').change(
    function(){	
        if ($(this).is(':checked') && $(this).val() == 'empresa') {
            $('#monto_sus').html("69.99$");
            $('#monto_tot').html("69.99$");
			$('#pay_empre').css("display", "block");
			$('#pay_empre').prop("readOnly", "false");
			$('#pay_person').css("display", "none");
			$('#pay_person').prop("readOnly", "true");
			
			$('#img-emp').attr('src', '/img/logow.png');
			$('#img-per').attr('src', '/img/weisworkBN.png');
			
			
        }else{
			$('#monto_sus').html("29.99$");
            $('#monto_tot').html("29.99$");
			$('#pay_empre').css("display", "none");
			$('#pay_empre').prop("readOnly", "true");
			$('#pay_person').css("display", "block");
			$('#pay_person').prop("readOnly", "false");
			
			$('#img-per').attr('src', '/img/logow.png');
			$('#img-emp').attr('src', '/img/weisworkBN.png');
			
		}
    });

	$('.btn-invitado').click(function(){
		$('#exampleModal').modal();
	});	
	
	$('#pers').click(function(){
		$('#type_card').val("persona");
	});	
	
	$('#empr').click(function(){
		$('#type_card').val("empresa");
	});	


	$('#btnAgregar').click(function(){
			ObjEvento=recolectarDatosGUI("POST");
			
			EnviarInformation('',ObjEvento);
		
				  $('#codig').val("");


		});
		
		function recolectarDatosGUI(method){
			nuevoEvento={
					codig:$('#codig').val(),
					type_card:$('#type_card').val(),
					'_token':$("meta[name='csrf-token']").attr("content"),
					'_method':method
			}
			return (nuevoEvento);
		}
		
		
		
			function EnviarInformation(action, objEvento){
			$('#exampleModal').modal('toggle');
			$.ajax({
				type:"POST",
				url:"{{url('inviteds/codigo')}}",
				data:objEvento,
				success:function(msg){
					if(msg == 1){
						window.location.replace("/personalInformation/create");				
					}else{
						alert("Lo sentimos, tu codigo no coincide con nuestros registros");
					}
				},
				error:function(){alert("Hay un error");}
				
			});
		}
		

	
</script>
@endsection

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <title>Payment</title>
</head>

<body>

@if (session('messagedcal'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alerta!</strong> {{ session('messagedcal') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('messagedgif'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alerta!</strong> {{ session('messagedgif') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('messagecust'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alerta!</strong> {{ session('messagecust') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingrese Su codigo de Invitacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<form id="Invitado">
			<div class="form-row">
				<div class="form-group col-md-8" id="descrip">
					 <label>Codigo de Invitacion</label>
						<input name="codig" id="codig" class="form-control" required="required">
						<input name="type_card" id="type_card" class="form-control" type="hidden" required="required">
				</div>
			</div>
		</form>
			

		</div>
      <div class="modal-footer">
	  
		  <button id="btnAgregar" class="btn btn-success">Agregar</button>
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		  

      </div>
    </div>
  </div>
</div>
<!--fin modal invitado-->

<div class="wrapper">

</div>
 
 <div class="row">
	 <div class="col-md-8 col-sm-12">
	 <div style="padding:15px">
		<strong>Seleccione su suscripcion</strong></div>
		<div class="card" style>
			<div class="card-body">
			
			 <div class="row">
				 <div class="col-sm-5 col-md-5">
					<div class="form-check">
						 <input class="form-check-input" type="radio" name="suscripcion" id="rad_persona" value="persona" checked>
							<label class="form-check-label" for="rad_persona">
	
								<img id="img-per" src="{{URL::asset('/img/logow.png')}}" class="img-fluid" >

						</label>
					</div>
				 </div>

				 <div class="col-sm-7 col-md-7" style="display: flex; justify-content: center; align-items: center;">
					<p><strong>Modelo de Perfil Interactivo Personal</strong><br>Un perfil interactivo personal, incluye su tarjeta interactiva de presentacion, Curriculum Interactivo, agenda online compartida.

					</p>
				 </div>
				 
			 </div>	

			 
			 <div class="row">
				 <div class="col-sm-5 col-md-5">
					<div class="form-check">
					    <input class="form-check-input" type="radio" name="suscripcion" id="rad_empresa" value="empresa">
						<label class="form-check-label" for="rad_empresa">

					<img id="img-emp" src="{{URL::asset('/img/weisworkBN.png')}}" class="img-fluid" >
					
					  </label>
					
					</div>
				 </div>

				  <div class="col-sm-7 col-md-7" style="display: flex; justify-content: center; align-items: center;">
					<p><strong>Modelo Empresarial</strong><br>Un perfil interactivo negocios, incluye su tarjeta interactiva de presentacion, Brouchure de Negocios, agenda online compartida, Tarjetas de Regalo para Clientes, Venta  de Gif Card

					</p>
				 </div>
				 
			 </div>

			</div>

			
		  </div>
		  
	 </div>

	 
	 <div class="col-md-4 col-sm-12">
	 	 <div style="padding:15px">
		<strong>Resumen del Pedido</strong></div>
		  <div class="card" style="border:none; background:transparent;">
  
			<div class="card-body">
			  <p class="card-text" style="text-align:justify;">Esta a punto de ingresar al Mundo de Weiswork, se cargara a su cuenta el monto de la suscripcion que usted escoja.</p>

			</div>
			<div class="card-footer row" style="background:none">
				<div class="col-6"> Suscripcion: </div>
				<div class="col-6"><strong id="monto_sus"></strong></div>
			</div>			
			<div class="card-footer row">
				<div class="col-6"><strong style="color:#007bff"> Total a Pagar: </strong></div>
				<div class="col-6"><strong id="monto_tot"></strong></div>
			</div>
			<div class="card-footer row" style="margin-left: auto; margin-right: auto;background: none; border: none;">
				<a href="{{ url('/paypal/pay') }}" class="btn-payment" id="pay_person" style="background-color: #0071c1 !important;">Comprar</a>
				<a href="{{ url('/paypal/pay2') }}" class="btn-payment" id="pay_empre"style="background-color: #0071c1 !important;">Comprar</a>
			</div>
			<div class="card-footer row" style="margin-left: auto; margin-right: auto;background: none; border: none;"><button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" style="background-color: #0071c1 !important;" aria-controls="multiCollapseExample1 multiCollapseExample2">Cuento con codigo de Invitacion</button></div>
			<div class="row">
			
			  <div class="col"><br>
				<div class="collapse multi-collapse" id="multiCollapseExample1">
				 
					<a href="#" class="btn-invitado btn-payment" id="pers" style="background-color: #0071c1 !important;">Personal</a>
				  
				</div>
			  </div>
			  <div class="col"><br>
				<div class="collapse multi-collapse" id="multiCollapseExample2">
				  
					<a href="#" class="btn-invitado btn-payment" id="empr" style="background-color: #0071c1 !important;">Empresarial</a>
				 
				</div>
			  </div>
			</div>


		  </div>
		
	 </div>
	 
 </div>
 
 <br>
 

</body>
</html>

@endsection