@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Laporan Magang</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Magang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Laporan Magang</li>
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
              <h3 class="card-title">Submit Laporan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('laporanmagang.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <p class="text-info">Note : Kirimkan laporan magang yang ingin ditandatangani perusahaan.</p>
                <div class="form-group">
                  <label class="warnaAbu1" for="judul_laporan">Judul Laporan</label>
                  <input type="text" class="form-control" id="judul_laporan" name="judul_laporan" placeholder="Judul Laporan" value="{{ old('judul_laporan') }}" required>
                  <p class="text-danger">{{ $errors->first('judul_laporan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="laporan_magang">Laporan Magang</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="laporan_magang" value="{{ old('laporan_magang')}}">
                    <label class="custom-file-label" for="customFile">PDF</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('laporan_magang') }}</p>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </section>
        <!-- /.Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- Tabel lowongan -->
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Histori Laporan</h3>
                </div>
                <!-- /.card-header -->
                
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 700px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Laporan</th>
                        <th>Nama</th>
                        <th>Tanggal Submit</th>
                        <th>Waktu Submit</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($laporanmagang as $l)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $l->judul_laporan }}</td>
                        <td>{{ $l->name }}</td>
                        <td>{{ $l->tanggal_dibuat }}</td>
                        <td>{{ $l->waktu_dibuat }}</td>
                        <td>{{ $l->status }}</td>
                        <td>
                          <a href="{{route('laporanmagang.edit', $l->id)}}" class="btn btn-info btn-sm">Edit</a>
                          <!-- <form action="{{route('laporanmagang.destroy', $l->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                          </form> -->
                        </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="8" class="text-center">Belum ada data</td>
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
          @if(count($laporantt) > 0)
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Laporan Ditandatangani</h3>
                </div>
                <!-- /.card-header -->
                
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 700px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Laporan</th>
                        <th>Nama</th>
                        <th>Tanggal Submit</th>
                        <th>Waktu Submit</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($laporantt as $tt)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $tt->judul_laporan }}</td>
                        <td>{{ $tt->name }}</td>
                        <td>{{ $tt->tanggal_dibuat }}</td>
                        <td>{{ $tt->waktu_dibuat }}</td>
                        <td>{{ $tt->status }}</td>
                        <td>
                          <a href="{{route('laporanmagang.show', $tt->id)}}" class="btn btn-info btn-sm">Detail</a>
                          <!-- <form action="{{route('laporanmagang.destroy', $tt->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                          </form> -->
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
          @endif
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