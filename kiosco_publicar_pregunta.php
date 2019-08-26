<?php session_start(); ?>
<?php



// Connect to database
require 'kiosco_conectar_bdd.php';

$contenido = $_POST["contenido-pregunta"];
$propietarioID = $_POST["usuarioID"];
$fechaFIN = $_POST["fecha-pregunta"];
$titulo = $_POST["titulo-pregunta"];
$opc1 = $_POST["opc1-pregunta"];
$opc2 = $_POST["opc2-pregunta"];
if(isset($_POST["opc3-pregunta"])){
  $opc3 = $_POST["opc3-pregunta"];
}

// Create QUERY

  // Post a question
  $tipo = 'votación';

  if(isset($_POST["opc3-pregunta"])){
    $query = "INSERT INTO Publicacion(publicacionID, propietarioID, tipo, titulo, contenido, fechaINI, fechaFIN, hora, minuto,opc1,opc2,opc3) VALUES
    (default, $propietarioID,'$tipo','$titulo','$contenido',NULL,'$fechaFIN''00:00',0,0,'$opc1','$opc2','$opc3');";
  }else{
    $query = "INSERT INTO Publicacion(publicacionID, propietarioID, tipo, titulo, contenido, fechaINI, fechaFIN, hora, minuto,opc1,opc2) VALUES
    (default, $propietarioID,'$tipo','$titulo','$contenido',NULL,'$fechaFIN''00:00',0,0,'$opc1','$opc2');";
  }

  $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());



//  Close database
require 'kiosco_desconectar_bdd.php';


 ?>
