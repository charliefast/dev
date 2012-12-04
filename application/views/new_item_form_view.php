<!-- SKAPA ANNONS -->
  <div class="container top">
    <h1>Skapa en annons</h1>


    <?php echo form_open('index.php/item/verify_new',array('class' => 'form-horizontal')) 
   // <form class="form-horizontal">?>
      <div class="control-group">
        <label class="control-label" for="selectCategory">Kategori</label>
        <select id="selectCategory">
          <option>Välj en kategori</option>
          <option>Kategori 1</option>
          <option>Kategori 2</option>
          <option>Kategori 3</option>
          <option>Kategori 4</option>
          <option>Kategori 5</option>
          <option>Kategori 6</option>
        </select>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputEmail">Titel</label>
        <div class="controls">
          <input type="text" id="inputTitle" placeholder="Titel">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">Beskrivning</label>
        <div class="controls">
          <textarea type="text" id="inputDescription" placeholder="Beskrivning..."></textarea>
        </div>
      </div>

      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-primary">Kontrollera annons</button>
          <button type="submit" class="btn">Avbryt</button>
        </div>
      </div>
    </form>