<?php session_start();
require 'disable_right_click.php';
 ?>
<html>
    <meta charset="UTF-8">
    <head>


      <?php
        // Show menu
        require 'menu.php';

      ?>
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <style>
        .post
        {
            border-bottom: 2px solid #833AAA;
            margin-top: 15px;
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
    </head>
    <body>
        <div class = "col-lg-12">
        <h2 class="tituloContent">Calendario de la Colonia</h2>
        <br>

            <?php

            // New post button
            //require 'kiosco_nueva_publicacion.php';

            // Connect to Database
            require 'kiosco_conectar_bdd.php';

            // Create QUERY
            $user = $_SESSION['S_id'];

            $query = "SELECT * FROM Publicacion WHERE fechaFIN >= NOW() AND propietarioID != $user AND publicacionID NOT IN(SELECT publicacionID FROM Voto WHERE usuarioID = $user) ORDER BY fechaINI DESC";


            $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

            echo "<div class = 'feed'>";

            // Print the data
            while($row = mysqli_fetch_row($result)) {
              switch($row[1]){

                case 'anuncio': // Show announcement
                                require 'kiosco_anuncio.php';
                                break;
                case 'votacion': // Show question
                                require 'kiosco_pregunta.php';
                                break;
                case 'evento': // Show invitation
                                require 'kiosco_convocatoria.php';
                                break;
              }
            }

            echo "</div>";
            // Close database
            require 'kiosco_desconectar_bdd.php';

            ?>

        </div>
      </div>

    </div>

    </div>

    </body>
</html>
