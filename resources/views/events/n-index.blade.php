@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />

@endpush

@section('content')


<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-title px-4 pt-4">{{-- row --}}
      <div class="">{{-- col --}}
        <h3>Calendario</h3>
      </div>
      
      {{-- <div class="d-inline float-right pr-2">
        <a class="btn btn-success" href="{{ url('/personalInformation') }}">Atras</a>
      </div> --}}
    </div>

    <div class="px-4">
      <hr style="background-color: #262f43;">
    </div>
    

    <div class="card-body">
      {{-- <h6 class="card-title">Hoverable Table</h6>
      <p class="card-description">Add class <code>.table-hover</code></p> --}}
      

      <div class="row">
     
        <div class="col-lg-10 mx-auto">
          <div id="agenda" style="text-align:center; margin-top:10px"></div>
        </div>
        
      </div>


    </div>
  </div>
</div>


  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('messages.schedule_meeting') }}</h5>
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

				  <input type="text" name="personal_information_id" id="personal_information_id" value="{{$pi}}" readonly>
				<input type="text" id="dias" value="{{$days_lab}}" readonly>
				<br/>
			</div>
			
			
			
			
			<div class="alerta">
				<span class="s-alerta"></span>
			</div>			
	  <div class="form-row">

		<div class="form-group col-md-12">
			<label>{{__('messages.name') }}</label>
			<input type="text" class="form-control" name="title" id="title" autocomplete="off">
		</div>		
		<div class="form-group col-md-12" id="descrip">
			 <label>{{__('messages.subject') }}</label>
			<input name="description" id="description" class="form-control" required="required">
		</div>			
		<div class="form-group col-md-12 ">
			<label>{{__('messages.email') }}</label>
			<input type="text" class="form-control" name="email" id="email" autocomplete="off">
		</div>			
		<div class="form-group col-md-12" id="pho">
			 <label>{{__('messages.phone') }}</label>
			<input name="phone" id="phone" class="form-control" required="required" value="+1">
		</div>	
		<div class="form-group col-md-12" id="wht">
			<label>{{__('messages.whatsapp') }}</label>
			<input name="whatsapp" id="whatsapp" class="form-control" required="required">
		</div>
	
		<div class="form-group col-md-12" id="blq">
			<label>{{__('messages.select_hour') }}</label>
			<select class ="form-control" id="hours" name="hours" style="border-radius: 2px; border: 1px solid #cccccc;">
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
			<label>{{__('messages.start') }}:</label><span class="validity"></span>
			<input type="time" class="form-control" name="hora_i" id="hora_i" >
			<span class="validity val-in">
		</div>		
		<div class="form-group col-md-6 d-none">
			<label>{{__('messages.end') }}:</label></span>
			<input type="time" class="form-control" name="hora_f" id="hora_f" required min="" max=""><span class="validity val-fin">
		</div>

		<div class="form-group col-md-6">
			<label>{{__('messages.background') }}:</label>
			<input type="color" class="form-control" name="txtColor" id="txtColor" style="height:30px">
		</div>		
		<div class="form-group col-md-6">
			<label>{{__('messages.font_color') }}:</label>
			<input type="color" class="form-control" name="txtColort" id="txtColort" value="#ffffff" style="height:30px">
		</div>		
	  </div>
	  </div>
      <div class="modal-footer">
		  <button id="btnAgregar" class="btn btn-success">{{__('messages.btn_6') }}</button>
		  <button id="btnModificar" class="btn btn-success">Aceptar Cita</button>
		  <button data-toggle="modal" data-target="#exampleModal2" class="btn btn-danger">Eliminar</button>
		  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		  
		  
      </div>
    </div>
  </div>
</div>





<!-- Modal Eliminar -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Está seguro que desea eliminar esta cita?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="btnBorrar" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>


@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/dragula/dragula.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dragula.js') }}"></script>

@endpush