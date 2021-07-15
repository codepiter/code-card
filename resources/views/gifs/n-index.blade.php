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
      <h3 class="col">Gif Cards Generadas</h3>
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
              <tr>
                <th>ID Gif</th>
                <th>Cliente</th>
                <th>Monto</th>
                <th>Fecha de Generacion</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>


              @foreach ($gifs as $item)
		
                <?php
                  $idp=$item['customer']->personal_information_id;
                  if( $idp == $pi){ 
                    ?>
                    <tr>

                      <td>{{ $item->identifier}}</td>
                      <td>{{ $item['customer']->first_name }}</td>
                      <td>{{ $item->amount }}</td>
                      <td>{{ $item->created_at->format('d-m-Y') }}</td>

                      <!--action-->
                      <td>
                        <form action="{{ route('gifCards.destroy',$item->id) }}" method="POST" class="d-flex justify-content-around">
                          <a class="btn btn-outline-info" href="{{ route('gifCards.show',$item->id) }}" target="_blank">
                            {{-- <img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" > --}}
                            <i class="mdi mdi-eye"></i>
                          </a>
                    
              
                          <a class="btn btn-outline-primary" href="{{ route('gifCards.edit',$item->id) }}">
                            {{-- <img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"> --}}
                            <i class="mdi mdi-border-color"></i>
                          </a>

                          <a class="btn btn-outline-primary" onclick="return confirm('¿Seguro?')" href="">
                            {{-- <img src="{{URL::asset('/img/logo/delete2.png')}}" alt="PDF" height="15" width="auto" height="20"> --}}
                            <i class="mdi mdi-delete"></i>
                          </a>
                    
                          @csrf
                          @method('DELETE')
            
                          <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro?')">
                            {{-- <img src="{{URL::asset('/img/logo/delete.png')}}" alt="Delete" height="15" width="auto" height="20"> --}}
                            <i class="mdi mdi-delete"></i>
                          </button>
                        </form>
                      </td>              
                  
                    </tr>
                
                <?php   } ?>
              @endforeach
              
            </tbody>
          </table>

          <div class="d-flex justify-content-center">
            {!! $gifs->links() !!}
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