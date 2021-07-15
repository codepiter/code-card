@extends('layouts.mm2')
@section('content')

@section('scripts')
<script src="{{ asset('js/tabular/tab.js') }}" ></script>

@stop
<div class="container" >
	<div class="col-sm-12 col-md-12 col-lg-12">


  <form action="{{ route('resumes.update',$resumes->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			{{ method_field('PATCH') }}
	<div class="row">
		<div class="col-lg-12" style="word-wrap: break-word;">
		
			
			<input type="hidden" class="form-control" name="res_id" value="{{ $resumes->id }}">
	  
			<input type="hidden" class="form-control" name="pers_id" value="{{ $personalInformation->id }}">


		<div style="text-align:center" ><h3><strong >Formación</strong ></h3></div>
		
		<div class="col-xl-12 col-md-12 col-md-12 text-center" style="margin-top: 25px;">
			<button type="button" name="add-form" id="add-form-ed" class="btn btn-success">Agregar Formación</button>			
        </div> 
		<?php 
		$first= true;
		foreach ($formations as $formation){ 
		
		if ( $first )
	   {

		?>
		    <div class="col-md-12">
                <strong>Instituto:</strong>
                <input type="text"  value="{{ $formation->instituto_name }}" name="instituto_name[]" class="form-control" placeholder="Instituto" required>
				<input type="hidden" class="form-control" name="id_form[]" value="{{ $formation->id }}">
            </div> 


			<div class="row" style="padding-left:15px; padding-right:15px">
                <div class="col-md-5">
				<strong>Culminado:</strong>
				 <select  id="culminado" name="culminado[]" style="width: 100%; height: 30px;border: 1px solid #ced4da; border-radius: 3px;">							
					<option value="{{ $formation->culminado }}" selected>  @if($formation->culminado==1) Si @else No @endif</option>
					@if($formation->culminado==1)
					<option value="0">No</option>
					@else
					<option value="1">Si</option>
					@endif
				</select>		
				</div>


				<div class="col-md-7">
					<strong>Título Obtenido:</strong>
					<input type="text"  name="titulo_obtenido[]" value="{{ $formation->titulo_obtenido }}" class="form-control" placeholder="" required>
				<br>		
				</div>
            </div>
			<div class="row" style="padding-left:15px; padding-right:15px">
				<div class="col-md-6">
					<strong>Fecha Inicio:</strong>
					<input type="month"  name="inicio_formation[]" value="{{ Carbon\Carbon::parse( $formation->inicio)->format('Y-m') }}" class="form-control" placeholder="" required>
				<br>		
				</div>
				<div class="col-md-6">
					<strong>Fecha Fin:</strong>
					<input type="month"  name="fin_formation[]" value="{{ Carbon\Carbon::parse( $formation->fin)->format('Y-m') }}" class="form-control" placeholder="" required>
				<br>		
				</div>
            </div>


		<?php
	
	   $first = false;
	   }
	   else
	   {
		?>
			<div class="form">
			<div class="row"><div class="col-md-6"><strong>Formación</strong></div><div class="col-md-6 text-right"><button class="btn btn-danger deleteRecord" onclick="return confirm('Seguro que desea Eliminar la formación')" data-id="{{ $formation->id }}" >Eliminar Formación</button>
			</div></div>
			
		
			
			<div class="col-md-12">
                <strong>Instituto:</strong>
                <input type="text"  value="{{ $formation->instituto_name }}" name="instituto_name[]" class="form-control" placeholder="Instituto" required>
				<input type="hidden" class="form-control" name="id_form[]" value="{{ $formation->id }}">
            </div> 


			<div class="row" style="padding-left:15px; padding-right:15px">
                <div class="col-md-5">
				<strong>Culminado:</strong>
				 <select  id="culminado" name="culminado[]" style="width: 100%; height: 30px;border: 1px solid #ced4da; border-radius: 3px;">							
					<option value="{{ $formation->culminado }}" selected>  @if($formation->culminado==1) Si @else No @endif</option>
					@if($formation->culminado==1)
					<option value="0">No</option>
					@else
					<option value="1">Si</option>
					@endif
				</select>		
				</div>


				<div class="col-md-7">
					<strong>Título Obtenido:</strong>
					<input type="text"  name="titulo_obtenido[]" value="{{ $formation->titulo_obtenido }}" class="form-control" placeholder="" required>
				<br>		
				</div>
            </div>
			<div class="row" style="padding-left:15px; padding-right:15px">
				<div class="col-md-6">
					<strong>Fecha Inicio:</strong>
					<input type="month"  name="inicio_formation[]" value="{{ Carbon\Carbon::parse( $formation->inicio)->format('Y-m') }}" class="form-control" placeholder="" required>
				<br>		
				</div>
				<div class="col-md-6">
					<strong>Fecha Fin:</strong>
					<input type="month"  name="fin_formation[]" value="{{ Carbon\Carbon::parse( $formation->fin)->format('Y-m') }}" class="form-control" placeholder="" required>
				<br>		
				</div>
            </div> 
            </div> 
		
		<?php
				}
			} 
			 
		?>
		  
	
	 <div id="div-form"></div>
	 
	 
	 <!--fin formación-->
	
	<div style="text-align:center" ><h3><strong >Experiencia Laboral</strong ></h3></div>
			
	<div class="col-xl-12 col-md-12 col-md-12 text-center" style="margin-top: 25px;">
		<button type="button" name="add-desc" id="add-desc-ed" class="btn btn-success">Agregar Experiencia</button>			
	</div> 
	
		<?php
	
	$cwe=count($work_exp);
	$cp=count($position);
	
	$cont1=0;
	while ($cont1 < $cwe){
		
		$id_work = $work_exp[$cont1]['id'];
		$company = $work_exp[$cont1]['company'];
		$w_inicio = $work_exp[$cont1]['inicio'];
		$w_fin = $work_exp[$cont1]['fin'];
		?>
		

			 
	<div class="exp-car">
			<div class="row">
				<div class="col-md-6"><h4><strong>Datos de la Empresa</strong></h4></div><div class="col-md-6 text-right"><button class="btn btn-danger deleteExperience" onclick="return confirm('Seguro que desea Eliminar la Experiencia Laboral')" data-id="{{ $id_work }}" >Eliminar Experiencia</button></div>
			</div>
	
            <div>
                <strong>Empresa:</strong>
                <input type="text"  name="company[]" value="{{ $company}}" class="form-control" placeholder="Empresa" required><input type="hidden" name="desc_num[]" value="0" class="form-control"/><input type="hidden"  name="id_experience[]" class="form-control idex" value="{{ $id_work}}" >
			<br>		
            </div> 
			<div class="row exp1">			
				<div class="col-md-5">
					<strong>Inicio:</strong>
					<input type="month"  name="inicio_work[]" class="form-control" placeholder="" value="{{ Carbon\Carbon::parse( $w_inicio)->format('Y-m') }}"  required>
				<br>		
				</div>            
				<div class="col-md-5">
					<strong>Fin:</strong>
					<input type="month"  name="fin_work[]" class="form-control" placeholder="Description" value="{{ Carbon\Carbon::parse( $w_fin)->format('Y-m') }}"  required>
						
				</div>
				<div class="col-md-2" style="display: flex; align-items: center;">
					<input type="text"  name="actual_work[]" value="2" class="form-control d-none" >
					<input class="form-check-input actual_we" type="checkbox" value="2" id="act_w" style="-webkit-appearance:checkbox;" name="actual_wor[]">
					<label class="form-check-label" for="act_w">
					Actualidad
					</label>	
				</div><br>
            </div>
			<div class="col-xl-12 col-md-12 col-md-12 text-center" style="margin-top: 25px;">
			<button type="button" name="add-cargo-ed" id="add-cargo-ed" class="btn btn-success">Agregar Cargo</button>			
            </div> 


	<?php
		$work_exp_id=$work_exp[$cont1]['id'];
		$cont = 0;
			while ($cont < $cp){
				if($cont === $cont1){
				$z = count($position[$cont]);
				$cargo = $position[$cont];
				foreach($cargo as $cg){
						
					$p_id = $cg->id;
					$p_name = $cg->position_name;
					$p_desc = $cg->description;
					$p_inicio = $cg->inicio;
					$p_fin = $cg->fin;
						
	?>

	<br>

	
	<div class="cargodiv">
		<div class="row">
			<div class="col-md-6"><strong>Cargo</strong></div><div class="col-md-6 text-right"><button class="btn btn-danger deleteCargo" onclick="return confirm('Seguro que desea Eliminar el cargo')" data-id="{{ $p_id }}" >Eliminar Cargo</button></div>
		</div>
			
            <div class="">
                <strong>Nombre del Cargo:</strong>
				<input type="hidden" name="num_desc[]"   value="0" class="form-control"/>
                <input type="text"  name="position[]" value="{{ $p_name}}" class="form-control" required>	
				<input type="hidden"  name="id_position[]" class="form-control" value="{{ $p_id}}" >		
			<br>		
            </div> 
			<div class="row carg1" >			
				<div class="col-md-5">
					<strong>Desde:</strong>
					<input type="month"  name="inicio_p[]" class="form-control" value="{{ Carbon\Carbon::parse( $p_inicio)->format('Y-m') }}" required>
				<br>		
				</div>            
				<div class="col-md-5">
					<strong>Hasta:</strong>
					<input type="month"  name="fin_p[]" class="form-control" value="{{ Carbon\Carbon::parse( $p_fin)->format('Y-m') }}" required>
						
				</div>
				<div class="col-md-2" style="display: flex; align-items: center;">
					<input type="text"  name="actual_p[]" value="2" class="form-control d-none" >
					<input class="form-check-input actual_ca" type="checkbox"  id="act_c" style="-webkit-appearance:checkbox;" name="actual_po[]">
					<label class="form-check-label" for="act_p">
					Actualidad
					</label>	
				</div><br>
            </div>
			<div class="">
                <strong>Descripción del Cargo:</strong>
                <input type="text"  name="description_p[]" class="form-control" value="{{ $p_desc}}" required>
			<br>		
            </div> 
		
	</div><!--fin div de cada cargo-->	
		<br>
		
		 
		<?php
						
					
					}
				}
			
				
				$cont=$cont+1;
			}
		$cont1=$cont1+1;
	?>
		<div class="div-carg-e"></div>
		
		</div><!-- fin exp-car--->
		
		
	<?php
	}
	
	?>
	

	
	<div class="div-exp-n"></div>
	
	
	
	
				
			
		
		  @if($habs_persona)
			  <div style="text-align:center" ><h3><strong >Habilidades</strong ></h3></div>
				
				<div class="habi">
					<div class="">
						<div class="col-md-12 text-center">
							<button type="button" name="add-hab-ed" id="add-hab-ed" class="btn btn-success">Agregar Habilidad</button>
						</div>
				@foreach ($habs_persona as $itemb)
						<div class="">
							<div class="row habildiv">
								<div class="col-md-6">
									<strong>Habilidad:</strong>
									<input type="hidden"  name="id_habilidad[]" class="form-control" value="{{ $itemb->id}}" >
									<select class ="form-control" name="skill_id[]" id="skill_id">						
										<option value="{{ $itemb->skill_id }}" selected>  {{ $itemb->skill->habilidad }}</option>
										
										@foreach ($skills as $sk) 
											@if($sk->id != $itemb->skill_id)
											<option value="{{$sk->id}}">
											 {{ $sk->habilidad}}
											</option>
											@endif
										@endforeach
									</select>
								</div>
								<div class="col-md-4"><strong>Nivel:</strong>
									<select name="medida[]" id="medida" class="form-control">
									
										<option value="{{ $itemb->medida }}" selected>  {{ $itemb->medida }}</option>
										
										<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
									</select>
								</div>
								<div class="col-md-2" style="text-align: end;">
									<button style="margin-top: 24px;" class="btn btn-danger deleteHabilidad" onclick="return confirm('Seguro que desea Eliminar esta Habilidad')" data-id="{{ $itemb->id }}" ><img src="{{URL::asset('/img/logo/delete.png')}}" alt="PDF" height="15" width="auto" height="20"></button>
								</div>
							</div>
						</div><br>
				@endforeach
			</div>
		</div>
					
				<div id="div-habil-ed"></div>
			  	
		  @endif 
		  
		  @if($idiomas)
			<div style="text-align:center" ><h3><strong >Idiomas</strong ></h3></div>
		  
			<div class="idi">
				<div class="">
					<div class="col-md-12 text-center">
						<button type="button" name="add-id-ed" id="add-id-ed" class="btn btn-success">Agregar Idioma</button>
					</div>

				@foreach ($idiomas as $idioma)
					<div class="">
						<div class="row idiodiv">
							<div class="col-md-6">
								<strong>Idioma:</strong>
									<input type="hidden"  name="id_idioma[]" class="form-control" value="{{ $idioma->id}}" >
									<select class ="form-control" name="language_id[]" id="language_id">						
										<option value="{{ $idioma->language_id }}" selected>  {{ $idioma->language->name_language }}</option>
										
										@foreach ($idio as $idm) 
											@if($idm->id != $idioma->language_id)
											<option value="{{$idm->id}}">
											 {{ $idm->name_language}}
											</option>
											@endif
										@endforeach
									</select>
									
							</div>
							<div class="col-md-4">
								<strong>Nivel:</strong>
								<select name="level[]" id="level" class="form-control">
									<option value="{{ $idioma->level }}" selected>  {{ $idioma->level }}</option>
									
									<option value="Básico">Básico</option><option value="Intermedio">Intermedio</option><option value="Avanzado">Avanzado</option><option value="Bilingue">Bilingue</option></select>
							</div>
							<div class="col-md-2" style="text-align: end;">
								<button style="margin-top: 24px;" class="btn btn-danger deleteIdioma" onclick="return confirm('Seguro que desea Eliminar el Idioma')" data-id="{{ $idioma->id }}" ><img src="{{URL::asset('/img/logo/delete.png')}}" alt="PDF" height="15" width="auto" height="20"></button>
							</div>
						</div>
					</div><br>

				@endforeach
				</div>
			</div>
				<div id="div-idioma-ed"></div>	
			   	
		  @endif	
		  
		  @if($referencias)
			 <div style="text-align:center" ><h3><strong >Referencias Personales</strong ></h3></div>
		 
				@foreach ($referencias as $referencia)

					<div class="ref">
						<div class="refediv">
							<div class="col-md-12 text-center">
								<button type="button" name="add-ref-ed" id="add-ref-ed" class="btn btn-success">Agregar Referencia</button>
							</div>
							<div class="">
								<div class="row">
									<div class="col-md-6">
									<input type="hidden"  name="id_ref[]" class="form-control" value="{{ $referencia->id}}" >
										<strong>Nombre Persona de Referencia:</strong>
										<input name="nombre_ref[]" id="nombre_ref" class="form-control" value="{{ $referencia->nombre }}">
									</div>
									<div class="col-md-4">
										<strong>Teléfono:</strong>
										<input name="telefono_ref[]" id="telefono_ref" class="form-control" value="{{ $referencia->telefono }}">
									</div>
									<div class="col-md-2" style="text-align: end;">
										<button style="margin-top: 24px;" class="btn btn-danger deleteReferencia" onclick="return confirm('Seguro que desea Eliminar esta referencia')" data-id="{{ $referencia->id }}" ><img src="{{URL::asset('/img/logo/delete.png')}}" alt="PDF" height="15" width="auto" height="20"></button>
									</div>
								</div>
							</div>
						</div>
					   </div><br>
				@endforeach
				<div id="div-refer-ed"></div>
			   	
		  @endif	




	</div><!-- fin lg-12--->

</div><!-- row --->
  
			<br>

            <div class="col-xl-10 col-lg-10 col-sm-8 col-md-8" >
              <button type="submit" class="btn btn-primary" onclick="ActivarCampoOtroTema();">Guardar</button>
            </div>
			
			<div id="OtroTema" style="display:none;" class="whole-page-overlay">
			  <img class="mx-auto d-block"  style="height: 100px; position: absolute; margin-top: -155px; padding-left: 40%;" src="{{URL::asset('/img/loader/Spinner-1s-200px.gif')}}"/>
			</div>
	</form>

</div>
</div>

@endsection