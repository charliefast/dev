  <div class="container">
    <h1>Ladda upp bild</h1>

    <!-- Fallback button for normal upload -->
    <form class="uploadForm" action="../index.php/upload/image" method="post" enctype="multipart/form-data">
      <input type="file" name="pic" accept="image/*">
        <input type="submit" class="btn" value="Spara" id="fallbackBtn">
      </form>
    
    
    <!-- Drag and drop upload -->
    <div id="dropbox">
      <span class="message">Dra hit en bild för att ladda upp den.</span>
    </div>
  </div>
    