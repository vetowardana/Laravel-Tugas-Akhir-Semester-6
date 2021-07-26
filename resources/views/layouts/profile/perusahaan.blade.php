@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Profile</title>
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
          @if(count($profileperusahaan) < 1)
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Informasi Umum</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('profileperusahaan.store')}}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="nama_perusahaan">Nama Perusahaan</label>
                  <input type="text" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required>
                  <p class="text-danger">{{ $errors->first('nama_perusahaan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="jenis_perusahaan">Jenis Perusahaan</label>
                  <input type="text" class="form-control" id="jenis_perusahaan" placeholder="Jenis Perusahaan (Contoh : PT, BUMN, dll)" name="jenis_perusahaan" value="{{ old('jenis_perusahaan') }}" required>
                  <p class="text-danger">{{ $errors->first('jenis_perusahaan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="tanggal_berdiri">Tanggal Berdiri</label>
                  <input type="date" class="form-control" id="tanggal_berdiri" placeholder="Tanggal" name="tanggal_berdiri" value="{{ old('tanggal_berdiri') }}" required>
                  <p class="text-danger">{{ $errors->first('tanggal_berdiri') }}</p>
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
                          <th>Nama Perusahaan</th>
                          <th>Jenis Perusahaan</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @php $no = 1; @endphp
                      @forelse ($profileperusahaan as $p)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $p->nama_perusahaan }}</td>
                              <td>{{ $p->jenis_perusahaan }}</td>
                              <td>
                              <a href="{{ route('profileperusahaan.edit', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                              <form action="{{ route('profileperusahaan.destroy', $p->id) }}" method="post">
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