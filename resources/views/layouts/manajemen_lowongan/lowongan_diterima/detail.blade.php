@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail {{ $lowonganditerima->nama_lowongan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail {{ $lowonganditerima->nama_lowongan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('lowonganditerima.index')}}">Manajemen Lowongan Diterima</a></li>
            <li class="breadcrumb-item active">Detail {{ $lowonganditerima->nama_lowongan }}</li>
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
              <h5><strong>{{ $lowonganditerima->nama_lowongan }}</strong></h5>
              <div class="row">
                <div class="col-sm-6"><p style="margin-bottom: -5px; color: grey;">Lowongan Diposting : {{ $lowonganditerima->lowongan_mulai }}</p></div>
                <div class="col-sm-6"><p style="margin-bottom: -5px; color: grey;" class="text-right">Lowongan Selesai : {{ $lowonganditerima->lowongan_selesai }}</p></div>
              </div><hr>
              <p><strong>Deskripsi Lowongan :</strong></p>
              <p style="text-align: justify;">{!! $lowonganditerima->deskripsi !!}</p><hr>
              <p><strong>Status : </strong>{{ $lowonganditerima->status }}</p>
              <p><strong>Alasan Diterima :</strong></p>
              <p>{{ $lowonganditerima->alasan }}</p>
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
                    <h5><strong>{{ $lowonganditerima->nama_Perusahaan }} </strong>({{ $lowonganditerima->jenis_perusahaan }})</h5>
                    <p style="margin-bottom: -1px; color: grey;">{{ $lowonganditerima->kota }}</p>
                    <p><strong>No. Telepon : </strong>{{ $lowonganditerima->no_telp }}</p><hr>
                    <img src="{{ asset('storage/pasanglowongan/' . $lowonganditerima->image) }}" style="width: 200px;"><hr>
                    <p><strong>Alamat</strong></p>
                    <p style="text-align: justify;">{{ $lowonganditerima->alamat }}</p>
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
                    <h5><strong>{{ $lowonganditerima->name }} </strong></h5>
                    <p>({{ $lowonganditerima->email }})</p>
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