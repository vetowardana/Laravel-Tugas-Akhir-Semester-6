@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Pengaturan Akun</title>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengaturan Akun {{auth()->user()->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Pengaturan Akun</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Pengaturan Akun</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('ubahnama')}}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="name">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ $user->name }}" required>
                  <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}" disabled>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  <p class="text-danger">{{ $errors->first('password') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="konfirmasi">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" placeholder="Konfirmasi Password">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <section class="col-lg-4 connectedSortable">
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Ubah Foto Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="ubahgambar" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <center>
                  <label class="warnaAbu1" for="image">Foto Profile</label>
                  <br>
                <img src="{{ asset('storage/user/' . $user->image) }}" width="100px" height="100px">
                <p>{{ $user->name }}</p>
                </center>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="image">
                  <label class="custom-file-label" for="customFile">Foto</label>
                </div>
            </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>

          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Ganti Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('ubahpassword')}}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="passwordL">Password Lama</label>
                  <input type="password" class="form-control" id="passwordL" name="passwordL" placeholder="Password Lama">
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="passwordB">Password Baru</label>
                  <input type="password" class="form-control" id="passwordB" name="passwordB" placeholder="Password Baru">
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="konfirmasiP">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="konfirmasiP" name="konfirmasiP" placeholder="Konfirmasi Password">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </section>
        <!-- right col -->
      </div>
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection