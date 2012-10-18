<div class="content">
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
  </div>