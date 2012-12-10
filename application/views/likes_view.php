<?php if (! $error): ?>
<ul>
<?php foreach ($likes as $like): ?>
<li>
	<a href="<?php echo base_url().'item/'.$like->item_id; ?>"><?php echo $like->headline; ?></a>
</li>
<?php endforeach ?>
</ul>
<?php else: echo $error; ?>
<?php endif?>