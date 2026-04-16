<?php session_start();

	//uso del archivo de configuracion
	require 'admin/config.php'; 

	//uso del archivo de funciones
	require 'functions.php'; 

	//NOS CONECTAMOS A LA BASE DE DATOS
	$conexion = func_conexion($bd_config);

	$needed = '';
	$enviado = '';

	//SI NO EXISTE CONECCION A LA BASE DE DATOS, SE REDIRIGE A LA PAGINA DE ERRORES
	if (!$conexion) {
		header('Location: error.php');
	}


	//SI YA SE HAN ENVIADO LOS DATOS, SE RECIBEN Y SE GUARDAN LOS VALORES EN VARIABLES
	//LOS DATOS SE ESTAN RECIBIENDO POR EL CAMPO (name="")
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$correo = limpiarDatos($_POST['correo']);
		$pass = limpiarDatos($_POST['pass']);

		$ready = true;

		$errores = '';

		$consultarUsuario = consultar_existencia_por_email_admin($conexion, $correo);


		if($consultarUsuario !=false){

		if(password_verify($pass, $consultarUsuario['password'])){
			$errores = "Contraseña correcta";

			$_SESSION['user'] = $correo;

			header('Location: ' . RUTA . '/administrador');
		}else{
			$errores = "Usuario o contraseña incorrectos";
		}
	}else{
		$errores = "Usuario o contraseña incorrectos";
	}

	}

 ?>



<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>SET</title>
  </head>

  <body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
				  <a class="navbar-brand" href="#">LOGO</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				    <div class="navbar-nav">
				      <a class="nav-item nav-link active" href="/">Inicio <span class="sr-only">(current)</span></a>
				      <a class="nav-item nav-link" href="tabla">La Liga</a>
				      <a class="nav-item nav-link" href="registro">Regístrate</a>
				    </div>
				  </div>
				</nav>
			</div>
		</div>

		<div class="row d-flex justify justify-content-center" style="margin-top: 10em;">
			<div class="col-4">

				<?php if(!empty($errores)): ?>

				  <div class="row">
				    <div class="col-12">
				        <div class="alert alert-danger" role="alert">
				           <?php echo $errores; ?>
				        </div>
				      </div>
				    </div>

				 <?php endif; ?>  

				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

				  <div class="row" style="margin-top: .5em;">
				  	<div class="col-12" style="margin-bottom: 1em;">
				      <input type="text" class="form-control" placeholder="Correo electrónico" name="correo">
				    </div>

				    <div class="col-12" style="margin-bottom: 1em;">
				      <input type="text" class="form-control" placeholder="Contraseña" name="pass">
				    </div>

				    <div class="col-12" style="margin-bottom: 1em;">
				  		<button type="submit" class="btn btn-primary">Ingresar</button>
				  	</div>
				  </div>

				</form>

			</div>
		</div>
	</div>

	<script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>