@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Edit {{ $logbook->jenis_kegiatan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-5">
          <h1 class="m-0">Detail {{ $logbook->jenis_kegiatan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('logbookperusahaan.index')}}">Logbook</a></li>
            <li class="breadcrumb-item"><a href="{{route('logbookperusahaan.show', $lowongan_selesai->id)}}">Logbook {{ $lowongan_selesai->nama_lowongan }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('lihatlogbook', $pendaftar->id)}}">Logbook {{ $pendaftar->name }}</a></li>
            <li class="breadcrumb-item active">Detail {{ $logbook->jenis_kegiatan }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  @if(count($profileperusahaan) < 1)
  <div class="alert alert-info">Isi <a href="{{route('profilemahasiswa.index')}}">profile</a> anda terlebih dahulu !</div>
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
              <h3 class="card-title">Detail Logbook</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <center style="padding-bottom: 10px;">
                <h5><strong>Nama Kegiatan : </strong>{{ $logbook->jenis_kegiatan }}</h5>
                <div class="row">
                  <div class="col-sm-6 tgl-dibuat-1"><p><strong>Tanggal Dibuat : </strong>{{ $logbook->tanggal_kegiatan }}</p></div>
                  <div class="col-sm-6 wkt-dibuat-1"><p><strong>Waktu Dibuat : </strong>{{ $logbook->waktu_kegiatan }}</p></div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-6 nama-perusahaan1"><p><strong>Nama Perusahaan : </strong>{{ $logbook->nama_perusahaan }}</p></div>
                  <div class="col-sm-6 nama-lowongan1"><p><strong>Nama Lowongan : </strong>{{ $logbook->nama_lowongan }}</p></div>
                </div>
              </center>
              <p style="margin-bottom: 0px;"><strong>Uraian Kegiatan : </strong></p>
              <p style="margin-bottom: 0px;">{!! $logbook->uraian_kegiatan !!}</p>
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