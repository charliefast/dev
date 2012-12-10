<?php if (! $error): ?>
<?php echo form_open('like/delete_item',array('class' => 'form-horizontal')); ?>
<ul>
<?php foreach ($likes as $like): ?>
<li><input type="checkbox" name="likes" value="<?php echo $like->item_id; ?>">
	<a href="<?php echo base_url().'item/'.$like->item_id; ?>"><?php echo $like->headline; ?></a>
</li>
<?php endforeach ?>
</ul>
<button type="submit" value="delete" name="submit" class="btn btn-primary">Ta bort markerade</button>
<?php echo form_close(); ?>
<?php else: echo $error; ?>
<?php endif?>