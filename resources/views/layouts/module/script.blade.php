<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script>
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>
<script>
	$(function () {
	    // Summernote
	    $('#summernote').summernote()

	    // CodeMirror
	    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
	      mode: "htmlmixed",
	      theme: "monokai"
	    });
  	})
</script>

<script type="text/javascript">
	const secondHand = document.querySelector('.jarum_detik');
	const minuteHand = document.querySelector('.jarum_menit');
	const jarum_jam = document.querySelector('.jarum_jam');
 
	function setDate(){
		const now = new Date();
 
		const seconds = now.getSeconds();
		const secondsDegrees = ((seconds / 60) * 360) + 90;
		secondHand.style.transform = `rotate(${secondsDegrees}deg)`;
		if (secondsDegrees === 90) {
			secondHand.style.transition = 'none';
		} else if (secondsDegrees >= 91) {
			secondHand.style.transition = 'all 0.05s cubic-bezier(0.1, 2.7, 0.58, 1)'
		}
 
		const minutes = now.getMinutes();
		const minutesDegrees = ((minutes / 60) * 360) + 90;
		minuteHand.style.transform = `rotate(${minutesDegrees}deg)`;
 
		const hours = now.getHours();
		const hoursDegrees = ((hours / 12) * 360) + 90;
		jarum_jam.style.transform = `rotate(${hoursDegrees}deg)`;
	}
 
	setInterval(setDate, 1000)
</script>

<script type="text/javascript">
	<!--
	function showTime() {
	    var a_p = "";
	    var today = new Date();
	    var curr_hour = today.getHours();
	    var curr_minute = today.getMinutes();
	    var curr_second = today.getSeconds();
	    if (curr_hour < 12) {
	        a_p = "AM";
	    } else {
	        a_p = "PM";
	    }
	    if (curr_hour == 0) {
	        curr_hour = 12;
	    }
	    if (curr_hour > 12) {
	        curr_hour = curr_hour - 12;
	    }
	    curr_hour = checkTime(curr_hour);
	    curr_minute = checkTime(curr_minute);
	    curr_second = checkTime(curr_second);
	 	document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
	}

	function checkTime(i) {
	    if (i < 10) {
	        i = "0" + i;
	    }
	    return i;
	}
	setInterval(showTime, 500);
	//-->
</script>

<script type='text/javascript'>
	<!--
	var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth();
	var thisDay = date.getDay(),
	    thisDay = myDays[thisDay];
	var yy = date.getYear();
	var year = (yy < 1000) ? yy + 1900 : yy;
	document.getElementById('tanggal').innerHTML=thisDay + ', ' + day + ' ' + months[month] + ' ' + year;
 	//-->
</script>