<!--- Basic design structure for one event invitation-->


<div class = "post convocatoria row center z-depth-2" style="border-radius: 20px; display: flex;">
  <div class = "col s1 valign-wrapper" style="border-radius: 20px 0px 0px 20px; background-color: #5F77B7">
    <div class=" circle white center-align center" style="width: 40px; height: 40px;">
      <img src="img/planes.png" alt="" class="circle responsive-img "> <!-- notice the "circle" class -->
    </div>
  </div>

  <div class = "col s11 blue lighten-4 low-text left-align " style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
    <div class = "col s9">
      <div class = "titulo flow-text"><?php echo $row[9];?></div>

      <?php // aux query for user
        $aux_query = "SELECT first_name, last_name FROM Users WHERE id = $row[3]";
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        $aux_row = mysqli_fetch_assoc($aux_result);
        date_default_timezone_set('America/New_York');
        $date = date_create($row[5]);
      ?>

      <?php echo date_format($date,"d/M/Y"); ?> | <?php echo $row[10];?>:<?php if($row[11]<10)echo "0".$row[11]; if($row[11]>9) echo $row[11];?><br>
      <form id = "forma-asistentes" action = '#' method="POST">
        <?php //aux query for volunteer list
        $aux_query = "SELECT * FROM Users WHERE id IN (SELECT usuarioID FROM Asistencia WHERE publicacionID = $row[0] AND participacion LIKE 'true')";
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        ?>
        <div class = "row center">
          <div class="input-field col s11" style = "margin-top: -5px; margin-bottom: -5px;">
            <select class="icons" name = "voluntarioID">
              <option value="" disabled selected>Lista de Asistentes Confirmados</option>
              <?php while($aux_row = mysqli_fetch_assoc($aux_result)){ ?>
              <option value="<?php echo $aux_row["id"];?>" data-icon="<?php echo "img/".$aux_row["foto"].".png";?>" class="left"><?php echo $aux_row["first_name"]." ".$aux_row["last_name"];?></option>
              <?php }?>
            </select>
          </div>
        </div>
      </form>
    </div>
    <div class = "col s3">
        <br>
        <div class = "convocatoria-contenido" id = "respuesta<?php echo $row[0];?>">
          <?php  //aux query for asistance
          $aux_query = "SELECT count(*) FROM Asistencia WHERE publicacionID = $row[0]";
          $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
          $participacion = "undefined";
          while($aux_row = mysqli_fetch_row($aux_result)){
            $participacion = $aux_row[0];
          }
          ?>
          <div class = "row center">Asistentes</div>
          <div class = "row center flow-text" style= "color: #5F77B7;">
            <?php echo $participacion; ?>
          </div>
        </div>
    </div>

  </div>

</div>
<script type="text/javascript" language="JavaScript">

  function confirmarAsistencia(convocatoriaID){
    var respuesta = document.getElementById("confirm"+convocatoriaID);
    var opuesto = document.getElementById("deny"+convocatoriaID);
    if ( opuesto.classList.contains( "disabled" ) ) {
      opuesto.classList.remove("disabled");
      opuesto.classList.remove("grey");
    }
    respuesta.classList.add("disabled");
    respuesta.classList.add("grey");

    // Confirm asistance
    $.ajax({
        url:'kiosco_publicar_asistencia.php?participacion=true',
        type:'post',
        data:$('#forma-convocatoria'+convocatoriaID).serialize(),
    });

  }

  function rechazarAsistencia(convocatoriaID){
    var respuesta = document.getElementById("deny"+convocatoriaID);
    var opuesto = document.getElementById("confirm"+convocatoriaID);
    if ( opuesto.classList.contains( "disabled" ) ) {
      opuesto.classList.remove("disabled");
      opuesto.classList.remove("grey");
    }
    respuesta.classList.add("disabled");
    respuesta.classList.add("grey");

    // Reject asistance
    $.ajax({
        url:'kiosco_publicar_asistencia.php?participacion=false',
        type:'post',
        data:$('#forma-convocatoria'+convocatoriaID).serialize(),
    });

  }

</script>
