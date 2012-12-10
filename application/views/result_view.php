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
			  	<?php if($edit): 
				    echo anchor(base_url().'item/edit/'.$row->id,'Ändra annons', 'class=""');
				    echo anchor('#','Radera annons', 'class=""');
		endif;?>
				<a href="#" class="img">
					<?php if (! $row->url):?>
			        	<img src="http://placehold.it/300x200"/>
			        <?php else: ?>
			            <img src="<?php echo base_url().$row->url?>"/>
			        <?php endif; ?>
	      		</a>
				<h4>
					<a href="<?php echo base_url().'item/'.$row->id; ?>">
						<?php echo $row->headline; ?>
					</a>
				</h4>
				<p><?php  echo $row->description; ?></p>
				<span class="icons">
					<!-- Av:
					<a href="<?php  echo base_url(); ?>index.php/user/<?php  echo $row->user_id; ?>">
					<?php  echo $row->firstname.' '.$row->lastname; ?>
					</a> -->
					<a href="<?php echo base_url().'user/'.$row->user_id; ?>">
			      		<i class="icon-user"></i>
						<!-- <?php  echo $row->firstname.' '.$row -> lastname; ?> -->
			      	</a>
			      	<a href="message/<?php echo $row->id;?>"><i class="icon-pencil"></i></a>
			      	<a href="#"><i class="icon-star"></i></a>
				</span>
				<span>Upplagd den <?php  echo $row->date_added; ?></span>
				<!-- <p><?php  echo $row -> id; ?></p> -->
				<!-- <p><?php  echo $row->end_date; ?></p> -->
			</li>
			<?php endforeach;
		endif ?>
			<a href="#">Se fler<i class="icon-arrow-down"></i></a>
		</ul>
	</div>
</div>