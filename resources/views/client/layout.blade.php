<!doctype html>

<html lang="en-gb" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Pinestone| Real Estate</title>
<meta name="description" content="">
<meta name="author" content="Webfrontendz">
<meta property="og:image" content="http://www.pinestoneinvestments.com/wp-content/uploads/2017/05/PI.png">

<link rel="icon" type="image/png" href="frontend/asset/images/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="frontend/asset/images/favicon-16x16.png" sizes="16x16" />

<link rel="stylesheet" href="frontend/asset/css/bootstrap.min.css" />
<link rel="stylesheet" href="frontend/asset/css/isotope.css" type="text/css" media="screen" />
<link rel="stylesheet" href="frontend/asset/css/animate.css"  media="screen">
<!-- Owl Carousel Assets -->
<link rel="stylesheet" href="frontend/asset/js/owl-carousel/owl.carousel.css" >
<link rel="stylesheet" href="frontend/asset/css/styles.css"/>
<!-- Font Awesome -->
<link rel="stylesheet" href="frontend/asset/font/css/font-awesome.min.css" >
<!-- Fancybox -->
<link rel="stylesheet" href="frontend/asset/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="frontend/asset/js/fancybox/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="perfect-scrollbar/css/perfect-scrollbar.min.css">

<link rel="stylesheet" type="text/css" href="frontend/css/custom.css">
</head>
<body>                                     
	
	@include('client.header.header')
		
	<section id="home">
		@include('client.section.home')
		@include('client.section.icons')
	</section>
	<section id="work" class="page-section page">
		@include('client.section.work')
	</section>
	<section id="services" class"page-section colord">
		@include('client.section.services')
	</section>
	<section id="location">
		@include('client.section.location')
	</section>
	<section id="aboutUs">
		@include('client.section.aboutus')
		
	</section>
	<section id="plans" class="page-section hidden">
		@include('client.section.plans')
	</section>
	<section id="team" class="page-section hidden">
		@include('client.section.team')
	</section>
	<section id="contactUs" class="contact-parlex">
		@include('client.section.contactus')
	</section>

	@include('client.footer.footer')
	<section class="copyright">
	 	@include('client.section.copyright')
	</section>

	<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a> 

<!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]--> 
<script src="frontend/asset/js/modernizr-latest.js"></script> 
<script src="frontend/asset/js/jquery-1.8.2.min.js" type="text/javascript"></script> 
<script src="frontend/asset/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="frontend/asset/js/jquery.isotope.min.js" type="text/javascript"></script> 
<script src="frontend/asset/js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script> 
<script src="frontend/asset/js/fancybox/jquery.fancybox-thumbs.js" type="text/javascript"></script> 
<script src="frontend/asset/js/jquery.nav.js" type="text/javascript"></script> 
<script src="frontend/asset/js/jquery.fittext.js"></script> 
<script src="frontend/asset/js/waypoints.js"></script> 
<script src="frontend/asset/js/custom.js" type="text/javascript"></script> 
<script src="frontend/asset/js/owl-carousel/owl.carousel.js"></script>

<script type="text/javascript" src="perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script type="text/javascript" src="perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>

</body>
</html>
