@extends('theme.layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url({{ url('https://via.placeholder.com/219x452') }})">

            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">Weis<span>Work</span></a>
              <h5 class="text-muted font-weight-normal mb-4">{{--Create a free account.--}}Crea una cuenta gratis.</h5>
              <form class="forms-sample" method="POST" action="{{ route('register') }}">
                @csrf
                {{-- <div class="form-group">
                  <label for="exampleInputUsername1">Username</label>
                  <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="Username" placeholder="Username">
                </div> --}}
                <div class="form-group">
                  <label for="exampleInputEmail1">{{--Email address--}}{{ __('E-Mail Address') }}</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="exampleInputEmail1" placeholder="Email" required autocomplete="email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">{{--Password--}}{{ __('Password') }}</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1"  name="password" required autocomplete="new-password" placeholder="Password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="password-confirm">{{--Confirm Password--}}{{ __('Confirm Password') }}</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                </div>

                {{-- <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Remember me
                  </label>
                </div> --}}

                <div class="mt-3">
                  {{-- <a href="{{ url('/') }}" class="btn btn-primary mr-2 mb-2 mb-md-0">Sing up</a> --}}
                  <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">
                    {{ __('Register') }}
                  </button>
                  {{-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="twitter"></i>
                    Sign up with twitter
                  </button> --}}
                </div>
                <a href="{{ url('/') }}" class="d-block mt-3 text-muted">{{--Already a user? Sign in--}}¿Ya tienes un usuario? Inicia sesión.</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection