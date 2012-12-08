<div class="container">
  <h1>Skapa konto</h1>
  <div class="row-fluid">
    <div class="registerForm span4 offset4">
      <?php $attributes = array('class' => '', 'id' => ''); ?>
      <?php echo form_open('verify');/*, $attributes); */?>
        <?php echo validation_errors(); ?> 
          <?php /*<label for="username">Användarnamn <span class="required">*</span></label>
          <?php echo form_error('username'); ?>
          <input id="username" type="text" name="username" maxlength="255" value="<?php echo set_value('username'); ?>"  />
        */?>
        <!-- REGISTRERING -->
        <div class="control-group">
          <label class="control-label" for="firstname">Förnamn <span class="required">*</span></label>
          <?php echo form_error('firstname'); ?>
          <div class="controls">
            <input id="firstname" type="text" name="firstname" maxlength="255" placeholder="Förnamn" value="<?php echo set_value('firstname'); ?>"  />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="lastname">Efternamn <span class="required">*</span></label>
          <?php echo form_error('lastname'); ?>
          <div class="controls">
            <input id="lastname" type="text" name="lastname" maxlength="255" placeholder="Efternamn" value="<?php echo set_value('lastname'); ?>"  />
          </div>
        </div>                                          

        <div class="control-group">
          <label class="control-label" for="email">Mailadress <span class="required">*</span></label>
          <?php echo form_error('email'); ?>
          <div class="controls">
            <input id="email" type="text" name="email" placeholder="Mailadress" value="<?php echo set_value('email'); ?>"  />
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="emailconf">Upprepa mailadress <span class="required">*</span></label>
          <?php echo form_error('emailconf'); ?>
          <div class="controls">
            <input id="emailconf" type="text" name="emailconf" placeholder="Upprepa mailadress" value="<?php echo set_value('emailconf'); ?>"  />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="password">Lösenord <span class="required">*</span></label>
          <?php echo form_error('password'); ?>
          <div class="controls">
            <input id="password" type="password" name="password" maxlength="255" placeholder="Lösenord" value="<?php echo set_value('password'); ?>"  />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="passconf">Upprepa lösenord <span class="required">*</span></label>
          <?php echo form_error('passconf'); ?>
          <div class="controls">
            <input id="passconf" type="password" name="passconf" maxlength="255" placeholder="Upprepa lösenord" value="<?php echo set_value('passconf'); ?>"  />
          </div>
        </div>
        
        <?php echo form_submit( 'submit', 'Skapa konto', 'class="btn btn-primary"'); ?>

      <?php echo form_close(); ?>

    </div>
  </div>
</div>