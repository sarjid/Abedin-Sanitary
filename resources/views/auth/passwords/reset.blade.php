@extends('layouts.admin-master')
@section('admin_title') Reset Password @endsection
@section('admin-content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">{{ __('Reset Password') }}</div>
      <hr>
      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        @error('email')
         <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->
      <div class="form-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="new password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->

      <div class="form-group">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">      
    </div>
    <button type="submit" class="btn btn-primary">
        {{ __('Reset Password') }}
    </button>
    </form>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->
@endsection
