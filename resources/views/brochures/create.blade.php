@extends('layouts.mm2')
@section('content')


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
@stop


<div id="banner">
	   
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
				<a class="button" href="{{ route('brochures.index') }}"> Regresar</a>
			</div>
		</div>
	</div>


	<form action="{{ route('brochures.store') }}" method="POST" enctype="multipart/form-data">
		
		
		
		
		
		
		
		
		@csrf
<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">
			
				<h5>Contenido de la Página 1 del Brochure <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modpag1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></h5> 
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
									<img src="{{ asset('img/brochure/Maq1raLG.png') }}"  alt="" style="max-width: 320px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
		</div>
</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">
					<div style="font-size: large; text-align:center;">Ingrese imagen de Fondo <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar1" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="modcar1">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Dimensiones del Lienzo A4</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/brochure/a4conMedidas.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
					<div class="form-group">
						<input type="file" name="src_bgpdf1" class="form-control" >
				    </div>
				</div>
		</div>









<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">
				<div style="font-size: large; text-align:center;">Ingrese imagen Superior <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod2" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="mod2">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Dimensiones de la Imagen Superior</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/brochure/imgSupDosColumn.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
					<div class="form-group">
						
						<input type="file" name="src_msj_inicial" class="form-control" >
					</div>
				</div>

	</div>
























	<div class="row">
			    <div class="col-xs-6 col-sm-6 col-md-6">

					<div class="form-group">
						<strong>Titulo I:</strong>
						<input type="text" maxlength="218" name="titlea" class="form-control" >
					</div>
					<div class="form-group">
						<strong>Contenido I:</strong>
					 <textarea class="form-control" name="msj_inicial" rows="3"></textarea>
					</div>
					
				</div>
				  <div class="col-xs-6 col-sm-6 col-md-6">
					  <div class="form-group">
						<strong>Titulo II:</strong>
						<input type="text" maxlength="218" name="titleb" class="form-control" >
					 </div>
					 
					 <div class="form-group">
							<strong>Contenido II:</strong>
							 <textarea class="form-control" name="msj_ppal" rows="3"></textarea>
					</div>
					 
				  </div>		
	  
	</div>		

	<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Titulo III:</strong>
							<input type="text" maxlength="218" name="titlec" class="form-control">
						</div>
						<div class="form-group">
							<strong>Contenido III:</strong>
							 <textarea class="form-control" name="inf_empresa" rows="3"></textarea>
						</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
				     <div class="form-group">
						<strong>Titulo IV:</strong>
						<input type="text" maxlength="218" name="titled" class="form-control">
					</div>
					
					<div class="form-group">
						<strong>Contenido IV:</strong>
						 <textarea class="form-control" name="pts_fuerts"  rows="3"></textarea>
					</div>
					
			    </div>
	</div>
	
	
		<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-12">
			<div style="font-size: large; text-align:center;">Ingrese imagen columna 3 <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod3" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="mod3">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Dimensiones de la Imagen:</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/brochure/imgTercColumn.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>

				
					<div class="form-group">
						
						<input type="file" name="src_msj_ppal" class="form-control">
					</div>
			
			</div>
		</div>


			
	<div class="row" style="height: 150px">
		<div class="col-lg-12 margin-tb">
			
		</div>
	</div>
			

			
	<div class="row">
		<div class="col-lg-12" style="text-align:center">
			
				<h5>Contenido de la Página 2 del Brochure</h5><br>
		
		</div>
	</div>

		<div class="row" >
			<div class="col-xs-12 col-sm-12 col-md-12" style="margin-left: auto; margin-right: auto;" >				
			 <div style="font-size: large;  text-align:center;">Ingrese imagen de Fondo página 2  <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#Bginf" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
				<!-- The Modal -->
						<div class="modal" id="Bginf">
						  <div class="modal-dialog">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header" >
								<h4 class="modal-title">Puede Ingresar una imagen que ocupe todo el espacio de ser asi no necesitará ingresar las 3 imagenes siguientes</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body" style="text-align:center">
								<img src="{{ asset('img/brochure/backPag2.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
							  </div>
							</div>
						  </div>
						</div>

				<div class="form-group" >
					
					<input type="file" name="src_bgpdf2" class="form-control" >
				</div>
			</div>
			
		</div> 
		

			
	<div class="row" style="margin-top:15px;">

			<div class="col-xs-6 col-sm-6 col-md-6">
					<div style="font-size: large; text-align:center;">Ingrese imagen de Fondo (Columna 1)<button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod4" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="mod4">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Dimensiones de la imagen requerida</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/brochure/1Inf.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>

					<div class="form-group">
						
						<input type="file" name="src_inf_empresa" class="form-control" >
					</div>
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div style="font-size: large; text-align:center;">Ingrese imagen de Fondo (Columna 2)<button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod5" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="mod5">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Dimensiones de la imagen requerida</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/brochure/2Inf.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
				

				
					<div class="form-group">
						
						<input type="file" name="src_pts_fuerts" class="form-control" >
					</div>
				</div>
			
			<div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">
					<div style="font-size: large;  text-align:center;">Ingrese imagen de Fondo (Columna 3) <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod6" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="mod6">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Dimensiones del Lienzo A4</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/brochure/3Inf.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
				

				
					<div class="form-group">
						<input type="file" name="src_beneficios" class="form-control" >
					</div>
				</div>
			
			
</div>
			
			
			

			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			 <button type="submit" class="button">Enviar</button>
			</div>
	</form>



 </div><!--banner-->

@endsection