<?php session_start(); ?>
<?php



// Connect to database
require 'kiosco_conectar_bdd.php';

$voluntarioID = $_POST["voluntarioID"];
$favorID= $_POST["favorID"];

// Post the volunteer on Favor table

$query = "UPDATE Favor SET voluntarioID = $voluntarioID WHERE favorID = $favorID ";

$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

// Update points on users

$query = "UPDATE Users SET puntaje = puntaje+1 WHERE (id = $voluntarioID OR id IN (SELECT propietarioID FROM Favor WHERE favorID = $favorID ))";

$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

// Delete all volunteer requests on that favour

$query = "DELETE FROM Voluntario WHERE favorID = $favorID";

$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

//  Close database
require 'kiosco_desconectar_bdd.php';


 ?>
