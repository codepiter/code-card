@extends('layouts.mm2')
@section('content')
<div id="banner" style="background:#f5f6f8">

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Editar Categoría</h2>
			</div>
			<div class="pull-right text-right">
				<a class="button" href="{{ action('CategoryController@index') }}">Regresar</a>
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
	   
	<form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	{{ method_field('PATCH') }}

		   
	<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<strong>Categoría</strong>
					<input type="text" name="categ_name" class="form-control" value="{{ $category->categ_name }}">
				</div>
			</div>
	</div>

			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			 <button type="submit" class="button">Guardar</button>
			</div>
	</form>



 </div><!--banner-->

@endsection