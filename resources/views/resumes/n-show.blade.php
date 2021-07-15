@extends('base')
@section('scripts')
<style>

.table td {
    border-top: 0px !important;
    padding: 0px !important;
}

body{ /*	Modificación del fondo	*/
	background-color: #d9e5f1;
}
</style>


@stop
@section('main')


<div class="container" style="background:white">
	<!--header-->
	<div class="row header" style="background:#0c1458; height:100px; text-align:center">
		<div class="col-md-4">
			<img src="{{ asset('storage'). '/'.$personalInformation->photo}}" class="profile" style="width: 160px; height: 160px; border-radius: 80px; margin-top:10px;">
		</div>
		<div class="col-md-8" style="display: flex; align-items: center; justify-content: center;color:white; padding-bottom:60px">
			<div>
				<h2>{{ $personalInformation->first_name }} {{ $personalInformation->last_name }}</h2>
			</div>
		</div>
	</div>
	<!--fin header-->
	<!--contenido-->
	
	<div class="row contenido" style="color: #212529;">	{{-- Color de letras --}}
	<!--izquierda-->
		<div class="col-md-6" style="padding-top:80px; padding-left: 40px;">
			<div id="object1" style="padding: 20px; text-align: justify;">
				 <div><h2><strong >Datos de Contacto</strong ></h2></div>
				 <div class="phone">Teléfono</div>
				 <div>{{ $personalInformation->telephone }}</div>
				 <div class="email">Email</div>
				 <div>{{$user->email}}</div>
				 <div class="home">Domicilio</div>
				 <div>{{ $personalInformation->address }}</div>
				 <div>{{ $personalInformation->pais }}</div>
					<br>
					
				@if ( $personalInformation->facebook  ||  $personalInformation->dribbble ||  $personalInformation->twitter ||  $personalInformation->instagram  ||  $personalInformation->linkedin )	
				 <div><h2 style=""><strong >Redes Sociales</strong ></h2></div>
				 <div>{{ $personalInformation->facebook }}</div>
				 <div>{{ $personalInformation->dribbble }}</div>
				 <div>{{ $personalInformation->twitter }}</div>
				 <div>{{ $personalInformation->instagram }}</div>
				 <div>{{ $personalInformation->linkedin }}</div>
				 <br>
				@endif
				
			</div>
			
			<div style="padding: 20px;"><h2><strong >Habilidades</strong ></h2></div>
		
				@foreach ($habs_persona as $item) 
			
						<div class="row" style="padding: 20px;">
							
								<div class="col-md-5" style="text-transform:Uppercase">
									{{ $item->skill->habilidad }}
								</div>
								<div class="col-md-5">
									@if($item->medida==1)	<img  src="{{URL::asset('/img/nivel2.png')}}" style="height: 20px; width:150px"> @endif
									@if($item->medida==2)	<img  src="{{URL::asset('/img/nivel4.png')}}" style="height: 20px; width:150px"> @endif
									@if($item->medida==3)	<img  src="{{URL::asset('/img/nivel6.png')}}" style="height: 20px; width:150px"> @endif
									@if($item->medida==4)	<img  src="{{URL::asset('/img/nivel8.png')}}" style="height: 20px; width:150px"> @endif
									@if($item->medida==5)	<img  src="{{URL::asset('/img/nivel10.png')}}" style="height: 20px; width:150px"> @endif
									
								</div>
						</div>						
					
				
				@endforeach	
				<br>
				<div style="padding: 20px;"><h2><strong >Idiomas</strong ></h2></div>
					
				@foreach ($idiomas as $idioma) 
				
				<div class="row" style="padding: 20px;">
							
					<div class="col-md-5" style="text-transform:Uppercase">
						{{ $idioma->language->name_language }}
					</div>
					<div class="col-md-5">
						<b>{{ $idioma->level }}</b>
					</div>
				
				</div>
				@endforeach	
		
		
			@if ( $referencias )
				<div style="padding: 20px;"><h2><strong >Referencias Personales</strong ></h2></div> 
				
				@foreach ($referencias as $referencia) 
				<div class="row" style="padding: 20px;">
					<div class="col-md-5" style="text-transform:Uppercase">
						{{ $referencia->nombre }}
					</div>
					<div class="col-md-5">
						{{ $referencia->telefono }}
					</div>
				</div>
				@endforeach
				
			@endif	
			<br>
	</div>	
		
		<!--derecha-->
		<div class="col-md-6" style="background:#E0FDFF; padding-left: 40px;">
			<div id="object3" style="padding:20px"> 
			@if ( $personalInformation->presentation )
				<div><h2><strong >Sobre Mi</strong ></h2></div>
					<div class="sobre_mi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! $personalInformation->presentation !!}</div><br>
			@endif
				<div><h2><strong >Estudios</strong ></h2></div>
		
				<?php foreach ($formations as $formation){ ?>
				<table width="100%" border="0" style="padding-left: 24px; padding-right: 20px;">
				  <tr>
					<td colspan="2" ><strong >Instituto: </strong>{{ $formation->instituto_name }} </td>
				  </tr>
				  <tr>
					<td>Desde: {{ Carbon\Carbon::parse( $formation->inicio)->format('Y-m') }}
					</td>
					<td>Hasta: {{ Carbon\Carbon::parse( $formation->fin)->format('Y-m') }}</td>
				  </tr>			  
				  <tr>
					<td colspan="2">Culminado: @if($formation->culminado==1) Si @else No @endif
					</td>
				  </tr>  
				  <tr>
					<td colspan="2">Título Obtenido: {{ $formation->titulo_obtenido }}</td>
				  </tr>
				</table>
				<br>
				<?php } ?>
		
			<div><h2><strong >Experiencia Laboral</strong ></h2></div>
				<?php
	
				$cwe=count($work_exp);
				$cp=count($position);
				
				$cont1=0;
				while ($cont1 < $cwe){
					
					$company = $work_exp[$cont1]['company'];
					$w_inicio = $work_exp[$cont1]['inicio'];
					$w_fin = $work_exp[$cont1]['fin'];
					$w_actu = $work_exp[$cont1]['actualidad'];
				?>

			<h4 style=" margin-top:15px;"><strong>Datos de la Empresa</strong ></h4><br>	
			
			<table class="table" style="width:100%; padding-top:-30px; page-break-inside: avoid;" border="0">		
				<tr>
					<td class="company" colspan="2"><strong> Nombre de la Empresa: </strong> {{ $company}}</td>
				</tr>
				<tr>
					<td>Desde: {{ Carbon\Carbon::parse($w_inicio)->format('m-Y') }} </td>
					
					@if($w_actu == 1)
					
					<td>Hasta: Actualidad</td>
					
					@else
						
					<td>Hasta: {{ Carbon\Carbon::parse($w_fin)->format('m-Y') }}</td> 
					
					@endif
				</tr>		
			</table>
	
			<?php

				$work_exp_id=$work_exp[$cont1]['id'];
				$cont = 0;
					while ($cont < $cp){
						if($cont === $cont1){

						$z = count($position[$cont]);
						$cargo = $position[$cont];
						
							foreach($cargo as $cg){
								
								$p_name = $cg->position_name;
								$p_desc = $cg->description;
								$p_inicio = $cg->inicio;
								$p_fin = $cg->fin;
								$p_actu = $cg->actualidad;
								
			?>
				
			<h5><strong>Cargo</strong ></h5>
			<table  style=" width:100%; padding-left: 24px; padding-right: 20px; page-break-inside: avoid;" >
			  <tr>
				<td class="company" colspan="2">Nombre del Cargo: {{ $p_name}}</td>
			  </tr>
			  <tr>
				<td>Desde: {{ Carbon\Carbon::parse($p_inicio)->format('m-Y' )}}</td>
					
					@if($p_actu == 1)
					
					<td>Hasta: Actualidad</td>
					
					@else
						
					<td>Hasta: {{ Carbon\Carbon::parse($p_fin)->format('m-Y') }}</td>
					
					@endif
					
			  </tr>
			  <tr>
				<td colspan="2">Descripción del Cargo: {{ $p_desc}}</td>
			  </tr>  
			</table>
			<br>

			<?php
					}
				}
			
					echo "<br>";
					$cont=$cont+1;
				}
			$cont1=$cont1+1;
		}
		
		?>	


		  
			</div>
		</div>
	</div>
	<!--fin contenido---->
</div>



</div><!-- Container -->

@endsection