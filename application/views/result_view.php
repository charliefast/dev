<body>
<?php foreach ($result as $row):?>

<p><?php  echo $row -> id; ?></p>
<p><?php  echo $row -> user_id; ?></p>
<h3><?php echo $row -> headline; ?></h3>
<p><?php  echo $row -> description; ?></p>
<p><?php  echo $row -> date_added; ?>"</p>
<p><?php  echo $row -> end_date; ?></p>

<?php endforeach;?>
</body>
</body>