<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Bytarna</title>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script type="application/javascript">
    $(document).ready(function() {
    $('#submit').click(function() {
      var form_data = {
      username : $('.username').val(),
      password : $('.password').val(),
      ajax : '1'
    };
    $.ajax({
      url: "<?php //echo site_url('index.php/verifylogin/ajax_check'); ?>",
      type: 'POST',
      async : false,
      data: form_data,
      success: function(msg) {
        $('#message').html(msg);
      }
    });
    return false;
  });
});
</script> --> 
 </head>
 <body>
   <h1>Simple Login with CodeIgniter</h1>
   <div id="message">
</div>
   <?php echo validation_errors(); ?>
   <?php echo form_open('index.php/verifylogin'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username" class="username"/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password" class="password"/>
     <?php echo form_submit('submit','Login','id="submit"') ?>
   <?php echo form_close() ?>
   <a href="index.php/register">Registrera dej här</a>
 </body>
</html>
