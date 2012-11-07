<h1>Registrering</h1>
<div class="registerForm">
  <?php $attributes = array('class' => '', 'id' => ''); ?>
  <?php echo form_open('index.php/verify');/*, $attributes); */?>
  <?php //echo validation_errors(); ?> 
    <?php /*<label for="username">Användarnamn <span class="required">*</span></label>
    <?php echo form_error('username'); ?>
    <input id="username" type="text" name="username" maxlength="255" value="<?php echo set_value('username'); ?>"  />
  */?>
  <p>
    <label for="firstname">Förnamn <span class="required">*</span></label>
    <?php echo form_error('firstname'); ?>
    <input id="firstname" type="text" name="firstname" maxlength="255" value="<?php echo set_value('firstname'); ?>"  />
  </p>

  <p>
    <label for="lastname">Efternamn <span class="required">*</span></label>
    <?php echo form_error('lastname'); ?>
    <input id="lastname" type="text" name="lastname" maxlength="255" value="<?php echo set_value('lastname'); ?>"  />
  </p>                                            

  <p>
    <label for="email">Email <span class="required">*</span></label>
    <?php echo form_error('email'); ?>
    <input id="email" type="text" name="email"  value="<?php echo set_value('email'); ?>"  />
  </p>

  <p>
    <label for="emailconf">Upprepa email <span class="required">*</span></label>
    <?php echo form_error('emailconf'); ?>
    <input id="emailconf" type="text" name="emailconf"  value="<?php echo set_value('emailconf'); ?>"  />
  </p>

  <p>
    <label for="password">Lösenord <span class="required">*</span></label>
    <?php echo form_error('password'); ?>
    <input id="password" type="password" name="password" maxlength="255" value="<?php echo set_value('password'); ?>"  />
  </p>
  <p>
    <label for="passconf">Upprepa lösenord <span class="required">*</span></label>
    <?php echo form_error('passconf'); ?>
    <input id="passconf" type="password" name="passconf" maxlength="255" value="<?php echo set_value('passconf'); ?>"  />
  </p>
  <p>
    <?php echo form_submit( 'submit', 'Skapa konto'); ?>
  </p>

  <?php echo form_close(); ?>
</div>
<script type="text/javascript" src="<?php echo base_url();?>script/jquery-1.8.0.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>script/modernizr-2.6.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>script/jquery.validate.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>script/scripts.js"></script>
<!-- <div class="fb-registration" data-fields="[{'name':'name'}, {'name':'email'},{'name':'favourite_dish','description':'Vilken är din favoriträtt?','type':'text'}]" data-redirect-uri="http://localhost/git/dev/index.php/home"></div> -->