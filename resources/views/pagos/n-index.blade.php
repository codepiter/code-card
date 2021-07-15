@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
      <p>{{ $message }}</p>
  </div>
@endif

<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-title px-4 pt-4 row">
      <h3 class="col">Pagos Recibidos</h3>
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
                <th>Medio</th>
                <th>Monto</th>
                <th>Fecha </th>
                <th>Usuario </th>
                <th>Acción </th>
              </tr>
            </thead>
            <tbody>

              @foreach ($pagos as $item)
                <tr>              
                  <td>{{ $item->payment_mode }}</td>
                  <td>{{ $item->amount }}</td>
                  <td>{{ Carbon\Carbon::parse ($item->created_at)->format('d-m-Y') }}</td>                    
              

                  @isset($item->user->personalInformation->first_name)
                    <td>{{ $item->user->personalInformation->first_name}}
                  
                    @isset($item->user->personalInformation->last_name)
                      {{ $item->user->personalInformation->last_name}}
                    @endisset

                    </td>
                  @else
                    <td>No definido</td>
                  @endisset

                 <!--action-->
                  <td>

                    @isset($item->user->personalInformation->first_name)
                      <a class="btn btn-outline-info" href="{{ route('pagos.show',$item->id) }}">
                        {{-- <img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" > --}}
                        <i class="mdi mdi-eye"></i>
                      </a>
                    @else
                      <a class="btn btn-outline-info" >
                        {{-- <img src="{{URL::asset('/img/logo/ban.png')}}" alt="PDF" height="15" width="auto" height="20" > --}}
                        <i class="mdi mdi-block-helper"></i>
                      </a>
                    @endisset    
                  
                  </td>
                  <!--fin-action-->

                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center">
            {!! $pagos->links() !!}
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