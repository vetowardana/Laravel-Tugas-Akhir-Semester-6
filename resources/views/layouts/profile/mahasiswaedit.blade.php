@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Edit Profile {{auth()->user()->name}}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Profile {{auth()->user()->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('profilemahasiswa.index')}}">Profile {{auth()->user()->name}}</a></li>
            <li class="breadcrumb-item active">Edit Profile {{auth()->user()->name}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Edit Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('profilemahasiswa.update', $profilemahasiswa->id)}}" method="post">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="nama_universitas">Nama Universitas</label>
                  <input type="text" class="form-control" id="nama_universitas" name='nama_universitas' placeholder="Nama Universitas" value="{{ $profilemahasiswa->nama_universitas }}" required>
                  <p class="text-danger">{{ $errors->first('nama_universitas') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="prodi">Program Studi</label>
                  <input type="text" class="form-control" id="prodi" name='prodi' placeholder="Program Studi" value="{{ $profilemahasiswa->prodi }}" required>
                  <p class="text-danger">{{ $errors->first('prodi') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="nim">NIM Lengkap</label>
                  <input type="text" class="form-control" id="nim" name='nim' placeholder="NIM Lengkap" value="{{ $profilemahasiswa->nim }}" required>
                  <p class="text-danger">{{ $errors->first('nim') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="jenis_kelamin">Jenis Kelamin</label>
                  <div class="form-group">
                    <select class="form-control" id="jenis_kelamin" name='jenis_kelamin' value="{{ $profilemahasiswa->jenis_kelamin }}" required>
                      @if($profilemahasiswa->jenis_kelamin == 'Laki-Laki')
                      <option value="Laki-Laki" selected>Laki Laki</option>
                      <option value="Perempuan">Perempuan</option>
                      @endif
                      @if($profilemahasiswa->jenis_kelamin == 'Perempuan')
                      <option value="Laki-Laki">Laki Laki</option>
                      <option value="Perempuan" selected>Perempuan</option>
                      @endif
                    </select>
                    <p class="text-danger">{{ $errors->first('jenis_kelamin') }}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="status_perkawinan">Status Perkawinan</label>
                  <div class="form-group">
                    <select class="form-control" id="status_perkawinan" name='status_perkawinan' value="{{ $profilemahasiswa->status_perkawinan }}" required>
                      @if($profilemahasiswa->status_perkawinan == 'Kawin')
                      <option value="Kawin" selected>Kawin</option>
                      <option value="Belum Kawin">Belum Kawin</option>
                      @endif
                      @if($profilemahasiswa->status_perkawinan == 'Belum Kawin')
                      <option value="Kawin">Kawin</option>
                      <option value="Belum Kawin" selected>Belum Kawin</option>
                      @endif
                    </select>
                    <p class="text-danger">{{ $errors->first('status_perkawinan') }}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal" name="tanggal_lahir" value="{{ $profilemahasiswa->tanggal_lahir }}" required>
                  <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="no_telp">No. Telepon</label>
                  <input type="number" class="form-control" id="no_telp" placeholder="No. Telepon" name="no_telp" value="{{ $profilemahasiswa->no_telp }}" required>
                  <p class="text-danger">{{ $errors->first('no_telp') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="alamat">Alamat</label>
                  <textarea class="form-control" rows="3" id="alamat" placeholder="Masukkan Alamat" name="alamat" required>{{ $profilemahasiswa->alamat }}</textarea>
                  <p class="text-danger">{{ $errors->first('alamat') }}</p>
                </div>
                <div class="row">
                  <div class="col-md-8 kota1">
                    <div class="form-group">
                      <label class="warnaAbu1" for="kota">Kota</label>
                      <input type="text" class="form-control" id="kota" placeholder="Kota" name="kota" value="{{ $profilemahasiswa->kota }}" required>
                      <p class="text-danger">{{ $errors->first('kota') }}</p>
                  </div>
                  </div>
                  <div class="col-md-4 kodePos">
                    <div class="form-group">
                      <label class="warnaAbu1" for="kode_pos">Kode Pos</label>
                      <input type="number" class="form-control" id="kode_pos" placeholder="Kode Pos" name="kode_pos" value="{{ $profilemahasiswa->kode_pos }}" required>
                      <p class="text-danger">{{ $errors->first('kode_pos') }}</p>
                  </div>
                  </div>
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
        <!-- <section class="col-lg-6 connectedSortable">
        </section> -->
        <!-- right col -->
      </div>
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection