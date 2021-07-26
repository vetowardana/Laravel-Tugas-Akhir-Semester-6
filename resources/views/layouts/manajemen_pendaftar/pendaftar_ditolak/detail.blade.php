@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail Pendaftaran {{ $pendaftarditolak->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Pendaftaran {{ $pendaftarditolak->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('pendaftarditolak.index')}}">Pendaftar Ditolak</a></li>
            <li class="breadcrumb-item active">Detail Pendaftaran {{ $pendaftarditolak->name }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if(count($profileperusahaan) < 1)
      <div class="alert alert-info">Segera isi <a href="{{route('profileperusahaan.index')}}">profile</a> anda!</div>
      @else
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-9 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Detail Pendaftar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <center>
                <h3 class="warnaAbu1"><strong>{{ $pendaftarditolak->name }}</strong></h3>
                <div class="row">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Email : </strong>{{ $pendaftarditolak->email }}</p></div>
                  <div class="col-md-6" style="text-align: right; color: grey;"><p><strong>Nomor Telepon : </strong>{{ $pendaftarditolak->no_telp }}</p></div>
                </div>
                <hr>
                <img src="{{ asset('storage/user/' . $pendaftarditolak->image) }}" class="img-circle elevation-2" alt="User Image" style="width: 200px; height: 200px;">
                <hr>
                <div class="row" style="padding-left: 230px;">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Nama Universitas : </strong>{{ $pendaftarditolak->nama_universitas }}</p></div>
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Program Sudi : </strong>{{ $pendaftarditolak->prodi }}</p></div>
                </div>
                <div class="row" style="padding-left: 230px;">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>NIM Lengkap : </strong>{{ $pendaftarditolak->nim }}</p></div>
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Tanggal Lahir : </strong>{{ $pendaftarditolak->tanggal_lahir }}</p></div>
                </div>
                <div class="row" style="padding-left: 230px;">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Jenis Kelamin : </strong>{{ $pendaftarditolak->jenis_kelamin }}</p></div>
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Status Perkawinan : </strong>{{ $pendaftarditolak->status_perkawinan }}</p></div>
                </div>
                <div class="row" style="padding-left: 230px;">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Kota : </strong>{{ $pendaftarditolak->kota }}</p></div>
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Kode Pos : </strong>{{ $pendaftarditolak->kode_pos }}</p></div>
                </div>
                <p style="text-align: left; color: grey; padding-left: 230px;"><strong>Alamat : </strong>{{ $pendaftarditolak->alamat }}</p>
                <a href="{{route('download', $pendaftarditolak->id)}}"><button class="btn btn-info"><i class="fas fa-download"></i> Surat Permohonan</button></a>
              </center>
            </div>
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
                  <h3 class="card-title">Lowongan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <center>
                    <h5><strong>{{ $pendaftarditolak->nama_lowongan }}</strong></h5>
                    <p style="margin-bottom: -1px; color: grey;">{{ $pendaftarditolak->nama_perusahaan }}</p>
                    <hr>
                    <img src="{{ asset('storage/pasanglowongan/' . $pendaftarditolak->logo) }}" class="img-circle elevation-2" alt="User Image" style="width: 150px; height: 150px;">
                  </center>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-light">
                  <h3 class="card-title">Status</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                  <p><strong>Status : </strong>{{ $pendaftarditolak->status }}</p>
                  <strong>Alasan : </strong>{{ $pendaftarditolak->alasan }}</p>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </section>
        <!-- right col -->
      </div>
      @endif
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection