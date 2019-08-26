<?php

// Connect to Database
require 'kiosco_conectar_bdd.php';

// Create QUERY
$user = $_SESSION["S_id"];

$query = "SELECT * FROM Publicacion WHERE tipo NOT LIKE 'anuncio' AND (propietarioID = $user OR publicacionID IN (SELECT publicacionID FROM Asistencia WHERE usuarioID = $user AND participacion = 'true')) ORDER BY fechaINI ASC";


$result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

echo "<div class = 'feed'>";

// Print the data
while($row = mysqli_fetch_row($result)) {
  switch($row[1]){
    case 'votacion': // Show question results
                    require 'kiosco_pregunta_resultado.php';
                    break;
    case 'evento':
                    if ($user == $row[3]){
                    // Show event results
                    require 'kiosco_convocatoria_resultado.php';
                  } else{
                    // Show invitation
                    require 'kiosco_convocatoria.php';
                  }
                    break;
  }
}

echo "</div>";
// Close database
require 'kiosco_desconectar_bdd.php';

?>
