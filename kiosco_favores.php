<?php session_start();
require 'disable_right_click.php';
?>
<html>
    <meta charset="UTF-8">
    <head>
    <style media="screen">

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
        /*border-radius: 6px;*/
        margin-bottom: 25px;
    }

    </style>

    <!--Import Google Icon Font-->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>


      <?php
        // Show menu
        require 'menu.php';

      ?>
    </head>

    <body>
        <div class = "col-lg-12">
          <h2 class="tituloContent">Favores de la Colonia</h2>
          <br>
            <?php

            // New post button
            //require 'kiosco_pedir_favor.php';

            // Connect to Database
            require 'kiosco_conectar_bdd.php';

            // Create QUERY
            $user = $_SESSION['S_id'];

            $query = "SELECT * FROM Favor WHERE voluntarioID IS NULL AND favorID NOT IN (SELECT favorID FROM Favor WHERE voluntarioID < '' ) AND favorID NOT IN (SELECT favorID FROM Favor WHERE propietarioID = '$user') AND favorID NOT IN(SELECT favorID FROM Voluntario WHERE voluntarioID = '$user') ORDER BY fechaINI DESC";


            $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

            echo "<div class = 'feed'>";

            // Print the data
            while($row = mysqli_fetch_assoc($result)) {

              require 'kiosco_favor.php';
            }

            echo "</div>";
            // Close database
            require 'kiosco_desconectar_bdd.php';

            ?>
        </div>

        <script type="text/javascript" language="JavaScript">

          function confirmarFavor(favorID){
            var respuesta = document.getElementById("confirm"+favorID);
            respuesta.classList.add("disabled");
            respuesta.classList.add("grey");

            // Post a volunteer without exiting or reloading page
            $.ajax({
                url:'kiosco_publicar_voluntario.php',
                type:'post',
                data:$('#forma-favor'+favorID).serialize(),
                success:function(){
                    alert("Se agregarán sus puntos cuando el favor se haya completado");
                }
            });

          }


        </script>
    </body>
</html>
