@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Laporan Magang {{ $pendaftar->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Magang {{ $pendaftar->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('laporanadmin.index')}}">Laporan Magang</a></li>
            <li class="breadcrumb-item"><a href="{{route('laporanadmin.show', $lowongan_selesai->id)}}">Laporan Magang {{ $lowongan_selesai->nama_lowongan }}</a></li>
            <li class="breadcrumb-item active">Laporan Magang {{ $pendaftar->name }}</li>
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
      @else
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Laporan Bertandatangan -->
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
                  <h3 class="card-title padd1">Laporan Magang {{ $pendaftar->name }} Ditandatangani</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 700px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>judul Laporan</th>
                        <th>Nama</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Lowongan</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($laporantt as $l)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $l->judul_laporan }}</td>
                        <td>{{ $l->name }}</td>
                        <td>{{ $l->nama_perusahaan }}</td>
                        <td>{{ $l->nama_lowongan }}</td>
                        <td>{{ $l->status }}</td>
                        <td>
                          <a href="{{route('detaillaporan', $l->id)}}"><button type="button" class="btn btn-info">Detail</button></a>
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
        <!-- /.Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Laporan Bertandatangan -->
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          @if($abc > 0)
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title padd1">Laporan Magang {{ $pendaftar->name }} Belum Ditandatangani</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 700px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>judul Laporan</th>
                        <th>Nama</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Lowongan</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($laporanbt as $lbt)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $lbt->judul_laporan }}</td>
                        <td>{{ $lbt->name }}</td>
                        <td>{{ $lbt->nama_perusahaan }}</td>
                        <td>{{ $lbt->nama_lowongan }}</td>
                        <td>{{ $lbt->status }}</td>
                        <td>
                          <a href="{{route('detaillaporan', $lbt->id)}}"><button type="button" class="btn btn-info">Detail</button></a>
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
      @endif
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection