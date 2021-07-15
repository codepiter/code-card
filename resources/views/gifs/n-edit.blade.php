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
      <h3 class="col">Obsequie una Gif Card para</h3>
      <div class="d-inline float-right pr-2">
        <a class="btn btn-success" href="{{ action('GifCardController@index') }}">Regresar</a>
      </div>
    </div>
    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>

    
    <div class="card-body">


      <div id="banner">
           
        <form action="{{ route('gifCards.update',$gifCard->id) }}" method="POST">
            @csrf
          @method('PUT')
          {{ method_field('PATCH') }}
      
             
        <div class="row">
          
               
               <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Cliente</strong>
      
                <div style="box-shadow: inset 0 0 0 2px #CED4DA; height: 36px; background: white; padding-top: 4px; color: #495057; border-radius: 5px;">&nbsp;{{ $gifCard->customer->first_name }} {{ $gifCard->customer->last_name }}</div>
                
                
                </div>
              </div>
      
              
              
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <strong>Código de la tarjeta</strong>
                <input type="hidden" name="customer_id" class="form-control" value="{{ $gifCard->customer_id }}">
                <input type="text" name="identifier" class="form-control" value="{{ $gifCard->identifier }}" readonly>
              </div>
            </div>
      
            
          
        </div>
            
      
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <strong>Fecha de Emisión</strong>
              
                <input type="date" name="emition" class="form-control" placeholder="Fecha de Emision" value="{{ Carbon\Carbon::parse( $gifCard->emition)->format('Y-m-d') }}">
              </div>
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <strong>Fecha de Expiración</strong>
                <input type="date" name="expiration" class="form-control" placeholder="Fecha de Vencimiento" value="{{ Carbon\Carbon::parse( $gifCard->expiration)->format('Y-m-d') }}">
              </div>
            </div>		
        </div>		
      
        <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Monto</strong>
                  <input type="text" name="amount" class="form-control" placeholder="Monto" value="{{$gifCard->amount}}">
                </div>
              </div>
            
            
      
       
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Moneda:</strong>
                      <select class="form-control" name="coin_id">
                      <option value="{{ $gifCard->coin_id }}" selected>{{ $gifCard->coin->name_c }}</option>
                      @foreach($monedas as $moneda)
                        @if($gifCard->coin_id != $moneda->id)
                        <option value="{{ $moneda->id }}">{{ $moneda->name_c }}</option>
                        @endif
                      @endforeach
                    </select>
        
                  </div>
              </div>
        </div>
      
        <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Nota:</strong>
                <textarea class="form-control" style="height:150px" name="notes" >{{ $gifCard->notes }}</textarea>
                
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