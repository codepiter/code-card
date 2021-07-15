@extends('layouts.mm2')
@section('scripts')
<style>
th {
  background-color: darkorange;
}

</style>
@endsection


@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 15px;">
            <div class="pull-left">
                <h3>Pagos Recibidos</h3>
            </div>
			<div class="d-inline float-right">
                <a class="btn btn-success" href="{{ url('/personalInformation') }}"> Atras</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
	 <thead class="table-active" style="background-color: rgba(255, 140, 0); color: white;">
        <tr>
            <th>Medio</th>
            <th>Monto</th>
            <th>Fecha </th>
            <th>Usuario </th>
            <th>Acción </th>
           
        </tr>
	 </thead>
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
				 <a class="btn btn-outline-info" href="{{ route('pagos.show',$item->id) }}"><img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" ></a>
				      @else
						   <a class="btn btn-outline-info" ><img src="{{URL::asset('/img/logo/ban.png')}}" alt="PDF" height="15" width="auto" height="20" ></a>
				@endisset
				   
				 
				 
         </td>
		<!--fin-action-->

        </tr>
        @endforeach
    </table>
  
    {!! $pagos->links() !!}
@endsection