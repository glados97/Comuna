<?php

?>

<html>
<meta charset="utf-8">	
<head>
	<?php require 'kiosco_materialize.php'; ?>

	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<style>
		html, body
		{
			height: 100%;
		}
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

		.seccionForm
		{
			background-color: #833AAA;
			color: white;
			font-family: 'Poppins';
		}

		.footImg
		{
			max-height: 200px;
		}
	</style>

	<script>
		$(document).ready(function(){
			var errorNombre = false;
			var errorApellido = false;
			var errorDOB =  false;
			var errorPassword = false;
			var errorConfirmPassword = false;

			$("#first_name").focusout(function(){
				checarNombre();
			});

			$("#last_name").focusout(function(){
				checarApellido();
			});

			$("#dob").change(function(){
				checarDOB();
			});

			$("#newpassword").focusout(function(){
				checarPassword();
			});

			$("#confirm_password").focusout(function(){
				checarConfirmPassword();
			});

			$("#register").submit(function(e){
				validarSubmit(e);
			});


			function checarNombre()
			{
				var regex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜ\s]+$/;
				if (regex.test($('#first_name').val()))
				{
					//alert('Nombre correcto');
					$("#errorNombre").text("");
				}
				else
				{
					//alert('Nombre INcorrecto o vacío');
					$("#errorNombre").text("Nombre no válido. Solo puede utilizar letras, números no.");
					errorNombre = true;
				}
			}

			function checarApellido()
			{
				var regex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜ\s]+$/;
				if (regex.test($('#last_name').val()))
				{
					//alert('Apellido correcto');
					$("#errorApellido").text("");
				}
				else
				{
					//alert('Apellido INcorrecto o vacío');
					$("#errorApellido").text("Apellido no válido. Solo puede utilizar letras, números no.");
					errorApellido = true;
				}
			}

			function checarDOB()
			{
				var now = new Date();
				var day = ("0" + now.getDate()).slice(-2);
				var month = ("0" + (now.getMonth() + 1)).slice(-2);
				var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

				var fechaInput = new Date($('#dob').val());
				fechaInput.setFullYear(fechaInput.getFullYear() + 18); //sumar 18 años a su fecha de nacimiento
				//alert(fechaInput);
				//alert(now);

				if(fechaInput > now) //si la fechaInput es mayor que now, significa que su cumpleaños número 18 está en el futuro (usuario tiene menos de 18 años)
				{
					//alert('Debe ser mayor de edad.');
					$("#errorFecha").text("Para usar Comuna, debe ser mayor de edad.");
					errorDOB = true;
				}
				else
				{
					$("#errorFecha").text("");
					errorDOB =  false;
				}
			}

			function checarPassword()
			{
				var regex = /^[a-zA-Z0-9]+$/;
				if (regex.test($('#newpassword').val()))
				{
					//alert('Contraseña válida.');
					$("#errorContrasena").text("");
				}
				else
				{
					//alert('Contraseña inválida.');
					$("#errorContrasena").text("Su contraseña no es válida. Asegúrese de que solo lleve letras mayúsculas y/o minúsculas (sin acentos) y números.");
					errorPassword = true;
				}

				if($('#confirm_password').val() != "")
				{
					checarConfirmPassword();
				}
			}

			function checarConfirmPassword()
			{
				var pw = $('#newpassword').val();
				var pw2 = $('#confirm_password').val();
				if(pw == pw2)
				{
					//alert('Contraseñas coinciden.');
					$("#errorConfirmarContrasena").text("");
				}
				else
				{
					//alert('Contraseñas no coinciden.');
					$("#errorConfirmarContrasena").text("Debe escribir la misma contraseña que definió en el campo anterior.");
					errorConfirmPassword = true;
				}
			}

			function validarSubmit(e)
			{
				errorNombre = false;
				errorApellido = false;
				errorDOB =  false;
				errorPassword = false;
				errorConfirmPassword = false;

				checarNombre();
				checarApellido();
				checarDOB();
				checarPassword();
				checarConfirmPassword();

				if(errorNombre == false && errorApellido == false && errorDOB ==  false && errorPassword == false && errorConfirmPassword == false)
				{
					//si no hay errores, hacer submit
					alert("Todo correcto.");
				}
				else
				{
					alert("CUENTA NO CREADA. Hay errores en uno o varios de los campos. Revise el texto en rojo y corríjalos antes de volver a intentar. No deje ningún campo vacío.");
					e.preventDefault();
				}
			}
		});
	</script>
