@extends('menu')

@section('scripts')
	 <!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/style/menu.css') }}" rel="stylesheet">
	    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stop


@section('main')

<div class="container-fluid">

	<div>
		@if($menu->fondo)
			<div class="bg" style="background-image:url('{{ asset('storage'). '/'.$menu->fondo}}');">
		@else
			<div class="bg">
		@endif
		<div class="row" style="text-align: center;" >
			<div class="col-md-12">
				<p style="text-align: center; font-weight: bold; font-family: {{ $menu->letra_font_rest }}; color: {{ $menu->color_font_rest }}; font-size: {{ $menu->sze_font_rest }}">{{ $menu->restaurant }} <img class="img-fluid" src="{{ asset('storage'). '/'.$menu->logo }}"  width="75"></p>
			</div>
		</div>
		
		@foreach ($categorias as $cat) 
			<div class="row" style="text-align: center;" >
				<div class="col-md-12">
					<p style="text-align: center; font-weight: bold; font-family: {{ $menu->letra_title }}; color: {{ $menu->color_font_title}}; font-size: {{ $menu->size_font_title }}">{{ $cat->categ_name }} </p>
				</div>
			</div>
		

			<?php $idx = 1; ?>

			@foreach ($platos as $item) 
			
				@if(($cat->id) == ($item->category_id))
					<?php 
						$idx++; 
					
						if($idx%2 == 0){
						
					?>
					
						<div class="row item" >

							<div class="col-md-3">
								<img class="img-fluid" src="{{ asset('storage'). '/'.$item->photo1 }}" >
							</div>
							<div class="col-md-6" >
								<div class="col-md-12 title" style="text-align: center; font-weight: bold; font-family: {{ $menu->letra_title }}; color: {{ $menu->color_font_title }}; font-size: {{ $menu->size_font_title }}">
									{{ $item->title }}
								</div>
								<div class="col-md-12" style="text-align: center; font-weight: bold; font-family: {{ $menu->letra_descr }}; color: {{ $menu->color_font_descr }}; font-size: {{ $menu->size_font_descr }}">
									{{ $item->description }}
								</div>	
							</div>
							<div class="col-md-3 precio" style="text-transform:Uppercase; text-align: center; font-weight: bold; font-family: {{ $menu->letra_price }}; color: {{ $menu->color_font_price }}; font-size: {{ $menu->size_font_price }}">
								{{ $item->price }}
							</div>
							
							<div class="product-overlay" >
								<p style="position:relative; top:50%;">
									{{ $item->title }}
								</p>
							</div>
						</div>	
						
					<?php 
					
						}else{
							
					?>
					
						<div class="row item" >
							
							<div class="col-md-3 precio" style="text-transform:Uppercase; text-align: center; font-weight: bold; font-family: {{ $menu->letra_price }}; color: {{ $menu->color_font_price }}; font-size: {{ $menu->size_font_price }}">
								{{ $item->price }}
							</div>
							<div class="col-md-6" >
								<div class="col-md-12 title" style="text-align: center; font-weight: bold; font-family: {{ $menu->letra_title }}; color: {{ $menu->color_font_title }}; font-size: {{ $menu->size_font_title }}">
									{{ $item->title }}
								</div>
								<div class="col-md-12" style="text-align: center; font-weight: bold; font-family: {{ $menu->letra_descr }}; color: {{ $menu->color_font_descr }}; font-size: {{ $menu->size_font_descr }}">
									{{ $item->description }}
								</div>	
								
							</div>

							<div class="col-md-3">
								<img class="img-fluid" src="{{ asset('storage'). '/'.$item->photo1 }}" >
							</div>
							
							<div class="product-overlay" >							
								<p style="position:relative; top:50%;">
									{{ $item->title }}
								</p>
							</div>
							

						</div>
					
					<?php 
			
						}
					?>
					
			
				@endif

			@endforeach
		
		
		@endforeach
		
	
		
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6" style="text-align: right;  font-weight: bold; font-family: {{ $menu->letra_font_add }}; color: {{ $menu->color_font_add }}; font-size: {{ $menu->sze_font_add }}">
				{{ $menu->address }}
			</div>
		</div>
		
		
		
		</div>	
	</div>
	
</div>

@endsection