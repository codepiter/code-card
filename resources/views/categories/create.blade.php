@extends('layouts.mm2')
@section('content')


<div id="banner">

   <div class="alert alert-danger" id="alert" style="display:none">
   ¡Este Categoria ya se encuentra registrado!
   </div>
   
   
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Ingrese Nueva Categoria</h2>
			</div>
			<div class="pull-right text-right">
				<a class="button" href="{{ route('categories.index') }}"> Regresar</a>
			</div>
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
	   
	<form action="{{ route('categories.store') }}" method="POST" >
		@csrf


	
	
	<div class="row">
			    <div class="col-sm-12">
					<div class="form-group">
						<strong>Nombre de la Categoría.</strong>
						<input type="text" name="categ_name" class="form-control" placeholder="Ejemplo: Postres, Entradas, Bebidas, Almuerzos, Desallunos (Personalice sus categorias a su conveniencia)">
					</div>
				</div>
	</div>
			

			
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			 <button type="submit" class="button" id="submit">Guardar</button>
			</div>
	</form>



 </div><!--banner-->

@endsection