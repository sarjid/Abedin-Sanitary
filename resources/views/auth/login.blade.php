@extends('layouts.admin-master')
@section('admin_title') Login @endsection
@section('admin-content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin Login </div>
      <hr>
      <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group">
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Enter your Email">
        @error('email')
         <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->
      <div class="form-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->

      <div class="form-group">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <span class="checkmark"></span>
        <label class="chech_container">Remember me

        </label>
    </div>

      <button type="submit" class="btn btn-info btn-block">Log In</button>
      <hr>
      <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
    </form>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->
@endsection
