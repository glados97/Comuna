<?php



// Connect to database
require 'kiosco_conectar_bdd.php';

$contenido = $_POST["contenido-anuncio"];
$propietarioID = $_POST["usuarioID"];
$fechaFIN = $_POST["fecha-anuncio"];
$titulo = $_POST["titulo-anuncio"];
$hora = $_POST["hora-anuncio"];
$minuto = $_POST["minuto-anuncio"];

// Create QUERY
if(isset($_POST['evento'])){
  // Post an event
  $tipo = 'evento';

  $query = "INSERT INTO Publicacion(publicacionID, propietarioID, tipo, titulo, contenido, fechaINI, fechaFIN, hora, minuto) VALUES
  (default, $propietarioID,'$tipo','$titulo','$contenido',NULL,'$fechaFIN','$hora','$minuto');";

  $result = mysqli_query($conexion, $query) or die ("EVENTOError de consulta ".mysqli_error($conexion));

  if($result)
  {
    echo "Evento publicado.";
  }
  else
    echo "Evento NO publicado.";

}else{

  //Post an announcement

  $tipo = 'anuncio';

  $query = "INSERT INTO Publicacion(publicacionID, propietarioID, tipo, titulo, contenido, fechaINI, fechaFIN, hora, minuto) VALUES
  (default, $propietarioID,'$tipo','$titulo','$contenido',NULL,'$fechaFIN','$hora','$minuto');";

  $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error($conexion));

  if($result)
  {
    echo "Encuesta publicada.";
  }
  else
    echo "Encuesta NO publicada.";

}


//  Close database
require 'kiosco_desconectar_bdd.php';


 ?>
