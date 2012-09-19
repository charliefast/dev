<!DOCTYPE html>
<html>
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Registrering</title>
 </head>
 <body>
<h1>Registrering</h1>
<?php $attributes = array('class' => '', 'id' => ''); ?>
<?php echo form_open('index.php/VerifyRegistration', $attributes); ?>
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
  <label for="city">Stad</label>
  <?php echo form_error('city'); ?>
  <input id="city" type="text" name="city" maxlength="255" value="<?php echo set_value('city'); ?>"  />
</p>

<p>
  <label for="country">Land</label>
  <?php echo form_error('country'); ?>
        
  <?php // Change the values in this array to populate your dropdown as required ?>
  <?php $options = array(
                          ''  => 'Välj land',
                          'sweden'   => 'Sverige',
                          'norway'   => 'Norge',
                          'denmark'  => 'Danmark',
                          'finland'  => 'Finland'
                                                   ); ?>

        <?php echo form_dropdown('country', $options, set_value('country'))?>
</p>                                             
                        
<p>
        <label for="zip">Postnr</label>
	<?php echo form_error('zip'); ?>
	<input id="zip" type="text" name="zip"  value="<?php echo set_value('zip'); ?>"  />
<p>
        <label for="phone">Telefon</label>
        <?php echo form_error('phone'); ?>
        <input id="phone" type="text" name="phone"  value="<?php echo set_value('phone'); ?>"  />
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
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
