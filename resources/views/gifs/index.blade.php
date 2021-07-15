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
				<h2>Gif Cards Generadas</h2>
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
   
    <table class="table table-bordered" style="background: #f5f6f8;">
       <thead class="table-active" style="background-color: rgba(255, 140, 0); color: white;">
		<tr>
            <th>ID Gif</th>
            <th>Cliente</th>
            <th>Monto</th>
            <th>Fecha de Generacion</th>
            <th>Opciones</th>
        </tr>
	  </thead>

        @foreach ($gifs as $item)
		
		<?php
		$idp=$item['customer']->personal_information_id;
			if( $idp == $pi){ ?>
        <tr>
			<td>{{ $item->identifier}}</td>
            <td>{{ $item['customer']->first_name }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->created_at->format('d-m-Y') }}</td>
		<!--action-->
		  <td>
                <form action="{{ route('gifCards.destroy',$item->id) }}" method="POST">
                 <a class="btn btn-outline-info" href="{{ route('gifCards.show',$item->id) }}" target="_blank"><img src="{{URL::asset('/img/logo/view.png')}}" alt="PDF" height="15" width="auto" height="20" ></a>
				 
	
				 <a class="btn btn-outline-primary" href="{{ route('gifCards.edit',$item->id) }}"><img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"></a>

	             <a class="btn btn-outline-primary" onclick="return confirm('¿Seguro?')" href=""><img src="{{URL::asset('/img/logo/delete2.png')}}" alt="PDF" height="15" width="auto" height="20"></a>
				 
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro?')"><img src="{{URL::asset('/img/logo/delete.png')}}" alt="Delete" height="15" width="auto" height="20"></button>
                </form>
            </td>
			
			
	
			
        </tr>
		
			<?php   } ?>
        @endforeach
    </table>
  
    {!! $gifs->links() !!}
@endsection