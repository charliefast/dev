<?php if (! $error): ?>
<?php echo form_open('item_list/batch_edit',array('class' => 'form-horizontal')); ?>
<ul>
	<?php foreach ($result as $row): ?>
	<?php $status = ($row->status)?'Publicerad':'Opublicerad'; ?>	
	<li><input type="checkbox" name="likes" value="<?php echo $row->item_id; ?>">
		<a href="<?php echo base_url().'item/'.$row->item_id; ?>"><?php echo $row->headline; ?></a> Status:<?php echo $status; ?>
	</li>
	<?php endforeach ?>
</ul>
<button type="submit" value="delete" name="submit" class="btn btn-primary">Ta bort markerade</button>
<button type="submit" value="publish" name="submit" class="btn btn-primary">Publicera markerade</button>
<?php echo form_close(); ?>
<?php else: echo $error; ?>
<?php endif?>