@extends('layouts.register')

@section('content')
<div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
 
      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Full name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          @error('name')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email"class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
          @error('email')
             <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
          @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
          @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{route('login')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

@endsection
