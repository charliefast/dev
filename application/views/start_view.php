<!-- FÖRSTA SIDAN SOM INLOGGAD -->
<?php $user_data = $this->session->userdata('logged_in');?>
<!-- <section class="topImage row-fluid">
		<img src="<?php echo base_url();?>/images/front.jpeg" style="width:100%;" />
	<h1 class="span4 offset4 logo"><img class="" src="<?php echo base_url();?>images/logo.png" /></h1>
</section> -->

<div class="container top">
	<!-- <div id="sendMessageForm" style="position:fixed; top:50px; left:0;">
		<?php $user_data = $this->session->userdata('logged_in'); ?>
	    <?php $date = array('date' => date('Y-m-d H:i:s'));
	    $hidden = array_merge($user_data, $date); 
	    //$hidden['to_id'] = $to_id; ?>
	    <?php echo form_open('', '', $hidden); ?> 
		    <div class="control-group">
		    	<label class="label-control" for="message">Meddelande:</label>
		    	<textarea id="message" name="message" placeholder="Skriv ditt meddelande här..." class="message span4" rows="5" cols="30"></textarea>
	    	</div>
	    <?php echo form_submit('submit','Svara', 'class="btn btn-primary"') ?>
	    <?php echo form_close() ?>
	</div> -->



	<div class="row-fluid">
		<div class="span4 info-first">
			<p>
				Lite info om vad man kan göra på siten.
			</p>
		</div>
		<div class="span4 info-second">
			<p>
				Lite annan rolig info eller kanske tips
			</p>
		</div>
		<div class="span4 info-last">
			<p>
				Onödig fakta.
			</p>
		</div>
	</div>
	<div class="row-fluid">
		<h3>Senaste annonser</h3>
		<ul id="results" class="thumbnails">
		<?php if (isset($result['error'])):
			echo $result['error'];
		elseif($result):
		foreach ($result as $row):
		$edit = ($user_data['id'] === $row->user_id)?TRUE:FALSE; ?>
		<li class="span3 item">
			<a href="<?php echo base_url().'item/'.$row->id; ?>" class="img">
				<?php if (! $row->url):?>
					<img src="http://placehold.it/300x200"/>
				<?php else: ?>
					<img src="<?php echo base_url().$row->url?>"/>
				<?php endif; ?>
			</a>
			<h4><a href="<?php echo base_url().'item/'.$row->id; ?>"><?php echo $row->headline; ?></a></h4>
			<span class="icons">
				<a href="<?php echo base_url().'user/'.$row->user_id; ?>"><i class="icon-user"></i></a>
				<a href="<?php echo base_url().'item/message/'.$row->id;?>" class="sendMessage" data-link="<?php echo base_url().'item/message/'.$row->id;?>"><i class="icon-pencil"></i></a>
				<a class="like" href="<?php echo base_url().'like/'.$row->id;?>"><i class="icon-star"></i></a>
			</span>
			<span>Upplagd den <?php  echo $row->date_added; ?></span>
			<?php if($edit):?>
				<a href="<?php echo base_url().'item/edit/'.$row->id;?>"><i class="icon-edit"></i>Ändra</a>
				<a href="<?php echo base_url().'#'?>"><i class="icon-remove"></i>Radera</a>
			<?php endif;?>
			</li>
			<?php endforeach;
			endif ?>
		</ul>
			<!-- <div><?php echo $total_num_rows; ?></div> -->
			<a href="#" id="more">Se fler<i class="icon-arrow-down"></i></a>
	</div>
</div>