@extends('theme.layout.n-master')
@section('content')
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
                                    <h4 class="sub-title">{{ __('messages.edit_conf') }}</h4>




    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sms.index') }}"> {{ __('messages.btn_7') }}</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="{{ route('sms.update',$sms->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>account_sid:</strong>
                    <input type="text" name="nexmo_key" value="{{ $sms->nexmo_key }}" class="form-control" placeholder="account_sid">
                </div>
            </div>
			
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>auth_token:</strong>
                    <input type="text" name="nexmo_secret" value="{{ $sms->nexmo_secret }}" class="form-control" placeholder="auth_token">
                </div>
            </div>
			<!-- recei_numb = receiver number número receptor -->
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('messages.twilio_number') }}</strong>
                    <input type="text" name="recei_numb" value="{{ $sms->recei_numb }}" class="form-control" placeholder="twilio_number">
                </div>
            </div>
			
			


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">{{ __('messages.btn_6') }}</button>
            </div>
        </div>
    </form>
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