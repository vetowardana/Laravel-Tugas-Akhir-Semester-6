@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Penilaian {{ $pendaftar->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Penilaian {{ $pendaftar->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('penilaianmagang.index')}}">Penilaian</a></li>
            <li class="breadcrumb-item"><a href="{{route('penilaianmagang.show', $lowongan_selesai->id)}}">Penilaian {{ $lowongan_selesai->nama_lowongan }}</a></li>
            <li class="breadcrumb-item active">Penilaian {{ $pendaftar->name }}</li>
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
        @if(count($penilaian) < 1)
        <section class="col-lg-4 connectedSortable">
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Penilaian {{ $pendaftar->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('simpanpenilaian', $pendaftar->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <p class="text-info">Note : Kirimkan Penilaian magang yang sudah ditandatangani perusahaan.</p>
                <div class="form-group">
                  <label class="warnaAbu1" for="penilaian_magang">Penilaian Magang</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="penilaian_magang" value="{{ old('penilaian_magang')}}">
                    <label class="custom-file-label" for="customFile">PDF</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('penilaian_magang') }}</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </section>
        <!-- /.Left col -->
        @else
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
                  <h3 class="card-title padd1">Nilai {{ $pendaftar->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 700px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Lowongan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($penilaian as $p)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->nama_perusahaan }}</td>
                        <td>{{ $p->nama_lowongan }}</td>
                        <td>
                          <a href="{{route('penilaianmagang.edit', $p->id)}}"><button type="button" class="btn btn-info btn-sm">Edit</button></a>
                          <form action="{{ route('penilaianmagang.destroy', $p->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                          </form>
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