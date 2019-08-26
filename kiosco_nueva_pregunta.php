<!---  Los asuntos de las preguntas son la pregunta
-->

<form id = "forma-pregunta" name= "forma-pregunta" class = "col s12" method = "POST" enctype="multipart/form-data" >
  <input type = "hidden"  name = "usuarioID" value = "<?php echo $_SESSION[S_id]; ?>">
  <br><br><br>
  <div class = "col s12">
    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">title</i>
      <textarea placeholder="Título de pregunta" name ="titulo-pregunta" class = "validate materialize-textarea" required = "true" maxlength = "55" data-length = "55"></textarea>
    </div>

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">help_outline</i>
      <textarea  placeholder="¿Qué quieres preguntar?" name ="contenido-pregunta"  class="validate materialize-textarea" required = "true" maxlength = "150" data-length = "150"></textarea>
      <label for= "contenido-pregunta">Descripción</label>
    </div>

  </div>
  <br>
  <br>

  <div class = "col s4">


    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">event</i>
      <input id = "fecha-pregunta" name = "fecha-pregunta" placeholder="Día límite" type="date" class="validate" required = "true">
    </div>

  </div>

  <div class = "col s8">

    <div class = "input-field col s12 post-form">
      <i class="material-icons prefix">mode_edit</i>
      <label for= "opc1-pregunta">Respuestas</label>
      <br>
      <input placeholder="Opción 1" name ="opc1-pregunta" type = "text" class = "row validate materialize-textarea" required = "true" maxlength = "40" data-length = "40">
      <br> <br>
      <input placeholder="Opción 2" name ="opc2-pregunta" type = "text" class = "row validate materialize-textarea" required = "true" maxlength = "40" data-length = "40">
      <br> <br>
      <input placeholder="Opción 3 (opcional)" name ="opc3-pregunta" type = "text" class = "row validate materialize-textarea" required = "true" maxlength = "40" data-length = "40">

    </div>



  </div>

</form>

<script type="text/javascript" language="JavaScript">

  function enviarRespuesta(preguntaID){
    var respuesta = document.querySelector('input[name=opc'+preguntaID+']:checked');
    if(respuesta){
      respuesta = respuesta.value;
      //  SUBMIT Vote
      votar(preguntaID,respuesta);
      responderVoto(preguntaID);
    }else{
      alert("Elija su respuesta para votar");
    }
  }

  function votar(preguntaID, respuesta) {
    $.get("kiosco_votar.php?preguntaID=" + preguntaID+"&voto=" +respuesta);
    return false;
  }

  function responderVoto(preguntaID) {
      var respuesta = document.getElementById("boton-votar"+preguntaID);
      respuesta.classList.add("disabled");

      alert("Su voto ha sido registrado, gracias por participar.");

  }

</script>
