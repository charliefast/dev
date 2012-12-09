<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $user_data = $this->session->userdata('logged_in'); ?>
    <?php $date = array('date' => date('Y-m-d H:i:s'));
	    $hidden = array_merge($user_data, $date); ?>
	    <?php echo form_open('item/send_message/'.$item_id, '', $hidden); ?> 
		    <div class="control-group">
		    	<label for="message">Meddelande:</label>
		    	<textarea id="message" name="message" placeholder="Skriv ditt meddelande här..." class="message span12" rows="5" cols="30"></textarea>
	    	</div>
	    <?php echo form_submit('submit','Svara', 'class="btn btn-primary"') ?>
	    <?php echo form_close() ?>