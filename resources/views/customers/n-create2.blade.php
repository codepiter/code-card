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
    <div class="card-title px-4 pt-4">
      <div class="row">
        <div class="col">
          <h3>Listado de Clientes</h3>
        </div> 
        <div class="d-inline float-right pr-2">
          <a class="btn btn-success" href="{{ route('customers.index') }}">Regresar</a>
        </div>
      </div>
    </div>

    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>

    
    <div class="card-body">


      <div id="banner">

        <img src="{{URL::asset('/img/PlantillaXLS.png')}}"  style="width: 100%; height: auto; /* margin-top: -65px;*/" height="20" >
         
        
          <div class="row py-3">
            <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                <h4>Ingrese varios Clientes con documento Excel, recuerde que debe respetar el orden ilustrado en la imagen</h4>
              </div>
            </div>
          </div>
             
          <form action="{{ route('customers.import.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @if(Session::has('message'))
              <p>{{ Session::get('message') }}</p>
            @endif
               
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <input type="file" name="file" class="form-control"><br>
              </div>
            </div>            
              
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="button btn btn-primary">Enviar</button>
            </div>
          </form>
          
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              
              Descargar Listado de Clientes---><a href="{{  route('customers.excel')  }}">aqui</a>
            </div>
          </div>	
          
        
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