@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Logbook</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Logbook</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Logbook</li>
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
              <h3 class="card-title">Tambah Logbook</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('logbook.store')}}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="jenis_kegiatan">Nama Kegiatan</label>
                  <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Nama Kegiatan" value="{{ old('jenis_kegiatan') }}" required>
                  <p class="text-danger">{{ $errors->first('jenis_kegiatan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="uraian_kegiatan">Uraian Kegiatan</label>
                  <textarea id="summernote" name="uraian_kegiatan" required>{{ old('uraian_kegiatan') }}</textarea>
                  <p class="text-danger">{{ $errors->first('uraian_kegiatan') }}</p>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
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
                  <h3 class="card-title">Logbook Dibuat</h3>

                  <div class="card-tools" style="margin-right: 10px;">
                    <a href="{{route('exportlogbook')}}" class="btn btn-sm btn-info" target="_blank">Export Logbook</a>
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
                          <a href="{{route('logbook.edit', $l->id)}}" class="btn btn-info btn-sm">Edit</a>
                          <form action="{{route('logbook.destroy', $l->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                          </form>
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
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  @endif
  <!-- /.content -->
</div>

@endsection