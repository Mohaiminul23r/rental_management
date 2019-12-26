<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Rental Management System</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
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
	<link rel="stylesheet" href="{{ asset('css/custom_css.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/toaster/build/toastr.css') }}">
	<!-- MultiStep stylesheet -->
	<link rel="stylesheet" href="{{ asset('assets/step-wizard/dist/css/MultiStep.min.css')}}">
	<!-- Optional theme for Multistep -->
	<link rel="stylesheet" href="{{ asset('assets/step-wizard/dist/css/MultiStep-theme.min.css')}}">

	{{-- select2 plugin --}}
	<link href="{{ asset('assets/select2/css/select2.min.css') }}" rel="stylesheet"/>
	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
	<!-- CSS Just for demo purpose, don't include it in your project -->
	{{-- 	<link rel="stylesheet" href="/css/demo.css"> --}}
	<script type="text/javascript">
	/****************necessary utility*****************/
		var utlt =[];
        utlt["siteUrl"] = function(url){
            url = typeof url == "undefined" ? "" : url;
            return "<?php echo url('/'); ?>/"+url;
        }

        utlt["cLog"] = function(url){
            console.log(url);
        }
	</script>
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
			<div class="panel-header bg-primary-gradient">
				<div class="page-inner py-5">
					<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
						<div>
							<h2 class="text-white pb-2 fw-bold">@yield('pagetitle')</h2>
						</div>
						<div class="ml-md-auto py-2 py-md-0">
							{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a> --}}
							@yield('button')
						</div>
					</div>
				</div>
			</div>
			<div class="page-inner mt--5">
				<div class="row mt--2">
					<div class="col-xl-12">
						<div class="card full-height">
							<div class="card-header">
									<div class="card-title">@yield('card-title')</div>
							</div>
							<div class="card-body">
								<div class="row">	
									@yield('body')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	    @include('layouts.inc.footer')	
	</div>
	<!-- End Body -->
</div>
<!--   Core JS Files   -->
<script src="{{ asset('assets') }}/js/core/jquery.3.2.1.min.js"></script>
<script src="{{ asset('assets/toaster/toastr.js') }}"></script>
<script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
<script src="{{ asset('assets/step-wizard/dist/js/MultiStep.min.js')}}"></script>
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
<script type="text/javascript" src="{{ asset('assets') }}/dataTables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/dataTables/datatables.min.css"/>
@stack('javascript')
<script type="text/javascript">
	//sidebar jquery
	$(document).ready(function(){
		$('.sub-item3').click(function(){
			//alert("ok");
		});
	});
</script>
</body>
</html>