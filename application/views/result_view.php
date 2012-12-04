<!-- ITEMS PÅ KATEGORIER -->
<div class="container">
	<div class="row-fluid">
		<ul id="results" class="thumbnails">
		<?php if (isset($result['error'])):
		  echo $result['error'];
		else:
		foreach ($result as $row):?>
		<li class="span3 item">
			<a href="#" class="img"><img src="http://placehold.it/300x200"></a>
			<h4><a href="#"><?php echo $row->headline; ?></a></h4>
			<p><?php  echo $row->description; ?></p>
			<span>Upplagd den <?php  echo $row->date_added; ?></span>
			<span>
				Av:
				<a href="<?php  echo base_url(); ?>index.php/user/<?php  echo $row->user_id; ?>">
				<?php  echo $row->firstname.' '.$row->lastname; ?>
				</a>
			</span>
			<!-- <p><?php  echo $row -> id; ?></p> -->
			<!-- <p><?php  echo $row->end_date; ?></p> -->
		</li>
		<?php endforeach;
		endif ?>
		</ul>
	</div>
</div>