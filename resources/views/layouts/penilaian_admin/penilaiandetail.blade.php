@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail Penilaian {{ $penilaian->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-5">
          <h1 class="m-0">Detail Penilaian {{ $penilaian->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('penilaiandmin.index')}}">Penilaian Magang</a></li>
            <li class="breadcrumb-item"><a href="{{route('penilaiandmin.show', $lowongan_selesai->id)}}">Penilaian Magang {{ $lowongan_selesai->nama_lowongan }}</a></li>
            <li class="breadcrumb-item active">Detail Penilaian {{ $penilaian->name }}</li>
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
              <h3 class="card-title">Detail Penilaian</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <center style="padding-bottom: 10px;">
                <h5><strong>Nama Mahasiswa : </strong>{{ $penilaian->name }}</h5>
                <div class="row">
                  <div class="col-sm-6 tgl-dibuat-1"><p><strong>Tanggal : </strong>{{ $penilaian->tanggal_submit }}</p></div>
                  <div class="col-sm-6 wkt-dibuat-1"><p><strong>Waktu : </strong>{{ $penilaian->waktu_submit }}</p></div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-6 nama-perusahaan1"><p><strong>Nama Perusahaan : </strong>{{ $penilaian->nama_perusahaan }}</p></div>
                  <div class="col-sm-6 nama-lowongan1"><p><strong>Nama Lowongan : </strong>{{ $penilaian->nama_lowongan }}</p></div>
                </div>
                <a href="{{route('download3', $penilaian->id)}}"><button class="btn btn-info"><i class="fas fa-download"></i> Penilaian Magang</button></a>
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