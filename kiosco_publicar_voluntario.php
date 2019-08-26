<?php session_start(); ?>
<?php



// Connect to database
require 'kiosco_conectar_bdd.php';

$voluntarioID = $_POST["voluntarioID"];
$favorID= $_POST["favorID"];

// Create QUERY

// Post a volunteer request

$query = "INSERT INTO Voluntario(favorID, voluntarioID) VALUES ($favorID, $voluntarioID);";

$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());


//  Close database
require 'kiosco_desconectar_bdd.php';


 ?>
