@extends('layouts.user.index2')

@section('title')
  <title>MagangKUY - Login</title>
@endsection

@section('content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline">
    <div class="card-header text-center bg-light">
      <a href="{{route('login')}}" class="h1 warnaAbu1"><b>Magang</b>KUY</a>
    </div>
    <div class="card-body">

      <form action="{{route('postlogin')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <center>
          <div class="col-4">
            <button type="submit" class="btn btn-orange btn-block">Login</button>
          </div>
        </center>
      </form>
      <br>

      <center>
        <p class="mb-0">
        	Belum punya akun?
          <a href="{{route('register')}}" class="text-center">Daftar</a>
        </p>
      </center>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection