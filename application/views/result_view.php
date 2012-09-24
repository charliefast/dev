<body>
<?php foreach ($result as $row):?>

<?php  echo "<p>".$row -> id."</p>";
      	  echo "<p>".$row -> user_id."</p>";
          echo "<h3>".$row -> headline."</h3>";
          echo "<p>".$row -> description."</p>";
          echo "<p>".$row -> date_added."</p>";
          echo "<p>".$row -> end_date."</p>";;?>

<?php endforeach;?>
</body>
</body>