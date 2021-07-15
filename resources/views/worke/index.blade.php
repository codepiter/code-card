@extends('base')
@extends('layouts.master')
@section('main')
<div class="col-sm-8 offset-sm-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Settings</h2>
            </div>
			<!---->
            <div class="pull-right">
               
            </div>
			<!---->
        </div>
    </div>

	@if(Session::has('success')){{
		Session::get('success')
	}}
	@endif

<table class="table table-bordered">
        <thead class="table-active">
		<tr>
            <th>Empresa</th>
            <th>Inicio</th>
            <th>Fin</th>

           <th width="280px" style="text-align: center;">Actions</th>
        </tr>
		</thead>
	 @foreach($datos as $item)
		 <tr>
		  <td>{{$item->company}}</td>
		  <td>{{$item->inicio}}</td>
		  <td>{{$item->fin}}</td>
          
		                          
		  <!--action-->
		  <td>
                <form action="{{ route('worke.destroy',$item->id) }}" method="POST">
             
                 <a class="btn btn-outline-info" href="{{ $item->path() }}" target="_blank"><img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" ></a>
	
				 <a class="btn btn-outline-primary" href="{{ route('worke.edit',$item->id) }}"><img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"></a>

	             <a class="btn btn-outline-primary" onclick="return confirm('¿Seguro?')" href="{{ route('personalInformations.disappear',$item->id) }}"><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="PDF" height="15" width="auto" height="20"></a>
				 
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro?')"><img src="{{URL::asset('/img/logo/delete.png')}}" alt="Delete" height="15" width="auto" height="20"></button>
                </form>
            </td>
		 </tr>
	 @endforeach
	 </tbody>
	 <a href="{{ url('worke/create') }}">Crear Experiencia</a>
 </table>
</div>
{{$datos->links()}}
 	 @endsection

      

