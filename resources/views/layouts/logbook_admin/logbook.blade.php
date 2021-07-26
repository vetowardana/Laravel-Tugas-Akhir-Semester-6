@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Logbook {{ $pendaftar->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Logbook {{ $pendaftar->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('logbookadmin.index')}}">Logbook</a></li>
            <li class="breadcrumb-item"><a href="{{route('logbookadmin.show', $lowongan_selesai->id)}}">Logbook {{ $lowongan_selesai->nama_lowongan }}</a></li>
            <li class="breadcrumb-item active">Logbook {{ $pendaftar->name }}</li>
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
        <!-- <section class="col-lg-6 connectedSortable">
        </section> -->
        <!-- /.Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Lowongan Baru -->
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
                  <h3 class="card-title padd1">Logbook {{ $pendaftar->name }}</h3>

                  <div class="card-tools" style="margin-right: 10px;">
                    <a href="{{route('exportlogbook2', $pendaftar->id)}}" class="btn btn-sm btn-info" target="_blank">Export Logbook</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 700px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Kegiatan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($logbook as $l)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $l->name }}</td>
                        <td>{{ $l->jenis_kegiatan }}</td>
                        <td>
                          <a href="{{route('detaillogbook2', $l->id)}}"><button type="button" class="btn btn-info">Detail</button></a>
                        </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="4" class="text-center">Belum ada data</td>
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
      @endif
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection