<?php $user_data = $this->session->userdata('logged_in');
//$edit = ($user_data['id'] === $id)?TRUE:FALSE; ?>

<!-- SKICKA MEDDELANDE TILL PROFIL -->
<div class="container top">
  


<div class="row-fluid">
    <div class="span9 offset3">

      <div>
        <?php $date = array('date' => date('Y-m-d H:i:s'));
        $hidden = array_merge($user_data, $date); ?>
        <?php echo form_open($form_to, '', $hidden); ?> 
          <label for="message">Meddelande:</label>
          <textarea id="message" name="message" placeholder="Skriv ditt meddelande här..." class="message span12" rows="5" cols="30"></textarea>
          <?php echo form_submit('submit','Skicka', 'class="btn btn-primary"') ?>
        <?php echo form_close() ?>
      </div>
      <ul class='guestbook'>
        <?php if ($comments>0): ?>
        <?php foreach ($comments as $comment):?>
          <li class='comment-parent well'>
            <?php if( $comment['parent']->item_id): ?>
              <a href="<?php echo base_url().'/item/'.$comment['parent']->item_id; ?>">Svar till annons</a>
            <?php endif; ?>
            <h3><?php echo $comment['parent']->firstname.' '.$comment['parent']->lastname; ?></h3>
            <p><?php echo $comment['parent']->message; ?></p>
            <p><?php echo $comment['parent']->date_sent; ?></p>
            <?php if ($comment['children']): ?>
            <ul class='comment-child'>
              <?php foreach ($comment['children'] as $child):?>
              <li>
                <h3><?php echo $child->firstname.' '.$child->lastname; ?></h3>
                <p><?php echo $child->message; ?></p>
                <p><?php echo $child->date_sent; ?></p>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </li> 
        <?php endforeach; ?>
        <?php endif; ?>
      </ul>

    </div>
  </div>

</div> <!-- end container -->

