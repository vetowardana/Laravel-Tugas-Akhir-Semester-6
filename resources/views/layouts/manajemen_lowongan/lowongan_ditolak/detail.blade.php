@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail {{ $lowonganditolak->nama_lowongan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail {{ $lowonganditolak->nama_lowongan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('lowonganditolak.index')}}">Manajemen Lowongan Ditolak</a></li>
            <li class="breadcrumb-item active">Detail {{ $lowonganditolak->nama_lowongan }}</li>
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
        <section class="col-lg-9 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Detail Lowongan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <h5><strong>{{ $lowonganditolak->nama_lowongan }}</strong></h5>
              <div class="row">
                <div class="col-sm-6"><p style="margin-bottom: -5px; color: grey;">Lowongan Diposting : {{ $lowonganditolak->lowongan_mulai }}</p></div>
                <div class="col-sm-6"><p style="margin-bottom: -5px; color: grey;" class="text-right">Lowongan Selesai : {{ $lowonganditolak->lowongan_selesai }}</p></div>
              </div><hr>
              <p><strong>Deskripsi Lowongan :</strong></p>
              <p style="text-align: justify;">{!! $lowonganditolak->deskripsi !!}</p><hr>
              <p><strong>Status : </strong>{{ $lowonganditolak->status }}</p>
              <p><strong>Alasan Ditolak :</strong></p>
              <p>{{ $lowonganditolak->alasan }}</p>
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
                  <h3 class="card-title">Profile Perusahaan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <center>
                    <h5><strong>{{ $lowonganditolak->nama_Perusahaan }} </strong>({{ $lowonganditolak->jenis_perusahaan }})</h5>
                    <p style="margin-bottom: -1px; color: grey;">{{ $lowonganditolak->kota }}</p>
                    <p><strong>No. Telepon : </strong>{{ $lowonganditolak->no_telp }}</p><hr>
                    <img src="{{ asset('storage/pasanglowongan/' . $lowonganditolak->image) }}" style="width: 200px;"><hr>
                    <p><strong>Alamat</strong></p>
                    <p style="text-align: justify;">{{ $lowonganditolak->alamat }}</p>
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
                  <h3 class="card-title">Pemosting</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <center>
                    <h5><strong>{{ $lowonganditolak->name }} </strong></h5>
                    <p>({{ $lowonganditolak->email }})</p>
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