</head>
<body>
	<div class='container-fluid'> 
		<div class="row seccionForm">
			<div class="col-lg-2"></div>

			<div class="col-lg-8 formMargin">
				
					<h2>Si nunca ha usado el sistema Comuna, ¡regístrese!</h2>
	  				<p>Por favor, llene <b>todos</b> los campos.</p>
	  			
			</div>
		</div>
		<div class="row seccionForm">
			<div class="col-lg-2"></div>
			<form id='register' name='register' action="insertarSignup.php" method="post" class='col-lg-8'>
			<div class="row">
				<div class="col-lg-6">
	  				<div class="row formMargin">
			            <?php
			            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($confirm_password_err))
			                echo "<div class = 'red-text col s12'>La confirmación de contraseña no coincide</div>";
			                //en caso de presentar este error, mostrar valores con que llenó la forma

			            ?>
			            <div class='col-lg-12'>
	  						<label for="first_name">Nombre</label>
	  						<input placeholder='ejemplo: Martín' name="first_name" id="first_name" type="text" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['first_name'])."'"; ?> required>	
	  					</div>
	  					<div class='col-lg-12'>
	  						<span id="errorNombre" class="errorSpan"></span>
	  					</div>  					
	  				</div>
	  				<div class='row formMargin'>
	  					<div class='col-lg-12'>
	  						<label for="last_name">Apellido</label>
	  						<input placeholder='ejemplo: Obregón' name="last_name" id="last_name" type="text" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['last_name'])."'"; ?> required>
	  					</div>
	  					<div class='col-lg-12'>
	  						<span id="errorApellido" class="errorSpan"></span>
	  					</div>
	  				</div>
	  				<div class='row formMargin'>
	  					<div class="col-lg-12">
	  						<label for="date">Fecha de nacimiento</label>
	  						<input name="dob" id="dob" type="date" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['dob'])."'"; ?> required>
	  					</div>
	  					<div class='col-lg-12'>
	  						<span id="errorFecha" class="errorSpan"></span>
	  					</div>
	  				</div>
	  				<div class="row formMargin">  					
	  					<div class='col-lg-12'>
	  						<label>Indique su género:<br></label>
		  					<div class="form-check">
				                <input id="male" class="form-check-input" name="sex" type="radio" value='m' <?php if (empty($confirm_password_err) || trim($_POST['sex'])=='m') echo "checked"; ?> />
				                <label for="male" class="form-check-label">Hombre</label>
				            </div>

				            <div class="form-check"> 
				                <input id="female" class="form-check-input" name="sex" type="radio" value='f' <?php if (!empty($confirm_password_err) && trim($_POST['sex'])=='f') echo "checked"; ?>  />
				                <label for="female" class="form-check-label">Mujer</label>  
				  			</div>
			  			</div>
			  			<div class='col-lg-12'>
			  				<span id="errorGenero" class="errorSpan"></span>
			  			</div>
	  				</div>
	  			</div>
	  		
	  			<div class="col-lg-6">
			
	  				<div class="row formMargin">
	  					<div class="col-lg-12">
	  						<section>
	  						<label>Escriba una contraseña (solo letras y números)</label>
	  						</section>
	  						<input name="newpassword" id="newpassword" type="password" class="form-control validate" required>
	  					</div>
	  					<div class='col-lg-12'>
	  						<span id="errorContrasena" class="errorSpan"></span>
	  					</div>
	  				</div>
	  				<div class="row formMargin">
	  					<div class="col-lg-12">
	  						<label for="confirm_password">Por favor, vuelva a escribir su contraseña</label>
	  						<input name="confirm_password" id="confirm_password" type="password" class="form-control validate" required>
	  					</div>
	  					<div class='col-lg-12'>
	  						<span id="errorConfirmarContrasena" class="errorSpan"></span>
	  					</div>
	  				</div>
	  				<div class='formMargin text-center'>
	  					<button class="btn btn-warning" type="submit" name="register">Crear cuenta</button>
	  				</div>
	  			</div>
	  		</div>
	  		</form>

	  		<div class="col-lg-2"></div>
	  	</div>
	  	<div class="row">
	  		<div class="col-lg-3"></div>
			<div class='col-lg-12 text-center formMargin'>
				<!--<img src="img/comuna_sm.png" alt=""  class="responsive">-->
				<a href="elegirEntrar.php"><img src="img/Comuna-02.png" alt=""  class="img-fluid footImg"></a>
			</div>
	  	</div>
	</div>
</body>
</html>