@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Pasang Lowongan Magang</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pasang Lowongan Magang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Pasang Lowongan Magang</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  @if(count($profileperusahaan) < 1)
  <div class="alert alert-info">Isi <a href="{{route('profileperusahaan.index')}}">profile</a> anda terlebih dahulu !</div>
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
              <h3 class="card-title">Buat Lowongan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('pasanglowongan.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label class="warnaAbu1" for="nama_lowongan">Nama Lowongan</label>
                  <input type="text" class="form-control" id="nama_lowongan" name="nama_lowongan" placeholder="Nama Lowongan" value="{{ old('nama_lowongan') }}" required>
                  <p class="text-danger">{{ $errors->first('nama_lowongan') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="deskripsi">Deskripsi Lowongan</label>
                  <textarea id="summernote" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                  <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="image">Logo Perusahaan</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Logo</label>
                  </div>
                  <p class="text-danger">{{ $errors->first('image') }}</p>
                </div>
                <div class="form-group">
                  <label class="warnaAbu1" for="lowongan_selesai">Lowongan Berakhir</label>
                  <input type="date" class="form-control" id="lowongan_selesai" name="lowongan_selesai" placeholder="Lowongan Berakhir" value="{{ old('lowongan_selesai') }}">
                  <p class="text-danger">{{ $errors->first('lowongan_selesai') }}</p>
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
                  <h3 class="card-title">Lowongan Dibuat</h3>
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
                      @forelse ($pasanglowongan as $p)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset('storage/pasanglowongan/' . $p->image) }}" style="width: 100px;"></td>
                        <td>{{ $p->nama_lowongan }}</td>
                        <td>{{ $p->nama_Perusahaan }}</td>
                        <td>{{ $p->status }}</td>
                        <td>
                          <a href="{{ route('pasanglowongan.edit', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                          @if($p->status != 'Diterima' and $p->status != 'Selesai')
                          <form action="{{ route('pasanglowongan.destroy', $p->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                          </form>
                          @endif
                        </td>
                      </tr>
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