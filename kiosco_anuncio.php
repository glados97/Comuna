<!--- ESTRUCTURA DE UN AVISO -->

<div class='row tarjetaPost'> <!--Div para la tarjeta de cada anuncio -->

  <div class='rounded-left tarjetaInterior col-md-3 text-center' style='background-color: #833AAA;'> <!--Div para el Título -->
      <h2 style='text-align: center; margin-top: 10px; margin-bottom: 15px;'><?php echo $row[9];?></h2> <!-- Títlo -->
      <b>Aviso</b>
      <p><?php echo "$row[2]"; ?></p>
  </div>

  <div class='col-md-6 rounded-right tarjetaInterior' style='background-color: #9552C1'><!--Div para la descripción-->
    <?php // aux query for user
      $aux_query = "SELECT first_name, last_name FROM Users WHERE id = ".$row[3];
      $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
      $aux_row = mysqli_fetch_row($aux_result);
      date_default_timezone_set('America/New_York');
      $date = date_create($row[5]);
    ?>

    <br>
    <b>Lo anuncia</b><br>
    <p><?php echo $aux_row[0] . " " . $aux_row[1]; ?></p>
       
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
  </div>
</div>



<!-- <div class = " row center post anuncio z-depth-2" style="border-radius: 20px; display: flex;">
  <div class = "col-2" style="border-radius: 20px 0px 0px 20px;">
    <div class=" circle white center-align center"> 
      <img src="img/anuncio.png" alt="" class="img-fluid">
      <h2 style='text-align: center; margin-top: 30px; margin-bottom: 30px;'><?php echo $row[9];?></h2>
    </div>
  </div>

   <div class = "col-9" style="border:none; border-radius: 0px 20px 20px 0px;align-items: stretch;">
      <div class ="col-12">

      <?php // aux query for user
        $aux_query = "SELECT first_name, last_name FROM Users WHERE id = ".$row[3];
        $aux_result = mysqli_query($conexion, $aux_query) or die ("Error de consulta ".mysqli_error());
        $aux_row = mysqli_fetch_row($aux_result);
        date_default_timezone_set('America/New_York');
        $date = date_create($row[5]);
      ?>

      <div class = "dueño grey-text text-darken-1"><?php echo $aux_row[0]." ".$aux_row[1];?></div>

      <form id = "anuncio<?php echo $row[0];?>" action = "#">
        <?php echo date_format($date,"d/M/Y"); ?> | <?php echo $row[10];?>:<?php if($row[11]<10)echo "0".$row[11]; if($row[11]>9) echo $row[11];?><br>
        <?php echo $row[2];?> <br>
        <div class = "anuncio-contenido" id = "respuesta<?php echo $row[0];?>">
        </div>
      </form>
    </div>
  </div>
</div> -->