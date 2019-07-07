<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Phuc Truong" />
	<link rel="shortcut icon" type="image/png" href="images/icons/icon_pt.png">
	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />

	<link rel="stylesheet" href="css/phuc.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Modbus Solution</title>
	<base href="{{asset('')}}">
	<!-- Insert CSS
	============================================= -->
	@yield('css')

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		@include('pages.layout.header')
		<!-- #header end -->

		<section id="slider" class="slider-element full-screen">

			<div class="full-screen dark section nopadding nomargin noborder ohidden">

				<div class="container clearfix">
					<div class="slider-caption slider-caption-center">
						<h2 data-animate="fadeInUp">MODBUS SOLUTION</h2>
						<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="50">Hello, Welcome to my web &amp; Have nice day.</p>
						<a data-animate="fadeInUp" data-delay="400" href="#" class="button button-border button-light button-rounded button-large noleftmargin nobottommargin d-none d-md-inline-block" style="margin-top: 30px;">PLC</a>
						<a data-animate="fadeInUp" data-delay="200" href="#" class="button button-3d button-teal button-large nobottommargin d-none d-md-inline-block" style="margin: 30px 0 0 10px;">INSTRUMENT</a>
					</div>
				</div>
				<div class="video-wrap">
					<!-- <video poster="images/videos/explore.jpg" preload="auto" loop autoplay muted>
						<source src='images/videos/explore1.mp4' type='video/mp4' />
						<source src='images/videos/explore.webm' type='video/webm' />
					</video>
					<div class="video-overlay" style="background-color: rgba(0,0,0,0.45);"></div> -->
				</div>

			</div>

		</section>

		<!-- Footer
		============================================= -->
		@include('pages.layout.footer')
		<!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>
</html>