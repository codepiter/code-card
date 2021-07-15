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
              <h5 class="text-muted font-weight-normal mb-4">{{-- Welcome back! Log in to your account. --}}¡Bienvenido de vuelta! Ingresa a tu cuenta.</h5>
              <form class="forms-sample" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <label for="exampleInputEmail1">{{-- Email address --}}{{ __('E-Mail Address') }}</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" required autofocus>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">{{-- Password --}}{{ __('Password') }}</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                    {{-- Remember me --}} {{ __('Remember Me') }}
                  </label>
                </div>
                <div class="mt-3">
                  {{-- <a href="{{ url('/') }}" class="btn btn-primary mr-2 mb-2 mb-md-0">Login</a> --}}
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>
                  {{-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="twitter"></i>
                    Login with twitter
                  </button> --}}
                </div>
                @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="d-block mt-3 text-muted">{{-- Not a user? Sign up --}}¿No tienes usuario? Registrate</a>
                @endif

                @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection