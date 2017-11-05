<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $identitas->name }}</title>
	<meta name="description" content="{{ strip_tags($identitas->description) }}" />
	<meta name="keywords" content="{{ strip_tags($identitas->profile) }}" />
	<meta name="author" content="{{ $identitas->author }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('faviconcubic.png') }}" /> 
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" media="screen">	
	<link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/component.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('frontend/icons/ionicons/css/ionicons.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/icons/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/icons/simple-line-icons/css/simple-line-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/icons/rivolicons/style.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">
	<!-- CSS Custom -->
	<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>

<body>
	
		<!-- BEGIN # MODAL LOGIN -->
		@include('layouts.top')

		<div class="clear"></div>
		
		<!-- start Main Wrapper -->
		<div class="main-wrapper">
		
			@yield('content')
			
		</div>
		<!-- end Main Wrapper -->
		@include('layouts.bottom')
		
	</div>  <!-- end Container Wrapper -->
 

 
	<!-- start Back To Top -->
	<div id="back-to-top">
		 <a href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	<!-- end Back To Top -->
	@include('layouts.flash')
<!-- JS -->
<script type="text/javascript" src="{{ asset('frontend/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/SmoothScroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.slicknav.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.placeholder.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/instagram.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/spin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.introLoader.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/select2.full.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.responsivegrid.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/ion.rangeSlider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/readmore.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery.raty.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/js/customs.js') }}"></script>
<script type="text/javascript">
$(function(){
$('.input-group.date').datepicker({
    calendarWeeks: true,
    todayHighlight: true,
    autoclose: true,
     dateFormat: 'yy-mm-dd'
});
});
 </script>
<script>
$('#confirmationModal').modal('show');
</script>
<!-- 
<script type='text/javascript' src="{{ asset('frontend/js/jquery-1.8.3.js') }}"></script> -->
<script type='text/javascript' src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
</body>

</html>