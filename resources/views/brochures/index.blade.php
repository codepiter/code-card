@extends('layouts.mm2')

@section('scripts')
<style>
th {
   
	background-color: darkorange;
}

</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 15px;">
            <div class="pull-left">
                <h2>Brochure</h2>
            </div>
			
@if($id_a == 0)	
			<div class="d-inline">
                <a class="btn btn-success" style="margin-left: 25px;" href="{{ route('brochures.create') }}"> Registre Brochure</a>
            </div>
@endif

			<div class="d-inline float-right">
                <a class="btn btn-success" href="{{ url('/personalInformation') }}"> Atras</a>
            </div>
        
		</div>
    </div>
   
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Éxito!</strong> {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
   
    <table class="table table-bordered">
       <thead class="table-active" style="background-color: rgba(255, 140, 0); color: white;">
		<tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Opciones</th>
        </tr>
      </thead>
        @foreach ($brochures as $item)
        <tr>
			
			<td>
				@isset($item->brochureImage->src_msj_inicial)
				<img src="{{ asset('storage'). '/'.$item->brochureImage->src_msj_inicial}}" alt="" width="50">
				@else
				  Imagen no encontrada
				@endisset
			</td>
			
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->apellido }}</td>
            <td>{{ $item->email }}</td>
          


		<!--action-->
		  <td>
                <form action="{{ route('brochures.destroy',$item->id) }}" method="POST">

				 <a class="btn btn-outline-info" href="{{ route('brochures.show',$item->id) }}"><img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" >
				 </a>
				 
				  <a class="btn btn-outline-info" href="{{ route('brochures.pdf',$item->personalInformation->id) }}" target="_blank"><img src="{{URL::asset('/img/logo/file.png')}}" alt="PDF" height="15" width="auto" >
				 </a>
				 
				 
				 <a class="btn btn-outline-primary" href="{{ route('brochures.edit',$item->id) }}"><img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"></a>


                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro?')"><img src="{{URL::asset('/img/logo/delete.png')}}" alt="Delete" height="15" width="auto" height="20"></button>
                </form>
            </td>
			
			
	
			
        </tr>
        @endforeach
    </table>
  
    {!! $brochures->links() !!}
@endsection