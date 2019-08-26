<!--- ESTRUCTURA DE UN FAVOR -->

<div class='row tarjetaPost'> <!--Div para la tarjeta de cada anuncio -->

  <div class='rounded-left tarjetaInterior col-md-3 text-center' style='background-color: #41C48F;'> <!--Div para el Título -->
      <h2 style='text-align: center; margin-top: 10px; margin-bottom: 15px;'><?php echo $row["titulo"];?></h2> <!-- Títlo -->
      <p><?php echo $row["contenido"];?></p>
      <b>Botón de confirmar ayuda</b>
  </div>

  <div class='col-md-6 rounded-right tarjetaInterior' style='background-color: #5BD6A1'><!--Div para la descripción-->
    <?php // aux query for user
      $aux_query = "SELECT first_name, last_name FROM Users WHERE id = ".$row["propietarioID"];
      $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
      $aux_row = mysqli_fetch_assoc($aux_result);
      date_default_timezone_set('America/New_York');
      $date = date_create($row["fechaINI"]);
    ?>

    <br>
    <b>Lo pide</b><br>
    <p><?php echo $aux_row["first_name"]." ".$aux_row["last_name"];?></p>
       
    <table class='tarjetaInterior'>

      <tr>
        <td style='padding-right: 100px;'><b>Fecha</b><br>
          <p> <?php echo date_format($date,"d/M/Y"); ?> </p></td>
        <td><b>Categoría</b><br>
          <?php echo $row["categoria"];?>
        </td>
      </tr>

    </table>
  </div>
</div>



<!-- 
<div class = " row center post favor z-depth-2" style="border-radius: 20px; display: flex;">
  <div class = "col s1 amber accent-2 valign-wrapper" style="border-radius: 20px 0px 0px 20px">
    <div class=" circle white center-align center" style="width: 40px; height: 40px;">
      <img src="img/favores.png" alt="" class="circle responsive-img ">
    </div>
  </div>

  <div class = "col s11 amber accent-1 low-text left-align " style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
    <div class ="col s8">
      <div class = "titulo flow-text"><?php echo $row["titulo"];?></div>

      <?php // aux query for user
        $aux_query = "SELECT first_name, last_name FROM Users WHERE id = ".$row["propietarioID"];
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        $aux_row = mysqli_fetch_assoc($aux_result);
        date_default_timezone_set('America/New_York');
        $date = date_create($row["fechaINI"]);
      ?>

      <div class = "dueño grey-text text-darken-1"><?php echo $aux_row["first_name"]." ".$aux_row["last_name"];?></div>

      <form id = "favor<?php echo $row["favorID"];?>" action = "#">
        <?php echo date_format($date,"d/M/Y"); ?> | <?php echo $row["categoria"];?><br>
        <?php echo $row["contenido"];?> <br>
      </form>
    </div>
    <?php if ($row["propietarioID"] != $_SESSION['S_id']){?>
    <div class = "col s2">
      <form id = "forma-favor<?php echo $row["favorID"];?>" action = "#">
        <br>
        <div class = "favor-contenido" id = "respuesta<?php echo $row["favorID"];?>">
          <div class = "row center">Voluntario</div>
          <div class = "row center">
            <input type = "hidden"  name = "voluntarioID" value = "<?php echo $_SESSION['S_id']; ?>">
            <input type = "hidden"  name = "favorID" value = "<?php echo $row["favorID"]; ?>">
            <input class = "btn confirm-invite green" id = "confirm<?php echo $row["favorID"];?>" type="button" onclick="confirmarFavor(<?php echo $row["favorID"];?>)" value = "✓">
          </div>
        </div>
      </form>
    </div>
    <div class = "col s2 center">
      <br>
      <div class = "row"></div>
      <div class = "row"></div>
      <div class = "favor-puntos row center">
        <div class = "col s3 flow-text" style="margin-top: 2px;">+1</div>
        <div class="col s8 offset-s1 circle  center-align center" style="width: 40px; height: 40px; padding:0px;">
          <img  src="img/beecoin3.png" alt="" class="circle z-depth-2 responsive-img ">
        </div>
      </div>
    </div>
  <?php } else {?>
    <div class = "col s4">
      <form id = "forma-voluntario<?php echo $row["favorID"];?>" action = '#' method="POST">
        <input type = "hidden"  name = "favorID" value = "<?php echo $row["favorID"]; ?>">
        <br>
        <?php //aux query for volunteer list
        $aux_query = "SELECT id, first_name, last_name, foto FROM Users WHERE id IN (SELECT voluntarioID FROM Voluntario WHERE favorID = ".$row["favorID"].")";
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        ?>
        <div class = "row center">
          <!--
              ......................BASURA
          <div class="input-field col s9 hide-on-med-and-down">
            <select class="icons" name = "voluntarioID">
              <option value="" disabled selected>Seleccionar</option>
              <?php while($aux_row = mysqli_fetch_assoc($aux_result)){ ?>
              <option value="<?php echo $aux_row["id"];?>" data-icon="<?php echo "img/".$aux_row["foto"].".png";?>" class="left"><?php echo $aux_row["first_name"]." ".$aux_row["last_name"];?></option>
              <?php }?>
            </select>
            <label>Voluntarios</label>
          </div>
          ...........................BASURA
        
          <?php //aux query for volunteer list
          $aux_query = "SELECT id, first_name, last_name, foto FROM Users WHERE id IN (SELECT voluntarioID FROM Voluntario WHERE favorID = ".$row["favorID"].")";
          $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
          ?>
          <div class="input-field col s9 hide-on-large-only">
            <select class="icons" name = "voluntarioID">
              <option value="" disabled selected>Seleccionar</option>
              <?php while($aux_row = mysqli_fetch_assoc($aux_result)){ ?>
              <option value="<?php echo $aux_row["id"];?>" class="left"><?php echo $aux_row["first_name"]." ".$aux_row["last_name"];?></option>
              <?php }?>
            </select>
            <label>Voluntarios</label>
          </div>
          <div class = "left-align">
            <br>
            <input class = "btn confirm-volunteer green" id = "confirm-volunteer<?php echo $row["favorID"];?>" type="button" onclick="confirmarVoluntario(<?php echo $row["favorID"];?>)" value = "✓">
          </div>


        </div>
      </form>
    </div>

    <?php } ?>
  </div>

</div>
-->