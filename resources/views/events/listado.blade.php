@extends('theme.layout.n-master')

@section('content')

	
<script src="{{ asset('js/modald.js') }}" defer></script>
<script src="{{ asset('js/confirm.js') }}" defer></script>
<script src="{{ asset('js/reagendar.js') }}" defer></script>


    <style>
        .my_table td{
            border: dotted 1px rgb(73, 98, 151);
            padding: 5px;          
            }
    .my_table th{
        padding: 10px;
        background-color: rgb(90, 123, 195); 
        color: white;         
    }
    .error{
        color: red;
        border-color:red;
        font-weight: 900;
    }

    </style>
	
<!--modal-->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal" style="padding-top: 50px !important;">
	  <div class="modal-dialog modal-md">
		<div class="modal-content">
		  <div class="modal-header">
			
			<h4 class="modal-title" id="myModalLabel">{{ __('messages.modalt') }}</h4>
		  </div>
		  <div class="modal-body">
		 {{ __('messages.modal1a') }}


		  <input type="hidden" class="form-control" id="id_item">
		  
		 </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" id="modal-btn-si">{{ __('messages.accept') }}</button>
			<button type="button" class="btn btn-default" id="modal-btn-no">{{ __('messages.cancel') }}</button>
		  </div>
		</div>
	  </div>
	</div>
<!--fin modal-->

<!--modal confirmar-->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modalb" style="padding-top: 50px !important;">
	  <div class="modal-dialog modal-md">
		<div class="modal-content">
		  <div class="modal-header">
			
			<h4 class="modal-title" id="myModalLabel">{{ __('messages.title_confirm') }}</h4>
		  </div>
		  <div class="modal-body">
		 {{ __('messages.qestion_confirm') }}


		  <input type="hidden" class="form-control" id="id_itemb">
		  
		 </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-success" id="modal-btn-sii">{{ __('messages.accept') }}</button>
			<button type="button" class="btn btn-default" id="modal-btn-noo">{{ __('messages.cancel') }}</button>
		  </div>
		</div>
	  </div>
	</div>
<!--fin modal confirmar-->

<!--modal reagendar-->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modalrea" style="padding-top: 50px !important;">
	  <div class="modal-dialog modal-md">
		<div class="modal-content">
		  <div class="modal-header">
			
			<h4 class="modal-title" id="myModalLabel">Cita</h4>
		  </div>
		       <div class="modal-body">
			<div class="d-none">
				ID:
				<input type="text" name="txtID" id="txtID">
				<br/>
				Fecha de Inicio:
				<input type="date" name="txtFechai" id="txtFechai" readonly>

				<input type="text" name="personal_information_id" id="personal_information_id" value="{{$id_user_p}}" readonly>
				
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
		<div class="form-group col-md-12">
			<label>{{__('messages.email') }}</label>
			<input type="text" class="form-control" name="email" id="email" autocomplete="off">
		</div>			
		<div class="form-group col-md-12" id="pho">
			 <label>{{__('messages.phone') }}</label>
			<input name="phone" id="phone" class="form-control" required="required" value="+">
		</div>
		<div class="form-group col-md-12" id="wth">
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
				if($i <= $hora_fin){	
				
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
		  <button id="btnAceptarCita" class="btn btn-success">Aceptar Cita</button>
		  <button data-toggle="modal" data-target="#exampleModal2" class="btn btn-danger">Eliminar</button>
		  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
		
		
		</div>
	  </div>
	</div>
<!--fin modal confirmar-->





	@if($existe == 0 )
				<div style="padding:2em; margin-top: 2em; background:#dcd9d9">
					<h3>{{ __('messages.empty') }}<h3>
				</div>
					@else
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">

                        <div class="col-sm-12" style="text-align:center">
                             <!-- Basic Form Inputs card start -->
                             <div class="card">
                                <div class="card-block table-responsive">
                                    <h4 class="sub-title mt-3">Citas</h4>



					 <table class="table table-bordered mt-3" >
						   <thead class="table-active" style="color: white;">
							<tr class="table-active" >

								<th style="width:25%">{{ __('messages.name') }}</th>
								<th style="width:15%">{{ __('messages.date_cita') }}</th>
								<th style="width:20%">{{ __('messages.period') }}</th>
								<th style="width:20%">{{ __('messages.status') }}</th>
								<th style="width:20%; text-align:center;">{{ __('messages.actions') }}</th>
								
							</tr>
						  </thead>
						   <tbody id="tablecontents">
							@foreach ($events as $item)

							 <tr class="row1" data-id="{{ $item->id }}">
								<td style="text-align: center; justify-content:center;">
									<p>{{ $item->title }}</p>
									<br>
									@if($item->whatsapp)
										<a href="https://api.whatsapp.com/send?phone={{$item->whatsapp}}" target="_blank">
										<img src="{{URL::asset('/images/whatsapp2.png')}}" style="width: 50px; margin-left:10px"></a>
									@endif
									@if($item->phone)
										<a href="tel:+{{ $item->phone }}">
										<img src="{{URL::asset('/images/phone.png')}}" style="width: 50px; margin-left:10px"></a>
									@endif
								</td>
								<td>{{ \Carbon\Carbon::parse($item->start)->format('d-m-Y')}}</td>
								<td>{{ $item->hora_i }} - {{ $item->hora_f }}</td>
								<td>
								
										@if($item->status =='waiting')
										  <a class="btn btn-outline-warning">Solicitada</a>
										@else
											 <a class="btn btn-outline-success">Confirmada</a>
										
										@endif
								</td>

								<td style="text-align: center; justify-content:center;">

									<button type="button" class="btn btn-outline-danger remov-item" data-id="{{ $item->id }}"><img src="{{URL::asset('/images/delete2.png')}}" alt="Supr" height="22" width="auto" ></button>
									
									<a class="btn btn-outline-info" style="" href="{{ route('event.view',$item->id) }}" title="{{ __('messages.details') }}"><img src="{{URL::asset('/images/view.png')}}" alt="Ver" height="22" width="auto" ></a>
								
								@if($item->status =='waiting')
									
								<button type="button" class="btn btn-outline-success confirm-item" data-id="{{ $item->id }}" style=""><img src="{{URL::asset('/images/black_maito_arriba.png')}}" alt="Ver" height="22" width="auto" ></button>
								@endif($item->status =='waiting')
									
								
								<button type="button" class="btn btn-outline-info reagen-item" data-id="{{ $item->id }}" style=""><img src="{{URL::asset('/images/edit.png')}}" alt="Ver" height="22" width="auto" ></button>
									

								</td>
						</tr>			
							@endforeach
						</tbody>
						</table>
			
  
 {!! $events->links() !!} 
								</div>
                           
							</div>
                            <!-- Basic Form Inputs card end -->
                        
						</div>
                   
				   </div>
                 
				</div>
                <!-- Page body end -->
          
			</div>
        
		</div>
		
		
    </div>
	@endif
	
@endsection

