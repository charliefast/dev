<!-- ITEMS PÅ KATEGORIER -->
<?php $user_data = $this->session->userdata('logged_in');?>
<div class="container resultsContainer">
	<div class="loader"></div>
	<div class="row-fluid">
		<ul id="results" class="thumbnails">
			<?php if (isset($result['error'])):
				echo $result['error'];
			elseif($result):
				foreach ($result as $row):
					$edit = ($user_data['id'] === $row->user_id)?TRUE:FALSE; ?>
					<li class="span3 item">
						<a href="#" class="img">
							<?php if (! $row->url):?>
								<img src="http://placehold.it/300x200"/>
							<?php else: ?>
								<img src="<?php echo base_url().$row->url?>"/>
							<?php endif; ?>
						</a>
						<h4><a href="<?php echo base_url().'item/'.$row->id; ?>"><?php echo $row->headline; ?></a></h4>
							<!-- <p><?php  echo $row->description; ?></p> -->
						<span class="icons">
							<a href="<?php echo base_url().'user/'.$row->user_id; ?>"><i class="icon-user"></i></a>
							<a href="<?php echo base_url().'item/message/'.$row->id;?>"><i class="icon-pencil"></i></a>
							<a class="like" href="<?php echo base_url().'like/'.$row->id;?>"><i class="icon-star"></i></a>
						</span>
						<span>Upplagd den <?php  echo $row->date_added; ?></span>
						<?php if($edit):?>
							<a href="<?php echo base_url().'item/edit/'.$row->id;?>"><i class="icon-edit"></i>Ändra</a>
							<a href="<?php echo base_url().'#'?>"><i class="icon-remove"></i>Radera</a>
						<?php endif;?>
						</li>
				<?php endforeach; ?>
			<?php endif ?>
			<a href="#">Se fler<i class="icon-arrow-down"></i></a>
		</ul>
	</div>
</div>