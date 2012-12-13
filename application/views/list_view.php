<h1>Todo List</h1>

<hr />

<?php echo form_open('lists/add_item'); ?>

	<textarea cols="40" rows="10" name="content"></textarea>
	<input type="submit" value="Add new item" />
</form>

<ul>
<?php
for($i = 0; $i < sizeof($item); ++$i)
{
    echo '<li>' . $item[$i]['content'] . ' - <i>' . $item[$i]['date'] . '</i> - <a href="' . site_url() . '/todo/delete_item/' . $item[$i]['id'] . '">Delete</a></li>';
}
?>
</ul>