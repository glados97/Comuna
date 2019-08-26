<?php

?>

<html>
<meta charset="utf-8">	
<head>
	<?php require 'kiosco_materialize.php'; ?>
</head>
<body>
	<div class='container'> 
		<div id="register" class="col s12">
	  		<form name='register' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="col s12">
	  			<div class="form-container">
	  				<h4 class="amber-text">Si nunca ha usado el sistema Comuna, ¡regístrese!</h4>
	  				<p>Por favor, llene todos los campos.</p>
	  				<div class="row">
			            <?php
			            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($confirm_password_err))
			                echo "<div class = 'red-text col s12'>La confirmación de contraseña no coincide</div>";
			                //en caso de presentar este error, mostrar valores con que llenó la forma

			            ?>
	  					<div class="input-field col s4">
	  						<input placeholder='ejemplo: Martín' name="first_name" id="first_name" type="text" class="validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['first_name'])."'"; ?> required>
	  						<label for="first_name">Nombre</label>
	  					</div>
	  					<div class="input-field col s4">
	  						<input placeholder='ejemplo: Obregón' name="last_name" id="last_name" type="text" class="validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['last_name'])."'"; ?> required>
	  						<label for="last_name">Apellido</label>
	  					</div>
	  				</div>
	  				<div class='row'>
	  					<div class="input-field col s4">
	  						<input name="dob" id="dob" type="date" class="validate" <?php if (!empty($confirm_password_err)) echo "value= '".trim($_POST['dob'])."'"; ?> required>
	  						<label for="date">Fecha de nacimiento</label>
	  					</div>
	  				</div>
	  				<div class="row">  						
	  					<div class="input-field col s6">

			              <section>
			              	<label>Indique su género:</label>
			              </section>
			              <p>
			                <label for="male">
			                <input id="male" class="with-gap" name="sex" type="radio" value='m' <?php if (empty($confirm_password_err) || trim($_POST['sex'])=='m') echo "checked"; ?> />
			                <span>Hombre</span>
			              </label>
			              </p>
	 
			              <p>
			                <label for="female">
			                <input id="female" class="with-gap" name="sex" type="radio" value='f' <?php if (!empty($confirm_password_err) && trim($_POST['sex'])=='f') echo "checked"; ?>  />
			                <span>Mujer</span>
			              </label>
			              </p>
			  			</div>
	  				</div>
	  				<div class="row">
	  					<div class="input-field col s6">
	  						<section>
	  						<label>Escriba una contraseña (solo letras y números)</label>
	  						</section>
	  						<input name="newpassword" id="newpassword" type="password" class="validate" required>
	  						<label for="newpassword">Contraseña</label>
	  					</div>
	  				</div>
	  				<div class="row">
	  					<div class="input-field col s6">
	  						<input name="confirm_password" id="confirm_password" type="password" class="validate" required>
	  						<label for="confirm_password">Confirme Constraseña</label>
	  					</div>
	  				</div>
	  				<center>
	  					<button class="btn waves-effect waves-light amber" type="submit" name="register">Crear cuenta</button>
	  				</center>
	  			</div>
	  		</form>
	  	</div>
	</div>
</body>
</html>