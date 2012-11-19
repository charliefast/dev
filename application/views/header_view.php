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
  <link rel="stylesheet" href="<?php echo base_url();?>css/main.css" type="text/css" media="screen" />
  
  
  <!-- JavaScript -->
  <!--<script type="text/javascript" src="<?php echo base_url();?>script/jquery-1.8.0.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>script/modernizr-2.6.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>script/jquery.validate.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>script/jquery.validate.js"></script>-->


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
  
  <!--<div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '387736861297952', // App ID
        //channelUrl : 'http://localhost/git/dev/index.php/home', // Channel File
        status     : true, // check login status
        cookie     : true, // enable cookies to allow the server to access the session
        xfbml      : true  // parse XFBML
      });
      // Additional initialization code here

      FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        // the user is logged in and has authenticated your
        // app, and response.authResponse supplies
        // the user's ID, a valid access token, a signed
        // request, and the time the access token 
        // and signed request each expire
        var uid = response.authResponse.userID;
        var accessToken = response.authResponse.accessToken;
        console.log("hejhej");

      //window.location = "http://localhost/git/dev/index.php/home";

      } else if (response.status === 'not_authorized') {
        // the user is logged in to Facebook, 
        // but has not authenticated your app
      } else {
        // the user isn't logged in to Facebook.
      }
     });

    };
    // Load the SDK Asynchronously
    (function(d){
       var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement('script'); js.id = id; js.async = true;
       // js.src = "//connect.facebook.net/en_US/all.js";
       js.src = "//connect.facebook.net/sv_SE/all.js";
       ref.parentNode.insertBefore(js, ref);
     }(document));

  </script>-->

    <!-- <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '387736861297952',
        status     : true, 
        cookie     : true,
        xfbml      : true,
        oauth      : true,
      });
    };
    (function(d){
       var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
       js = d.createElement('script'); js.id = id; js.async = true;
       js.src = "http://connect.facebook.net/en_US/all.js";
       d.getElementsByTagName('head')[0].appendChild(js);
     }(document));
  </script>
  <div 
    class="fb-registration" 
    data-fields="[{'name':'name'}, {'name':'email'},
      {'name':'favorite_car','description':'What is your favorite car?',
        'type':'text'}]" 
    data-redirect-uri="http://localhost/git/dev/index.php/home">
  </div>   -->
  <header>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
     
          <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="<?php echo base_url();?>">
            <div class="logo" style="display:inline;">
              <img style="height:23px;" src="<?php echo base_url();?>images/miniLogo.png" />
            </div>
            Bytarna
          </a>
     
          <!-- Everything you want hidden at 940px or less, place within here -->
          <div class="nav-collapse collapse">
            <!-- .nav, .navbar-search, .navbar-form, etc -->
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>"><i class="icon-home icon-white"></i>Start</a></li>
              <li><a href="<?php echo base_url();?>index.php/item"><i class="icon-th-large icon-white"></i>Kategorier</a></li>
              <li><a href="#"><i class="icon-edit icon-white"></i>Skapa annons</a></li>
              <li><a href="#"><i class="icon-user icon-white"></i>Min sida</a></li>
            </ul>
            <form class="navbar-search pull-left" action="">
              <input type="text" class="search-query span2" placeholder="Sök annons...">
            </form>
          </div>
     
        </div>
      </div>
    </div>
    <?php if (isset($this->session->userdata['logged_in'])){?>
      <a href="#" id="menuLink"></a>
      <a href="#" id="searchLink"></a>
      <nav>
      <!-- <ul id="mainNavigation">
        <li>hejhej</li>
      </ul> -->
        <ul id="mobileNavigation">
          <li></li>'
        </ul>
      </nav>
    <?php }?>
    <!-- 
    
    <div class="search">
      <a href="#"></a>
    </div>
    </div> -->
  </header>
  <!-- Header -->  <!-- Header -->

   <?php if (isset($this->session->userdata['logged_in'])){?>
              <li><a href="#" id="menuLink"></a></li>
              <li><a href="#" id="searchLink"></a></li>
              <nav>
              <!-- <ul id="mainNavigation">
                <li>hejhej</li>
              </ul> -->
                <ul id="mobileNavigation">
                  <li></li>'
                </ul>
              </nav>
    <?php }?>

