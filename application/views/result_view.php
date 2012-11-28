<!-- #RESULTS -->
<div class="container">
	<div class="row-fluid">
		<ul id="results" class="thumbnails">
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
				<?php  echo $row->firstname.' '.$row->lastname; ?>
				</a>
			</p>
			<!-- <p><?php  echo $row -> id; ?></p> -->
			<p><?php  echo $row->date_added; ?></p>
			<p><?php  echo $row->end_date; ?></p>
		</li>
		<?php endforeach;
		endif ?>
		</ul>
	</div>
</div>