<!-- ITEM PREVIEW -->
<div class="container top">
  <div class="row-fluid">
    <div class="span6 offset3">

      <?php if (isset($result['error'])):
        echo $result['error'];
      elseif($result):
        foreach ($result as $row):
          echo form_open('item/publish',array('class' => 'form-horizontal'), array('item_id' => $row->id)); ?>
          <li class="span12">
            <p>Kategori:<?php echo $row->category_name ?> <p>
            <a href="#" class="img">
            <?php if (! $row->url):?>
              <img src="http://placehold.it/150x150"/>
              <?php else: ?>
              <img src="<?php echo base_url().$row->url?>"/>
              <?php endif;?>
            </a>
            <h4><?php echo $row->headline; ?></h4>
            <p><?php  echo $row->description; ?></p>

          </li>
          <?php echo anchor('item/new/'.$row->id,'Gå tillbaka'); ?>
          <button type="submit" value="save" class="btn btn-primary">Publicera</button>
          <?php echo form_close(); ?>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </div>
</div>