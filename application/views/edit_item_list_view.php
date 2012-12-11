<?php if (! $error): ?>
<div class="container top">
	<div class="row-fluid">
		<div class="span12">

			<ul class="nav nav-tabs hidden-phone">
		        <li><a href="#">Min profil</a></li>
		        <li><a href="#">Ändra profil</a></li>
		        <li><a href="#">Min minneslista</a></li>
		        <li class="active"><a href="#">Mina annonser</a></li>
		    </ul>

		    <!--<ul class="nav nav-tabs hidden-phone">
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
		    </ul>-->

	    </div>
	</div>
	<div class="row-fluid">
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
	</div>
</div>
<?php else: echo $error; ?>
<?php endif?>