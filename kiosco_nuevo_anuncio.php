<form id = "forma-anuncio" name= "forma-anuncio" class = "col s12" method = "POST" enctype="multipart/form-data" >
  <input type = "hidden"  name = "usuarioID" value = "<?php echo $_SESSION['S_id']; ?>">


  <br>
  <div class = "col s12">
    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">title</i>
      <textarea placeholder="Título del anuncio" name ="titulo-anuncio" class = "validate materialize-textarea" required = "true" maxlength = "55" data-length = "55"></textarea>
    </div>
  </div>

  <div class = "col s5">

    <div class = "input-field col s12 post-form">
      <p>
        <label>
          <input type="checkbox" id= "evento" name ="evento" />
          <span>¿Preguntar asistencia?</span>
        </label>
      </p>
    </div>

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">date_range</i>
      <input id = "fecha-anuncio" name = "fecha-anuncio" placeholder="Fecha" type="date" class="validate" required = "true">
    </div>
  </div>

  <div class = "col s7">
    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">mode_edit</i>
      <textarea  placeholder="Contenido..." name ="contenido-anuncio"  class="validate materialize-textarea" required = "true" maxlength = "150" data-length = "150"></textarea>
    </div>
    <div class = "input-field col s4 post-form">
      <i class="material-icons prefix">access_time</i>
      <input  placeholder="H" id = "hora-anuncio" name = "hora-anuncio" type="number" maxlength="2" max="23" min = "0" class="validate" required = "true">
      <span class="helper-text" data-error="inválido"></span>
    </div>

    <div class = "input-field col s3 post-form">
      <input  placeholder="M" id = "minuto-anuncio" name = "minuto-anuncio" type="number" maxlength="2" max="59" min = "0" class="validate" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" required = "true">
      <span class="helper-text" data-error="inválido"></span>
    </div>

    <div class = "col s4">
      <br>
      <i class="grey-text">(formato 24 horas)</i>
    </div>
  </div>

</form>
