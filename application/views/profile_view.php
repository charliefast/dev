<?php $user_data = $this->session->userdata('logged_in');
$edit = ($user_data['id'] === $id)?TRUE:FALSE; ?>

<!-- PROFIL -->
<div class="container top">
  
  <?php if (! $error): ?>


  <div class="row-fluid">
    <div class="span3 profileSidebar">
      <?php foreach($result as $row):?>
      <h2>
        <?php echo $row->firstname.' '.$row->lastname; ?>
      </h2>
      <a href='#'>
        <?php if (! $row->url):?>
          <img src="http://placehold.it/150x150"/>
        <?php else: ?>
        <img src="<?php echo base_url().$row->url?>"/>
        <?php endif; ?>
      </a>
      <?php if($edit) echo anchor('index.php/user/edit/pic','Ändra bild', 'class=edit_pic');?>
      <?php $place = ($row->city && $row->country)?$row->city.', '.$row->country:'ej angivet'; ?>
      <p>Finns i: <?php echo $place; ?></p>
      <p>Medlem sedan:<?php echo $row->sign_up_date; ?></p>

      <?php if($edit) echo anchor('index.php/user/edit/all','Ändra profil');?>
    </div>  

    <div class="span9">

      <div>
      	<h2>Presentation</h2>
      	<?php if (! $row->presentation):?>
                 <div class="noResult">Denna användare har ej skrivit någon presentation än</div>
              <?php else:
                echo $row->presentation; 
              endif; ?>
      </div>
<?php endforeach; ?>
    </div>
  </div>

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
            <a href='../message/<?php echo $id.'/'.$comment->message_id; ?>'>Svara</a>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <div>
          <?php $date = array('date' => date('Y-m-d H:i:s'));
          $hidden = array_merge($user_data, $date); ?>
          <?php echo form_open('index.php/user/send_message/'.$id, '', $hidden); ?> 
          <label for="message">Meddelande:</label>
          <textarea id="message" name="message" placeholder="Skriv ditt meddelande här..." 
            class="message span12" rows="5" cols="30"></textarea>
          <?php echo form_submit('submit','Skicka', 'class="btn btn-primary"') ?>
          <?php echo form_close() ?>
        </div>
      </div>

    </div>
  </div>

</div> <!-- end container -->

<?php else: echo $error; ?>
<?php endif?>
