<!-- ITEM PREVIEW -->
<div class="container">
  <div class="row-fluid">
    <ul id="results" class="thumbnails">
    <?php if (isset($result['error'])):
      echo $result['error'];
    elseif($result):
      foreach ($result as $row):
        echo form_open('item/publish',array('class' => 'form-horizontal'), array('item_id' => $row->id));
        echo anchor('item/new/'.$row->id,'Gå tillbaka');?>
        <li class="span3 item">
          <p>Kategori:<?php echo $row->category_name ?> <p>
          <a href="#" class="img">
          <?php if (! $row->url):?>
            <img src="http://placehold.it/150x150"/>
            <?php else: ?>
            <img src="<?php echo base_url().$row->url?>"/>
            <?php endif;?>
          </a>
          <h4><a href="#"><?php echo $row->headline; ?></a></h4>
          <p><?php  echo $row->description; ?></p>
          <span class="icons">
            <!-- Av:
            <a href="<?php  echo base_url(); ?>index.php/user/<?php  echo $row->user_id; ?>">
            <?php  echo $row->firstname.' '.$row->lastname; ?>
            </a> -->
            <a href="<?php  echo base_url(); ?>index.php/user/<?php  echo $row->user_id; ?>">
                  <i class="icon-user"></i>
              <!-- <?php  echo $row->firstname.' '.$row -> lastname; ?> -->
                </a>
                <a href="message/<?php echo $row->id;?>"><i class="icon-pencil"></i></a>
                <a href="#"><i class="icon-star"></i></a>
          </span>
          <span>Upplagd den <?php  echo $row->date_added; ?></span>
          <!-- <p><?php  echo $row -> id; ?></p> -->
          <!-- <p><?php  echo $row->end_date; ?></p> -->
        </li>
        <button type="submit" value="save" class="btn">Publicera</button>
        <?php echo form_close(); ?>
      <?php endforeach; ?>
    <?php endif; ?>
    </ul>
  </div>
</div>