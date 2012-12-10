<!-- FÖRSTA SIDAN SOM INLOGGAD -->
<?php $user_data = $this->session->userdata('logged_in');?>
<!-- <section class="topImage row-fluid">
		<img src="<?php echo base_url();?>/images/front.jpeg" style="width:100%;" />
	<h1 class="span4 offset4 logo"><img class="" src="<?php echo base_url();?>images/logo.png" /></h1>
</section> -->

<div class="container top">
	<!-- <form action="http://bytarna/item/send_message/48" method="post" accept-charset="utf-8" style="position:fixed; top:50px; left:0;">
		<div style="display:none">
			<input type="hidden" name="id" value="57">
			<input type="hidden" name="username" value="hector.romo@circuit.se">
			<input type="hidden" name="date" value="2012-12-10 20:53:54">
			<input type="hidden" name="to_id" value="57">
		</div>
		<div class="control-group">
			<label for="message">Meddelande:</label>
			<textarea id="message" name="message" placeholder="Skriv ditt meddelande här..." class="message span12" rows="5" cols="30"></textarea>
		</div>
		<input type="submit" name="submit" value="Svara" class="btn btn-primary">
	</form> -->
	<!--  -->



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
			<?php if($edit):?>
				<a href="<?php echo base_url().'item/edit/'.$row->id;?>">Ändra annons</a>
				<a href="<?php echo base_url().'#'?>">Radera annons</a>
				<?php endif;?>
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
				<a href="<?php echo base_url().'like/'.$row->id;?>"><i class="icon-star"></i></a>
			</span>
			<span>Upplagd den <?php  echo $row->date_added; ?></span>
			<!-- <p><?php  echo $row -> id; ?></p> -->
			<!-- <p><?php  echo $row->end_date; ?></p> -->
			</li>
			<?php endforeach;
			endif ?>
		</ul>
			<a href="#" id="more">Se fler<i class="icon-arrow-down"></i></a>
	</div>
</div>