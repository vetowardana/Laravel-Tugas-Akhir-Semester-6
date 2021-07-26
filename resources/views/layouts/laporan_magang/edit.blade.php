@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Edit {{ $laporanmagang->judul_laporan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit {{ $laporanmagang->judul_laporan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('laporanmagang.index')}}">Laporan Magang</a></li>
            <li class="breadcrumb-item active">Edit {{ $laporanmagang->judul_laporan }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  @if(count($profilemahasiswa) < 1)
  <div class="alert alert-info">Isi <a href="{{route('profilemahasiswa.index')}}">profile</a> anda terlebih dahulu !</div>
  @else
  <section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">
          <!-- tambah -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Edit {{ $laporanmagang->judul_laporan }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('laporanmagang.update', $laporanmagang->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <p class="text-info">Note : Kirimkan laporan magang yang ingin ditandatangani perusahaan.</p>
                <div class="form-group">
                  <label class="warnaAbu1" for="judul_laporan">Judul Laporan</label>
                  <input type="text" class="form-control" id="judul_laporan" name="judul_laporan" placeholder="Nama Kegiatan" value="{{ $laporanmagang->judul_laporan }}" required>
                  <p class="text-danger">{{ $errors->first('judul_laporan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="laporan_magang">Laporan Magang</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="laporan_magang" value="{{ old('laporan_magang')}}">
                    <label class="custom-file-label" for="customFile">PDF</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('laporan_magang') }}</p>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </section>
        <!-- /.Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- tambah -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Detail {{ $laporanmagang->judul_laporan }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <center style="padding-bottom: 10px;">
                <h5><strong>Nama Mahasiswa : </strong>{{ $laporanmagang->name }}</h5>
                <div class="row">
                  <div class="col-sm-6 tgl-dibuat-1"><p><strong>Tanggal Submit : </strong>{{ $laporanmagang->tanggal_dibuat }}</p></div>
                  <div class="col-sm-6 wkt-dibuat-1"><p><strong>Waktu Submit : </strong>{{ $laporanmagang->waktu_dibuat }}</p></div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-6 nama-perusahaan1"><p><strong>Nama Perusahaan : </strong>{{ $laporanmagang->nama_perusahaan }}</p></div>
                  <div class="col-sm-6 nama-lowongan1"><p><strong>Nama Lowongan : </strong>{{ $laporanmagang->nama_lowongan }}</p></div>
                </div>
                <p class="status"><strong>Status : </strong>{{ $laporanmagang->status }}</p>
                <a href="{{route('download2', $laporanmagang->id)}}"><button class="btn btn-info"><i class="fas fa-download"></i> Laporan Magang</button></a>
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