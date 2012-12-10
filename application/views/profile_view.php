<?php $user_data = $this->session->userdata('logged_in');
$edit = ($user_data['id'] === $id)?TRUE:FALSE; ?>

<!-- PROFIL -->
<div class="container top">
	
	<?php if (! $error): ?>


	<div class="row-fluid">
		<div class="span3 profileSidebar">
			<?php foreach($result as $row):?>
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

			<?php if($edit) echo anchor('index.php/user/edit/all','Ändra profil');?>
		</div>  

		<div class="span9">

			<div>
				<h2>Presentation</h2>
				<?php if (! $row->presentation):?>
								 <div class="noResult">Denna användare har ej skrivit någon presentation än</div>
							<?php else:
								echo $row->presentation; 
							endif; ?>
			</div>
			<?php if ($edit):
				$like_list = 'Min minneslista'; $row->firstname.'s minneslista'; 
				$item_list = 'Mina annonser';
			else:
				$like_list = $row->firstname.'s minneslista';
				$item_list = $row->firstname.'s annonser'; 
			endif; ?>
			<ul>
				<li><a href="<?php echo base_url().'user/'.$row->id.'/likes'; ?>"><?php echo $like_list; ?></a></li>
				<li><a href="<?php echo base_url().'user/'.$row->id.'/items'; ?>"><?php echo $item_list; ?></a></li>
			</ul>
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
					<textarea id="message" name="message" placeholder="Skriv ditt meddelande här..." class="message span12" rows="5" cols="30">
					</textarea>
					<?php echo form_submit('submit','Skicka', 'class="btn btn-primary"') ?>
				<?php echo form_close() ?>
			</div>
			<ul class='guestbook media-list'>
				<?php if ($comments>0): ?>
				<?php foreach ($comments as $comment):?>
					<li class='comment-parent media'>
						<?php if( $comment['parent']->item_id): ?>
							<a href="<?php echo base_url().'item/'.$comment['parent']->item_id; ?>"><?php echo $comment['parent']->headline; ?></a>
						<?php endif; ?>
						<h3><?php echo $comment['parent']->firstname.' '.$comment['parent']->lastname; ?></h3>
						<p><?php echo $comment['parent']->message; ?></p>
						<p><?php echo $comment['parent']->date_sent; ?></p>
						<a href="<?php echo base_url().'message/'.$id.'/'.$comment['parent']->message_id; ?>">Svara</a>
						<?php if ($comment['children']): ?>
						<ul class='comment-child media'>
							<?php foreach ($comment['children'] as $child):?>
							<li>
								<h3><?php echo $child->firstname.' '.$child->lastname; ?></h3>
								<p><?php echo $child->message; ?></p>
								<p><?php echo $child->date_sent; ?></p>
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