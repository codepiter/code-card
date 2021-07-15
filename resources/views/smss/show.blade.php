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
                                    <h4 class="sub-title">Detalles</h4>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sms.index') }}"> {{ __('messages.btn_7') }}</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>account_sid:</strong>
                {{ $sms->nexmo_key }}
            </div>
        </div>
        
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>auth_token:</strong>
                {{ $sms->nexmo_secret }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ __('messages.recei_numb') }} :</strong>
                {{ $sms->recei_numb }}
            </div>
        </div>
		
		
		
    </div>
	
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