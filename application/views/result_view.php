<!-- ITEMS PÅ KATEGORIER -->
<div class="container">
	<div class="row-fluid">
		<ul id="results" class="thumbnails">
		<?php if (isset($result['error'])):
		  echo $result['error'];
    elseif($result):
		foreach ($result as $row):?>
		<li class="span3 item">
			<a href="#" class="img"><img src="http://placehold.it/300x200"></a>
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
		<?php endforeach;
		endif ?>
		</ul>
	</div>
</div>