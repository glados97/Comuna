<form id = "forma-favor" name= "forma-favor" class = "col s12" method = "POST" enctype="multipart/form-data" >
  <input type = "hidden"  name = "usuarioID" value = "<?php echo $_SESSION['S_id']; ?>">


  <br><br><br>
  <div class = "col s12">

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">title</i>
      <textarea placeholder="Título del favor" name ="titulo-favor" class = "validate materialize-textarea" required = "true" maxlength = "55" data-length = "55"></textarea>
    </div>
  </div>

  <div class = "col s4" style="padding-left: 35px;">
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "fisico" checked />
        <span>Físico</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "tecnologia"  />
        <span>Tecnología</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "bienestar"  />
        <span>Bienestar</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "hogar" />
        <span>Hogar</span>
      </label>
    </p>
    <p>
      <label>
        <input class="with-gap col s12 post-form" name="categoria-favor" type="radio" value = "otros" />
        <span>Otros</span>
      </label>
    </p>

    <div class = "col s12">
      <i class="grey-text">(seleccionar categoría)</i>
    </div>
  </div>

  <div class = "col s8">
    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">mode_edit</i>
      <textarea  placeholder="¿Qué favor quiere pedir?" name ="contenido-favor"  class="validate materialize-textarea" required = "true" maxlength = "150" data-length = "150"></textarea>
    </div>

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">perm_contact_calendar</i>
      <textarea  placeholder="Contacto: teléfono/dirección/etc." name ="contacto-favor"  class="validate materialize-textarea" required = "true" maxlength = "150" data-length = "150"></textarea>
    </div>
  </div>


</form>
