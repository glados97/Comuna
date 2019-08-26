<!--- Basic design structure for one question-->
<?php session_start(); ?>

<div class = "post pregunta row center z-depth-2" style="border-radius: 20px; display: flex;">
  <div class = "col s1 valign-wrapper" style="border-radius: 20px 0px 0px 20px; background-color: #5F77B7">
    <div class=" circle white center-align center" style="width: 40px; height: 40px;">
      <img src="img/manos.png" alt="" class="circle responsive-img "> <!-- notice the "circle" class -->
    </div>
  </div>

  <div class = "col s11 blue lighten-4 low-text left-align " style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
      <div class ="col s7">
      <div class = "titulo flow-text"><?php echo $row[9];?></div>
      <div class = "grey-text text-darken-1"><?php echo "Pregunta de encuesta: ";?></div>
      <?php echo $row[2];?>
      <br><br>

    </div>
    <div class = "col s5">
      <div class = "row center">
        <br>
        <table class = "highlight">
        <thead>
          <tr>
              <th>Respuesta</th>
              <th>Votos </th>
          </tr>
        </thead>

        <tbody>
          <?php
            if ($row[6] != NULL ){?>
              <?php // aux query for user
                $aux_query = "SELECT count(*) FROM Voto WHERE publicacionID = $row[0] AND voto = 1;";
                $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
                $aux_row = mysqli_fetch_row($aux_result);
              ?>
            <tr>
              <td><?php echo $row[6];?></td>
              <td><?php echo $aux_row[0];?></td>
            </tr>
          <?php } ?>
          <?php
          if ($row[7] != NULL ){?>
            <?php // aux query for user
              $aux_query = "SELECT count(*) FROM Voto WHERE publicacionID = $row[0] AND voto = 2;";
              $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
              $aux_row = mysqli_fetch_row($aux_result);
            ?>
          <tr>
            <td><?php echo $row[7];?></td>
            <td><?php echo $aux_row[0];?></td>
          </tr>
          <?php } ?>
          <?php
          if ($row[8] != NULL ){?>
            <?php // aux query for user
              $aux_query = "SELECT count(*) FROM Voto WHERE publicacionID = $row[0] AND voto = 3;";
              $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
              $aux_row = mysqli_fetch_row($aux_result);
            ?>
          <tr>
            <td><?php echo $row[8];?></td>
            <td><?php echo $aux_row[0];?></td>
          </tr>
          <?php } ?>
          <?php // aux query for user
            $aux_query = "SELECT count(*) FROM Voto WHERE publicacionID = $row[0] AND voto = 4;";
            $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
            $aux_row = mysqli_fetch_row($aux_result);
          ?>
          <tr>
            <td>Ninguno</td>
            <td><?php echo $aux_row[0];?></td>
          </tr>
        </tbody>
      </table>



      </div>

    </div>
  </div>

</div>
