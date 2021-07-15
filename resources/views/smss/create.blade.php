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
    </style>
	<!-- Page-header end -->
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
											<h4 class="sub-title">{{ __('messages.credentials') }}</h4>
<div class="row p-8">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('sms.index') }}"> {{ __('messages.btn_7') }}</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{ __('messages.whoops') }}</strong> {{ __('messages.msg_whoops') }}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
@endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('sms.store') }}" method="POST" style="padding:10px">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Account sid:</strong>
                <input type="text" name="nexmo_key" class="form-control" placeholder="Account sid">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Auth token:</strong>
                <input type="text" name="nexmo_secret" class="form-control" placeholder="Auth token">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('messages.recei_numb') }}</strong>
                <input type="text" name="recei_numb" class="form-control" placeholder="+58414858XX34">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">{{ __('messages.btn_6') }}</button>
        </div>
    </div>
   
</form>
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