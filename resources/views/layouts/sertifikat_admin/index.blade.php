@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Sertifikat Magang</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sertifikat Magang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Sertifikat Magang</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  @if(count($profileadmin) < 1)
  <div class="alert alert-info">Isi <a href="{{route('profileadmin.index')}}">profile</a> anda terlebih dahulu !</div>
  @else
  <section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <!-- <section class="col-lg-4 connectedSortable">
        </section> -->
        <!-- /.Left col -->
        <section class="col-lg-12 connectedSortable">
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
                  <h3 class="card-title">Pilih Dari Lowongan Selesai</h3>
                </div>
                <!-- /.card-header -->
                
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 700px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Logo Perusahaan</th>
                        <th>Nama Lowongan</th>
                        <th>Nama Perusahaan</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($lowongan_selesai as $s)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset('storage/pasanglowongan/' . $s->image) }}" style="width: 100px;"></td>
                        <td>{{ $s->nama_lowongan }}</td>
                        <td>{{ $s->nama_Perusahaan }}</td>
                        <td>{{ $s->status }}</td>
                        <td>
                          <a href="{{route('sertifikatadmin.show', $s->id)}}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                      </tr>
                      @empty
                      <tr>
                          <td colspan="6" class="text-center">Belum ada data</td>
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