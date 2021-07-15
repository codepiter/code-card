@extends('layouts.mm2')
@section('content')

@section('scripts')
<style>
.modal-dialog{
		padding-top: 50px !important;
	}
	
</style>
@stop

<div id="banner" style="background:#f5f6f8">


	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-right text-right">
				<a class="button" href="{{ route('brochures.index') }}"> Regresar</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div style="text-align: center">
				<h4>Editar Brochure</h4>
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
	  


	  
	<form action="{{ route('brochures.update',$brochure->id) }}" method="POST" enctype="multipart/form-data">
		                                @csrf
									@method('PUT')
									{{ method_field('PATCH') }}
		<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-6">
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
							
								<img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_bgpdf1}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">
								<input type="file" name="src_bgpdf1" class="form-control" >
							</div>
						</div>
						
						
						
						
						
						
						
						
						
						
				<div class="col-xs-6 col-sm-6 col-md-6">
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
						
						<img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_msj_inicial}}" alt="" style="max-width: -webkit-fill-available; margin-top: 15px;margin-bottom: 15px;">
						<input type="file" name="src_msj_inicial" class="form-control">
					</div>
				</div>

		</div>









		   
<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
				    <div class="form-group">
						<strong>Titulo I</strong>
						<input type="text" name="titlea" class="form-control" maxlength="48" value="{{ $brochure->titlea }}">
					</div>
			
					<div class="form-group">
						<strong>Contenido I</strong>
						<input type="text" name="msj_inicial" class="form-control" maxlength="218" value="{{ $brochure->msj_inicial }}">
					</div>
				
				</div> 
				
				
				<div class="col-xs-6 col-sm-6 col-md-6">
				    
					<div class="form-group">
						<strong>Titulo II</strong>
						<input type="text" name="titleb" class="form-control" maxlength="48" value="{{ $brochure->titleb }}">
					</div>
			
					<div class="form-group">
						<strong>Contenido II</strong>
						<input type="text" name="msj_ppal" class="form-control" maxlength="218" value="{{ $brochure->msj_ppal }}">
					</div>

				</div> 

</div>
				
<div class="row">
				
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Titulo III</strong>
							<input type="text" name="titlec" class="form-control" maxlength="48" value="{{ $brochure->titlec }}">
						</div>
				
						<div class="form-group">
							<strong>Contenido IIII</strong>
							<input type="text" name="inf_empresa" class="form-control" maxlength="218" value="{{ $brochure->inf_empresa }}">
						</div>
					</div> 
					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<strong>Titulo IV</strong>
							<input type="text" name="titled" class="form-control" maxlength="48" value="{{ $brochure->titled }}">
						</div>
				
						<div class="form-group">
							<strong>Contenido IV</strong>
							<input type="text" name="pts_fuerts" class="form-control" maxlength="218" value="{{ $brochure->pts_fuerts }}">
						</div>
					</div> 
					
</div>

<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6"  style="margin-left: auto; margin-right: auto;">
								<div style="font-size: large; text-align:center;">Ingrese imagen columna 3 <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod3" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button>
								</div>
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
								

								<div class="form-group" style="text-align:center;">
									
									<img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_msj_ppal}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px; ">
									<input type="file" name="src_msj_ppal" class="form-control" >
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


<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6" style="margin-left: auto; margin-right: auto;" >	
	 <div style="font-size: large;  text-align:center;">Ingrese imagen de Fondo página 2  <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#Bginf" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="Bginf">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Puede Ingresar una imagen que ocupe todo el espacio, de ser asi no necesitará ingresar las 3 imagenes siguientes</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/brochure/backPag2.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
					<div class="form-group" style="text-align:center">
							
							<img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_bgpdf2}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">
							<input type="file" name="src_bgpdf2" class="form-control" >
					</div>
	</div>
</div>





<div class="row" style="margin-top:15px;">
		<div class="col-xs-6 col-sm-6 col-md-6">
		<div style="font-size: large; text-align:center;">Ingrese imagen de Fondo (Columna 1)<button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod44" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="mod44">
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
						
						<img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_inf_empresa}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">
						<input type="file" name="src_inf_empresa" class="form-control" >
					</div>
							
							
	    </div>
		
		<div class="col-xs-6 col-sm-6 col-md-6">
		<div style="font-size: large; text-align:center;">Ingrese imagen de Fondo (Columna 2)<button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod55" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="mod55">
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
							
							<img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_pts_fuerts}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">
						<input type="file" name="src_pts_fuerts" class="form-control" >
							
							
	    </div>
		
		<div class="col-xs-6 col-sm-6 col-md-6"  style="margin-left: auto; margin-right: auto;">
		<div style="font-size: large; text-align:center;">Ingrese imagen de Fondo (Columna 3)<button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod66" style="padding: 2px 8px;"><i class="fa fa-info-circle"></i></button></div>
					<!-- The Modal -->
							<div class="modal" id="mod66">
							  <div class="modal-dialog">
								<div class="modal-content">

								  <!-- Modal Header -->
								  <div class="modal-header" >
									<h4 class="modal-title">Dimensiones de la imagen requerida</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								  </div>

								  <!-- Modal body -->
								  <div class="modal-body" style="text-align:center">
									<img src="{{ asset('img/brochure/3Inf.png') }}"  alt="" style="max-width: 300px; margin-top: 15px;margin-bottom: 15px; padding:0px; ">
								  </div>
								</div>
							  </div>
							</div>
					<div class="form-group" style="text-align:center;">
						<img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_beneficios}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">
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