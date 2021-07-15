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

<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-title px-4 pt-4 row">
      <div class="col">
        <h3>Listado de Clientes</h3><br>
        <a class="btn btn-primary" href="{{ route('customers.create') }}"> Nuevo Cliente</a>
        <a class="btn btn-success" href="{{ url('/import') }}"> Varios Clientes</a>
      </div>
      
      <div class="d-inline float-right pr-2">
        <a class="btn btn-success" href="{{ url('/personalInformation') }}">Atras</a>
      </div>
    </div>

    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>

    
    <div class="card-body">
      {{-- <h6 class="card-title">Hoverable Table</h6>
      <p class="card-description">Add class <code>.table-hover</code></p> --}}
      <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="table-active">
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Email</th>
                <th width="280px">Opciones</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($customers as $item)
                <tr>
                  {{-- <!--<td>{{ ++$i }}</td>--> --}}
                  <td><img src="{{ asset('storage'). '/'.$item->photo}}" alt="" width="50"></td>
                  <td>{{ $item->first_name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>
                    <form action="{{ route('customers.destroy',$item->id) }}" method="POST" class="d-flex justify-content-around">
      
                      <a class="btn btn-outline-info" href="{{ route('customers.show',$item->id) }}">
                        {{-- <img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" > --}}
                        <i class="mdi mdi-eye"></i>
                      </a>
      
                      <a class="btn btn-outline-primary" href="{{ route('customers.edit',$item->id) }}">
                        {{-- <img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"> --}}
                        <i class="mdi mdi-border-color"></i>
                      </a>

                      <a class="btn btn-outline-primary" href="{{ action('GifCardController@create2', $item->id ) }}">
                        {{-- <img src="{{URL::asset('/img/logo/gift-card.png')}}" alt="PDF" height="23" width="auto" height="20"> --}}
                        <i class="mdi mdi-wallet-giftcard"></i>
                      </a>

                      @csrf
                      @method('DELETE')
        
                      <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Seguro que desea Eliminar definitivamente')">
                        {{-- <img src="{{URL::asset('/img/logo/delete.png')}}" alt="Delete" height="15" width="auto" height="20"> --}}
                        <i class="mdi mdi-delete"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
              
            </tbody>
          </table>

          <div class="d-flex justify-content-center">
            {!! $customers->links() !!}
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
@endpush