<?php $user_data = $this->session->userdata('logged_in');
$edit = ($user_data['id'] === $id)?TRUE:FALSE; ?>

<?php if (! $error): ?>
<div class="container top">
	<div class="row-fluid">
		<div class="span12">

		    <?php foreach ($result as $row): ?>
		    <ul class="nav nav-tabs hidden-phone">
		        <li><a href="<?php echo base_url().'user/'.$user_data['id']; ?>">Min profil</a></li>

		        <li><?php if($edit) echo anchor('index.php/user/edit/all','Ändra profil');?></li>
		        <?php if ($edit):
		          $like_list = 'Min minneslista'; $row->firstname.'s minneslista'; 
		          $item_list = 'Mina annonser';
		        else:
		          $like_list = $row->firstname.'s minneslista';
		          $item_list = $row->firstname.'s annonser'; 
		        endif; ?>
		          <li class="active"><a href="<?php echo base_url().'user/'.$row->id.'/likes'; ?>"><?php echo $like_list; ?></a></li>

		          <li><a href="<?php echo base_url().'user/'.$row->id.'/items'; ?>"><?php echo $item_list; ?></a></li>
		    </ul>

		    <ul class="nav nav-tabs nav-stacked visible-phone">
		      <li><a href="<?php echo base_url().'user/'.$user_data['id']; ?>">Min profil</a></li>
		      <li class="active"><?php if($edit) echo anchor('index.php/user/edit/all','Ändra profil');?></li>
		      <?php if ($edit):
		        $like_list = 'Min minneslista'; $row->firstname.'s minneslista'; 
		        $item_list = 'Mina annonser';
		      else:
		        $like_list = $row->firstname.'s minneslista';
		        $item_list = $row->firstname.'s annonser'; 
		      endif; ?>
		        <li><a href="<?php echo base_url().'user/'.$row->id.'/likes'; ?>"><?php echo $like_list; ?></a></li>
		         <li><a href="<?php echo base_url().'user/'.$row->id.'/items'; ?>"><?php echo $item_list; ?></a></li>
		    </ul>
			<?php endforeach ?>
	    </div>
	</div>


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
</div>
<?php else: echo $error; ?>
<?php endif?>