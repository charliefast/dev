<div class="content">



  <section class="row-fluid" id="introTop">
    <div class="container">
      <div class="wrapper">
        <img class="logo" src="<?php echo base_url();?>images/logo.png" />
        <span>Byteshandel på nätet</span>
      </div>
    </div>
  </section>

  <section class="row-fluid">
    <div class="container">
      <div class="loginForm">
        <h2>Logga in</h2>
        <div id="message"></div>
        <?php echo validation_errors(); ?>
        <?php //echo form_open('index.php/verifylogin'); ?>
        <form method="post" action="<?php echo base_url(); ?>index.php/verifylogin/">
        <div>
          <label for="username">Mailadress:</label>
          <input type="text" size="20" id="username" name="username" class="username"/>
        </div>
        <div>
          <label for="password">Lösenord:</label>
          <input type="password" size="20" id="password" name="password" class="password"/>
        </div>
        <a href="index.php/register" class="btn btn-primary">Skapa konto</a>
        <!--<a href="<?php echo base_url();?>index.php/verifylogin" class="btn">Logga in</a>-->
        <?php echo form_submit('submit','Logga in', 'class="btn"') ?>
        <?php echo form_close() ?>
          
        <p>eller</p>

        <a href="#">Logga in med Facebook</a>
      </div>   
    </div>
  </section> 
</div>


<!-- <div class="content">
    <section id="introTop">
      <div class="wrapper">
        <img src="<?php echo base_url();?>images/logo.png" />
        <span>Byteshandel på nätet</span>
      </div>
    </section>
    <section>
      <div class="loginForm">
        <h2>Logga in</h2>
        <div id="message"></div>
        <?php echo validation_errors(); ?>
        <?php echo form_open('index.php/verifylogin'); ?>
        <div>
          <label for="username">Mailadress:</label>
          <input type="text" size="20" id="username" name="username" class="username"/>
        </div>
        <div>
          <label for="password">Lösenord:</label>
          <input type="password" size="20" id="password" name="password" class="password"/>
        </div>
        <a href="index.php/register" class="button green">Skapa konto</a>
        <a href="#" class="btn btn-primary">Logga in</a>
        <?php echo form_submit('submit','Logga in','id="submit"', 'class="btn"') ?>
        <?php echo form_close() ?>
          
        <p>eller</p>

        <a href="#">Logga in med Facebook</a>
        <div class="fb-login-button">Login with Facebook</div>
      </div>   
    </section> 
  </div> -->


  

