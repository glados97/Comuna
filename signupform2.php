<?php

?>

<html>
<meta charset="utf-8">	
<head>
	<?php require 'kiosco_materialize.php'; ?>

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


			function checarNombre()
			{
				var regex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜ\s]+$/;
				if (regex.test($('#first_name').val()))
				{
					alert('Nombre correcto');
				}
				else
				{
					//alert('Nombre INcorrecto o vacío');
					$("#errorNombre").text("Nombre no válido.");
					errorNombre = true;
				}
			}

			function checarApellido()
			{
				var regex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜ\s]+$/;
				if (regex.test($('#last_name').val()))
				{
					alert('Apellido correcto');
				}
				else
				{
					//alert('Apellido INcorrecto o vacío');
					$("#errorApellido").text("Apellido no válido.");
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
					errorDOB =  false;
				}
			}

			function checarPassword()
			{
				var regex = /^[a-zA-Z0-9]+$/;
				if (regex.test($('#newpassword').val()))
				{
					alert('Contraseña válida.');
				}
				else
				{
					//alert('Contraseña inválida.');
					$("#errorContrasena").text("Su contraseña no es válida. Asegúrese de que solo lleve letras mayúsculas y/o minúsculas (sin acentos) y números.");
					errorPassword = true;
				}
			}

			function checarConfirmPassword()
			{
				var pw = $('#newpassword').val();
				var pw2 = $('#confirm_password').val();
				if(pw == pw2)
				{
					alert('Contraseñas coinciden.');
				}
				else
				{
					//alert('Contraseñas no coinciden.');
					$("#errorConfirmarContrasena").text("Debe escribir la misma contraseña que definió en el campo anterior.");
					errorConfirmPassword = true;
				}
			}
		});
	</script>
</head>
<body>
	<div class='container-fluid'> 
		<div class="row">
			<div class="col-md-3"></div>

			<div class="col-md-6">
			<div class="row">
	  		<form name='register' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	  			
	  				<h4 class="amber-text">Si nunca ha usado el sistema Comuna, ¡regístrese!</h4>
	  				<p>Por favor, llene todos los campos.</p>
	  				<div class="row formMargin">
			            <?php
			            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($confirm_password_err))
			                echo "<div class = 'red-text col s12'>La confirmación de contraseña no coincide</div>";
			                //en caso de presentar este error, mostrar valores con que llenó la forma

			            ?>
			            <div class='col-md-6'>
	  						<label for="first_name">Nombre</label>
	  						<input placeholder='ejemplo: Martín' name="first_name" id="first_name" type="text" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['first_name'])."'"; ?> required>	
	  					</div>
	  					<div class='col-md-6'>
	  						<span id="errorNombre" class="errorSpan"></span>
	  					</div>  					
	  				</div>
	  				<div class='row formMargin'>
	  					<div class='col-md-6'>
	  						<label for="last_name">Apellido</label>
	  						<input placeholder='ejemplo: Obregón' name="last_name" id="last_name" type="text" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['last_name'])."'"; ?> required>
	  					</div>
	  					<div class='col-md-6'>
	  						<span id="errorApellido" class="errorSpan"></span>
	  					</div>
	  				</div>
	  				<div class='row formMargin'>
	  					<div class="col-md-6">
	  						<label for="date">Fecha de nacimiento</label>
	  						<input name="dob" id="dob" type="date" class="form-control validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['dob'])."'"; ?> required>
	  					</div>
	  					<div class='col-md-6'>
	  						<span id="errorFecha" class="errorSpan"></span>
	  					</div>
	  				</div>
	  				<div class="row formMargin">  					
	  					<div class='col-md-6'>
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
			  			<div class='col-md-6'>
			  				<span id="errorGenero" class="errorSpan"></span>
			  			</div>
	  				</div>
	  				<div class="row formMargin">
	  					<div class="col-md-6">
	  						<section>
	  						<label>Escriba una contraseña (solo letras y números)</label>
	  						</section>
	  						<input name="newpassword" id="newpassword" type="password" class="form-control validate" required>
	  					</div>
	  					<div class='col-md-6'>
	  						<span id="errorContrasena" class="errorSpan"></span>
	  					</div>
	  				</div>
	  				<div class="row formMargin">
	  					<div class="col-md-6">
	  						<label for="confirm_password">Por favor, vuelva a escribir su contraseña</label>
	  						<input name="confirm_password" id="confirm_password" type="password" class="form-control validate" required>
	  					</div>
	  					<div class='col-md-6'>
	  						<span id="errorConfirmarContrasena" class="errorSpan"></span>
	  					</div>
	  				</div>
	  				<center class='formMargin'>
	  					<button class="btn btn-warning" type="submit" name="register">Crear cuenta</button>
	  				</center>
	  		</form>
	  		</div>
	  		</div>
	  	</div>
	</div>
</body>
</html>