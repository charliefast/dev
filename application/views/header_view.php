<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Bytarna.se - <?php echo $title ?></title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="style/reset.css">
	<!-- <link rel="stylesheet" href="css/main.less" type="text/less" media="screen" /> -->
	<link rel="stylesheet" href="style/main.css" type="text/css" media="screen" />

	<script src="script/less-1.1.3.min.js"></script>
	
	
	<!-- JavaScript -->
	<script src="script/modernizr-2.6.1.min.js"></script>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	<!-- iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	
	<!-- Microsoft -->
	<meta http-equiv="cleartype" content="on">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

</head>
<body>
	<header>
		<div class="logo">
			<img src="images/miniLogo.png" />
		</div>
	<?php
	if (isset($this->session->userdata['logged_in'])){
	echo '<a href="#" id="menuLink"></a>'.
		    '<a href="#" id="searchLink"></a>'.
		'<nav>'.
			'<!-- <ul id="mainNavigation">'.
				'<li>hejhej</li>'.
			'</ul> -->'.
			'<ul id="mobileNavigation">'.
				'<li></li>'.
			'</ul>'.
		'</nav>'; 
	}?>
		<div class="search">
			<a href="#"></a>
		</div>
	</header>

		<!-- Header -->