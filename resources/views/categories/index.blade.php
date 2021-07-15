@extends('layouts.mm2')
@section('scripts')
<style>
.table-active, .table-active>td, .table-active>th {
    background-color: rgba(255,140,0,1) !important;
}

</style>

@endsection
@section('content')

    <div class="row">
	 <div class="col-lg-12 margin-tb" style="margin-top: 15px;">
			<div class="pull-left">
							<h2>Categorias</h2>
			</div>
            <div class="d-inline">
                <a class="btn btn-success" style="margin-left: 25px;" href="{{ route('categories.create') }}"> Nueva Categoria en el Menú</a>
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
        <tr class="table-active" >

            <th>Categoría</th>
            <th width="280px">Opciones</th>
        </tr>
        @foreach ($categories as $item)
        <tr>
<!--<td>{{ ++$i }}</td>-->


            <td>{{ $item->categ_name }}</td>
            <td>
                <form action="{{ route('categories.destroy',$item->id) }}" method="POST">
   
                    <a class="btn btn-outline-info" href="{{ route('categories.show',$item->id) }}"><img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" ></a>
    
                    <a class="btn btn-outline-primary" href="{{ route('categories.edit',$item->id) }}"><img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"></a>

                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Seguro que desea Eliminar definitivamente')"><img src="{{URL::asset('/img/logo/delete.png')}}" alt="Delete" height="15" width="auto" height="20"></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
	
  
    {!! $categories->links() !!}
@endsection