@extends('theme.layout.n-master')
@section('content')
    <style>
        .my_table td{
            border: dotted 1px rgb(73, 98, 151);
            padding: 5px;          
            }
    .my_table th{
        padding: 10px;
        background-color: rgb(90, 123, 195); 
        color: white;         
    }
    .error{
        color: red;
        border-color:red;
        font-weight: 900;
    }
	.table-active, .table-active>td, .table-active>th {
    background-color: rgb(68 138 255);
}
    </style>
<script src="{{ asset('js/modale.js') }}" defer></script>

<!--modal-->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal" style="padding-top: 50px !important;">
	  <div class="modal-dialog modal-md">
		<div class="modal-content">
		  <div class="modal-header">
			
			<h4 class="modal-title" id="myModalLabel">{{ __('messages.modal') }}</h4>
		  </div>
		  <div class="modal-body">
		 {{ __('messages.modalb') }}


		  <input type="hidden" class="form-control" id="id_item">
		  
		 </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" id="modal-btn-si">{{ __('messages.accept') }}</button>
			<button type="button" class="btn btn-default" id="modal-btn-no">{{ __('messages.cancel') }}</button>
		  </div>
		</div>
	  </div>
	</div>
<!--fin modal-->
    @if($existe == 0 )
	<div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sms.create') }}"> {{ __('messages.config') }}</a>
            </div>
        </div>
    </div>
	@endif
  
	@if($existe == 0 )
				<div style="padding:2em; margin-top: 2em; background:#dcd9d9">
					
						<h6>{{ __('messages.empty_sms') }}<br>
						Obtenga sus credenciales  en: </h6><a href="https://www.twilio.com/"><h6> https://www.twilio.com/ </h6></a>
					
					
				</div>
					@else

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
			   <div class="pcoded-inner-content">
				<!-- Main-body start -->
				<div class="main-body">
					<div class="page-wrapper">
						<!-- Page body start -->
						<div class="page-body">
							<div class="row">

								<div class="col-sm-12">
									 <!-- Basic Form Inputs card start -->
									 <div class="card">
										<div class="card-block">
											<h4 class="sub-title">Configuration SMS</h4>

    <table class="table table-bordered">
        <tr>
           
            <th class="table-active" style="color: white;">{{ __('messages.recei_numb') }}</th>
            
            <th class="table-active" width="280px" style="color: white;">{{ __('messages.actions') }}</th>
        </tr>
        @foreach ($datos as $item)
        <tr>
            <td>{{ $item->recei_numb }}</td>
          
            <td>
                <form action="{{ route('sms.destroy',$item->id) }}" method="POST">
   
                    <a class="btn btn-outline-info" style="margin-left:5px" href="{{ route('sms.show',$item->id) }}"><img src="{{URL::asset('/assets/images/view.png')}}" alt="Ver" height="22" width="auto" ></a>
    
                    <a class="btn btn-outline-info reagen-item" href="{{ route('sms.edit',$item->id) }}"><img src="{{URL::asset('/assets/images/edit.png')}}" alt="Ver" height="22" width="auto" ></a>

                   <button type="button" class="btn btn-outline-danger remov-item" data-id="{{ $item->id }}"><img src="{{URL::asset('/assets/images/delete2.png')}}" alt="Supr" height="22" width="auto"></button>
               
			   
			   </form>
            </td>
        </tr>
        @endforeach
    </table>
  @endif
  
    {!! $datos->links() !!}
	</div>
                           
									</div>
									<!-- Basic Form Inputs card end -->
								
								</div>
						   
						   </div>
						 
						</div>
						<!-- Page body end -->
				  
					</div>
				
				</div>
				
				
			</div>
@endsection
