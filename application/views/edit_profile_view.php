<!-- Redigera användarinformation -->

<?php $user_data = $this->session->userdata('logged_in');
?>
<?php foreach($result as $row):?>
<div class="container top">
  <div class="editForm">
    
    <?php echo form_open('index.php/user/edit/verify', '', $user_data); ?> 
      
      <a href='#'>
        <?php if (! $row->url):?>
          <img src="http://placehold.it/150x150"/>
        <?php else: ?>
        <img src="<?php echo base_url().$row->url?>"/>
        <?php endif; ?>
        <?php echo anchor('index.php/user/edit/pic','Ladda upp bild');?>
      </a>
      
      <div class="control-group">
        <label class="control-label" for="firstname">Förnamn <span class="required">*</span></label>
        <?php echo form_error('firstname'); ?>
        <div class="controls">
          <input id="firstname" type="text" name="firstname" maxlength="255" placeholder="Förnamn" value="<?php echo $row->firstname ?>"  />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="lastname">Efternamn <span class="required">*</span></label>
        <?php echo form_error('lastname'); ?>
        <div class="controls">
          <input id="lastname" type="text" name="lastname" maxlength="255" placeholder="Efternamn" value="<?php echo $row->lastname; ?>"  />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="email">Mailadress <span class="required">*</span></label>
        <?php echo form_error('email'); ?>
        <div class="controls">
          <input id="email" type="text" name="email" placeholder="Mailadress" value="<?php echo $row->email; ?>"  />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="city">Stad</label>
        <?php echo form_error('city'); ?>
        <div class="controls">
          <input id="city" type="text" name="city"  value="<?php echo $row->city; ?>"  />
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="country">Land</label>
        <?php echo form_error('country'); ?>
        <div class="controls">
          <input id="country" type="text" name="country"  value="<?php echo $row->country; ?>"  />
        </div>
      </div>
      
      <div class="control-group">
        <label class="control-label" for="phone">Telefon</label>
        <?php echo form_error('email'); ?>
        <div class="controls">
          <input id="email" type="text" name="email"  value="<?php echo $row->email; ?>"  />
        </div>
      </div>
      
      <div class="control-group">
        <label class="control-label" for="presentation">Presentation</label>
        <div class="controls">
          <textarea id="presentation" name="presentation" class="presentation" rows="5" cols="30"><?php echo $row->presentation ?></textarea>
        </div>
      </div>

      <div class="control-group">
        <label class="control-label" for="password">Lösenord <span class="required">*</span></label>
        <?php echo form_error('password'); ?>
        <div class="controls">
          <input id="password" type="password" name="password" maxlength="255" placeholder="Lösenord" value="<?php echo set_value('password'); ?>"  />
        </div>
      </div>

      <?php //echo form_submit('submit','Spara ändringar', 'class="btn"') ?>
      <button type="submit" value="save" class="btn">Spara ändringar</button>
      <!--<button type="submit" value="abort" class="btn">Avbryt</button> -->

    <?php echo form_close() ?>
  </div>
</div>
<?php endforeach;?>