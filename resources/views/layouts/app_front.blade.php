<!DOCTYPE html>
<html>
<head>
	<title>Fynches- @yield('pagetitle')</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- <meta property="og:title" content="Devang Mavani Sharing An Event" />
	<meta property="og:site_name" content="Grobmeier.de"/>
	<meta property="og:url" content="http://www.grobmeier.de" />
	<meta property="og:description" content="Hello World" />
	<meta property="og:image" content="https://s3-media2.fl.yelpcdn.com/bphoto/DnReRUkXRtsmKycQEYl0pg/o.jpg" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" /> -->

	<link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bitter:400,400i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css">
	
	<script>
		window.base_url = '<?php echo url('/'); ?>';
		window.AuthUser = "{{{ (Auth::user()) ? Auth::user() : null }}}";
    </script>
    
	{{Html::style("/front/css/font-awesome.min.css")}}
	{{Html::style("/front/css/bootstrap.min.css")}}
	{{Html::style("/front/css/circle.css")}}
	
	{{Html::style("/front/css/owl.carousel.min.css")}}
	{{Html::style("/front/css/style.css")}}
	
	{{Html::style("/front/css/custom.css")}}
	{{Html::style("front/css/jquery.loading.css")}}
	{{Html::style("/assets/global/plugins/bootstrap-sweetalert/sweetalert.css")}}
	
	{{Html::script("/front/js/jquery.min.js")}}
	
	
	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp_IdiINObhBDXN7TwuFkmBAGhiR-jC54&sensor=false&libraries=places"></script>

	
	
	{{Html::script("/assets/global/plugins/jquery-validation/js/jquery.validate.min.js")}}
	{{Html::script("/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js")}}
	{{Html::script("/front/js/bootstrap.min.js")}}
	{{Html::script("/front/js/owl.carousel.min.js")}}
	
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.es.min.js"></script>
</head>
<body>
	
<?php  $controller = Request::segment(1);

//echo $name = Route::currentRouteName();
//echo "@@@@@@@@@@@@@@".$controller;
//echo $actionName = Route::getActionName();exit;
?>

@yield('header')

@include('errors.common_errors')
 
 @yield('content')

<section class="join-party-sec">
	<!-- <div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h3>Join the party!</h3>
			</div>
			<div class="col-sm-12 col-md-6">
				<a href="javascript:void(0)" class="commont-btn">CREATE AND EXPERIENCE</a>
			</div>
		</div>
	</div> -->
</section>
<!-- End -->
@include('site.footer')
{{Html::script("/front/js/jquery.loading.js")}}
{{Html::script("/front/common/comman.js")}}
</body>
</html>
