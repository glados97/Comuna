<?php
	//phpinfo();
?>

<html>
<meta charset="utf-8">
<head>

  <?php require 'kiosco_materialize.php'; ?>

  <style>
		.conMargen
		{
			margin-top: 20px;
		}

		.sinUppercase 
		{
		    text-transform: none;
		}

		.logoElegirLogin
		{
			max-height: 200px;
		}
		.btn
		{
			color: white;
			height: 350px;
			width: 400px;
			white-space: normal;
			padding-top: 120px;
			flex: 1
			margin-right: 0px;
			margin-left: 120px;
		}
		.container
		{
			display: flex;
		}
	</style>
</head>
<body>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-3'></div>
			<div class='col-6 text-center'>
				<div class='row conMargen text-center'>
					<div class='col-12'>
						<a href="index.php"><img src="img/Comuna-02.png" alt=""  class="img-fluid logoElegirLogin"></a>
					</div>
				</div>
			</div>
			<div class='text-center container'>
				<div class='row conMargen text-center'>
					<div class='col-12'>
						<a class="btn btn-primary" href='signupform3.php' role="button" style="background-color: #833AAA;"><h2>Es mi primera vez entrando al sistema</h2></a>
						</div>
				</div>
				<div class='row conMargen text-center'>
					<div class='col-12'>
						<a class="btn btn-info" href='loginform.php' role="button" style="background-color: #41C48F; padding-top: 150px;"><h2>Ya he utilizado el sistema</h2></a>
					</div>
				</div>
			</div>
			<div class='col-3'></div>
		</div>
	</div>
</body>
</html>