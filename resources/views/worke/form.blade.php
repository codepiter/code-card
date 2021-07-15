  <form action="{{url('/empleados')}}" method="post" enctype="multipart/form-data">
	  {{ csrf_field() }}
		<div class="form-group">
			<label for="file1">Ingrese Foto</label>
			<input type="file" class="form-control-file" id="file1">
		</div>

		  <div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Ingrese su nombre">
		  </div>
		  
		  <div class="form-group">
			<label for="empresa">Empresa</label>
			<input type="text" class="form-control" id="empresa" aria-describedby="empresaHelp" placeholder="Ingrese su empresa">
		  </div>
		  
		  <div class="form-group">
			<label for="cargo">Cargo</label>
			<input type="text" class="form-control" id="cargo" aria-describedby="cargoHelp" placeholder="Ingrese Cargo">
		  </div>

		  <div class="form-group">
			<label for="presentationDescription">Ingrese presentación</label>
			<textarea class="form-control" id="presentationDescription" rows="3"></textarea>
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>