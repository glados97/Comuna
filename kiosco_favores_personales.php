<?php

// Connect to Database
require 'kiosco_conectar_bdd.php';

// Create QUERY
$user = $_SESSION["S_id"];

$query = "SELECT * FROM Favor WHERE propietarioID = $user AND voluntarioID IS NULL ORDER BY fechaINI DESC";


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
<script type="text/javascript" language="JavaScript">

  $(document).ready(function(){
    $('select').formSelect();
  });

  function confirmarVoluntario(favorID){

    if (document.forms["forma-voluntario"+favorID]["voluntarioID"].value == ""){

        alert("Falta seleccionar a un voluntario");
      }else{

      var respuesta = document.getElementById("confirm-volunteer"+favorID);
      respuesta.classList.add("disabled");
      respuesta.classList.add("grey");

      // Complete a favor request without reloading page
      $.ajax({
          url:'kiosco_confirmar_voluntario.php',
          type:'post',
          data:$('#forma-voluntario'+favorID).serialize(),
          success:function(){
              alert("Se han otorgado los puntos a su voluntario");
          }
      });
    }

  }


</script>
