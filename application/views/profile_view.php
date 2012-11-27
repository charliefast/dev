<?php $user_data = $this->session->userdata('logged_in');
$edit = ($user_data['id'] === $id)?TRUE:FALSE; ?>
<div class="container">
<?php if (! $error): ?>
	<?php if($edit) echo edit_link('edit/all','Ändra profil');?>
	<a href='#'>
		<img src="<?php echo $avatar?>"/>
		<?php if($edit) echo edit_link('edit/avatar','Ändra bild');?>
	</a><h1><?php echo $firstname.' '.$lastname; ?></h1>
    <p>Finns i: <?php echo $place; ?></p>
    <p>Medlem sedan:<?php echo $sign_up_date; ?></p>
    <div>
    	<h2>Presentation</h2>
    	<?php echo $presentation ?>
    </div>
    <div class='guestbook'>
      <?php if ($comments>0): ?>
      	<?php foreach ($comments as $comments): ?>
      		<div>
      			<h3><?php echo $comment->from; ?></h3>
      			<p><?php $comment->message ?></p>
      			<a href='#'>Svara</a>
      		</div>
      	<?php endforeach; ?>
      <?php endif; ?>
      <div>
      <?php $date = array('date' => date('Y-m-d H:i:s'));
      $hidden = array_merge($user_data, $date); ?>
      <?php echo form_open('index.php/send_message', '', $hidden); ?> 
      <label for="message">Meddelande:</label>
      <textarea id="message" name="message" class="message" rows="5" cols="30"></textarea>
      <?php echo form_submit('submit','Skicka', 'class="btn"') ?>
      <?php echo form_close() ?>
      <div>
    </div>
<?php else:
  echo $error;
endif?>
</div>