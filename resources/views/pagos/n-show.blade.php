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
      <h3 class="col">Datos Basicos del Comprador</h3>
      <div class="d-inline float-right pr-2">
        <a class="btn btn-primary" href="{{ route('pagos.index') }}">Atras</a>
      </div>
    </div>
    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>
    
    <div class="card-body">

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Nombre: </strong>
              {{ $pi->first_name }} {{ $pi->last_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Telefono: </strong>
              {{ $pi->telephone }}
            </div>
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