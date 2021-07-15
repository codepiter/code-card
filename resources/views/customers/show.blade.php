@extends('layouts.mm2')

@section('scripts')

@stop


@section('content')
<div class="row" style="margin-top:30px">

@if ($customer->photo)
	<div class="col-xs-12 col-sm-12 col-md-6">
		
			<div class="foto" style="max-width: 400px">
				<img class="img-fluid align-center"  src="{{ asset('storage'). '/'.$customer->photo }}" >
			</div>
		
	</div>
@endif


	<div class="col-xs-12 col-sm-12 col-md-6">
		 <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Nombre:</strong>
					{{ $customer->first_name }}
				</div>
			</div>
			
			
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Apellido:</strong>
					{{ $customer->last_name }}
				</div>
			</div>
			
		</div>
		
		
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Fecha de Nacimiento:</strong>
					{{ $customer->date_birth }}
				</div>
			</div>
			
			
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Telephono:</strong>
					{{ $customer->telephone }}
				</div>
			</div>
			
		</div>
		
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Email:</strong>
					{{ $customer->email }}
				</div>
			</div>
			
			
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Dirección:</strong>
					{{ $customer->address }}
				</div>
			</div>
			
		</div>
	</div>
	
</div>
	<div class="row" style="margin-top:30px">
           
                <a class="button" style="margin-left: auto; margin-right: auto;" href="{{ route('customers.index') }}"> Atrás</a>
           
    </div>
@endsection
