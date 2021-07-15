@extends('layouts.mm2')
@section('content')
<div id="banner" style="background:#f5f6f8">

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Obsequie una Gif Card para </h2>
			</div>
			<div class="pull-right text-right">
				<a class="button" href="">Regresar</a>
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
	   
	<form action="{{ route('gifCards.store') }}" method="POST">
		@csrf

		   
	<div class="row">
		
			   
			   <div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Cliente</strong>

					<div style="box-shadow: inset 0 0 0 2px #CED4DA; height: 36px; background: white; padding-top: 4px; color: #495057; border-radius: 5px;">&nbsp;{{ $customer->first_name }}</div>
					
					
					</div>
				</div>

				
				
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Código de la tarjeta</strong>
					<input type="hidden" name="customer_id" class="form-control" value="{{ $customer->id }}">
					<input type="text" name="identifier" class="form-control" value="{{ $randstring }}" readonly>
				</div>
			</div>

		  
		
	</div>
			

	<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Fecha de Emisión</strong>
					<!--<input type="text" name="emition" class="form-control" value="{{ $customer->id }}">-->
					<input type="date" name="emition" class="form-control" placeholder="Fecha de Emision">
				</div>
			</div>
			
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Fecha de Expiración</strong>
					<input type="date" name="expiration" class="form-control" placeholder="Fecha de Vencimiento">
				</div>
			</div>		
	</div>		

	<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Monto</strong>
						<input type="text" name="amount" class="form-control" placeholder="Monto">
					</div>
				</div>
			
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Moneda:</strong>
						    <select class="form-control" name="coin_id">
								<option value="">Seleccione</option>
								@foreach($monedas as $moneda)
									<option value="{{ $moneda->id }}">
										{{ $moneda->name_c }}
									</option>
								@endforeach
							</select>
	
						</div>
				</div>
	</div>

	<div class="row">
		   <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nota:</strong>
					<textarea class="form-control" style="height:150px" name="notes" placeholder="Ingrese una nota"></textarea>
				</div>
			</div>
	</div>
			
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			 <button type="submit" class="button">Enviar</button>
			</div>
	</form>



 </div><!--banner-->

@endsection