<!-- Redigera användarinformation -->

<?php $user_data = $this->session->userdata('logged_in');
?>
<div class="container">
  <?php echo form_open('index.php/user/edit/verify', '', $user_data); ?> 
  <a href='#'>
  <img src="<?php echo $avatar?>"/>
  <?php echo anchor('upload/image','Ladda upp bild');?>
  </a>
  <p>
    <label for="firstname">Förnamn <span class="required">*</span></label>
    <?php echo form_error('firstname'); ?>
    <input id="firstname" type="text" name="firstname" maxlength="255" value="<?php echo $firstname ?>"  />
  </p>

  <p>
    <label for="lastname">Efternamn <span class="required">*</span></label>
    <?php echo form_error('lastname'); ?>
    <input id="lastname" type="text" name="lastname" maxlength="255" value="<?php echo $lastname; ?>"  />
  </p>                                            

  <p>
    <label for="email">Email <span class="required">*</span></label>
    <?php echo form_error('email'); ?>
    <input id="email" type="text" name="email"  value="<?php echo $email; ?>"  />
  </p>
  <p>
    <label for="city">Stad</label>
    <?php echo form_error('city'); ?>
    <input id="city" type="text" name="city"  value="<?php echo $city; ?>"  />
  </p>
  <p>
    <label for="country">Land</label>
    <?php echo form_error('country'); ?>
    <input id="country" type="text" name="country"  value="<?php echo $country; ?>"  />
  </p>
  <p>
    <label for="phone">Telefon</label>
    <?php echo form_error('email'); ?>
    <input id="email" type="text" name="email"  value="<?php echo $email; ?>"  />
  </p>
  <p>
    <label for="presentation">Presentation</label>
    <textarea id="presentation" name="presentation" class="presentation" rows="5" cols="30"><?php echo $presentation ?></textarea>
  </p>
  <p>
    <label for="password">För att spara vänligen ange ditt lösenord <span class="required">*</span></label>
    <?php echo form_error('password'); ?>
    <input id="password" type="password" name="password" maxlength="255" value="<?php echo set_value('password'); ?>"  />
  </p>
  <?php echo form_submit('submit','Spara ändringar', 'class="btn"') ?>
  <?php echo form_close() ?>
  </div>
</div>