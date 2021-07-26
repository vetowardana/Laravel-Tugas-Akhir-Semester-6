@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Edit {{ $pasanglowongan->nama_lowongan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit {{ $pasanglowongan->nama_lowongan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('pasanglowongan.index')}}">Pasang Lowongan</a></li>
            <li class="breadcrumb-item active">Edit {{ $pasanglowongan->nama_lowongan }}</li>
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
        <section class="col-lg-7 connectedSortable">
          <!-- tambah -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Edit Lowongan Magang</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('pasanglowongan.update', $pasanglowongan->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="nama_lowongan">Nama Lowongan</label>
                  <input type="text" class="form-control" id="nama_lowongan" name="nama_lowongan" placeholder="Nama Lowongan" value="{{ $pasanglowongan->nama_lowongan }}" required>
                  <p class="text-danger">{{ $errors->first('nama_lowongan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="deskripsi">Deskripsi Lowongan</label>
                  <textarea id="summernote" name="deskripsi" required>{{ $pasanglowongan->deskripsi }}</textarea>
                  <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="image">Logo Perusahaan</label>
                  <center>
                    <hr>
                    <img src="{{ asset('storage/pasanglowongan/' . $pasanglowongan->image) }}" width="200px" height="200px" alt="{{ $pasanglowongan->nama_lowongan }}">
                    <p>Biarkan kosong jika tidak ingin mengganti gambar</p>
                    <hr>
                  </center>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image" name="image">
                    <label class="custom-file-label" for="customFile">Logo</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('image') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="lowongan_selesai">Lowongan Berakhir</label>
                  <input type="date" class="form-control" id="lowongan_selesai" name="lowongan_selesai" placeholder="Lowongan Berakhir" value="{{ $pasanglowongan->lowongan_selesai }}">
                  <p class="text-danger">{{ $errors->first('lowongan_selesai') }}</p>
                </div>
              </div>
              <!-- /.card-body -->

              @if($pasanglowongan->status != 'Diterima' and $pasanglowongan->status != 'Selesai')
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
              @endif
            </form>
          </div>
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
                    <h5><strong>{{ $pasanglowongan->nama_Perusahaan }} </strong>({{ $pasanglowongan->jenis_perusahaan }})</h5>
                    <p style="margin-bottom: -1px; color: grey;">{{ $pasanglowongan->kota }}</p>
                    <p><strong>No. Telepon : </strong>{{ $pasanglowongan->no_telp }}</p><hr>
                    <p><strong>Alamat</strong></p>
                    <p style="text-align: justify;">{{ $pasanglowongan->alamat }}</p>
                  </center>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </section>
        <section class="col-lg-2 connectedSortable">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-light">
                  <h3 class="card-title">Status</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <center>
                    <p><strong>Status : </strong>{{ $pasanglowongan->status }}</p>
                    @if($pasanglowongan->status != 'Selesai')
                    <p><strong>Alasan :</strong></p>
                    <p>{{ $pasanglowongan->alasan }}</p>
                    <form action="{{ route('selesai', $pasanglowongan->id) }}" method="post">
                      @csrf
                      <button class="btn btn-danger">Akhiri Lowongan</button>
                    </form>
                    @endif
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
  @endif
  <!-- /.content -->
</div>

@endsection