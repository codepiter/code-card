@extends('layouts.mm2')
@section('content')
<div id="banner">




<img src="{{URL::asset('/img/PlantillaXLS.png')}}"  style="width: 100%; height: auto; margin-top: -65px;" height="20" >
 



	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h4>Ingrese varios Clientes con documento Excel, recuerde que debe respetar el orden ilustrado en la imagen</h4>
			</div>
			<div class="pull-right text-right">
				<a class="button" href="{{ route('customers.index') }}"> Back</a>
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
	   
	<form action="{{ route('customers.import.excel') }}" method="POST" enctype="multipart/form-data">
		@csrf
		
		@if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
	    @endif
		   
	<div class="row">
	  <div class="col-xs-6 col-sm-6 col-md-6">
		  <input type="file" name="file">
		  
	  </div>
	</div>
			
		
			
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			 <button type="submit" class="button">Submit</button>
			</div>
	</form>
	
	<div class="row">
	  <div class="col-xs-6 col-sm-6 col-md-6">
		  
		  Descargar Listado de Clientes---><a href="{{  route('customers.excel')  }}">aqui</a>
	  </div>
	</div>	
	



 </div><!--banner-->

@endsection