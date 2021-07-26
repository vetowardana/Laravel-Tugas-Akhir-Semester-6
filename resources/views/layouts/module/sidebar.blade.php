<aside class="main-sidebar sidebar-dark-primary elevation-4 biruA">
  	<!-- Brand Logo -->
  	<a href="{{route('dashboard')}}" class="brand-link">
  	  	<img src="{{asset('asset/image/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
  	  	<span class="brand-text font-weight-bold putih">Magang<strong>KUY</strong></span>
  	</a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('storage/user/' . auth()->user()->image) }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{route('pengaturan')}}" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <!-- Admin -->
    @if(auth()->user()->level=="admin")
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('profileadmin.index')}}" class="nav-link">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('pengaturan')}}" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Pengaturan Akun
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-compass"></i>
            <p>
              Manajemen Akun
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('manajemenadmin.index')}}" class="nav-link">
                <p>Akun Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('manajemenperusahaan.index')}}" class="nav-link">
                <p>Akun Perusahaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('manajemenmahasiswa.index')}}" class="nav-link">
                <p>Akun Mahasiswa</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-compass"></i>
            <p>
              Man. lowongan Magang
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('lowonganbaru.index')}}" class="nav-link">
                <p>Lowongan Baru</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lowonganditerima.index')}}" class="nav-link">
                <p>Lowongan Diterima</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lowonganditolak.index')}}" class="nav-link">
                <p>Lowongan Ditolak</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lowonganselesai.index')}}" class="nav-link">
                <p>Lowongan Selesai</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-compass"></i>
            <p>
              Manajemen Arsip
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('presensiadmin.index')}}" class="nav-link">
                <p>Presensi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('logbookadmin.index')}}" class="nav-link">
                <p>Log Book</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('historiaplikan.index')}}" class="nav-link">
                <p>Histori Permohonan Magang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('laporanadmin.index')}}" class="nav-link">
                <p>Laporan Magang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('penilaiandmin.index')}}" class="nav-link">
                <p>Penilaian Magang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('sertifikatadmin.index')}}" class="nav-link">
                <p>Sertifikat Magang</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    @endif

    <!-- Perusahaan -->
    @if(auth()->user()->level=="perusahaan")
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('profileperusahaan.index')}}" class="nav-link">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('pengaturan')}}" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Pengaturan Akun
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('pasanglowongan.index')}}" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p style="font-size: 15px;">
              Pasang Lowongan Magang
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pelamar Magang
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('pendaftarbaru.index')}}" class="nav-link">
                <p>Pelamar Baru</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('pendaftarditerima.index')}}" class="nav-link">
                <p>Pelamar Diterima</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('pendaftarditolak.index')}}" class="nav-link">
                <p>Pelamar Ditolak</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-compass"></i>
            <p>
              Menu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('presensiperusahaan.index')}}" class="nav-link">
                <p>Presensi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('logbookperusahaan.index')}}" class="nav-link">
                <p>Log Book</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('laporanperusahaan.index')}}" class="nav-link">
                <p>Laporan Magang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('penilaianmagang.index')}}" class="nav-link">
                <p>Penilaian Magang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('sertifikatmagang.index')}}" class="nav-link">
                <p>Sertifikat Magang</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    @endif

    <!-- Mahasiswa -->
    @if(auth()->user()->level=="mahasiswa")
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('profilemahasiswa.index')}}" class="nav-link">
            <i class="nav-icon fas fa-address-card"></i>
            <p>
              Profile
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('pengaturan')}}" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Pengaturan Akun
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('carilowongan.index')}}" class="nav-link">
            <i class="nav-icon fas fa-search"></i>
            <p>
              Cari Lowongan Magang
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('histori.index')}}" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Histori Lamar
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-compass"></i>
            <p>
              Menu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('presensi.index')}}" class="nav-link">
                <p>Presensi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('logbook.index')}}" class="nav-link">
                <p>Log Book</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('laporanmagang.index')}}" class="nav-link">
                <p>Laporan Magang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lihatpenilaian.index')}}" class="nav-link">
                <p>Penilaian Magang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lihatsertifikat.index')}}" class="nav-link">
                <p>Sertifikat Magang</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    @endif

    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>