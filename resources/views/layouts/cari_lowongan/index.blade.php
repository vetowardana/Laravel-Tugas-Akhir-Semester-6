@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Cari Lowongan Magang</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Cari Lowongan Magang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Cari Lowongan Magang</li>
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

  @if (session('success'))
    <div class="alert alert-info">{{ session('success') }}</div>
  @endif

  @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  @if($statusbelumditerima > 0||$statusditerima > 0)
  <div class="alert alert-info">Tunggu instruksi dari perusahaan melalui email atau telepon. Anda bisa mencari lowongan lagi jika anda ditolak perusahaan :)</div>
  @else
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Lowongan Tersedia</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              @forelse($carilowongan as $c)
              <a href="{{ route('carilowongan.show', $c->id) }}">
                <div class="row font-margin5">
                  <div class="col-md-12">
                    <div class="card font-margin4">
                      <div class="contaner">
                        <div class="row">
                          <div class="fhd1 kodePos laptop1 mini-device1">
                            <img src="dist/img/photo1.png" class="image-cari-magang">
                          </div>
                          <div class="fhd2 kota1 laptop2 mini-device2 warnaAbu1">
                            <h3 class="font-size-1 font-margin1">{{ $c->nama_lowongan }}</h3>
                            <p class="font-size-2 font-margin2">{{ $c->nama_Perusahaan }} ({{ $c->jenis_perusahaan }})</p>
                            <div class="row">
                              <div class="col-md-6"><p class="font-size-2 font-margin3" style="color: grey;">Dibuat : {{ $c->lowongan_mulai }}</p></div>
                              <div class="col-md-6"><p class="font-size-2 font-margin3" style="text-align: right; color: grey;">Berakhir : {{ $c->lowongan_selesai }}</p></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              @empty
              <div class="alert alert-info">Belum ada lowongan</div>
              @endforelse
              <div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
                {{ $carilowongan->links() }}
              </div>
            </div>
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- <section class="col-lg-8 connectedSortable">
        </section> -->
        <!-- right col -->
      </div>
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  @endif
  @endif
  <!-- /.content -->
</div>

@endsection