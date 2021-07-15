@extends('layouts.mm2')
@extends('letras')
@section('scripts')
	<style>
.modal-dialog{
		padding-top: 50px !important;
	}
input[type="file"]{
	font-size:smaller;
	    padding: 4px 0px !important;
}
</style>

<script src="{{ asset('js/tab.js') }}" defer></script>
<script>
	$('document').ready(function(){
		 
		 $('select').on('change', function() {
			 $(this).css('font-family', this.value );
		 });
	});
</script>

@stop

@section('content')

<div class="container" id="banner">
	   
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
	   

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-right text-right">
				<a class="btn btn-primary button" href="{{ route('menus.index') }}"> Regresar</a>
			</div>
		</div>
	</div>


	<form action="{{ route('menus.update',$menu->id) }}" method="POST" enctype="multipart/form-data">

		 @csrf
		@method('PUT')
		{{ method_field('PATCH') }}
		
		<?php 
			$arr = ['calc(0.7rem + 1vw)','calc(1rem + 1vw)','calc(1.5rem + 2vw)','calc(2.5rem + 3vw)'];  
		?>
					
					
<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">

				
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
	 <h4>Informacion Constante de su Restaurant <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modpag1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></h4>
	</div>

						<!-- The Modal -->
							<div class="modal" id="modpag1">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Distribución del Contenido</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									En esta area debe ingresar informacion constante de su menu, como direccion, simbolo o embrema de su empresa, y los estilos, colores y fuentes.
									
								  </div>
								</div>
							  </div>
							</div>
		</div>
