@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Edit Profile</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Profile {{auth()->user()->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('profileperusahaan.index')}}">Profile {{auth()->user()->name}}</a></li>
            <li class="breadcrumb-item active">Edit Profile {{auth()->user()->name}}</li>
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
        <section class="col-lg-12 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Informasi Umum</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('profileperusahaan.update', $profileperusahaan->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="nama_perusahaan">Nama Perusahaan</label>
                  <input type="text" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan" name="nama_perusahaan" value="{{ $profileperusahaan->nama_perusahaan }}" required>
                  <p class="text-danger">{{ $errors->first('nama_perusahaan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="jenis_perusahaan">Jenis Perusahaan</label>
                  <input type="text" class="form-control" id="jenis_perusahaan" placeholder="Jenis Perusahaan (Contoh : PT, BUMN, dll)" name="jenis_perusahaan" value="{{ $profileperusahaan->jenis_perusahaan }}" required>
                  <p class="text-danger">{{ $errors->first('jenis_perusahaan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="tanggal_berdiri">Tanggal Berdiri</label>
                  <input type="date" class="form-control" id="tanggal_berdiri" placeholder="Tanggal" name="tanggal_berdiri" value="{{ $profileperusahaan->tanggal_berdiri }}" required>
                  <p class="text-danger">{{ $errors->first('tanggal_berdiri') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="no_telp">No. Telepon</label>
                  <input type="number" class="form-control" id="no_telp" placeholder="No. Telepon" name="no_telp" value="{{ $profileperusahaan->no_telp }}" required>
                  <p class="text-danger">{{ $errors->first('no_telp') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="alamat">Alamat</label>
                  <textarea class="form-control" rows="3" id="alamat" placeholder="Masukkan Alamat" name="alamat">{{ $profileperusahaan->alamat }}</textarea>
                  <p class="text-danger">{{ $errors->first('alamat') }}</p>
                </div>
                <div class="row">
                  <div class="col-md-8 kota1">
                    <div class="form-group">
                      <label class="warnaAbu1" for="kota">Kota</label>
                      <input type="text" class="form-control" id="kota" placeholder="Kota" name="kota" value="{{ $profileperusahaan->kota }}" required>
                      <p class="text-danger">{{ $errors->first('kota') }}</p>
                  </div>
                  </div>
                  <div class="col-md-4 kodePos">
                    <div class="form-group">
                      <label class="warnaAbu1" for="kode_pos">Kode Pos</label>
                      <input type="number" class="form-control" id="kode_pos" placeholder="Kode Pos" name="kode_pos" value="{{ $profileperusahaan->kode_pos }}" required>
                      <p class="text-danger">{{ $errors->first('kode_pos') }}</p>
                  </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- <section class="col-lg-6 connectedSortable">
        </section> -->
        <!-- right col -->
      </div>
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection