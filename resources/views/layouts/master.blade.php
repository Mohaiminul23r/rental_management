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
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<!-- CSS Just for demo purpose, don't include it in your project -->
	{{-- 	<link rel="stylesheet" href="/css/demo.css"> --}}
	<script type="text/javascript">

	/****************necessary utility*****************/
	/***************************************************/
		var utlt =[];
        utlt["siteUrl"] = function(url){
            url = typeof url == "undefined" ? "" : url;
            return "<?php echo url('/'); ?>/"+url;
        }

        utlt["cLog"] = function(url){
            console.log(url);
        }


         utlt["GetAll"] =  function(url, htmlId, name, check = 0){
            var htmlData = '';
            if(!check)
                htmlData = '<option value="" disabled selected> Select '+name+' </option>';
            else
                htmlData = '<option value="" disabled> Select '+name+' </option>';

            $.ajax({
                url : utlt.siteUrl(url)

            }).done(function(resData){
                $.each(resData,function(ind, val){

                    if(check == val.id){
                        htmlData +=  '<option value = "'+val.id+'" selected >'+val.name+'</option>';
                    }
                    else{
                        htmlData +=  '<option value = "'+val.id+'">'+val.name+'</option>';
                    }
                });
                $(htmlId).html(htmlData);

            }).fail(function(failData){
                utlt.cLog(arguments);
            });
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
			<div class="page-inner">
				<div class="page-header">
				<h4 class="page-title">@yield('pagetitle')</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="{{url('/home')}}">
							<i class="flaticon-home"></i>
						</a>
					</li>
					@yield('breadcrumbs')
				</ul>
			    </div>
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
<script type="text/javascript" src="{{ asset('assets') }}/dataTables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/dataTables/datatables.min.css"/>
@yield('javascript')
</body>
</html>