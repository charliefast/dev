<div class="container top">
		<div class="row-fluid">
			<ul class="nav nav-tabs hidden-phone">
		        <li><a href="#">Min profil</a></li>
		        <li><a href="#">Ändra profil</a></li>
		        <li class="active"><a href="#">Min minneslista</a></li>
		        <li><a href="#">Mina annonser</a></li>
		    </ul>
		</div>
	<?php if (! $error): ?>
		<div class="row-fluid">
			<ul>
			<?php foreach ($likes as $like): ?>
				<li>
					<a href="<?php echo base_url().'item/'.$like->item_id; ?>"><?php echo $like->headline; ?></a>
				</li>
			<?php endforeach ?>
		</ul>
		</div>
	<?php else: echo $error; ?>
	<?php endif?>
</div>