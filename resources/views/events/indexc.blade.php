@extends('layouts.calendar')
@section('scripts')

	<style>
	.fc-title{
		display:none !important;
	}	
	.fc-center{	
		text-transform: capitalize;
	}
	.fc-head{	
		background: black !important;
		color: white !important;
		text-transform: capitalize;
	}
	
	#calendar{
		padding: 10px;
		border: double black;
	}

	</style>
	

@endsection

@section('content')
	<div class="row">
		<div class="col-12" style="text-align:center; margin-top:20px; padding:20px; background:white;">
			@isset(Auth::user()->personalInformation->photo)
			 <img class="rounded-circle" src="{{ asset('storage'). '/'.Auth::user()->personalInformation->photo}}" alt="" height="50px">
			@endif
		
		
			<h2>{{$personalInformation->first_name}}</h2>
		</div>
		
	</div>
	
	<div class="row">
		<div class="col-12"></div>
		<div class="col-12" style="margin-top:20px; padding:20px; background:white;"><div id="agenda" style="text-align:center"></div></div>
		<div class="col-12 text-center" style="padding-top:30px; padding-bottom:30px">
			<button type="button" class="btn btn-success" id="btn-cancelar" >{{ __('messages.btn_cancelar') }}</button>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agendar Reunión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

			
			 <div class="d-none">
					    ID:
						<input type="text" name="txtID" id="txtID">
						<br/>
						Fecha de Inicio:
						<input type="date" name="txtFechai" id="txtFechai" readonly>
						
						
						<input type="text"  id="disponible">
						<input type="text"  id="nro_what" value="{{$personalInformation->whatsapp}}">
						<input type="text" name="personal_information_id" id="personal_information_id" value="{{$personalInformation->id}}" readonly>
						
						
						<input type="text" id="dias" value="{{$personalInformation->days_lab}}" readonly>
						
						<br/>
			</div>
			
			<div class="alerta">
				<span class="s-alerta"></span>
			</div>
			
			
	<div class="form-row">
	
	
		
		
		
		<div class="form-group col-md-12">
			<label>Nombre</label>
			<input type="text" class="form-control" name="title" id="title" autocomplete="off">
		</div>
		
		
		<div class="form-group col-md-12" id="descrip">
			 <label>Asunto</label>
				<input name="description" id="description" class="form-control" required="required">
			
		</div>	
		
		<div class="form-group col-md-12">
			<label>Email</label>
			<input type="text" class="form-control" name="email" id="email" autocomplete="off">
		</div>
		
		
		<div class="form-group col-md-12" id="pho">
			 <label>Teléfono</label>
				<input name="phone" id="phone" class="form-control" required="required">
			
		</div>

		<div class="form-group col-md-12" id="blq">
			<label>{{__('messages.select_hour') }}</label>
			
			<select class ="form-control" id="hours" name="hours">
			 <?php
				$mini =intval($hora_inicio);
				$max =intval($hora_fin);
				$intv = intval($intervalo);
				for ($i = $mini; $i <= ($max-1); $i++) {
					for ($j = 0; $j < 60; $j = $j + $intv) {
						if ($i == $hora_inicio){
							if($intervalo == 120){
								$i = str_pad($i, 2, "0", STR_PAD_LEFT);
								$j = str_pad($j, 2, "0", STR_PAD_LEFT);
							}else{
								$i = str_pad($i, 2, "0", STR_PAD_LEFT);
								$j = str_pad($j, 2, "0", STR_PAD_LEFT);	
							}	
						}else{
							if($intervalo == 120){
								$i = str_pad($i+1, 2, "0", STR_PAD_LEFT);
								$j = str_pad($j, 2, "0", STR_PAD_LEFT);
							}else{
								$i = str_pad($i, 2, "0", STR_PAD_LEFT);
								$j = str_pad($j, 2, "0", STR_PAD_LEFT);	
							}
							
						}

						$min = $j+ $intervalo; 
						if($min == 60){
							$j2 ="00";
							$i2 = str_pad($i+1, 2, "0", STR_PAD_LEFT);
						}else if($min == 120){
							$j2 ="00";
							$i2 = str_pad($i+2, 2, "0", STR_PAD_LEFT);
						}else{
							$i2 = str_pad($i, 2, "0", STR_PAD_LEFT);
							$j2 = str_pad($j + $intervalo, 2, "0", STR_PAD_LEFT);
						}
					if($inicio_receso != "" && $fin_receso != ""){	
					if(($i <= $hora_fin && $i <= $inicio_receso &&  $i != $inicio_receso) || ($i <= $hora_fin && $i >= $fin_receso )){	

						$hi = date_create("$i:$j");
						$in =date_format($hi,"h:i");
						$hf = date_create("$i2:$j2");
						$fi =date_format($hf,"h:i");

				?>
					<option  value="<?php echo "$i:$j/$i2:$j2" ?>"><?php echo $in;echo " - ";echo $fi; ?> </option>
				<?php
					}
				}else{
					if($i <= $hora_fin ){	

						$hi = date_create("$i:$j");
						$in =date_format($hi,"h:i");
						$hf = date_create("$i2:$j2");
						$fi =date_format($hf,"h:i");

				?>
					<option  value="<?php echo "$i:$j/$i2:$j2" ?>"><?php echo $in;echo " - ";echo $fi; ?> </option>
				<?php
					}
				}
				
				
				
				
				
			   }
			}
			?>
				
			</select>
		</div>


		
		<div class="form-group col-md-6 d-none">
			<label>Hora Inicio:</label><span class="validity"></span>
			<input type="time" class="form-control" name="hora_i" id="hora_i"  value="{{$personalInformation->hora_inicio}}">
			<span class="validity val-in">
		</div>		
		<div class="form-group col-md-6 d-none">
			<label>Hora Fin:</label></span>
			<input type="time" class="form-control" name="hora_f" id="hora_f" required min="" max="" value="{{$personalInformation->hora_inicio}}"><span class="validity val-fin">
		</div>

		<div class="form-group col-md-6">
			<label>Color Fondo:</label>
			<input type="color" class="form-control" name="txtColor" id="txtColor">
		</div>
		
		<div class="form-group col-md-6">
			<label>Color del Texto:</label>
			<input type="color" class="form-control" name="txtColort" id="txtColort" value="#ffffff">
		</div>
		
	</div>
		@if($personalInformation->whatsapp)
			<input type="checkbox" id="send" name="send" >
			<label for="send">{{__('messages.send_whatsapp') }}</label><br>
		@endif
