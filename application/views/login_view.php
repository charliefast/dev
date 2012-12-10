<!-- LOGGA IN -->
  <section class="topImage row-fluid">
    <h1><img class="logo span6 offset3 center" src="<?php echo base_url();?>images/logo.png" /></h1>
  </section>
<div class="content">
  <section class="row-fluid">
    <div class="container">
      <div class="loginForm span4 offset4">
        <h2>Logga in</h2>
        <?php echo validation_errors(); ?>

        <?php //echo form_open('index.php/verifylogin'); ?>
        <form method="post" action="<?php echo base_url(); ?>verifylogin/">

          <div class="control-group">
            <label class="control-label" for="username">Mailadress:</label>
            <div class="controls">
              <input type="text" size="20" id="username" name="username" class="username" placeholder="Mailadress"/>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="password">Lösenord:</label>
            <div class="controls">
              <input type="password" size="20" id="password" name="password" class="password" placeholder="Lösenord"/>
            </div>
          </div>

          <div id="message"></div>
          <a href="register" class="btn btn-primary">Skapa konto</a>
          <?php echo form_submit('submit','Logga in', 'class="btn"') ?>

        </form>
        <?php echo form_close() ?>

        <p>eller</p>

        <a href="<?php echo $login_url ?>">Logga in med Facebook</a>
      </div>   
    </div>
  </section> 


</div>

  

