<?php session_start(); ?>
<?php



// Connect to database
require 'kiosco_conectar_bdd.php';

$usuarioID = $_POST["usuarioID"];
$publicacionID= $_POST["publicacionID"];
$participacion = $_GET["participacion"];
$estatus = $_POST["estatus"];

// Create QUERY

if($estatus == "undefined"){
  $query = "INSERT INTO Asistencia(publicacionID, usuarioID, participacion) VALUES ($publicacionID, $usuarioID, $participacion);";
} else {
  $query = "UPDATE Asistencia SET participacion = '$participacion' WHERE publicacionID = $publicacionID AND usuarioID = $usuarioID;";
}

// Post the answer to the event invitation

$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

//  Close database
require 'kiosco_desconectar_bdd.php';


 ?>
