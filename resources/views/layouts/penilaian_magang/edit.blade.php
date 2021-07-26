@extends('layouts.user.index')

@section('title')
  <title>MagangKUY - Edit Penilaian {{ $penilaian->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-5">
          <h1 class="m-0">Edit Penilaian {{ $penilaian->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('penilaianmagang.index')}}">Penilaian</a></li>
            <li class="breadcrumb-item"><a href="{{route('penilaianmagang.show', $lowongan_selesai->id)}}">Penilaian {{ $lowongan_selesai->nama_lowongan }}</a></li>
            <li class="breadcrumb-item"><a href="{{route('buatpenilaian', $pendaftar->id)}}">Penilaian {{ $pendaftar->name }}</a></li>
            <li class="breadcrumb-item active">Edit Penilaian {{ $penilaian->name }}</li>
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
              <h3 class="card-title">Edit Penilaian {{ $pendaftar->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('penilaianmagang.update', $penilaian->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <p class="text-info">Note : Kirimkan penilaian magang baru yang sudah ditandatangani perusahaan.</p>
                <div class="form-group">
                  <label class="warnaAbu1" for="penilaian_magang">Penilaian Magang</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="penilaian_magang" value="{{ old('penilaian_magang')}}">
                    <label class="custom-file-label" for="customFile">PDF</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('penilaian_magang') }}</p>
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
                <hr>
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