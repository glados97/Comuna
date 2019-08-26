<?php

?>

<html>
<meta charset="utf-8">	
<head>
	<?php require 'kiosco_materialize.php'; ?>
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<style>
		.formMargin
		{
			margin-top: 20px;
			margin-left: 15px;
			margin-right: 15px;
		}

		.errorSpan
		{
			color: red;
			vertical-align: middle;
		}

		.sinMostrar
		{
			display: none;
			margin-top: 10px;
		}

		.seccionLogin
		{
			background-color: #41C48F;
			color: white;
			font-family: 'Poppins';
		}

		.footImg
		{
			max-height: 200px;
		}
	</style>

	<script>
		$('document').ready(function()
		{
			$(".sinMostrar").hide();
			var searchParams = new URLSearchParams(window.location.search);

			if(searchParams.has('newuser'))
			{
				//alert("hey");
				$("#avisoNuevoUser").slideDown();
			}
			if(searchParams.has('credentials'))
			{
				//alert("hey");
				$("#errorCredenciales").slideDown();
				$("#errorCredenciales>span").text("Error: su nombre de usuario y/o su contraseña son incorrectos.");

			}
		});
	</script>

</head>
<body>

<div id='menu' class="container-fluid">
<div class="row seccionLogin">
	<div class="col-lg-12">
		<div class="alert alert-warning alert-dismissible fade show sinMostrar" id="avisoNuevoUser" role="alert">
			<?php
				if(isset($_GET['newuser']))
				{
					echo "AVISO: Acaba de crear su cuenta. Su nombre de usuario es <b>". $_GET['newuser']."</b>. Es importante que recuerde su nombre de usuario y su contraseña para volver a ingresar al sistema Comuna.";
				}
			?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
		</div>

		<div class="alert alert-danger alert-dismissible fade show sinMostrar" id="errorCredenciales" role="alert">
			<span></span>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</div>

<div class="row seccionLogin">
	<div class="col-lg-4"></div>

	<div class="col-lg-4">
		<div class="row">
	  		<form name='login' id="login" action="<?php 

	  			if(isset($_GET['newuser'])) 
  				{
  					echo 'validarlogin.php?newuser=true'; 
  				}
  				else
  				{
  					echo 'validarlogin.php';
  				} 
	  		?>" method="post" class="col-md-12 formMargin">
	  			<h1 class="display-1"><b>BIENVENIDO</b></h1>
	  			<p>Ingrese sus datos para poder entrar.</p>
	  			<div class="row formMargin">
		            <?php
			            /*if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['credentials']))
			                echo "<div class = 'red-text col s12'>Usuario o contraseña inválidos</div>";
			            */

			            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['illegal']))
			                    echo "<div class = 'red-text col s12'>Favor de iniciar sesión o crear una cuenta</div>";

			            /*if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['newuser'])){
			                echo "<div class='card horizontal green lighten-2'>
			                        <div class='card-content'>
			                        Su nuevo nombre de usuario es: <b>".$_GET['newuser']."</b>
			                        <br>
			                        Recuerde su nombre de usuario y contraseña. Sin estos datos no podrá entrar al sistema.
			                        </div>;
			                        </div>";
			            }
			            */
		            ?>
	  					<div class="col-lg-12">
	  						<label for="username">Nombre de Usuario</label>
	  						<input name="username" id="username" type="text" class="form-control validate" required>
	  						<span id="errorUsername"></span>
	  					</div>
	  			</div>
  				<div class="row formMargin">
  					<div class="col-lg-12">
  						<label for="password">Contraseña</label>
  						<input name="password" id="password" type="password" class="form-control validate" required>
  						<span id="errorUsername"></span>
  					</div>
  				</div>
  				<div class="row text-center formMargin">
  					<div class="col-lg-12">
	  					<button class="btn btn-warning" type="submit" name="login" required>Entrar</button>
	  					<!-- <a href="">¿Olvidaste tu contraseña?</a> -->
	  				</div>
	  			</div>
	  		</form>
	  	</div>
	</div>
</div>
<div class="row">
		<div class='col-lg-12 text-center formMargin'>
			<a href="elegirEntrar.php"><img src="img/Comuna-02.png" alt=""  class="img-fluid footImg"></a>
		</div>
</div>
    <!--FIN LOGIN-->

</body>
</html>