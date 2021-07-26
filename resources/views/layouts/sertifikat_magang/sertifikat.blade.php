@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Sertifikat {{ $pendaftar->name }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sertifikat {{ $pendaftar->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('sertifikatmagang.index')}}">Penilaian</a></li>
            <li class="breadcrumb-item"><a href="{{route('sertifikatmagang.show', $lowongan_selesai->id)}}">Sertifikat {{ $lowongan_selesai->nama_lowongan }}</a></li>
            <li class="breadcrumb-item active">Sertifikat {{ $pendaftar->name }}</li>
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
        @if(count($sertifikat) < 1)
        <section class="col-lg-4 connectedSortable">
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Sertifikat {{ $pendaftar->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('simpansertifikat', $pendaftar->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <p class="text-info">Note : Kirimkan sertifikat magang yang sudah ditandatangani perusahaan.</p>
                <div class="form-group">
                  <label class="warnaAbu1" for="sertifikat_magang">Sertifikat Magang</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="sertifikat_magang" value="{{ old('sertifikat_magang')}}">
                    <label class="custom-file-label" for="customFile">PDF</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('sertifikat_magang') }}</p>
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
                  <h3 class="card-title padd1">Sertifikat {{ $pendaftar->name }}</h3>
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
                      @forelse ($sertifikat as $s)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->nama_perusahaan }}</td>
                        <td>{{ $s->nama_lowongan }}</td>
                        <td>
                          <a href="{{ route('sertifikatmagang.edit', $s->id) }}"><button type="button" class="btn btn-info btn-sm">Edit</button></a>
                          <form action="{{ route('sertifikatmagang.destroy', $s->id) }}" method="post">
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