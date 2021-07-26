@extends('layouts.user.index')

@section('title')
  <title>MagangKUY - Edit Sertifikat {{ $sertifikat->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-5">
          <h1 class="m-0">Edit Sertifikat {{ $sertifikat->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('sertifikatmagang.index')}}">Sertifikat</a></li>
            <li class="breadcrumb-item"><a href="{{route('sertifikatmagang.show', $lowongan_selesai->id)}}">Sertifikat {{ $lowongan_selesai->nama_lowongan }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('buatsertifikat', $pendaftar->id)}}">Sertifikat {{ $pendaftar->name }}</a></li>
            <li class="breadcrumb-item active">Edit Sertifikat {{ $sertifikat->name }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  @if(count($profileperusahaan) < 1)
  <div class="alert alert-info">Isi <a href="{{route('profileperusahaan.index')}}">profile</a> anda terlebih dahulu !</div>
  @else
  <section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Edit Sertifikat {{ $pendaftar->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('sertifikatmagang.update', $sertifikat->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <p class="text-info">Note : Kirimkan sertifikat magang baru yang sudah ditandatangani perusahaan.</p>
                <div class="form-group">
                  <label class="warnaAbu1" for="sertifikat_magang">Penilaian Magang</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="sertifikat_magang" value="{{ old('sertifikat_magang')}}">
                    <label class="custom-file-label" for="customFile">PDF</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('sertifikat_magang') }}</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </section>
        <!-- /.Left col -->
        <section class="col-lg-8 connectedSortable">
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          <!-- Detail -->
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