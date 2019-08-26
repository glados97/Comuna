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
  <head>
    <?php require 'menu.php'; ?>
    <meta charset="utf-8">
    <style media="screen">

    /*header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    }*/

    li#nav{
      padding: 2em;
    }

    .menu-img{
      max-width:100%;
      height: auto;
      padding: .5em;
    }

    .btn-menu{
      border: none;
      height: 200px;
    }

    .tituloContent
    {
        margin-top: 10px;
        font-family: 'Poppins';
    }

    .tarjetaPost
    {
        padding: 15px;
        margin-left: 15px;
        margin-bottom: 0px;
        border-radius: 6px;
    }

    .tarjetaInterior
    {
        color: white;
        padding: 15px;
        //border-radius: 6px;
        margin-bottom: 25px;
    }

    </style>

    <!--Import Google Icon Font-->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      
  </head>



  <body>

    <div class = "col-lg-12">
      <h2 class="tituloContent">Productos de la Colonia</h2>
      <br>
        <?php
          require 'kiosco_conectar_bdd.php';
          $sql = "SELECT * FROM Mercado JOIN Users WHERE Users.id =Mercado.usuarioID AND Mercado.fecha_fin >= NOW() ORDER BY ventaID DESC" ;
          $q1 = mysqli_query($conexion, $sql);
          if(mysqli_num_rows($q1)!=0){

            while($d=mysqli_fetch_assoc($q1))
            {
              echo "<div class='row tarjetaPost'>"; //Div para la entrada de la query

                echo "<div class='rounded-left tarjetaInterior' style='background-color: #833AAA;'>"; //<!--Div para el avatar del usuario -->
                    //echo "<img src='img/".$d['foto'].".png' alt='avatar' class='rounded-circle'>";
                    echo "<h3 style='text-align: center'>" . $d["nombre"] . "</h3> <br>"; //Títlo del producto
                    echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modalProduct".$d['ventaID']."'>Ver detalles</button>";
                echo "</div>";

                echo "<div class='col-md-3 rounded-right tarjetaInterior' style='background-color: #9552C1'>"; //<!--Div para la descripción-->

                    //echo "<b>Producto: </b>" . $d["nombre"] . "<br>"; //Títlo del producto
                    echo "<b>Lo vende: </b>" . $d["first_name"]." ".$d["last_name"] . "<br>";
                    echo "<b>Teléfono: </b>" . $d["telefono"] . "<br>";
                    echo "<b>Precio: </b>$" . $d["precio"] . "<br>";

                  /*echo "<div class='col-md-6' style='text-align:right;'>";// <!--Div para el botón de ver detalles-->

                    //echo '<a href="kiosko_publicar_producto2.php" class="btn btn-info" role="button" data-toggle="modal" data-target="#modalProduct">modalProduct</a>';
                    echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#modalProduct".$d['ventaID']."'>Ver detalles</button>";

                  echo "</div>";*/

                echo "</div>";
              echo "</div>";

              // Modal para mostrar más detalles del producto en venta.
              //echo '<div class="modal fade" id="modalProduct$d["ventaID"]" tabindex="-1" role="dialog" aria-labelledby="modalProductTitle" aria-hidden="true">';
              echo "<div class='modal fade' id='modalProduct".$d['ventaID']."' tabindex='-1' role='dialog' aria-labelledby='modalProductTitle' aria-hidden='true'>";
                echo '<div class="modal-dialog modal-dialog-centered" role="document">';
                  echo '<div class="modal-content">';

                    echo '<div class="modal-header">';
                      echo '<h3 class="modal-title" id="modalTitle">'.$d['nombre'].'</h3>';
                      echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                        echo '<span aria-hidden="true">&times;</span>';
                      echo '</button>';
                    echo '</div>';

                    echo '<div class="modal-body">';
                      echo "<b>Lo vende: </b>" . $d["first_name"]." ".$d["last_name"] . "<br>";
                      echo "<b>Teléfono: </b>" . $d["telefono"] . "<br>";
                      echo "<b>Precio: </b>$" . $d["precio"] . "<br>";
                      echo "<b>Fecha de venta desde el </b>" . date('d/m/Y',strtotime($d["fecha_ini"])) ."<b> hasta el </b>" . date('d/m/Y',strtotime($d["fecha_fin"])) . "<br>";
                      echo "<b>Hora de venta desde las </b>" . $d["hora"] . "<br>";
                      echo "<b>Descripción del prodcto: </b>" . $d['descripcion'];
                    echo '</div>';

                    echo '<div class="modal-footer">';
                      echo '<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>';
                    echo '</div>';

                  echo '</div>';
                echo '</div>';
              echo '</div>';
            }
          }

          require 'kiosco_desconectar_bdd.php';
        ?>
       </div> <!--Div del container -->

  </body>



 <!-- scripts go here -->



<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.sidenav');
   var instances = M.Sidenav.init(elems, options);
 });


 $(document).ready(function(){
   $('.sidenav').sidenav();
 });

 document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('.modal');
   var instances = M.Modal.init(elems, options);
 });


 $(document).ready(function(){
   $('.modal').modal();
 });


 function publicar(){
  if (document.forms["forma_producto"]["producto_nombre"].value == "" ||
     document.forms["forma_producto"]["producto_tele"].value == "" ||
     document.forms["forma_producto"]["producto_dias_inicio"].value == "" ||
     document.forms["forma_producto"]["producto_desc"].value == "" ||
     document.forms["forma_producto"]["producto_hora"].value == "" ||
     document.forms["forma_producto"]["producto_precio"].value == ""
   ) 
  {
    alert("Llene todos los datos pertinentes");
  } else 
  {
    document.getElementById("forma_producto").submit();
  }

}
  function logout() {
             window.location.replace("index.php");
             return false;
         }


</script>
</html>