</div>
      <div class="modal-footer">
	  
		  <button id="btnAgregar" class="btn btn-success">Agregar</button>
		 
		  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		  

      </div>
    </div>
  </div>
</div>


	<!-- Modal Cancelacion -->
	<div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-labelledby="mdl2" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">{{__('messages.title_solicitud_cancel') }}</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<div class="form-row">
				<input type="text" name="user_p_id" id="user_p_id" value="{{$personalInformation->id}}" class="d-none">	
				
					<div class="form-group col-md-12">
						<label>{{__('messages.name') }}</label>
						<input type="text" class="form-control" name="title_can" id="title_can" autocomplete="off">
					</div>
					<div class="form-group col-md-12" id="pho_c">
						<label>{{__('messages.phone') }}</label><br>
						<label>{{__('messages.coincidir') }}</label>
						<input name="phone_can" id="phone_can" class="form-control" required="required" value="+1">
		
					</div>
					<div class="form-group col-md-12" id="moti">
						<label>{{__('messages.motivo') }}</label>
						<input name="motivo" id="motivo" class="form-control" required="required">
					</div>	
					

					
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" id="cncl" class="btn btn-default" data-dismiss="modal">{{ __('messages.cancel') }}</button>
			<button id="btnCancelacion" class="btn btn-success">{{ __('messages.accept') }}</button>
		  </div>
		</div>
	  </div>
	</div>



@endsection