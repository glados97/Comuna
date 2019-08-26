<?php
  // Connect to database

  $server = "localhost";
  $user = "glados";
  $pass ="gladys97";
  $dbase ="kiosco_intel";

  $conexion = mysqli_connect($server, $user, $pass, $dbase) or die ("Error de conexión ".mysqli_connect_error());
  $conexion->set_charset("utf8");

?>
