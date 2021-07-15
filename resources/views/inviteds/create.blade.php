@extends('layouts.mm2')
@section('content')
<div id="banner">

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Ingrese Invitado</h2>
			</div>
			<div class="pull-right text-right">
				<a class="button" href="{{ route('inviteds.index') }}"> Back</a>
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
	   
	<form action="{{ route('inviteds.store') }}" method="POST">
		@csrf


	<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Nombre:</strong>
					<input type="text" name="nombre" class="form-control" placeholder="Nombre">
				</div>
			</div>
			
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Apellido:</strong>
					<input type="text" name="apellido" class="form-control" placeholder="Apellido">
				</div>
			</div>		
	</div>		

	<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Email:</strong>
						<input type="text" name="email" class="form-control" placeholder="Email">
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Telefono:</strong>
						<input type="text" name="telefono" class="form-control" placeholder="Telefono">
						<input type="text" name="codig" class="form-control" value="{{ $randstring }}" readonly>
					</div>
				</div>
	</div>

			
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			 <button type="submit" class="button">Submit</button>
			</div>
	</form>



 </div><!--banner-->

@endsection