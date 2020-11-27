@extends('layouts.admin-master')
@section('admin_title') Forgot Password @endsection
@section('admin-content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Reset Passowrd </div>
      <hr>
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        @if (session('status'))
            <div class="alert alert-success" role="alert">
             {{ session('status') }}
            </div>
        @endif
      <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="input your email address" autofocus>
        @error('email')
         <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div><!-- form-group -->

      <button type="submit" class="btn btn-primary">
        {{ __('Send Password Reset Link') }}
    </button>
      <hr>
      <a href="{{ route('login') }}" class="tx-info tx-12 d-block mg-t-10"><strong>Return to login</strong></a>
    </form>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->
@endsection
