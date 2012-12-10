<!-- SÖK -->
<div class="container top">
	<h2>Sök bland alla annonser</h2>
	<div class="row-fluid">
		<div class="span12">
			<?php echo form_open('search/load', array('id' => 'searchForm')); 
			/*<form id="searchForm">*/?>
				<input id="search" type="text" class="span6" placeholder="Sök i det här fältet">
				<div class="control-input">
					<label for="categories">Välj kategori</label>
					<select id="categories">
									<option value='0'>-- Välj alla --</option>
						<?php foreach ($categories as $cat): ?>
							<option value='<?php echo $cat->slug?>'><?php echo $cat->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<input id="submit" type="submit" class="btn btn-primary" value="sök">
			<!-- </form> -->
		</div>
	</div>

	<!-- <div class="row-fluid">
		<?php echo $content ?>
	</div> -->
	
</div>