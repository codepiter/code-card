@extends('base')
@extends('layouts.mm2')
@section('content')
	
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Éxito!</strong> {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif



    <div class="row">
         <div class="col-lg-12 margin-tb" style="margin-top: 15px;">
            <div class="pull-left">
                <h2>Curriculum</h2>
            </div>
			
			
			
			
			
		@if($id_a == 0)	
				<div class="d-inline">
					 <a class="btn btn-success" style="margin-left: 25px;" href="{{ url('resumes/create') }}">Cargar Curriculum</a>
				</div>
        @endif 






			<div class="d-inline float-right">
                <a class="btn btn-success" href="{{ url('/personalInformation') }}"> Atras</a>
            </div>
        </div>
    </div>

	@if(Session::has('success')){{
		Session::get('success')
	}}
	@endif

<table class="table table-bordered">
      <thead class="table-active" style="background-color: rgba(255, 140, 0); color: white;">
		<tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Empresa</th>
           
             
            
            <th width="280px" style="text-align: center;">Opciones</th>
        </tr>
		</thead>
	 @foreach($resumes as $item)
	

	
		 <tr>
		  <td><img src="{{ asset('storage'). '/'.$item->personalInformation->photo}}" alt="" width="50"></td>
		  <td>{{$item->personalInformation->first_name}}</td>
		  <td>{{$item->personalInformation->last_name}}</td>
		  <td>{{$item->personalInformation->company}}</td>

		
		  
		  <!--action-->
		  <td style="text-align: center;">
                <form action="{{ route('resumes.destroy',$item->id) }}" method="POST">
             
				 <a class="btn btn-outline-info" href="{{ route('pdf.PDFgenerate',$item->personalInformation->id) }}"><img src="{{URL::asset('/img/logo/view.png')}}" alt="show" height="15" width="auto" height="20"></a>
	
				 <a class="btn btn-outline-primary" href="{{ route('resumes.edit',$item->id) }}"><img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"></a>
				 
				 
				 
				                                

	       
                    @csrf
                    @method('DELETE')
      
                   <!-- <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro?')"><img src="{{URL::asset('/img/logo/delete.png')}}" alt="Delete" height="15" width="auto" height="20"></button>-->
                </form>
            </td>
		 </tr>
	 @endforeach
	 </tbody>
	
 </table>


{{$resumes->links()}}
 	 @endsection

      

