<?php

session_start();

//ESTO ES PARA LA PRUEBA. QUITAR DESPUÉS (Borrar todos los datos que el usuario metió durante la prueba)
require 'kiosco_conectar_bdd.php';
$idUser = $_SESSION['S_id'];
$qryQuitarAsistencia = mysqli_query($conexion, "DELETE FROM asistencia WHERE usuarioID = '$idUser';") or die ("Error de consulta ".mysqli_error($conexion));
$qryQuitarVoluntarioSeleccionado = mysqli_query($conexion, "DELETE FROM mercado WHERE usuarioID = '$idUser';") or die ("Error de consulta ".mysqli_error($conexion));
$qryQuitarFavor = mysqli_query($conexion, "DELETE FROM voluntario WHERE voluntarioID = '$idUser';") or die ("Error de consulta ".mysqli_error($conexion));
//set null si es voluntario de un favor
$qryVoluntarioFavor = mysqli_query($conexion, "UPDATE favor SET voluntarioID = NULL WHERE voluntarioID = '$idUser';") or die ("Error de consulta ".mysqli_error($conexion));
$qryQuitarMercado = mysqli_query($conexion, "DELETE FROM mercado WHERE usuarioID = '$idUser';") or die ("Error de consulta ".mysqli_error($conexion));
$qryQuitarPublicacion = mysqli_query($conexion, "DELETE FROM publicacion WHERE propietarioID = '$idUser';") or die ("Error de consulta ".mysqli_error($conexion));
//$qryQuitarUser = mysqli_query($conexion, "DELETE FROM users WHERE id = '$idUser';") or die ("Error de consulta ".mysqli_error($conexion));
$qryQuitarMercado = mysqli_query($conexion, "DELETE FROM mercado WHERE usuarioID = '$idUser';") or die ("Error de consulta ".mysqli_error($conexion));
$qryQuitarVoto = mysqli_query($conexion, "DELETE FROM voto WHERE usuarioID = '$idUser';") or die ("Error de consulta ".mysqli_error($conexion));
//HASTA AQUI QUITAR

$_SESSION = array();

session_destroy();

header("location: index.php");
exit;
?>
