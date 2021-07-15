@extends('layouts.mm2')


@section('scripts')
<style>

.table-active, .table-active>td, .table-active>th {
    background-color: rgba(0,0,0,0);
}

</style>
@endsection


@section('content')
<div class="container">
    <div class="row">
	 <div class="col-lg-12 margin-tb" style="margin-top: 15px;">
			<div class="pull-left">
							<h2>Su Menú</h2>
			</div>
            <div class="d-inline">
                <a class="btn btn-success" style="margin-left: 25px;" href="{{ route('menus.create') }}"> Genere Menú</a>
            </div>

        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
	
	@if (session('delete'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <strong>Éxito!</strong> {{ session('delete') }}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	@endif
   
    <table class="table table-bordered" style="background: #f5f6f8;">
       <thead class="table-active" style="background-color: rgba(255, 140, 0) !important; color: white;">
		<tr class="table-active" >
            <th>Logo</th>
            <th>Restaurante</th>
            <th width="280px">Acciones</th>
        </tr>
	  </thead>
        @foreach ($menus as $item)
        <tr>
<!--<td>{{ ++$i }}</td>-->
            <td><img src="{{ asset('storage'). '/'.$item->photo}}" alt="" width="50"></td>
            <td>{{ $item->restaurant }}</td>
            <td>
                <form action="{{ route('menus.destroy',$item->id) }}" method="POST">
   
                    <a class="btn btn-outline-info" href="{{ $item->path() }}" target="_blank"><img src="{{URL::asset('/img/logo/view.png')}}" alt="Ver" height="15" width="auto" height="20" ></a>
    
                    <a class="btn btn-outline-primary" href="{{ route('menus.edit',$item->id) }}"><img src="{{URL::asset('/img/logo/edit.png')}}" alt="Edit" height="15" width="auto" height="20"></a>


                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Seguro que desea Eliminar definitivamente este menu y todos sus platillos cargados previamente')"><img src="{{URL::asset('/img/logo/delete.png')}}" alt="Supr" height="15" width="auto" height="20"></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $menus->links() !!} 
	</div>
@endsection