<?php session_start(); ?>
<?php



// Connect to database
require 'kiosco_conectar_bdd.php';

$contenido = $_POST["contenido-favor"];
//$propietarioID = $_POST["usuarioID"];
$propietarioID = $_SESSION["S_id"];
$contacto= $_POST["contacto-favor"];
$titulo = $_POST["titulo-favor"];
$categoria = $_POST["categoria-favor"];

// Create QUERY

// Post a favour request

$query1 = "INSERT INTO Favor(favorID, propietarioID, titulo, categoria, contenido, fechaINI, contacto) VALUES
(default, '$propietarioID','$titulo','$categoria','$contenido',default,'$contacto');";

$result1 = mysqli_query($conexion, $query1) or die ("Error de consulta result1".mysqli_error($conexion));

// Update points on user

$query2 = "UPDATE Users SET puntaje = puntaje-1 WHERE id = $propietarioID";

$result2 = mysqli_query($conexion, $query2) or die ("Error de consulta result2".mysqli_error($conexion));


//  Close database
require 'kiosco_desconectar_bdd.php';

	if($result1 && $result2)
	{
		echo "Se publicó";
		//header("Location: kiosco_favores.php?success=true");
		//exit();
	}
	else
	{
		echo "No se publicó";
		//header("Location: kiosco_favores.php?success=false");
		//exit();
	}


 ?>
