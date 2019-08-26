<?php
session_start();
date_default_timezone_set('America/New_York');
//require 'disable_right_click.php';
// $id = $_SESSION('id');
// echo $id;
// var_dump($_SESSION);
$counter=1;
?>
<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <head>
    <?php require 'menu.php'; ?>
    <meta charset="utf-8">
    <style media="screen">

    li#nav{
      padding: 2em;
    }

    .tituloContent
    {
        margin-top: 10px;
        font-family: 'Poppins';
    }

    .tarjetaInterior
    {
        color: white;
        padding: 15px;
        margin-left: 50px;
        height: 270px;
        padding-top: 40px;
    }

    </style>

    <!--Import Google Icon Font-->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      
  </head>



  <body>
    <div class = "col-lg-12">
      <h2 class="tituloContent">Bienvenido</h2>
      <br>
      <br>
        
        <table>

          <tr>
            <td>
              <div class= 'rounded tarjetaInterior col-md-8 text-center' style='background-color: #833AAA;'>
                <p>En <b>CALENDARIO</b> encontrarás los avisos, eventos y encuestas de la colonia, como fiestas, renovaciones y cosas que no te puedes perder.</p>
                
                <br>
                
                <a class="btn" style="background-color: #E98B36; color: white" href="kiosco_publicaciones.php" role="button">Ver el calendario</a>
              </div>
            </td>

            <td>
              <div class='rounded tarjetaInterior col-md-8 text-center' style='background-color: #E98B36;'>
                <p>En <b>VENTA DE PRODUCTOS</b> podrás anunciar productos que vendas, como comida y servicios. También podrás ver lo que venden tus vecinos.</p>

                <br>

                <a class="btn" style="background-color: #833AAA; color: white" href="kiosco_main_menu2.php" role="button">Ver los productos</a>
              </div>
            </td>

            <td>
              <div class='rounded tarjetaInterior col-md-8 text-center' style='background-color: #41C48F;'>
                <p>En <b>FAVORES</b> podrás pedir ayuda y ayudar a tus vecinos para cambiar un foco, organizar una reunión y lo que sea que necesites.</p>

                <br>

                <a class="btn" style="background-color: #E98B36; color: white" href="kiosco_favores.php" role="button">Ver los favores</a>
              </div>
            </td>
          </tr>

        </table>

    </div>
  </body>
</html>