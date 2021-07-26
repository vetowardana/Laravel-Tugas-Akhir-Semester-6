@extends('layouts.user.index')

@section('title')
	<title>MagangKUY - Mulai Presensi {{ $lowongan_selesai->nama_lowongan }}</title>
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mulai Presensi {{ $lowongan_selesai->nama_lowongan }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('presensiperusahaan.index')}}">Presensi</a></li>
            <li class="breadcrumb-item active">Mulai Presensi {{ $lowongan_selesai->nama_lowongan }}</li>
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
        <section class="col-lg-4 connectedSortable">
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title">Kode Presensi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if(count($kode2) < 1)
            <form action="{{route('buatkode', $lowongan_selesai->id)}}" method="post">
              @csrf
              <div class="card-body warnaAbu2">
                <div class="jam_analog">
                  <div class="ukuran">
                    <div class="jarum jarum_detik"></div>
                    <div class="jarum jarum_menit"></div>
                    <div class="jarum jarum_jam"></div>
                    <div class="lingkaran_tengah"></div>
                  </div>
                </div>
                <h1 class="btn-presensi">(none)</h1>
                <div class="row">
                  <div class="col-sm-6 dua-lima" id="clock"></div>
                  <div class="col-sm-6 tgl-mini dua-lima" id="tanggal"></div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer btn-presensi">
                <button type="submit" class="btn btn-primary">Mulai</button>
              </div>
            </form>
            @else
            <form action="{{route('hapuskode', $kode->id)}}" method="post">
              @csrf
              <div class="card-body warnaAbu2">
                <div class="jam_analog">
                  <div class="ukuran">
                    <div class="jarum jarum_detik"></div>
                    <div class="jarum jarum_menit"></div>
                    <div class="jarum jarum_jam"></div>
                    <div class="lingkaran_tengah"></div>
                  </div>
                </div>
                <h1 class="btn-presensi">{{$kode->kode_presensi}}</h1>
                <div class="row">
                  <div class="col-sm-6 dua-lima" id="clock"></div>
                  <div class="col-sm-6 tgl-mini dua-lima" id="tanggal"></div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer btn-presensi">
                <button type="submit" class="btn btn-primary">Selesai</button>
              </div>
            </form>
            @endif
          </div>
        </section>
        <!-- /.Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- Lowongan Baru -->
          @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
          <div id="countdown"></div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title padd1">Presensi Hari Ini</h3>
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
                        <th>Tanggal Presensi</th>
                        <th>Waktu Presensi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1; @endphp
                      @forelse ($presensi as $p)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->nama_perusahaan }}</td>
                        <td>{{ $p->nama_lowongan }}</td>
                        <td>{{ $p->tanggal_presensi }}</td>
                        <td>{{ $p->waktu_presensi }}</td>
                        <td>
                          <form action="{{route('presensiperusahaan.destroy', $p->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                          </form>
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
        <!-- right col -->
      </div>
      @endif
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<script type="text/javascript">
   setTimeout(function(){
       location.reload();
   },10000);
</script>

<script type="text/javascript">
  var timeleft = 10;
  var downloadTimer = setInterval(function(){
    if(timeleft <= 0){
      clearInterval(downloadTimer);
      document.getElementById("countdown").innerHTML = "reloaded";
    } else {
      document.getElementById("countdown").innerHTML = "Halaman akan otomatis reload dalam : " + timeleft + " Detik";
    }
    timeleft -= 1;
  }, 1000);
</script>

@endsection