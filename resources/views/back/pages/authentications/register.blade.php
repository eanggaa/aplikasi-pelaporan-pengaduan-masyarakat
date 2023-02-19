@extends('back.templates.authentications')
@section('title')
@section('content')
<div class="page page-center">
  <div class="container container-tight py-4">
    <div class="text-center mb-4">
      <a href="." class="navbar-brand navbar-brand-autodark"><img src="./back/static/logo.svg" height="36" alt=""></a>
    </div>
    <form class="card card-md" action="{{ route('postregister') }}" method="POST" autocomplete="off">
      @csrf
      <div class="card-body">
        <h2 class="card-title text-center mb-4">Create new account</h2>
        <div class="mb-3">
          <label class="form-label">NIK</label>
          <input type="number" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan">
          <span class="text-danger">@error('nik'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Panjang</label>
          <input type="text" name="nama" class="form-control" placeholder="Nama Panjang">
          <span class="text-danger">@error('nama'){{ $message }}@enderror</span>
        </div>
        <div class="mb-3">
          <label class="form-label">Nomer Handphone</label>
          <input type="number" name="no_hp" class="form-control" placeholder="Nomer Handphone">
          <span class="text-danger">@error('no_hp'){{ $message }}@enderror</span>
        </div>
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
            <span class="form-check-label">Agree the <a href="./terms-of-service.html">terms and policy</a></span>
          </label>
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">Create new account</button>
        </div>
      </div>
    </form>
    <div class="text-center text-muted mt-3">
      Already have account? <a href="./sign-in.html">Sign in</a>
    </div>
  </div>
</div>
@endsection