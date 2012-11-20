<?php /*<div class="content">
    <section id="introTop">
      <div class="wrapper">
        <img src="<?php echo base_url();?>images/logo.png" />
        <span>Byteshandel på nätet</span>
      </div>
    </section>
    <section>
      <div class="uploadForm">
        <h2>Ladda upp bild</h2>
        <div id="message"></div>
        <?php echo validation_errors(); ?>
        <?php //echo form_open('index.php/upload'); ?>
        <form action="index.php/upload" method="post" enctype="multipart/form-data">
        <div>
          <input type="hidden" id="user_id" name="user_id"/>
          <label for="username">Filnamn:</label>
          <input type="file" name="file" id="file" /> 
        </div>
        <!-- <a href="#" class="button blue">Logga in</a> -->
        <?php echo form_submit('submit','Ladda upp','id="submit"') ?>
        <?php echo form_close() ?>
      </div>   
    </section> 
  </div> */?>

  <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>HTML5 File Drag and Drop Upload with jQuery and PHP</title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="assets/css/styles.css" />
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>
    
    <header>
      <h1>HTML5 File Upload with jQuery and PHP</h1>
    </header>

    <!-- Fallback button for normal upload -->
    <form class="uploadForm" action="../index.php/upload/image" method="post" enctype="multipart/form-data">
      <input type="file" name="pic" accept="image/*">
        <input type="submit" value="Spara" id="fallbackBtn">
      </form>
    
    
    <!-- Drag and drop upload -->
    <div id="dropbox">
      <span class="message">Drop images here to upload. <br /><i>(they will only be visible to you)</i></span>
    </div>

        <!-- Including The jQuery Library -->
    <script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
    
    <!-- Including the HTML5 Uploader plugin -->
    <script src="assets/js/jquery.filedrop.js"></script>
    
    <!-- The main script file -->
        <script src="assets/js/script.js"></script>
    
    </body>
</html>