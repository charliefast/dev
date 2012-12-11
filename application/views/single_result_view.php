<!-- ITEMS PÅ KATEGORIER -->
<?php $user_data = $this->session->userdata('logged_in');?>
<div class="container top">
	<div class="row-fluid">
		<div class="span3 itemSidebar">
			<?php if (isset($result['error'])):
			echo $result['error'];
			elseif($result):
			foreach ($result as $row):
			$edit = ($user_data['id'] === $row->user_id)?TRUE:FALSE; ?>
			<?php if (! $row->url):?>
				<a href="#" class="img">
					<img src="http://placehold.it/300x200"/>
			<?php else: ?>
					<img src="<?php echo base_url().$row->url?>"/>
				</a>
			<?php endif; ?>
			<span class="icons">
				<a href="<?php echo base_url().'user/'.$row->user_id; ?>"><i class="icon-user"></i>Annonsens ägare</a>
				<a href="<?php echo base_url().'like/'.$row->id;?>"><i class="icon-star"></i>Lägg till i minneslista</a>
			</span>
			<span>Upplagd den <?php  echo $row->date_added; ?></span>
			<span class="edit-icons">
				<?php if($edit): 
					echo anchor(base_url().'item/edit/'.$row->id,'Ändra');
					echo anchor('#','Radera');
				endif;?>
			</span>
		</div>

		<div class="span8">
				<h4><?php echo $row->headline; ?></h4>
				<p><?php  echo $row->description; ?></p>
			<?php endforeach;
		endif ?>
		</div>
	</div>
</div>