<!DOCTYPE html>
<?php $user_data = $this->session->userdata('logged_in'); ?>
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

  <header>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
     

          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="<?php echo base_url();?>">
            <div id="logoWrapper">
              <img src="<?php echo base_url();?>images/miniLogo.png" />
            </div>
            Bytarna
          </a>
     

          <!-- Display only when logged in -->
          <?php if (isset($this->session->userdata['logged_in'])){?>
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>


            <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="nav-collapse collapse">
              <!-- .nav, .navbar-search, .navbar-form, etc -->
              <ul class="nav">
                <li class="active"><a href="<?php echo base_url();?>index.php/search"><i class="icon-search icon-white"></i>Sök</a></li>
                <li><a href="<?php echo base_url();?>index.php/item"><i class="icon-th-large icon-white"></i>Kategorier</a></li>
                <li><a href="<?php echo base_url();?>index.php/upload"><i class="icon-edit icon-white"></i>Skapa annons</a></li>
                <li><a href="<?php echo base_url();?>index.php/user/<?php echo $user_data['id']; ?>"><i class="icon-user icon-white"></i>Min sida</a></li>
              </ul>
              <!-- <form class="navbar-search pull-left" action="">
                <input type="text" class="search-query span2" placeholder="Sök annons...">
              </form> -->

              <ul class="nav pull-right">
                <li><a href="<?php echo base_url();?>index.php/login/logout"><i class="icon-off icon-white"></i>Logga ut</a></li>
              </ul>

            </div>
          <?php }?>
     
        </div>
      </div>
    </div>
  </header> <!--end header -->
