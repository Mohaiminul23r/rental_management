<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Rental Management System</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	
	<!-- Fonts and icons -->
	<script src="{{ asset('assets') }}/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('assets') }}/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('assets') }}/css/atlantis.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
{{-- 	<link rel="stylesheet" href="/css/demo.css"> --}}
</head>
<body>
<div class="wrapper">
	<div class="main-header">
		<!-- Navbar -->
		@include('layouts.inc.navbar')
		<!-- End Navbar -->
	</div>
	<!-- Sidebar -->
		@include('layouts.inc.sidebar')
	<!-- End Sidebar -->

	<!-- Body -->
	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<h4 class="page-title">@yield('pagetitle')</h4>
				@yield('body')
		 	</div>
		</div>
		@include('layouts.inc.footer')
	</div>
	<!-- End Body -->
</div>
<!--   Core JS Files   -->
<script src="{{ asset('assets') }}/js/core/jquery.3.2.1.min.js"></script>
<script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="{{ asset('assets') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{ asset('assets') }}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="{{ asset('assets') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Chart JS -->
<script src="{{ asset('assets') }}/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Sparkline -->
<script src="{{ asset('assets') }}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
<!-- Chart Circle -->
<script src="{{ asset('assets') }}/js/plugin/chart-circle/circles.min.js"></script>
<!-- Datatables -->
<script src="{{ asset('assets') }}/js/plugin/datatables/datatables.min.js"></script>
<!-- Bootstrap Notify -->
<script src="{{ asset('assets') }}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- jQuery Vector Maps -->
<script src="{{ asset('assets') }}/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('assets') }}/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- Sweet Alert -->
<script src="{{ asset('assets') }}/js/plugin/sweetalert/sweetalert.min.js"></script>
<!-- Atlantis JS -->
<script src="{{ asset('assets') }}/js/atlantis.min.js"></script>
<script>
	Circles.create({
		id:'circles-1',
		radius:45,
		value:60,
		maxValue:100,
		width:7,
		text: 5,
		colors:['#f1f1f1', '#FF9E27'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})

	Circles.create({
		id:'circles-2',
		radius:45,
		value:70,
		maxValue:100,
		width:7,
		text: 36,
		colors:['#f1f1f1', '#2BB930'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})

	Circles.create({
		id:'circles-3',
		radius:45,
		value:40,
		maxValue:100,
		width:7,
		text: 12,
		colors:['#f1f1f1', '#F25961'],
		duration:400,
		wrpClass:'circles-wrp',
		textClass:'circles-text',
		styleWrapper:true,
		styleText:true
	})

	var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

	var mytotalIncomeChart = new Chart(totalIncomeChart, {
		type: 'bar',
		data: {
			labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
			datasets : [{
				label: "Total Income",
				backgroundColor: '#ff9e27',
				borderColor: 'rgb(23, 125, 255)',
				data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
			}],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false,
			},
			scales: {
				yAxes: [{
					ticks: {
						display: false //this will remove only the label
					},
					gridLines : {
						drawBorder: false,
						display : false
					}
				}],
				xAxes : [ {
					gridLines : {
						drawBorder: false,
						display : false
					}
				}]
			},
		}
	});

	$('#lineChart').sparkline([105,103,123,100,95,105,115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#ffa534',
		fillColor: 'rgba(255, 165, 52, .14)'
	});
</script>
</body>
</html>