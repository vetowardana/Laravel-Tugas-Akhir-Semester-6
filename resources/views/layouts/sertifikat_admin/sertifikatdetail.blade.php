@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail Sertifikat {{ $sertifikat->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-5">
          <h1 class="m-0">Detail Sertifikat {{ $sertifikat->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('sertifikatadmin.index')}}">Sertifikat Magang</a></li>
            <li class="breadcrumb-item"><a href="{{route('sertifikatadmin.show', $lowongan_selesai->id)}}">Sertifikat Magang {{ $lowongan_selesai->nama_lowongan }}</a></li>
            <li class="breadcrumb-item active">Detail Sertifikat {{ $sertifikat->name }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  @if(count($profileadmin) < 1)
  <div class="alert alert-info">Isi <a href="{{route('profileadmin.index')}}">profile</a> anda terlebih dahulu !</div>
  @else
  <section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <!-- <section class="col-lg-4 connectedSortable">
        </section> -->
        <!-- /.Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- tambah -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Detail Sertifikat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <center style="padding-bottom: 10px;">
                <h5><strong>Nama Mahasiswa : </strong>{{ $sertifikat->name }}</h5>
                <div class="row">
                  <div class="col-sm-6 tgl-dibuat-1"><p><strong>Tanggal : </strong>{{ $sertifikat->tanggal_submit }}</p></div>
                  <div class="col-sm-6 wkt-dibuat-1"><p><strong>Waktu : </strong>{{ $sertifikat->waktu_submit }}</p></div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-6 nama-perusahaan1"><p><strong>Nama Perusahaan : </strong>{{ $sertifikat->nama_perusahaan }}</p></div>
                  <div class="col-sm-6 nama-lowongan1"><p><strong>Nama Lowongan : </strong>{{ $sertifikat->nama_lowongan }}</p></div>
                </div><br><br>
                <a href="{{route('download4', $sertifikat->id)}}"><button class="btn btn-info"><i class="fas fa-download"></i> Sertifikat Magang</button></a>
              </center>
            </div>
          </div>
        </section>
        <!-- right col -->
      </div>
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  @endif
  <!-- /.content -->
</div>

@endsection