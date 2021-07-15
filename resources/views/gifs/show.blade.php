@extends('limpio')

@section('scripts')
    <link href="{{ asset('css/style/gif2.css') }}" rel="stylesheet">
 <!--   <script src="{{ asset('js/carrousel/neces/jquery.min.js') }}" defer></script>-->
@stop

@section('main')

<div class="container" >



@if ($gifCard->customer->photo)
	<div class="bloque-a">
		<div class="img" style="background-image:url('{{ asset('storage'). '/'.$gifCard->customer->photo}}');">
		</div>
	</div>	
@endif


	     <div class="bloque-b">

<div class="img_emp" >
		@if( $gifCard->customer->personalInformation->header )
		<img src="{{ asset('storage'). '/'.$gifCard->customer->personalInformation->header }}" width="150" style="border-radius: 100px;">
		 @elseif ( $gifCard->customer->personalInformation->logo )
		<img src=" {{ asset('storage'). '/'.$gifCard->customer->personalInformation->logo }}" width="150" style="border-radius: 100px;">
        @endif
</div>



			@if( $gifCard->customer->personalInformation->first_name  )

				<strong><h3>Hola {{ $gifCard->customer->first_name }} {{ $gifCard->customer->last_name }}, recibiste una Gift Cards Interactiva de parte de {{ $gifCard->customer->personalInformation->first_name }}!</h3></strong>

			@endif
	   <img  src="{{URL::asset('/img/regalo.png')}}" alt="Invoicing" width="150">
	   
	   
	   
	   
	   
	   @if($gifCard->notes)
		<strong><h3>{{ $gifCard->notes }}</h3></strong><br><br>
		@else
		<strong><h3>¡Felicidades que pases un dia sensacional que la dicha te acompañe!</h3></strong><br><br>
       @endif


	</div>
	
	<div class="bloque-c">
		<br>
						<h4>{{ $gifCard->customer->personalInformation->first_name }} {{ $gifCard->customer->personalInformation->last_name }}</h4>
						<p class="black">CODIGO: </p>
						<p class="black">{{ $gifCard->identifier }} </p><br>
					    <h4>VALOR DE LA TARJETA: </h4><br>
						<h1>{{ $gifCard->amount }} {{ $gifCard->coin->symbol }}</h1><br>
					
						<div class="femition"><p>Fecha de Emisión:</p></div>
						<div class="emition"><p>{{ $gifCard->emition }} </p></div>
						<div class="validh"><p>Válido hasta:  </p></div>
						<div class="valido"><p>{{ $gifCard->expiration }}</p></div>
					<br>
					
					    <p>Esta tarjeta le permite comprar productos o servicios en el establecimiento que se indica arriba, y puede usar el monto del valor de la tarjeta para pagar sus compras. ¡Disfrute y vuelve pronto!</p><br>
	</div>

							
								 
							
</div>

  

			



@endsection