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
        <!-- <a href="#" class="button blue">Logga in</a> -->
        <?php echo form_submit('submit','Logga in','id="submit"') ?>
        <?php echo form_close() ?>