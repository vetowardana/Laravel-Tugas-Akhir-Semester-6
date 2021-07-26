@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Profile {{auth()->user()->name}}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile {{auth()->user()->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Profile {{auth()->user()->name}}</li>
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
          @if(count($profilemahasiswa) < 1)
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Informasi Umum</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('profilemahasiswa.store')}}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="nama_universitas">Nama Universitas</label>
                  <input type="text" class="form-control" id="nama_universitas" name='nama_universitas' placeholder="Nama Universitas" value="{{ old('nama_universitas') }}" required>
                  <p class="text-danger">{{ $errors->first('nama_universitas') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="prodi">Program Studi</label>
                  <input type="text" class="form-control" id="prodi" name='prodi' placeholder="Program Studi" value="{{ old('prodi') }}" required>
                  <p class="text-danger">{{ $errors->first('prodi') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="nim">NIM Lengkap</label>
                  <input type="text" class="form-control" id="nim" name='nim' placeholder="NIM Lengkap" value="{{ old('nim') }}" required>
                  <p class="text-danger">{{ $errors->first('nim') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="jenis_kelamin">Jenis Kelamin</label>
                  <div class="form-group">
                      <select class="form-control" id="jenis_kelamin" name='jenis_kelamin' value="{{ old('jenis_kelamin') }}" required>
                          <option value="Laki-Laki">Laki Laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </select>
                      <p class="text-danger">{{ $errors->first('jenis_kelamin') }}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="status_perkawinan">Status Perkawinan</label>
                  <div class="form-group">
                      <select class="form-control" id="status_perkawinan" name='status_perkawinan' value="{{ old('status_perkawinan') }}" required>
                          <option value="Kawin">Kawin</option>
                          <option value="Belum Kawin">Belum Kawin</option>
                      </select>
                      <p class="text-danger">{{ $errors->first('status_perkawinan') }}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                  <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="no_telp">No. Telepon</label>
                  <input type="number" class="form-control" id="no_telp" placeholder="No. Telepon" name="no_telp" value="{{ old('no_telp') }}" required>
                  <p class="text-danger">{{ $errors->first('no_telp') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="alamat">Alamat</label>
                  <textarea class="form-control" rows="3" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{ old('alamat') }}" required></textarea>
                  <p class="text-danger">{{ $errors->first('alamat') }}</p>
                </div>
                <div class="row">
                  <div class="col-md-8 kota1">
                    <div class="form-group">
                      <label class="warnaAbu1" for="kota">Kota</label>
                      <input type="text" class="form-control" id="kota" placeholder="Kota" name="kota" value="{{ old('kota') }}" required>
                      <p class="text-danger">{{ $errors->first('kota') }}</p>
                  </div>
                  </div>
                  <div class="col-md-4 kodePos">
                    <div class="form-group">
                      <label class="warnaAbu1" for="kode_pos">Kode Pos</label>
                      <input type="number" class="form-control" id="kode_pos" placeholder="Kode Pos" name="kode_pos" value="{{ old('kode_pos') }}" required>
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
          @else
          @if (session('success'))
              <div class="alert alert-info">{{ session('success') }}</div>
          @endif

          @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          <div class="row">
              <div class="col-12">
              <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 100%; max-height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                      <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Universitas</th>
                          <th>Jenis Kelamin</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @php $no = 1; @endphp
                      @forelse ($profilemahasiswa as $p)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $p->nama_universitas }}</td>
                              <td>{{ $p->jenis_kelamin }}</td>
                              <td>
                              <a href="{{ route('profilemahasiswa.edit', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                              <form action="{{ route('profilemahasiswa.destroy', $p->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm">Reset</button>
                              </form>
                              </td>
                              @empty
                              <tr>
                                  <td colspan="5" class="text-center">Belum ada data</td>
                              </tr>
                      @endforelse
                      </tbody>
                  </table>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
              </div>
          </div>
          @endif

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