@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Presensi</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Presensi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Presensi</li>
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
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">
          <!-- tambah -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Tambah Presensi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('presensi.store')}}" method="post">
              @csrf
              <div class="card-body warnaAbu2">
                <div class="jam_analog">
                  <div class="ukuran">
                    <div class="jarum jarum_detik"></div>
                    <div class="jarum jarum_menit"></div>
                    <div class="jarum jarum_jam"></div>
                    <div class="lingkaran_tengah"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 dua-lima" id="clock"></div>
                  <div class="col-sm-6 tgl-mini dua-lima" id="tanggal"></div>
                </div><br>
                <div class="form-group">
                  <input type="text" class="form-control" id="kode_presensi" name="kode_presensi" placeholder="Kode Presensi" value="{{ old('kode_presensi') }}" required>
                  <p class="text-danger">{{ $errors->first('kode_presensi') }}</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer btn-presensi">
                <button type="submit" class="btn btn-primary">Mulai Presensi</button>
              </div>
            </form>
          </div>
        </section>
        <!-- /.Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- Tabel lowongan -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Presensi</h3>

                  <div class="card-tools" style="margin-right: 10px;">
                    <a href="{{route('exportpresensi')}}" class="btn btn-sm btn-info" target="_blank">Export Presensi</a>
                  </div>
                </div>
                <!-- /.card-header -->
                
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 400px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Lowongan</th>
                        <th>Tanggal Presensi</th>
                        <th>Waktu Presensi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($presensi as $p)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->nama_perusahaan }}</td>
                        <td>{{ $p->nama_lowongan }}</td>
                        <td>{{ $p->tanggal_presensi }}</td>
                        <td>{{ $p->waktu_presensi }}</td>
                        <td>
                          <form action="{{route('presensi.destroy', $p->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                          </form>
                        </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="7" class="text-center">Belum ada data</td>
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