</div>

		<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">
					<div style="font-size: large; text-align:center;">Ingrese Logo <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="modcar1">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Imagen representativa del Restaurant</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									En esta area recomendamos que ingrese el logo de su Restaurante o Negocio.
								  </div>
								</div>
							  </div>
							</div>
					<div class="form-group">
						<img src="{{ asset('storage'). '/'.$menu->logo}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">
						<input type="file" name="logo" class="form-control" >
				    </div>
				</div>


				<div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">
				<div style="font-size: large; text-align:center;">Ingrese el Fondo de su Menú <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod2" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="mod2">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Use dimenciones Rectangulares Posicionada verticalmente</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									La imagen que seleccione acá sera el fondo de su menu, recomendamos utilice imagenes rectangulares posicionadas verticalmente
								  </div>
								</div>
							  </div>
							</div>
					<div class="form-group">
						<img src="{{ asset('storage'). '/'.$menu->fondo}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">
						<input type="file" name="fondo" class="form-control" >
					</div>
				</div>

	</div>


	<div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nombre del Restaurant:</strong>
						<input type="text" maxlength="218" name="restaurant" class="form-control" value="{{ $menu->restaurant }}">
					</div>
				</div>
					
					


				 <div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">
						<strong>Tamaño de Fuente Nombre del Restaurant</strong>
					<select class="form-control" name="sze_font_rest" id="sze_font_rest">
					
						<option value="{{ $menu->sze_font_rest }}" selected='selected'> 
							@if($menu->sze_font_rest== 'calc(0.7rem + 1vw)') Pequeño @elseif($menu->sze_font_rest== 'calc(1rem + 1vw)') Mediano @elseif($menu->sze_font_rest== 'calc(1.5rem + 2vw)') Grande @elseif($menu->sze_font_rest== 'calc(2.5rem + 3vw)') Enorme @endif
						</option>
					
						@foreach($arr as $letra)
							@if($menu->sze_font_rest === $letra)
							@else									
							<option value="{{ $letra }}" > 
								@if($letra== 'calc(0.7rem + 1vw)') Pequeño @elseif($letra== 'calc(1rem + 1vw)') Mediano @elseif($letra== 'calc(1.5rem + 2vw)') Grande @elseif($letra== 'calc(2.5rem + 3vw)') Enorme @endif
							</option>
							@endif
							
						@endforeach

					</select>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">
						<strong>Color de Fuente Titulo/Restaurant</strong>
					<input type="color" name="color_font_rest" class="form-control" value="{{ $menu->color_font_rest }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">
							<strong>Fuente Titulo/Restaurant</strong>
						<select class="form-control" name="letra_font_rest" id="letra_font_rest" style="font-family:{{ $menu->letra_font_rest }}">
						<option value="{{ $menu->letra_font_rest }}" style="font-family:{{ $menu->letra_font_rest }}" selected>{{ $menu->letra_font_rest }}</option>
						
							<option value="Sofia" style="font-family:Sofia">Sofia</option>
							<option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
							<option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
							<option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
							<option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
							<option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
							<option value="Carter One" style="font-family:Carter One">Carter One</option>
							<option value="Courgette" style="font-family:Courgette">Courgette</option>
							<option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
							<option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
							<option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
							<option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
							<option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
							<option value="Handlee" style="font-family:Handlee">Handlee</option>
							<option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
							<option value="Flavors" style="font-family:Flavors">Flavors</option>
							<option value="Ultra" style="font-family:Ultra">Ultra</option>
							<option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
							<option value="Allura" style="font-family:Allura">Allura</option>
						</select>
					</div>
				</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Dirección y Teléfono:</strong>
			 <textarea class="form-control" name="address" rows="3"> {{ $menu->address}} </textarea>
			</div>
		</div>
	</div>		
	
	

	
	<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">
						<strong>Tamaño de Fuente de Dirección:</strong>
					<select class="form-control" name="sze_font_add" id="sze_font_add">
					
						<option value="{{ $menu->sze_font_add }}" selected='selected'> 
							@if($menu->sze_font_add== 'calc(0.7rem + 1vw)') Pequeño @elseif($menu->sze_font_add== 'calc(1rem + 1vw)') Mediano @elseif($menu->sze_font_add== 'calc(1.5rem + 2vw)') Grande @elseif($menu->sze_font_add== 'calc(2.5rem + 3vw)') Enorme @endif
						</option>
					
						@foreach($arr as $letra)
							@if($menu->sze_font_add === $letra)
							@else									
							<option value="{{ $letra }}" > 
								@if($letra== 'calc(0.7rem + 1vw)') Pequeño @elseif($letra== 'calc(1rem + 1vw)') Mediano @elseif($letra== 'calc(1.5rem + 2vw)') Grande @elseif($letra== 'calc(2.5rem + 3vw)') Enorme @endif
							</option>
							@endif
							
						@endforeach
						
					</select>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">
						<strong>Color de Fuente de Dirección:</strong>
					<input type="color" name="color_font_add" class="form-control" value="{{ $menu->color_font_add }}">
					</div>
				</div>
				
				 <div class="col-xs-12 col-sm-12 col-md-4">
					
					<div class="form-group">
						<strong>Fuente de la Dirección:</strong>
					<select class="form-control" name="letra_font_add" id="letra_font_add" style="font-family:{{ $menu->letra_font_add }}">
							<option value="{{ $menu->letra_font_add }}" style="font-family:{{ $menu->letra_font_add }}" selected>{{ $menu->letra_font_add }}</option>
							
							<option value="Sofia" style="font-family:Sofia">Sofia</option>
							<option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
							<option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
							<option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
							<option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
							<option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
							<option value="Carter One" style="font-family:Carter One">Carter One</option>
							<option value="Courgette" style="font-family:Courgette">Courgette</option>
							<option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
							<option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
							<option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
							<option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
							<option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
							<option value="Handlee" style="font-family:Handlee">Handlee</option>
							<option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
							<option value="Flavors" style="font-family:Flavors">Flavors</option>
							<option value="Ultra" style="font-family:Ultra">Ultra</option>
							<option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
							<option value="Allura" style="font-family:Allura">Allura</option>
					</select>
					</div>
				</div>
				
	</div>
	



<div class="row" style="padding-bottom: 45px; padding-top: 45px;">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
	 <h4>Estilos, colores y tamaños de las fuentes de los Platos. <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#plato" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></h4>
	</div>
						<!-- The Modal -->
							<div class="modal" id="plato">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Estilos de fuente del contenido del plato</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
							En esta área usted podrá editar los estilos de las fuentes del contenido del plato, tales como color, tamaño y tipo de fuente separando el titulo del plato, precio, y resumen del mismo. 
							
								  </div>
								</div>
							  </div>
							</div>
