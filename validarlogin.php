<?php
	require 'kiosco_conectar_bdd.php';

	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']))
	{

    // Check if username is empty
	    if(empty(trim($_POST["username"]))){
	        $username_err = 'Introduce tu nombre de usuario.';
	    } else{
	        $username = trim($_POST["username"]);
	    }

	    // Check if password is empty
	    if(empty(trim($_POST['password']))){
	        $password_err = 'Introduce tu contraseña.';
	    } else{
	        $password = trim($_POST['password']);
	    }

	    // Validate credentials
	    if(empty($username_err) && empty($password_err)){
	        //si no hay errores, checar username y password
	        $sql = "SELECT id,username, password FROM Users WHERE username = '$username'";
	        if($q1 = mysqli_query($conexion, $sql)){
	          $info = mysqli_fetch_assoc($q1);
	          if(password_verify($password, $info['password'])){
	                //si el username y el password son correctos, entrar
	                session_start();
	                $_SESSION['S_username'] = $username;
	                $_SESSION['S_id'] = $info['id'];

	                //checar si es usuario nuevo
	                if(isset($_GET['newuser']))
	                {
	                	header("location: dashboard.php?newuser=true");
	                	exit();
	                }
	                else
	                {
	                	header("location: dashboard.php");
	                	exit();
	                }
	            } else{
	                //si existe el username, pero su password no coincide, no entrar
	                header("location: loginform.php?credentials=mal");
	                exit();
	            }

	        }
	        else{
	            //si no existe username, no entrar
	            header("location: loginform.php?credentials=mal");
	            exit();
	        }
    	}
    // Close connection
	}
?>