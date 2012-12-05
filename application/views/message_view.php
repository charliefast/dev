<?php $user_data = $this->session->userdata('logged_in');
//$edit = ($user_data['id'] === $id)?TRUE:FALSE; ?>

<!-- SKICKA MEDDELANDE TILL PROFIL -->
<div class="container top">
  
  <?php if (! $error): ?>

  <div class="row-fluid">
    <div class="span9 offset3">

      <div class='guestbook'>
        <?php if ($comments>0): ?>
        <?php foreach ($comments as $comment): ?>
          <?php $class = ($comment->parent_id > 0)?'comment-child':'comment-parent';?>
          <div class ='<?php echo $class; ?>'>
            <h3><?php echo $comment->firstname.' '.$comment->lastname; ?></h3>
            <p><?php echo $comment->message; ?></p>
            <p><?php echo $comment->date_sent; ?></p>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <div>
          <?php $date = array('date' => date('Y-m-d H:i:s'));
          $hidden = array_merge($user_data, $date); ?>
          <?php echo form_open($form_to, '', $hidden); ?> 
          <label for="message">Meddelande:</label>
          <textarea id="message" name="message" placeholder="Skriv ditt meddelande här..." 
            class="message span12" rows="5" cols="30"></textarea>
          <?php echo form_submit('submit','Svara', 'class="btn btn-primary"') ?>
          <?php echo form_close() ?>
        </div>
      </div>

    </div>
  </div>

</div> <!-- end container -->

<?php else: echo $error; ?>
<?php endif?>