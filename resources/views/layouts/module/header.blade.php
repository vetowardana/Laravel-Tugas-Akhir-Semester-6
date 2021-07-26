<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #0089A7">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      	<li class="nav-item">
        	<a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: white;"><i class="fas fa-bars"></i></a>
      	</li>
      	<li class="nav-item d-none d-sm-inline-block">
	      	<a href="{{route('dashboard')}}" class="nav-link" style="color: white;">Home</a>
	    </li>
    </ul>

  <!-- Right navbar links -->
  	<ul class="navbar-nav ml-auto">
  		<!-- Notifications Dropdown Menu -->
	    <!-- <li class="nav-item dropdown dd-padding">
	        <a class="nav-link" data-toggle="dropdown" href="#">
	          	<i class="far fa-bell putih"></i>
	          	<span class="badge badge-warning navbar-badge dd-warna">15</span>
	        </a>
	        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notifikasi">
	          	<span class="dropdown-item dropdown-header">15 Notifications</span>
	          	<div class="dropdown-divider"></div>
	          	<a href="#" class="dropdown-item">
	          		<i class="fas fa-users mr-2"></i> 8 Akun
	          	  	<span class="float-right text-muted text-sm">3 mins</span>
	          	</a>
	          	<div class="dropdown-divider"></div>
	          	<a href="#" class="dropdown-item">
	          	  	<i class="fas fa-envelope mr-2"></i> 4 Lowongan
	          	  	<span class="float-right text-muted text-sm">12 hours</span>
	          	</a>
	          	<div class="dropdown-divider"></div>
	          	<a href="#" class="dropdown-item">
	          	  	<i class="fas fa-file mr-2"></i> 3 Arsip
	          	  	<span class="float-right text-muted text-sm">2 days</span>
	          	</a>
	          	<div class="dropdown-divider"></div>
	          	<a href="#" class="dropdown-item dropdown-footer">Lihat Semua Notifikasi</a>
	        </div>
	    </li> -->
  		<li class="nav-item keluar">
			<a href="{{route('logout')}}"><button type="button" class="btn">Logout</button></a>
		</li>
  	</ul>
</nav>