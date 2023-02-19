@extends('back.templates.authentications')
@section('title')
@section('content')
<div class="page page-center">
  <div class="container container-tight py-4">
    <div class="text-center mb-4">
      <a href="." class="navbar-brand navbar-brand-autodark"><img src="./back/static/logo.svg" height="36" alt=""></a>
    </div>
    <form class="card card-md" action="{{ route('postlogin') }}" method="POST" autocomplete="off">
      @csrf
      <div class="card-body">
        <h2 class="h2 text-center mb-4">Login to your account</h2>

        @if(Session::get('fail'))
          <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Email">
          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password">
          <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        </div>
        <div class="mb-2">
          <label class="form-check">
            <input type="checkbox" class="form-check-input"/>
            <span class="form-check-label">Remember me on this device</span>
          </label>
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">Sign in</button>
        </div>
      </div>
    </form>
    <div class="text-center text-muted mt-3">
      Don't have account yet? <a href="./sign-in.html">Sign up</a>
    </div>
  </div>
</div>
@endsection