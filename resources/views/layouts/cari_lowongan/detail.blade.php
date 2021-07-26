@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail {{ $carilowongan->nama_lowongan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail {{ $carilowongan->nama_lowongan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('carilowongan.index')}}">Cari Lowongan Magang</a></li>
            <li class="breadcrumb-item active">Detail {{ $carilowongan->nama_lowongan }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if(count($profilemahasiswa) < 1)
      <div class="alert alert-info">Segera isi <a href="{{route('profilemahasiswa.index')}}">profile</a> anda!</div>
      @endif
      <div class="alert alert-info">Jika perusahaan meminta file lain, maka perusahaan akan menghubungi anda :)</div>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-9 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Detail Lowongan Magang</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('daftarlowongan', $carilowongan->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <h5><strong>{{ $carilowongan->nama_lowongan }}</strong></h5>
                <div class="row">
                  <div class="col-sm-6"><p style="margin-bottom: -5px; color: grey;">Dibuat : {{ $carilowongan->lowongan_mulai }}</p></div>
                  <div class="col-sm-6"><p style="margin-bottom: -5px; color: grey;" class="text-right">Berakhir : {{ $carilowongan->lowongan_selesai }}</p></div>
                </div><hr>
                <p><strong>Deskripsi :</strong></p>
                <p>{!! $carilowongan->deskripsi !!}</p><hr>
                
                <div class="form-group">
                  <label class="warnaAbu1" for="surat_permohonan">Surat Permohonan Magang</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="surat_permohonan" value="{{ old('surat_permohonan')}}">
                    <label class="custom-file-label" for="customFile">PDF</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('surat_permohonan') }}</p>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Apply</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <section class="col-lg-3 connectedSortable">
          <!-- Lowongan Baru -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-light">
                  <h3 class="card-title">Profile Perusahaan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <center>
                    <h5><strong>{{ $carilowongan->nama_Perusahaan }} </strong>({{ $carilowongan->jenis_perusahaan }})</h5>
                    <p style="margin-bottom: -1px; color: grey;">{{ $carilowongan->kota }}</p>
                    <p><strong>No. Telepon : </strong>{{ $carilowongan->no_telp }}</p><hr>
                    <img src="{{ asset('storage/pasanglowongan/' . $carilowongan->image) }}" style="width: 200px;"><hr>
                    <p><strong>Alamat</strong></p>
                    <p style="text-align: justify;">{{ $carilowongan->alamat }}</p>
                  </center>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
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