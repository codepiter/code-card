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
                <h2>Invitados</h2>
            </div>

			 <div class="d-inline">
                <a class="btn btn-success" style="margin-left: 25px;" href="{{ route('inviteds.create') }}"> Registre Nuevo Invitado</a>
            </div>
			
			<div class="d-inline float-right">
                <a class="btn btn-success" href="{{ url('/personalInformation') }}"> Atras</a>
            </div>
        
		</div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
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
        @foreach ($inviteds as $item)
        <tr>
			
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->apellido }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->telefono }}</td>


		<!--action-->
		  <td>
                <form action="{{ route('inviteds.destroy',$item->id) }}" method="POST">

				 <a class="btn btn-outline-info" href="{{ route('inviteds.show',$item->id) }}"><img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" >
				 </a>
				 <a class="btn btn-outline-primary" href="{{ route('inviteds.edit',$item->id) }}"><img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"></a>


                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro?')"><img src="{{URL::asset('/img/logo/delete.png')}}" alt="Delete" height="15" width="auto" height="20"></button>
                </form>
            </td>
			
			
	
			
        </tr>
        @endforeach
    </table>
  
    {!! $inviteds->links() !!}
@endsection