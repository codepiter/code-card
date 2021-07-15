@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      {{-- <h6 class="card-title">Hoverable Table</h6>
      <p class="card-description">Add class <code>.table-hover</code></p> --}}
      <div class="table-responsive">
	  
	  
	  
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Extito! </strong> {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

          <table class="table table-hover">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Presentación</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($inf_pers as $item)
                <tr>
                  <td><img src="{{ asset('storage'). '/'.$item->photo}}" alt="" width="50"></td>
                  <td>{{$item->first_name}}</td>
                  <td>{!!  substr  (strip_tags($item->presentation), 0, 30) !!}</td>
                
                  {{-- <!--<td>{{$item->template}}</td>--> --}}
                  
                  <!--action-->
                  <td>
                    
                      <a class="btn btn-outline-info" href="{{ $item->path() }}" target="_blank">{{-- <img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF"  > --}} <i class="mdi mdi-eye "></i> </a>
                                  
                      <a class="btn btn-outline-primary" href="{{ route('personalInformation.edit',$item->id) }}">{{-- <img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" > --}} <i class="mdi mdi-border-color"></i> </a>

                      <a class="btn btn-outline-primary btnDisappear" id="{{ $item->id }}">{{-- <img src="{{URL::asset('/img/logo/delete.png')}}" alt="PDF" > --}} <i class="mdi mdi-delete"></i> </a>
                    
                      <button type="submit" class="btn btn-outline-danger btnDelete" data-id="{{ $item->id }}">{{-- <img src="{{URL::asset('/img/logo/delete2.png')}}" alt="Delete" > --}} <i class="mdi mdi-delete"></i> </button>
              
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          {{-- @if($is_admin == 1	)
            <!--<a href="{{ url('personalInformation/create') }}">Crear Tarjeta</a>-->
          @endif --}}
          <div class="d-flex justify-content-center">
            {{$inf_pers->links()}}
          </div>
          
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/dragula/dragula.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dragula.js') }}"></script>
  
  	
	
	<script>
	/* Disappear */
		$('.btnDisappear').click(function(e){

			  e.preventDefault(); 

				 Swal.fire({
				  title: '¿Seguro?',
				  text: "¿Está seguro que desea inhabilitar este item?",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  cancelButtonText: 'Cancelar',
				  confirmButtonText: '¡Sí, inhabilitar!'
				}).then((result) => {
				  if (result.isConfirmed) {
					  					  
						 var token = $("meta[name='csrf-token']").attr("content");
						 var id= $(this).attr("id");
						
							$.ajax({
							 url:"/personalInformations/disappear",
							 method:"POST",
							 data:{ 
								_token: token,
								id :id,
							 },
							 success:function(data){
								location.reload();
								Swal.fire({
									title: '',
									showConfirmButton: false,
									text: "Se ha inhabilitado el registro",
									type: "success",
									icon: 'success',
									timer: 2500,
								});	
							 }
							});
					
				  }
				})
			
		});
		
		
	</script>
	
	<script>
	/* DELETE */
		$('.btnDelete').click(function(e){

			  e.preventDefault(); 
			  
			   var token = $("meta[name='csrf-token']").attr("content");				
			   var id = $(this).data("id");

				 Swal.fire({
				  title: '¿Seguro?',
				  text: "¿Está seguro que desea eliminar este item definitivamente?",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  cancelButtonText: 'Cancelar',
				  confirmButtonText: '¡Sí, eliminar!'
				}).then((result) => {
				  if (result.isConfirmed) {
					  					  
						$.ajax({
							url: "/personalInformation/"+id,
							type: 'DELETE',
							data: {
								"id": id,
								"_token": token,
							},
							success: function (){	
								location.reload();
								Swal.fire({
									title: '',
									showConfirmButton: false,
									text: "Se ha eliminado el registro",
									type: "success",
									icon: 'success',
									timer: 2500,
								});	
								
							}
						});
			
				  }
				})
			
		});
		
		
	</script>
	
	
	
@endpush


