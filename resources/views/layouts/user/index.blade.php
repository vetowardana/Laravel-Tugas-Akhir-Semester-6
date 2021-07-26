<!DOCTYPE html>
<html lang="en">
	<head>
		@include('layouts.module.head')
		@yield('title')
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
		    <!-- Navbar -->
		    @include('layouts.module.header')
		    <!-- /.navbar -->

		  	<!-- Main Sidebar Container -->
	        @include('layouts.module.sidebar')

		  <!-- Content Wrapper. Contains page content -->
		  @yield('content')
		  <!-- /.content-wrapper -->

		  <!-- Footer -->
		  @include('layouts.module.footer')

		  <!-- Control Sidebar -->
		  <aside class="control-sidebar control-sidebar-dark">
		    <!-- Control sidebar content goes here -->
		  </aside>
		  <!-- /.control-sidebar -->
		</div>

		<!-- Script -->
  		<!-- jQuery -->
		@include('layouts.module.script')
	</body>
</html>