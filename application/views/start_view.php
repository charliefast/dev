<div class="imgWrapper" style="position:relative;">
	<img src="<?php echo base_url();?>/images/front.jpeg" style="width:100%;" />
	<img class="logo" src="<?php echo base_url();?>images/logo.png" style="position: absolute;top: 35%;left: 50%;width: 450px;margin-left: -225px;" />
</div>
<div class="container">
	<div class="row-fluid" style="margin-top:20px;">
		<div class="span4">
			<p style="margin:10px; background:#87C06B; padding:40px; color:#333; font-size:20px;">
				Lite info om vad man kan göra på siten.
			</p>
		</div>
		<div class="span4">
			<p style="margin:10px; background:#90D3CD; padding:40px; color:#333; font-size:20px;">
				Lite annan rolig info eller kanske tips
			</p>
		</div>
		<div class="span4 last">
			<p style="margin:10px; background:#CDDFD3; padding:40px; color:#333; font-size:20px;">
				Onödig fakta.
			</p>
		</div>
	</div>
	<div class="row-fluid">
		<h3>Senaste annonser</h3>
		<?php if (isset($result['error'])):
      echo $result['error'];
    else:
    foreach ($result as $row):?>
    <li class="span3">
    	<img src="http://placehold.it/300x200">
    	<h3><?php echo $row->headline; ?></h3>
    	<p><?php  echo $row->description; ?></p>
    	<p>
    	  	<a href="<?php  echo base_url(); ?>index.php/user/<?php  echo $row->user_id; ?>">
    	  		<?php  echo $row->firstname.' '.$row -> lastname; ?>
    	  	</a>
    	</p>
    	<!-- <p><?php  echo $row -> id; ?></p> -->
    	<p><?php  echo $row->date_added; ?></p>
    	<p><?php  echo $row->end_date; ?></p>
    </li>
    <?php endforeach;
    endif ?>
	</div>
</div>