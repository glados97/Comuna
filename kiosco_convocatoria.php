<!--- ESTRUCTURA DE UN EVENTO -->

<div class='row tarjetaPost'> <!--Div para la tarjeta de cada evento -->

  <div class='rounded-left tarjetaInterior col-md-3 text-center' style='background-color: #833AAA;'> <!--Div para el Título -->
      <h2 style='text-align: center; margin-top: 10px; margin-bottom: 15px;'><?php echo $row[9];?></h2> <!-- Títlo -->
      <b>Evento</b>
      <p><?php echo $row[2];?></p>
      <form id = "forma-convocatoria<?php echo $row[0];?>" action = "#">
        <br>
        <div class = "convocatoria-contenido" id = "respuesta<?php echo $row[0];?>">
          <?php  //aux query for asistance
          $aux_query = "SELECT * FROM Asistencia WHERE publicacionID = $row[0] AND usuarioID = $_SESSION[S_id];";
          $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
          $participacion = "undefined";
          while($aux_row = mysqli_fetch_assoc($aux_result))
          {
            $participacion = $aux_row["participacion"];
          }
          ?>
          <div class = "text-center">
            <input type = "hidden"  name = "usuarioID" value = "<?php echo $_SESSION['S_id']; ?>">
            <input type = "hidden"  name = "publicacionID" value = "<?php echo $row[0]; ?>">
            <input type = "hidden"  name = "estatus" value = "<?php echo $participacion; ?>">
            <?php 
            if($participacion == "true")
              echo '<input class = "btn disabled" id = "confirm<?php echo $row[0];?>" type="button" style="background-color: #B20000; color: white;" onclick="confirmarAsistencia(<?php echo $row[0];?>)" value = " Ya no puedo ir ">';
            else
              echo '<input class = "btn" id = "confirm<?php echo $row[0];?>" type="button" style="background-color: #00B200; color: white;" onclick="confirmarAsistencia(<?php echo $row[0];?>)" value = "  Voy a ir  ">';
            ?>
            
            <!-- <input class = "btn <?php if($participacion == "false") echo "disabled";?>" id = "deny<?php echo $row[0];?>" type="button" onclick="rechazarAsistencia(<?php echo $row[0];?>)" value = "✕"/> -->
          </div>
        </div>
      </form>
  </div>

  <div class='col-md-6 rounded-right tarjetaInterior' style='background-color: #9552C1'><!--Div para la descripción-->
    <?php // aux query for user
      $aux_query = "SELECT first_name, last_name FROM Users WHERE id = $row[3]";
      $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
      $aux_row = mysqli_fetch_assoc($aux_result);
      date_default_timezone_set('America/New_York');
      $date = date_create($row[5]);
    ?>

    <br>
    <b>Lo anuncia</b><br>
    <p><?php echo $aux_row["first_name"]." ".$aux_row["last_name"];?></p>
       
    <table class='tarjetaInterior'>

      <tr>
        <td style='padding-right: 100px;'><b>Fecha</b><br>
        <p> <?php echo date_format($date,"d/M/Y"); ?> </p></td>
        <td><b>Hora</b><br>
        <?php
          if($row[11]<10)
            echo "<p>" . $row[10] . ":0" . $row[11] . " horas</p>";
          if($row[11]>9)
            echo "<p>" . $row[11] . "horas</p>";
        ?>
        </td>
      </tr>

    </table>
  </div> <!-- Div Descripción-->

</div><!--Div Tarjeta-->


<!-- <div class = "post convocatoria row center z-depth-2" style="border-radius: 20px; display: flex;">
  <div class = "col-2" style="border-radius: 20px 0px 0px 20px">
    <div class=" circle white center-align center">
      <img src="img/planes.png" alt="" class="img-fluid"> 
    </div>
  </div>

  <div class = "col-9" style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
    <div class = "col-12">
      <div class = "titulo flow-text"><?php echo $row[9];?></div>

      <?php // aux query for user
        $aux_query = "SELECT first_name, last_name FROM Users WHERE id = $row[3]";
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        $aux_row = mysqli_fetch_assoc($aux_result);
        date_default_timezone_set('America/New_York');
        $date = date_create($row[5]);
      ?>

      <div class = "dueño grey-text text-darken-1"><?php echo $aux_row["first_name"]." ".$aux_row["last_name"];?></div>

      <?php echo date_format($date,"d/M/Y"); ?> | <?php echo $row[10];?>:<?php if($row[11]<10)echo "0".$row[11]; if($row[11]>9) echo $row[11];?><br>
      <?php echo $row[2];?> <br>
    </div>

    <div class = "col s3">
      <form id = "forma-convocatoria<?php echo $row[0];?>" action = "#">
        <br>
        <div class = "convocatoria-contenido" id = "respuesta<?php echo $row[0];?>">
          <?php  //aux query for asistance
          $aux_query = "SELECT * FROM Asistencia WHERE publicacionID = $row[0] AND usuarioID = $_SESSION[S_id];";
          $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
          $participacion = "undefined";
          while($aux_row = mysqli_fetch_assoc($aux_result)){
            $participacion = $aux_row["participacion"];
          }
          ?>
          <div class = "row center">Asistencia</div>
          <div class = "row center">
            <input type = "hidden"  name = "usuarioID" value = "<?php echo $_SESSION[S_id]; ?>">
            <input type = "hidden"  name = "publicacionID" value = "<?php echo $row[0]; ?>">
            <input type = "hidden"  name = "estatus" value = "<?php echo $participacion; ?>">
            <input class = "btn confirm-invite green <?php if($participacion == "true") echo "disabled";?>" id = "confirm<?php echo $row[0];?>" type="button" onclick="confirmarAsistencia(<?php echo $row[0];?>)" value = "✓">
            <input class = "btn deny-invite red <?php if($participacion == "false") echo "disabled";?>" id = "deny<?php echo $row[0];?>" type="button" onclick="rechazarAsistencia(<?php echo $row[0];?>)" value = "✕"/>
          </div>
        </div>
      </form>
    </div>

  </div>

</div> -->

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