</div>

		<div class="row">
			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
				<strong>Tamaño de letra del nombre del plato:</strong>
				
					<select class="form-control" name="size_font_title" id="size_font_title">
					
						<option value="{{ $menu->size_font_title }}" selected='selected'> 
							@if($menu->size_font_title== 'calc(0.7rem + 1vw)') Pequeño @elseif($menu->size_font_title== 'calc(1rem + 1vw)') Mediano @elseif($menu->size_font_title== 'calc(1.5rem + 2vw)') Grande @elseif($menu->size_font_title== 'calc(2.5rem + 3vw)') Enorme @endif
						</option>
					
						@foreach($arr as $letra)
							@if($menu->size_font_title === $letra)
							@else									
							<option value="{{ $letra }}" > 
								@if($letra== 'calc(0.7rem + 1vw)') Pequeño @elseif($letra== 'calc(1rem + 1vw)') Mediano @elseif($letra== 'calc(1.5rem + 2vw)') Grande @elseif($letra== 'calc(2.5rem + 3vw)') Enorme @endif
							</option>
							@endif
							
						@endforeach
						
			
					</select>
				</div>
				
			</div>
			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
				<strong>Tamaño de letra de la descripción:</strong>
					<select class="form-control" name="size_font_descr" id="size_font_descr">
					
						<option value="{{ $menu->size_font_descr }}" selected='selected'> 
							@if($menu->size_font_descr== 'calc(0.7rem + 1vw)') Pequeño @elseif($menu->size_font_descr== 'calc(1rem + 1vw)') Mediano @elseif($menu->size_font_descr== 'calc(1.5rem + 2vw)') Grande @elseif($menu->size_font_descr== 'calc(2.5rem + 3vw)') Enorme @endif
						</option>
					
						@foreach($arr as $letra)
							@if($menu->size_font_descr === $letra)
							@else									
							<option value="{{ $letra }}" > 
								@if($letra== 'calc(0.7rem + 1vw)') Pequeño @elseif($letra== 'calc(1rem + 1vw)') Mediano @elseif($letra== 'calc(1.5rem + 2vw)') Grande @elseif($letra== 'calc(2.5rem + 3vw)') Enorme @endif
							</option>
							@endif
							
						@endforeach

					</select>
				</div>
				
			</div>
		
		    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
				<strong>Tamaño de letra del precio:</strong>
				
				<select class="form-control" name="size_font_price" id="size_font_price">
				
						<option value="{{ $menu->size_font_price }}" selected='selected'> 
							@if($menu->size_font_price== 'calc(0.7rem + 1vw)') Pequeño @elseif($menu->size_font_price== 'calc(1rem + 1vw)') Mediano @elseif($menu->size_font_price== 'calc(1.5rem + 2vw)') Grande @elseif($menu->size_font_price== 'calc(2.5rem + 3vw)') Enorme @endif
						</option>
					
						@foreach($arr as $letra)
							@if($menu->size_font_price === $letra)
							@else									
							<option value="{{ $letra }}" > 
								@if($letra== 'calc(0.7rem + 1vw)') Pequeño @elseif($letra== 'calc(1rem + 1vw)') Mediano @elseif($letra== 'calc(1.5rem + 2vw)') Grande @elseif($letra== 'calc(2.5rem + 3vw)') Enorme @endif
							</option>
							@endif
							
						@endforeach

				
					</select>
				</div>
				
			</div>
		
		
		</div>
		
		
		
		<div class="row">
			 <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
				<strong>Color de letra del Nombre del Plato:</strong>
					<input type="color" name="color_font_title" class="form-control" value="{{ $menu->color_font_title}}">
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
				<strong>Color de letras descripción:</strong>
					<input type="color" name="color_font_descr" class="form-control" value="{{ $menu->color_font_descr}}">
				</div>
				
			</div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
				<strong>Color de fuente del Precio:</strong>
					<input type="color" name="color_font_price" class="form-control" value="{{ $menu->color_font_price}}">
				</div>
			</div>
		</div>
		

		<div class="row">
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
				<strong>Tipo de Letra del Nombre Plato:</strong>
					
					<select class="form-control" name="letra_title" style="font-family:{{ $menu->letra_title}}">
					
					    <option value="{{ $menu->letra_title}}" style="font-family:{{ $menu->letra_title}}" selected > {{ $menu->letra_title}}</option> 
						
						<option value="Sofia" style="font-family:Sofia">Sofia</option>
						<option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
						<option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
						<option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
						<option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
						<option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
						<option value="Carter One" style="font-family:Carter One">Carter One</option>
						<option value="Courgette" style="font-family:Courgette">Courgette</option>
						<option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
						<option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
						<option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
						<option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
						<option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
						<option value="Handlee" style="font-family:Handlee">Handlee</option>
						<option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
						<option value="Flavors" style="font-family:Flavors">Flavors</option>
						<option value="Ultra" style="font-family:Ultra">Ultra</option>
						<option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
						<option value="Allura" style="font-family:Allura">Allura</option>
					</select>
				</div>
				
			</div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
				<strong>Tipo de letra de la descripción:</strong>
					
					<select class="form-control" name="letra_descr" style="font-family:{{ $menu->letra_descr}}">
					
						<option value="{{ $menu->letra_descr}}" style="font-family:{{ $menu->letra_descr}}" selected > {{ $menu->letra_descr}}</option> 
											
											
					    <option value="Sofia" style="font-family:Sofia">Sofia</option>
						<option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
						<option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
						<option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
						<option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
						<option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
						<option value="Carter One" style="font-family:Carter One">Carter One</option>
						<option value="Courgette" style="font-family:Courgette">Courgette</option>
						<option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
						<option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
						<option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
						<option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
						<option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
						<option value="Handlee" style="font-family:Handlee">Handlee</option>
						<option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
						<option value="Flavors" style="font-family:Flavors">Flavors</option>
						<option value="Ultra" style="font-family:Ultra">Ultra</option>
						<option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
						<option value="Allura" style="font-family:Allura">Allura</option>
					</select>
					
				</div>
				
			</div>
			
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
				<div class="form-group">
				<strong>Tipo de fuente del precio:</strong>
					<select class="form-control" name="letra_price" style="font-family:{{ $menu->letra_price}}">
					
						<option value="{{ $menu->letra_price}}" style="font-family:{{ $menu->letra_price}}" selected > {{ $menu->letra_price}}</option> 
						
					    <option value="Sofia" style="font-family:Sofia">Sofia</option>
						<option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
						<option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
						<option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
						<option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
						<option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
						<option value="Carter One" style="font-family:Carter One">Carter One</option>
						<option value="Courgette" style="font-family:Courgette">Courgette</option>
						<option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
						<option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
						<option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
						<option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
						<option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
						<option value="Handlee" style="font-family:Handlee">Handlee</option>
						<option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
						<option value="Flavors" style="font-family:Flavors">Flavors</option>
						<option value="Ultra" style="font-family:Ultra">Ultra</option>
						<option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
						<option value="Allura" style="font-family:Allura">Allura</option>
					</select>
					
				</div>
				
			</div>
			
		</div>
		
	<div class="row" style="padding-bottom: 25px; padding-top: 45px;">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
			<h4>Ingrese los platillos ofrecidos en su Restaurant</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<button type="button" name="add-plato" id="add-plato-ed" class="btn btn-success">Agregar Plato</button>
		</div>
	</div>
	<br>
	
	<div class="row">
	@if($platos)
		@foreach ($platos as $plato)
		<div class="col-12 platillo-ex">
			<div class="col-md-12 text-center"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger remov-ex" data-id="{{ $plato->id }}" onclick="return confirm('Seguro que desea Eliminar este Plato permanentemente')">Eliminar Plato</button></div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6">
					<div class="form-group">
					<strong>Título:</strong>
						<input type="text" name="title_ex[]" class="form-control" value="{{ $plato->title }}">
						<input type="hidden" class="form-control" name="id_plato[]" value="{{ $plato->id }}">
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6">
					<div class="form-group">
					<strong>Categoría:</strong>
						<select class="form-control" name="category_id_ex[]">
							<option value="{{ $plato->category_id }}" selected>
								{{ $plato->category->categ_name }}
							</option>
							@foreach($categorias as $categoria)
								@if(($plato->category_id) != ($categoria->id))
								<option value="{{ $categoria->id }}">
									{{ $categoria->categ_name }}
								</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>	
				<div class="col-12 col-sm-12 col-md-12">
					<div class="form-group">
					<strong>Descripción:</strong>
						<textarea type="text" name="description_ex[]" class="form-control"  maxlength="256">{{ $plato->description }}</textarea>
					</div>		
				</div>
				<div class="col-12 col-sm-12 col-md-3">
					<div class="form-group">
					<strong>Precio:</strong>
						<input type="text" name="price_ex[]" class="form-control" value="{{ $plato->price }}">
					</div>
				</div>

			<div class="col-12 col-sm-12 col-md-3">
				<div class="form-group">
					<strong >Disponibilidad:</strong>
					    <select class ="form-control" id="" name="status_id_ex[]">	
							<option value="{{ $plato->status_id }}" selected>  @if($plato->status_id==1) Si @else No @endif</option>
							@if($plato->status_id==1)
							<option value="2">No</option>
							   @else
							<option value="1">Si</option>
						   @endif
						</select>
				</div>
			</div>

				<div class="col-12 col-sm-12 col-md-6">
					<div class="form-group">
					  <strong>Foto:</strong>
						<img src="{{ asset('storage'). '/'.$plato->photo1}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">
						<input type="file" name="photo1_ex[]" class="form-control" >
					</div>
				</div>
			</div>
		</div>
		@endforeach
	@endif
		
		<div class="col-12 col-sm-12 col-md-12">
			<div class="form-group">   
					 <div id="div-platos"></div>
			</div>
		</div>
	</div>
	


	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<button type="submit" class="btn btn-primary button">Guardar</button>
	</div>
</form>



 </div><!--banner-->
 


@endsection