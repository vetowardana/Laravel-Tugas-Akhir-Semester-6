@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail {{ $laporanbaru->judul_laporan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail {{ $laporanbaru->judul_laporan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('laporanperusahaan.index')}}">Laporan Magang</a></li>
            <li class="breadcrumb-item active">Detail {{ $laporanbaru->judul_laporan }}</li>
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
              <h3 class="card-title">Detail {{ $laporanbaru->judul_laporan }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <center style="padding-bottom: 10px;">
                <h5><strong>Nama Mahasiswa : </strong>{{ $laporanbaru->name }}</h5>
                <div class="row">
                  <div class="col-sm-6 tgl-dibuat-1"><p><strong>Tanggal Submit : </strong>{{ $laporanbaru->tanggal_dibuat }}</p></div>
                  <div class="col-sm-6 wkt-dibuat-1"><p><strong>Waktu Submit : </strong>{{ $laporanbaru->waktu_dibuat }}</p></div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-6 nama-perusahaan1"><p><strong>Nama Perusahaan : </strong>{{ $laporanbaru->nama_perusahaan }}</p></div>
                  <div class="col-sm-6 nama-lowongan1"><p><strong>Nama Lowongan : </strong>{{ $laporanbaru->nama_lowongan }}</p></div>
                </div>
                <p class="status"><strong>Status : </strong>{{ $laporanbaru->status }}</p>
                <a href="{{route('download2', $laporanbaru->id)}}"><button class="btn btn-info"><i class="fas fa-download"></i> Laporan Magang</button></a>
              </center>
            </div>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <section class="col-lg-3 connectedSortable">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-light">
                  <h3 class="card-title">Kirim File Bertandatangan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('laporanperusahaan.update', $laporanbaru->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label class="warnaAbu1" for="laporan_magang">Laporan Bertandatangan</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="laporan_magang" value="{{ old('laporan_magang')}}">
                        <label class="custom-file-label" for="customFile">PDF</label>
                      </div>
                      <p class="text-danger">{{ $errors->first('laporan_magang') }}</p>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
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