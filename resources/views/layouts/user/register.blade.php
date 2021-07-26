@extends('layouts.user.index2')

@section('title')
  <title>MagangKUY - Register</title>
@endsection

@section('content')
<div class="register-box">
  <div class="card card-outline">
    <div class="card-header text-center bg-light">
      <a href="{{route('register')}}" class="h1"><b>Magang</b>.com</a>
    </div>
    <div class="card-body">
      @if (session('success'))
          <div class="alert alert-info">{{ session('success') }}</div>
      @endif

      @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      <form action="{{route('postregister')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
          <p class="text-danger">{{ $errors->first('name') }}</p>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
          <p class="text-danger">{{ $errors->first('email') }}</p>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <p class="text-danger">{{ $errors->first('password') }}</p>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control" name="konfirmasi" placeholder="Konfirmasi password" required>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-portrait"></span>
            </div>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image" value="{{ old('image') }}" required>
            <label class="custom-file-label" for="customFile">Foto</label>
          </div>
          <p class="text-danger">{{ $errors->first('image') }}</p>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-window-maximize"></span>
            </div>
          </div>
          <select class="form-control" name="level" required>
            <option value="mahasiswa">Mahasiswa</option>
            <option value="perusahaan">Perusahaan</option>
          </select>
        </div>
        <center>
          <button type="submit" class="btn btn-orange btn-block">Daftar</button>
        </center>
      </form>
      <br>

      <center>
        <p class="mb-0">
        	Sudah punya akun?
          <a href="{{route('login')}}" class="text-center">Login</a>
        </p>
      </center>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection