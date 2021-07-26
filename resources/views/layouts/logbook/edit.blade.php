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
        <div class="col-sm-6">
          <h1 class="m-0">Edit {{ $logbook->jenis_kegiatan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('logbook.index')}}">Logbook</a></li>
            <li class="breadcrumb-item active">Edit {{ $logbook->jenis_kegiatan }}</li>
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
              <h3 class="card-title">Edit Logbook</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('logbook.update', $logbook->id)}}" method="post">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="jenis_kegiatan">Nama Kegiatan</label>
                  <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Nama Kegiatan" value="{{ $logbook->jenis_kegiatan }}" required>
                  <p class="text-danger">{{ $errors->first('jenis_kegiatan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="uraian_kegiatan">Uraian Kegiatan</label>
                  <textarea id="summernote" name="uraian_kegiatan" required>{{ $logbook->uraian_kegiatan }}</textarea>
                  <p class="text-danger">{{ $errors->first('uraian_kegiatan') }}</p>
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
              <p style="text-align: left; margin-bottom: 0px;"><strong>Uraian Kegiatan : </strong></p>
              <p style="text-align: left; margin-bottom: 0px;">{!! $logbook->uraian_kegiatan !!}</p>
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