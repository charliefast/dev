<?php $user_data = $this->session->userdata('logged_in');
$edit = ($user_data['id'] === $id)?TRUE:FALSE; ?>

<!-- PROFIL -->
<div class="container top">
	
	<?php if (! $error): ?>

	<div class="row-fluid">
			<?php foreach($result as $row):?>
		<div class="span12">
			<ul class="nav nav-tabs hidden-phone">

				<?php if ($edit):
					$title = 'Min profil';
					$like_list = 'Min minneslista'; $row->firstname.'s minneslista'; 
					$item_list = 'Mina annonser';
				else:
					$title = $row->firstname.'s profil';
					$like_list = $row->firstname.'s minneslista';
					$item_list = $row->firstname.'s annonser'; 
				endif; ?>
				<li class="active"><a href="<?php echo base_url().'user/'.$user_data['id']; ?>"><?php echo $title; ?></a></li>
				<li><?php if($edit) echo anchor('index.php/user/edit/all','Ändra profil');?></li>
					<li><a href="<?php echo base_url().'user/'.$row->id.'/likes'; ?>"><?php echo $like_list; ?></a></li>
					<li><a href="<?php echo base_url().'user/'.$row->id.'/items'; ?>"><?php echo $item_list; ?></a></li>
				</ul>

			<ul class="nav nav-tabs nav-stacked visible-phone">
				<?php if ($edit):
					$title = 'Min profil';
					$like_list = 'Min minneslista'; $row->firstname.'s minneslista'; 
					$item_list = 'Mina annonser';
				else:
					$title = $row->firstname.'s profil';
					$like_list = $row->firstname.'s minneslista';
					$item_list = $row->firstname.'s annonser'; 
				endif; ?>
				<li class="active"><a href="<?php echo base_url().'user/'.$user_data['id']; ?>"><?php echo $title; ?></a></li>
				<li><?php if($edit) echo anchor('index.php/user/edit/all','Ändra profil');?></li>
					<li><a href="<?php echo base_url().'user/'.$row->id.'/likes'; ?>"><?php echo $like_list; ?></a></li>
					<li><a href="<?php echo base_url().'user/'.$row->id.'/items'; ?>"><?php echo $item_list; ?></a></li>
			</ul>

		</div>
	</div>
	<div class="row-fluid">
		<div class="span3 profileSidebar">
			<h2>
				<?php echo $row->firstname.' '.$row->lastname; ?>
			</h2>
			<a href='#'>
				<?php if (! $row->url):?>
					<img src="http://placehold.it/150x150"/>
				<?php else: ?>
				<img src="<?php echo base_url().$row->url?>"/>
				<?php endif; ?>
			</a>
			<?php if($edit) echo anchor('index.php/user/edit/pic','Ändra bild', 'class=edit_pic');?>
			<?php $place = ($row->city && $row->country)?$row->city.', '.$row->country:'ej angivet'; ?>
			<p>Finns i: <?php echo $place; ?></p>
			<p>Medlem sedan:<?php echo $row->sign_up_date; ?></p>
		</div>  

		<div class="span6">

			<div>
				<h2>Presentation</h2>
				<?php if (! $row->presentation):?>
								 <div class="noResult">Denna användare har ej skrivit någon presentation än</div>
							<?php else:
								echo $row->presentation; 
							endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span9 offset3">

			<div>
				<?php $date = array('date' => date('Y-m-d H:i:s'));
				$hidden = array_merge($user_data, $date); ?>
				<?php echo form_open('index.php/user/send_message/'.$id, '', $hidden); ?> 
					<label for="message">Meddelande:</label>
					<textarea id="message" name="message" placeholder="Skriv ditt meddelande här..." class="message span12" rows="5" cols="30"></textarea>
					<?php echo form_submit('submit','Skicka', 'class="btn btn-primary"') ?>
				<?php echo form_close() ?>
			</div>
			<ul class='guestbook'>
				<?php if ($comments>0): ?>
				<?php foreach ($comments as $comment):?>
					<li class='comment-parent well'>
						<?php if( $comment['parent']->item_id): ?>
							<h4><a href="<?php echo base_url().'item/'.$comment['parent']->item_id; ?>"><?php echo $comment['parent']->headline; ?></a></h4>
						<?php endif; ?>
						<p><?php echo $comment['parent']->message; ?></p>
						<span>
							<p><?php echo $comment['parent']->firstname.' '.$comment['parent']->lastname; ?></p>
							<p><?php echo $comment['parent']->date_sent; ?></p>
						</span>
						<a href="<?php echo base_url().'message/'.$id.'/'.$comment['parent']->message_id; ?>">Svara</a>
						<?php if ($comment['children']): ?>
						<ul class='comment-child'>
							<?php foreach ($comment['children'] as $child):?>
							<li>
								<p><?php echo $child->message; ?></p>
								<span>
									<p><?php echo $child->firstname.' '.$child->lastname; ?></p>
									<p><?php echo $child->date_sent; ?></p>
								</span>
							</li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</li> 
				<?php endforeach; ?>
				<?php endif; ?>
			</ul>

		</div>
	</div>

</div> <!-- end container -->

<?php else: echo $error; ?>
<?php endif?>