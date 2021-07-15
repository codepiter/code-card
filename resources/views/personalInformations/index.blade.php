
@extends('layouts.mm2')
@section('content')




@if (session('inhabilitado'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Alerta!</strong> {{ session('inhabilitado') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif



              <!--<marquee><h2 style="letter-spacing: 0.3em">Perfil Interactivo Digital Weiswork</h2></marquee>-->
			
           



	
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Éxito!</strong> {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alerta!</strong> {{ session('status') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
	
		
	<div class="contenedor">
	  <div class="animacion" >B i e n v e n i d o &nbsp; a &nbsp; s u &nbsp; P e r f i l &nbsp; &nbsp;D i g i t @ l &nbsp;  I n t e r a c t i v o&nbsp;  W e i s W o r k  </div>
	</div>
  
<div class="col-xl-12 col-lg-12 col-xs-5">
<table class="table table-bordered" style="margin-top:5px;">
        <thead class="table-active" style="background-color: rgba(255, 140, 0); color: white;">
		<tr>
           <th>Imagen</th>
		   <th>Nombre</th>

		   <th>Presentación</th>            


            <th>Opciones</th>
        </tr>
		</thead>
	 @foreach($inf_pers as $item)
		 <tr>
		  <td><img src="{{ asset('storage'). '/'.$item->photo}}" alt="" width="50"></td>
		  <td>{{$item->first_name}}</td>
		  
		 

		  <td>{!!  substr  (strip_tags($item->presentation), 0, 30) !!}</td>
		 
		  <!--<td>{{$item->template}}</td>-->
		  
		  <!--action-->
		  <td>
                <form action="{{ route('personalInformation.destroy',$item->id) }}" method="POST">
             
                 <a class="btn btn-outline-info" href="{{ $item->path() }}" target="_blank"><img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" ></a>
				 
	
				 <a class="btn btn-outline-primary" href="{{ route('personalInformation.edit',$item->id) }}"><img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"></a>

	             <a class="btn btn-outline-primary" onclick="return confirm('Seguro que desea Eliminar parcialmente')" href="{{ route('personalInformations.disappear',$item->id) }}"><img src="{{URL::asset('/img/logo/delete.png')}}" alt="PDF" height="15" width="auto" height="20"></a>
				 
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Seguro que desea Eliminar definitivamente')"><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" height="15" width="auto" height="20"></button>
                </form>
            </td>
		 </tr>
	 @endforeach
	 </tbody>
	 
	 @if($is_admin == 1	)
		<!--<a href="{{ url('personalInformation/create') }}">Crear Tarjeta</a>-->
	 @endif
	 
 </table>
<div>
</div>
</div>

{{$inf_pers->links()}}
 	 @endsection

      

