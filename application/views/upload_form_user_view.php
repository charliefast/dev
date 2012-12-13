  <div class="container">
    <!-- Fallback button for normal upload -->
    <form class="uploadForm" action="<?php echo base_url().'user/verify_upload'; ?>" method="post" enctype="multipart/form-data">
      <input type="file" name="pic" accept="image/*">
      <input type="hidden" name="item_id" value="user">
      <input type="submit" class="btn" value="Spara" id="fallbackBtn">
    </form>
    
    
    <!-- Drag and drop upload -->
    <div id="dropbox">
      <span class="message">Dra hit en bild för att ladda upp den.</span>
    </div> -->
    <a href="<?php echo base_url().'user/'.$user_id; ?>" class="btn btn-primary">Tillbaka</a>
  </div>