@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="grid-margin stretch-card">
  <div class="card">

    <div class="card-title px-4 pt-4 row">
      <h3 class="col">Cliente</h3>
      <div class="d-inline float-right pr-2">
        <a class="btn btn-success" href="{{ url('/customers') }}">Atras</a>
      </div>
    </div>
    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>

    
    <div class="card-body">


      <div class="row" style="margin-top:30px">

        @if ($customer->photo)
          <div class="col-xs-12 col-sm-12 col-md-6">
            
            <div class="foto" style="max-width: 400px">
              <img class="img-fluid align-center"  src="{{ asset('storage'). '/'.$customer->photo }}" >
            </div>
            
          </div>
        @endif        
        
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Nombre:</strong>
                {{ $customer->first_name }}
              </div>
            </div>            
          
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Apellido:</strong>
                {{ $customer->last_name }}
              </div>
            </div>
          
          </div>           
            
            
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Fecha de Nacimiento:</strong>
                {{ $customer->date_birth }}
              </div>
            </div>
                        
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Telephono:</strong>
                {{ $customer->telephone }}
              </div>
            </div>
            
          </div>
            
            
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Email:</strong>
                {{ $customer->email }}
              </div>
            </div>            
            
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Dirección:</strong>
                {{ $customer->address }}
              </div>
            </div>
            
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