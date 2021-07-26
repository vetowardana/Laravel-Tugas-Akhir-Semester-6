@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail {{ $lowonganbaru->nama_lowongan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail {{ $lowonganbaru->nama_lowongan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('lowonganbaru.index')}}">Manajemen Lowongan Baru</a></li>
            <li class="breadcrumb-item active">Detail {{ $lowonganbaru->nama_lowongan }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if(count($profileadmin) < 1)
      <div class="alert alert-info">Segera isi <a href="{{route('profileadmin.index')}}">profile</a> anda!</div>
      @endif
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-9 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Detail Lowongan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('lowonganbaru.update', $lowonganbaru->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="card-body">
                <h5><strong>{{ $lowonganbaru->nama_lowongan }}</strong></h5>
                <div class="row">
                  <div class="col-sm-6"><p style="margin-bottom: -5px; color: grey;">Lowongan Diposting : {{ $lowonganbaru->lowongan_mulai }}</p></div>
                  <div class="col-sm-6"><p style="margin-bottom: -5px; color: grey;" class="text-right">Lowongan Selesai : {{ $lowonganbaru->lowongan_selesai }}</p></div>
                </div><hr>
                <p><strong>Deskripsi Lowongan :</strong></p>
                <p style="text-align: justify;">{!! $lowonganbaru->deskripsi !!}</p><hr>
                <p><strong>Status : </strong>{{ $lowonganbaru->status }}</p>
                
                <div class="form-group">
                  <label class="warnaAbu1" for="status">Ubah Status</label>
                  <select class="form-control" id="status" name="status" value="{{ old('status') }}" required>
                    <option value="Diterima">Diterima</option>
                    <option value="Ditolak">Ditolak</option>
                  </select>
                  <p class="text-danger">{{ $errors->first('status') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="alasan">Alasan</label>
                  <textarea class="form-control" rows="3" id="alasan" placeholder="Alasan" name="alasan" value="{{ old('alasan') }}" required></textarea>
                  <p class="text-danger">{{ $errors->first('alasan') }}</p>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
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
                    <h5><strong>{{ $lowonganbaru->nama_Perusahaan }} </strong>({{ $lowonganbaru->jenis_perusahaan }})</h5>
                    <p style="margin-bottom: -1px; color: grey;">{{ $lowonganbaru->kota }}</p>
                    <p><strong>No. Telepon : </strong>{{ $lowonganbaru->no_telp }}</p><hr>
                    <img src="{{ asset('storage/pasanglowongan/' . $lowonganbaru->image) }}" style="width: 200px;"><hr>
                    <p><strong>Alamat</strong></p>
                    <p style="text-align: justify;">{{ $lowonganbaru->alamat }}</p>
                  </center>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-light">
                  <h3 class="card-title">Pemosting</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <center>
                    <h5><strong>{{ $lowonganbaru->name }} </strong></h5>
                    <p>({{ $lowonganbaru->email }})</p>
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
  <!-- /.content -->
</div>

@endsection