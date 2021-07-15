@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

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


<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-title px-4 pt-4">
      <h3>Su Menú</h3><br>
      <a class="btn btn-primary" href="{{ route('menus.create') }}">Genere Menú</a>
    </div>


    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>
    
    <div class="card-body">


      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="table-active">
            <tr class="table-active">
              <th>Logo</th>
              <th>Restaurante</th>
              <th width="280px">Acciones</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($menus as $item)
              <tr>
                  {{-- <!--<td>{{ ++$i }}</td>--> --}}
                  <td><img src="{{ asset('storage'). '/'.$item->photo}}" alt="" width="50"></td>
                  <td>{{ $item->restaurant }}</td>
                  <td>
                      <form action="{{ route('menus.destroy',$item->id) }}" method="POST">
        
                          <a class="btn btn-outline-info" href="{{ $item->path() }}" target="_blank">{{-- <img src="{{URL::asset('/img/logo/view.png')}}" alt="Ver" height="15" width="auto" height="20" > --}} <i class="mdi mdi-eye"></i> </a>
          
                          <a class="btn btn-outline-primary" href="{{ route('menus.edit',$item->id) }}">{{--<img src="{{URL::asset('/img/logo/edit.png')}}" alt="Edit" height="15" width="auto" height="20">--}}<i class="mdi mdi-border-color "></i></a>


                          @csrf
                          @method('DELETE')
            
                          <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Seguro que desea Eliminar definitivamente este menu y todos sus platillos cargados previamente')">{{-- <img src="{{URL::asset('/img/logo/delete.png')}}" alt="Supr" height="15" width="auto" height="20"> --}} <i class="mdi mdi-delete"></i> </button>
                      </form>
                  </td>
              </tr>
              @endforeach
            
          </tbody>
        </table>

        
        {!! $menus->links() !!} 
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
@endpush