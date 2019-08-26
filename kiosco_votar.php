<?php
// Connect to database
session_start();
require 'kiosco_conectar_bdd.php';

// Create QUERY

$preguntaID = $_GET["preguntaID"];
$voto = $_GET["voto"];
$query = "INSERT INTO Voto(publicacionID, usuarioID, voto) VALUES ($preguntaID,$_SESSION[S_id],$voto)";
echo $query;
$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());


//  Close database
require 'kiosco_desconectar_bdd.php';

?>
