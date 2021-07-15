@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif


<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-title px-4 pt-4 row">
      <div class="col">
        <h3>Editar Información del cliente</h3>
      </div>
      
      <div class="d-inline float-right pr-2">
        <a class="btn btn-success" href="{{ action('CustomerController@index') }}">Regresar</a>
      </div>
    </div>

    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>

    
    <div class="card-body">


      <div id="banner">
           
        <form action="{{ route('customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          {{ method_field('PATCH') }}
      
             
          <div class="row">
            
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Nombre</strong>
                  <input type="text" name="first_name" class="form-control" value="{{ $customer->first_name }}">
                  <input type="hidden" class="form-control" name="personal_information_id" value="{{ $customer->personal_information_id }} ">
                </div>
              </div>                
                
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Apellido</strong>
                  <input type="text" name="last_name" class="form-control" value="{{ $customer->last_name }}">
                </div>
              </div>
            
          </div>
            
      
          <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Fecha de Nacimiento</strong>
                
                  <input type="date" name="date_birth" class="form-control" placeholder="Fecha de Emision" value="{{ Carbon\Carbon::parse( $customer->date_birth)->format('Y-m-d') }}">
                </div>
              </div>
              
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Telefono</strong>
                  <input type="text" name="telephone" class="form-control" value="{{ $customer->telephone }}">
                </div>
              </div>
        
          </div>	
      
          <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Email</strong>
                
                  <input type="text" name="email" class="form-control" value="{{ $customer->email }}">
                </div>
              </div>
              
        
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Dirección</strong>
                  <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
                </div>
              </div>
        
          </div>	
      
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Foto</strong>
                    <img src="{{ asset('storage'). '/'.$customer->photo}}" alt="" style="max-height: 150px; margin-top: 15px;margin-bottom: 15px;">
                    <input type="file" name="photo" class="form-control file-upload-info" placeholder="Foto">
                  </div>
              </div>
          </div>	
      
      
            
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="button btn btn-primary">Enviar</button>
          </div>
        </form>
      
      
      
       </div><!--banner-->


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