<!-- Kategorier meny -->

<div class="container top">
	<div class="row-fluid">
		<h1>Kategorier</h1>
		<ul id="categoryList" class="nav nav-pills">
			<?php foreach ($list as $item):?>
			<li class="span3 ">
				<img src="<?php echo base_url();?>images/kategorier/<?php echo $item->slug; ?>.png">
				<!-- <img src="http://www.ekostil.se/wp/wp-content/uploads/Modern-Minimalist-Bedroom-Interior-design-Inspiration-brown-bedroom-furniture-368x276.jpg"> -->
				<a href="<?php echo base_url().'item/'.$item->slug;?>"><?php echo $item->name ?></a>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
</div>
