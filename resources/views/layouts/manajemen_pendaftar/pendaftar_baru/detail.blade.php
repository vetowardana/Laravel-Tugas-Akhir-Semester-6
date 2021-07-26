@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Detail Pendaftaran {{ $pendaftarbaru->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Pendaftaran {{ $pendaftarbaru->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('pendaftarbaru.index')}}">Pendaftar Baru</a></li>
            <li class="breadcrumb-item active">Detail Pendaftaran {{ $pendaftarbaru->name }}</li>
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
      <div class="alert alert-info">Jika ada file lain yang dibutuhkan, perusahaan dapat meminta pelamar untuk mengirimkan file tersebut :)</div>
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-9 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Detail Pendaftar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <center>
                <h3 class="warnaAbu1"><strong>{{ $pendaftarbaru->name }}</strong></h3>
                <div class="row">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Email : </strong>{{ $pendaftarbaru->email }}</p></div>
                  <div class="col-md-6" style="text-align: right; color: grey;"><p><strong>Nomor Telepon : </strong>{{ $pendaftarbaru->no_telp }}</p></div>
                </div>
                <hr>
                <img src="{{ asset('storage/user/' . $pendaftarbaru->image) }}" class="img-circle elevation-2" alt="User Image" style="width: 200px; height: 200px;">
                <hr>
                <div class="row" style="padding-left: 230px;">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Nama Universitas : </strong>{{ $pendaftarbaru->nama_universitas }}</p></div>
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Program Sudi : </strong>{{ $pendaftarbaru->prodi }}</p></div>
                </div>
                <div class="row" style="padding-left: 230px;">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>NIM Lengkap : </strong>{{ $pendaftarbaru->nim }}</p></div>
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Tanggal Lahir : </strong>{{ $pendaftarbaru->tanggal_lahir }}</p></div>
                </div>
                <div class="row" style="padding-left: 230px;">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Jenis Kelamin : </strong>{{ $pendaftarbaru->jenis_kelamin }}</p></div>
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Status Perkawinan : </strong>{{ $pendaftarbaru->status_perkawinan }}</p></div>
                </div>
                <div class="row" style="padding-left: 230px;">
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Kota : </strong>{{ $pendaftarbaru->kota }}</p></div>
                  <div class="col-md-6" style="text-align: left; color: grey;"><p><strong>Kode Pos : </strong>{{ $pendaftarbaru->kode_pos }}</p></div>
                </div>
                <p style="text-align: left; color: grey; padding-left: 230px;"><strong>Alamat : </strong>{{ $pendaftarbaru->alamat }}</p>
                <a href="{{route('download', $pendaftarbaru->id)}}"><button class="btn btn-info"><i class="fas fa-download"></i> Surat Permohonan</button></a>
              </center>
            </div>
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
                  <h3 class="card-title">Lowongan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <center>
                    <h5><strong>{{ $pendaftarbaru->nama_lowongan }}</strong></h5>
                    <p style="margin-bottom: -1px; color: grey;">{{ $pendaftarbaru->nama_perusahaan }}</p>
                    <hr>
                    <img src="{{ asset('storage/pasanglowongan/' . $pendaftarbaru->logo) }}" class="img-circle elevation-2" alt="User Image" style="width: 150px; height: 150px;">
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
                  <h3 class="card-title">Ubah Status</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('pendaftarbaru.update', $pendaftarbaru->id)}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <p><strong>Status : </strong>{{ $pendaftarbaru->status }}</p>
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