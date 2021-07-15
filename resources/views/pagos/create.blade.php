@extends('layouts.mm2')
@section('content')
<div id="banner">

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Ingrese nuevo Pago</h2>
			</div>
			<div class="pull-right text-right">
				<a class="button" href="{{ route('pagos.index') }}"> Back</a>
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
	   
	<form action="{{ route('pagos.store') }}" method="POST">
		@csrf

		   
	<div class="row">
		
			   
			   <div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>personal_information_id:</strong>

					<div style="box-shadow: inset 0 0 0 2px #CED4DA; height: 36px; background: white; padding-top: 4px; color: #495057; border-radius: 5px;">&nbsp;{{ $nomcomp }}</div>
					
					
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Fecha de Pago:</strong>
						<input type="date" name="fecha_pago" class="form-control" placeholder="fecha_pago">
					</div>
				</div>
		  
		
	</div>
			

	<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Num de pago:</strong>
					<input type="text" name="n_pago" class="form-control" placeholder="N Pago">
				</div>
			</div>
			
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Invoice:</strong>
					<input type="text" name="invoice" class="form-control" placeholder="invoice">
				</div>
			</div>		
	</div>		

	<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Amount:</strong>
						<input type="text" name="amount" class="form-control" placeholder="amount">
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>payment_mode:</strong>
						<input type="text" name="payment_mode" class="form-control" placeholder="Modo de Pago">
					</div>
				</div>
	</div>

	<div class="row">
		   <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nota:</strong>
					<textarea class="form-control" style="height:150px" name="notes" placeholder="notes"></textarea>
				</div>
			</div>
	</div>
			
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			 <button type="submit" class="button">Submit</button>
			</div>
	</form>



 </div><!--banner-->

@endsection