@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Edit Profile</title>
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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('profileadmin.index')}}">Profile {{auth()->user()->name}}</a></li>
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
              <h3 class="card-title">Informasi Umum</h3>
            </div>
            <!-- /.card-header -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <!-- form Edit -->
            <form action="{{ route('profileadmin.update', $profileadmin->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="jenKelamin">Jenis Kelamin</label>
                  <select class="form-control" id="jenKelamin" name="jenKelamin" value="{{ $profileadmin->jenis_kelamin }}" required>
                    @if($profileadmin->jenis_kelamin == 'Laki-Laki')
                    <option value="Laki-Laki" selected>Laki Laki</option>
                    <option value="Perempuan">Perempuan</option>
                    @endif
                    @if($profileadmin->jenis_kelamin == 'Perempuan')
                    <option value="Laki-Laki">Laki Laki</option>
                    <option value="Perempuan" selected>Perempuan</option>
                    @endif
                  </select>
                  <p class="text-danger">{{ $errors->first('jenis_kelamin') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="statPerkawinan">Status Perkawinan</label>
                  <select class="form-control" id="statPerkawinan" name="statPerkawinan" value="{{ $profileadmin->status_perkawinan }}" required>
                    @if($profileadmin->status_perkawinan == 'Kawin')
                    <option value="Kawin" selected>Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    @endif
                    @if($profileadmin->status_perkawinan == 'Belum Kawin')
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin" selected>Belum Kawin</option>
                    @endif
                  </select>
                  <p class="text-danger">{{ $errors->first('status_perkawinan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="tgLahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tgLahir" placeholder="Tanggal" name="tgLahir" value="{{ $profileadmin->tanggal_lahir }}" required>
                  <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="noTel">No. Telepon</label>
                  <input type="number" class="form-control" id="noTel" placeholder="No. Telepon"  name="noTel" value="{{ $profileadmin->no_telp }}" required>
                  <p class="text-danger">{{ $errors->first('no_telp') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="alamat2">Alamat</label>
                  <textarea class="form-control" rows="3" id="alamat2" placeholder="Masukkan Alamat" name="alamat2">{{ $profileadmin->alamat }}</textarea>
                  <p class="text-danger">{{ $errors->first('alamat') }}</p>
                </div>
                <div class="row">
                  <div class="col-md-8 kota1">
                    <div class="form-group">
                      <label class="warnaAbu1" for="kota2">Kota</label>
                      <input type="text" class="form-control" id="kota2" placeholder="Kota2" name="kota2" value="{{ $profileadmin->kota }}" required>
                      <p class="text-danger">{{ $errors->first('kota') }}</p>
                  </div>
                  </div>
                  <div class="col-md-4 kodePos">
                    <div class="form-group">
                      <label class="warnaAbu1" for="kodPos">Kode Pos</label>
                      <input type="number" class="form-control" id="kodPos" placeholder="Kode Pos" name="kodPos" value="{{ $profileadmin->kode_pos }}" required>
                      <p class="text-danger">{{ $errors->first('kode_pos') }}</p>
                  </div>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
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