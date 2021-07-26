@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Edit Akun {{ $mahasiswa->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Akun {{ $mahasiswa->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('manajemenmahasiswa.index')}}">Manajemen Akun Mahasiswa</a></li>
            <li class="breadcrumb-item active">Edit Akun {{ $mahasiswa->name }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if(count($profileadmin) < 1)
      <div class="alert alert-info">Segera isi <a href="{{route('profileadmin.index')}}">profile</a> anda!</div>
      @endif
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Tambah Akun</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('manajemenmahasiswa.update', $mahasiswa->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="name">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ $mahasiswa->name }}" required disabled>
                  <p class="text-danger">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $mahasiswa->email }}" required disabled>
                  <p class="text-danger">{{ $errors->first('email') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                  <p class="text-danger">{{ $errors->first('password') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="konfirmPass">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="konfirmPass" name="konfirmPass" placeholder="Konfirmasi Password">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- <section class="col-lg-8 connectedSortable">
        </section> -->
        <!-- right col -->
      </div>
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection