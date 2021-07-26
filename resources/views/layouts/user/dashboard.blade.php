@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Dashboard {{auth()->user()->name}}</title>
@endsection

@section('content')
<!-- Admin -->
@if(auth()->user()->level=="admin")
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard {{auth()->user()->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard {{auth()->user()->name}}</li>
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
      @endif

      <!-- Main row -->
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$jumlah_user}}</h3>

              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="far fa-user"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$jumlah_lowongan}}</h3>

              <p>Total Lowongan</p>
            </div>
            <div class="icon">
              <i class="far fa-file"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$jumlah_lowongan_ditolak}}</h3>

              <p>Lowongan Ditolak</p>
            </div>
            <div class="icon">
              <i class="far fa-file-excel"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$jml_arsip}}</h3>

              <p>Arsip</p>
            </div>
            <div class="icon">
              <i class="far fa-file-archive"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Lowongan Baru -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title padd1">Lowongan Baru</h3>
                  <div class="card-tools">
                    <a href="{{route('lowonganbaru.index')}}"><button type="button" class="btn btn-block btn-info btn-sm" style="w">Selengkapnya</button></a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 300px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Logo Perusahaan</th>
                        <th>Nama Lowongan</th>
                        <th>Nama Perusahaan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($lowongan_baru as $b)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset('storage/pasanglowongan/' . $b->image) }}" style="width: 100px;"></td>
                        <td>{{ $b->nama_lowongan }}</td>
                        <td>{{ $b->nama_Perusahaan }}</td>
                        <td>{{ $b->status }}</td>
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
        <!-- /.Left col -->
        <!-- <section class="col-lg-12 connectedSortable">
        </section> -->
        <!-- right col -->
      </div>
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endif

<!-- Perusahaan -->
@if(auth()->user()->level=="perusahaan")
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard {{auth()->user()->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard {{auth()->user()->name}}</li>
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
      @endif
      <!-- Main row -->
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$pendaftar_diterima}}</h3>

              <p>Pemagang Diterima</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-check"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$pendaftar_ditolak}}</h3>

              <p>Pemagang Ditolak</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-times"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$lowongan_aktif}}</h3>

              <p>Lowongan Aktif</p>
            </div>
            <div class="icon">
              <i class="far fa-file"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$lowongan_ditolak}}</h3>

              <p>Lowongan Ditolak</p>
            </div>
            <div class="icon">
              <i class="far fa-file-excel"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          @if(count($pendaftar_baru) > 0)
          <div class="alert alert-info">Segera hubungi pelamar magang baru melalu email atau telepon. Jangan buat mereka menunggu, kasihan :)</div>
          @endif
          <!-- Pelamar Baru -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title padd1">Pelamar Baru</h3>
                  <div class="card-tools">
                    <a href="{{route('pendaftarbaru.index')}}"><button type="button" class="btn btn-block btn-info btn-sm" style="w">Selengkapnya</button></a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 100%; max-height: 500px;">
                  <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto Pelamar</th>
                        <th>Nama Lowongan</th>
                        <th>Nama Pelamar Magang</th>
                        <th>Email Pelamar Magang</th>
                        <th>Nama Universitas</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($pendaftar_baru as $b)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td><img src="{{ asset('storage/user/' . $b->image) }}" style="width: 100px;"></td>
                        <td>{{ $b->nama_lowongan }}</td>
                        <td>{{ $b->name }}</td>
                        <td>{{ $b->email }}</td>
                        <td>{{ $b->nama_universitas }}</td>
                        <td>{{ $b->status }}</td>
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
        <!-- <section class="col-lg-6 connectedSortable">
        </section> -->
        <!-- right col -->
      </div>
      
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endif

<!-- Mahasiswa -->
@if(auth()->user()->level=="mahasiswa")
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard {{auth()->user()->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard {{auth()->user()->name}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if(count($profilemahasiswa) < 1)
      <div class="alert alert-info">Segera isi <a href="{{route('profilemahasiswa.index')}}">profile</a> anda!</div>
      @endif
      <!-- Main row -->
      <!-- Status Magang -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="card-title">Tempat Magang</div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="ikon-briefcase col-sm-1">
                  <i class="fas fa-briefcase fa-5x"></i>
                </div>
                @if($p_user2 < 1)
                <div class="status-mhs col-sm-11">
                  <h3>(none)</h3>
                </div>
                @else
                <div class="status-mhs col-sm-11">
                  <h3>{{$p_user3->nama_perusahaan}}</h3>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endif

@endsection