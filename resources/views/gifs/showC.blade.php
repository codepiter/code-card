@extends('base')

@section('scripts')
    <link href="{{ asset('css/style/gif.css') }}" rel="stylesheet">
 <!--   <script src="{{ asset('js/carrousel/neces/jquery.min.js') }}" defer></script>-->

@stop

@section('main')

<div class="container">



<div class="contenido">
			<div class="col-xs-12 col-sm-12 col-md-12" >
					<div class="pfondo">
						  <!--<div class="cover-photo">-->
							<img src="{{ asset('storage'). '/'.$gifCard->customer->photo}}" class="profile" >
						  <!--</div>-->
					</div>	  
			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-12" >
					<div class="sfondo">
					 <div class="bloque-a">
							 
							
							<p class="amount">{{ $gifCard->amount }} {{ $gifCard->coin->symbol }}</p>
							
							<p>
Esta tarjeta le permite comprar productos o servicios en el establecimiento que se indica arriba, y puede usar el monto del valor de la tarjeta para pagar sus compras.</p>

<p>
¡Disfrute y vuelve pronto!</p>
							
                           
							 <p style="text-align:center; font-size:xx-large">{{ $gifCard->customer->first_name }} {{ $gifCard->customer->last_name }} </p>

							 
					   

								  <p style="text-align:center;">Fecha de Emisión  {{ $gifCard->emition }} </p>
								
								  
								  <p  style="text-align:center;">Válido hasta:  {{ $gifCard->expiration }}</p>
							
								  
								 <p style="text-align:center;">{{ $gifCard->identifier }} </p>
								


								<p style="text-align:center;">{{ $gifCard->customer->personalInformation->first_name }} </p>
								
								 <img src="{{ asset('storage'). '/'.$gifCard->customer->personalInformation->header}}" class="profile" >
								 
							
					  </div>

					</div> 
					</div>	  
</div>
			

</div><!-- fin d Container -->


@endsection