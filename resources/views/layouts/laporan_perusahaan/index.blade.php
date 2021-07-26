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
  <section class="content">
    <div class="container-fluid">
      @if(count($profileperusahaan) < 1)
      <div class="alert alert-info">Segera isi <a href="{{route('profileperusahaan.index')}}">profile</a> anda!</div>
      @else
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Laporan Baru -->
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
                  <h3 class="card-title padd1">Laporan Baru</h3>
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
                      @forelse ($laporanbaru as $b)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $b->judul_laporan }}</td>
                        <td>{{ $b->name }}</td>
                        <td>{{ $b->tanggal_dibuat }}</td>
                        <td>{{ $b->waktu_dibuat }}</td>
                        <td>{{ $b->status }}</td>
                        <td>
                          <a href="{{route('laporanperusahaan.edit', $b->id)}}"><button type="button" class="btn btn-info">Detail</button></a>
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
        @if(count($laporantt) > 0)
        <section class="col-lg-12 connectedSortable">
          <!-- Laporan Ditandatangani -->
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
                  <h3 class="card-title padd1">Laporan Ditandatangani</h3>
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
                          <a href="{{route('laporanperusahaan.show', $tt->id)}}"><button type="button" class="btn btn-info">Detail</button></a>
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
        @endif
        <!-- right col -->
      </div>
      @endif
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection