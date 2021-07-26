@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail {{ $laporantt->judul_laporan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail {{ $laporantt->judul_laporan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('laporanperusahaan.index')}}">Laporan Magang</a></li>
            <li class="breadcrumb-item active">Detail {{ $laporantt->judul_laporan }}</li>
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
        <section class="col-lg-12 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Detail {{ $laporantt->judul_laporan }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <center style="padding-bottom: 10px;">
                <h5><strong>Nama Mahasiswa : </strong>{{ $laporantt->name }}</h5>
                <div class="row">
                  <div class="col-sm-6 tgl-dibuat-1"><p><strong>Tanggal Submit : </strong>{{ $laporantt->tanggal_dibuat }}</p></div>
                  <div class="col-sm-6 wkt-dibuat-1"><p><strong>Waktu Submit : </strong>{{ $laporantt->waktu_dibuat }}</p></div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-6 nama-perusahaan1"><p><strong>Nama Perusahaan : </strong>{{ $laporantt->nama_perusahaan }}</p></div>
                  <div class="col-sm-6 nama-lowongan1"><p><strong>Nama Lowongan : </strong>{{ $laporantt->nama_lowongan }}</p></div>
                </div>
                <p class="status"><strong>Status : </strong>{{ $laporantt->status }}</p>
                <a href="{{route('download2', $laporantt->id)}}"><button class="btn btn-info"><i class="fas fa-download"></i> Laporan Magang</button></a>
              </center>
            </div>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- <section class="col-lg-3 connectedSortable">
        </section> -->
        <!-- right col -->
      </div>
      @endif
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection