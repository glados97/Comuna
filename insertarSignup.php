<?php

require 'kiosco_conectar_bdd.php';
//Validar REGISTRO
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
        //echo var_dump($_POST);
        $fn=ucfirst($_POST['first_name']);
        $ln=ucfirst($_POST['last_name']);

        //crear username
        $nombres = preg_split('/\s+/', $fn);
        $apellidos = preg_split('/\s+/', $ln);
        $username = trim($nombres[0].$apellidos[0]);

        //$username=trim($_POST['first_name'].$_POST['last_name']);
        $sql = "SELECT username FROM Users WHERE username like '$username%' ORDER BY username DESC";
        // echo $sql;
        //echo var_dump($conexion);
    if($q1 = mysqli_query($conexion, $sql)){
        // echo "hizo algo";
        $row = mysqli_fetch_array($q1);

            if(count($row)>0){
                $lastdigits = substr($row[0], -2);
                //evaluar últimos dos dígitos para saber si hay múltiples usuarios con ese nombre
                $digits = ctype_digit($lastdigits) ? intval($lastdigits) : null;
                if(!($digits === null)){
                  $digits += 1; //crear un nuevo usuario con ese Nombre
                  $digits = ($digits<9) ? '0'.$digits : $digits;
                  $username .= $digits;
                }else
                  $username .= '01';
            }
        } else{
           // echo "No hace query";
        }

        //Password stuff

    $password = trim($_POST['newpassword']);

    $confirm_password = trim($_POST['confirm_password']);

    if($password != $confirm_password){
        $confirm_password_err = 'La contraseña no es la misma.';
    }
    // Remaining data

    $dob = trim($_POST['dob']);
    $sex = trim($_POST['sex']);

    // Check input errors before inserting in database
    if(empty($username_err) && empty($confirm_password_err)){

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql2 = "INSERT INTO Users (username,first_name,last_name, password, dob, sex, foto) VALUES ('$username','$fn','$ln','$hash','$dob','$sex','profile8')";

        // echo $sql2;

            if(mysqli_query($conexion, $sql2)){
                // Redirect to home to the logged in page
                header("location: index.php?newuser=".$username);
                exit();
            } else{
                echo "SHAME ON YOU AND YOUR COW.";

            }
        }else {
          // echo "Hay un error";
        }


}
?>