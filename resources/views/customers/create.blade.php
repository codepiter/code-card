@extends('layouts.mm2')
@section('content')


@section('scripts')
	<script>
		$(document).ready(function () {
			
			$("#alert").css('display', 'none');

			$("#doc_id").blur(function(){
			
			var doc_id = $("#doc_id").val();
		  
				$.ajax({
				   type:'POST',
				   url:"ajaxDocId",
				  data: {
					"_token": $("meta[name='csrf-token']").attr("content"),
					doc_id:doc_id
				  },
				   success:function(data)
					{
						if(data==''){							
							$("#alert").css('display', 'none');
							$("#submit").prop("disabled", false);
							
						}else{
								
							$("#alert").css('display', 'block');
							$("#submit").prop("disabled", true);
						}
					}
	 
				});
		  
			});
		 });
	</script>			
			
@stop

<div id="banner">

   <div class="alert alert-danger" id="alert" style="display:none">
   ¡Este Cliente ya se encuentra registrado!
   </div>
   
   
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Ingrese nuevo Cliente</h2>
			</div>
			<div class="pull-right text-right">
				<a class="button" href="{{ route('customers.index') }}"> Regresar</a>
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
	   
	<form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
		@csrf

		   
	<div class="row">
	
	            <div class="col-xs-3 col-sm-3 col-md-3">
					<div class="form-group">
						<strong>Documento de Identidad</strong>
						<input type="text" name="doc_id" id="doc_id" class="form-control" placeholder="Documento de dentidad">
					</div>
				</div>
	
	</div>
	
	<div class="row">
		
			   
			  <div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Nombre</strong>
						<input type="text" name="first_name" class="form-control" placeholder="Nombre">
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<strong>Apellido:</strong>
						<input type="text" name="last_name" class="form-control" placeholder="Apellido">
					</div>
				</div>
		  
		
	</div>
			

	<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Fecha de Nacimiento:</strong>
					<input type="date" name="date_birth" class="form-control" placeholder="Fecha de Nacimiento:">
				</div>
			</div>
			
			<div class="col-xs-6 col-sm-6 col-md-6">
				<div class="form-group">
					<strong>Telefono:</strong>
					<input type="tel" name="telephone" class="form-control" placeholder="Telefono">
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
						<strong>Foto:</strong>
						<input type="file" name="photo" class="form-control" placeholder="Foto">
					</div>
				</div>
	</div>

	<div class="row">
		   <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Dirección:</strong>
					<textarea class="form-control" style="height:150px" name="address" placeholder="Dirección"></textarea>
				</div>
			</div>
	</div>
			
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			 <button type="submit" class="button" id="submit">Enviar</button>
			</div>
	</form>



 </div><!--banner-->

@endsection