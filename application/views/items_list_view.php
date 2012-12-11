<div class="container top">
	<div class="row-fluid">

	</div>
	<?php if (! $error): ?>
	<ul>
		<?php foreach ($result as $row): ?>
		<li>
			<a href="<?php echo base_url().'item/'.$row->item_id; ?>"><?php echo $row->headline; ?></a>
		</li>
		<?php endforeach ?>
	</ul>
	<?php else: echo $error; ?>
	<?php endif?>
</div>