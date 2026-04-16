<?php session_start();

	//uso del archivo de configuracion
	require 'admin/config.php'; 

	//uso del archivo de funciones
	require 'functions.php'; 

	//NOS CONECTAMOS A LA BASE DE DATOS
	$conexion = func_conexion($bd_config);

	$page= 'registro';

	$needed = '';
	$enviado = '';

	//SI NO EXISTE CONECCION A LA BASE DE DATOS, SE REDIRIGE A LA PAGINA DE ERRORES
	if (!$conexion) {
		header('Location: error.php');
	}


	//SI YA SE HAN ENVIADO LOS DATOS, SE RECIBEN Y SE GUARDAN LOS VALORES EN VARIABLES
	//LOS DATOS SE ESTAN RECIBIENDO POR EL CAMPO (name="")
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$nombre = limpiarDatos($_POST['nombre']);
		$apellido = limpiarDatos($_POST['apellido']);
		$correo = limpiarDatos($_POST['correo']);
		$pass = limpiarDatos($_POST['pass']);
		$identificacion = limpiarDatos($_POST['identificacion']);

		$ready = true;

		$errores = '';

		$pass_encrypted = password_hash($pass, PASSWORD_DEFAULT, array("cost" =>12));

		if(empty($nombre) or empty($apellido) or empty($correo) or empty($pass) or empty($identificacion)){
			$ready = false;
			$needed = '*';
			$errores = $errores .= '<li>Se deben rellenar todos los campos</li>';
		}

		if(strlen($pass) < 4){
			$ready = false;
			$needed = '*';
			$errores = $errores .= '<li>La contraseña debe ser minimo de 5 caracteres</li>';
		}

		/*if($pass != $pass2){
			$ready = false;
			$needed = '*';
			$errores = $errores .= '<li>The two passwords do not match</li>';
		}*/

		//COMPROBAR SI EL EMAIL EXISTE YA EN LA BASE DE DATOS
		$comprobarEmail = consultar_existencia_por_email($conexion, $correo);


		if($ready == true){
			if($comprobarEmail != false){
				$errores = $errores .= '<li>El usuario ya esta registrado</li>';

			//SI EL EMAIL NO EXISTE, SE CONTINUA PARA MANDAR LOS DATOS A ALMACENAR	
			}else{

				$statement2 = $conexion->prepare('INSERT INTO usuarios(cedula, nombre, apellido, correo, password)
				VALUES (:cedula, :nombre, :apellido, :correo, :password)');

				$statement2->execute(array(
				':cedula' => $identificacion,
				':nombre' => $nombre,
				':apellido' => $apellido,
				':correo' => $correo,
				':password' => $pass_encrypted
				));


				//SI NO HAY ERRORES
				if(!$errores){
					$enviado = 'true';
				}


				//$_SESSION['user'] = $mail;

				//CORREO DE BIENVENIDA
				/*$cabeceras = 'From: info@pressources.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
				$msj = 'Hi ' . $name . "\n\n" . 'Welcome to Pressources!' . "\n" . 'We invite you to visit our website www.pressources.com and find ideas and sources for your next story.' . "\n\n" . 'Sincerely,' . "\n\n" . 'The Pressources Team';
				mail($mail, "Welcome to Pressources", $msj, $cabeceras);*/
				
				//SI TODO ES CORRECTO LO ENVIAMOS AL INICIO
				header('Location:' . RUTA);
			
			}
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
    <link rel="icon" href="images/favicon.ico">
    <title>SET SPORTS</title>
  </head>

  <body>

	<div class="container-fluid">
		<?php require 'menu.php'; ?>

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
				      <input type="text" class="form-control" placeholder="Nombre" name="nombre">
				    </div>

				  	<div class="col-12" style="margin-bottom: 1em;">
				      <input type="text" class="form-control" placeholder="Apellido" name="apellido">
				    </div>

				  	<div class="col-12" style="margin-bottom: 1em;">
				      <input type="text" class="form-control" placeholder="Correo electrónico" name="correo">
				    </div>

				    <div class="col-12" style="margin-bottom: 1em;">
				      <input type="text" class="form-control" placeholder="Contraseña" name="pass">
				    </div>

				    <div class="col-12" style="margin-bottom: 1em;">
				      <input type="text" class="form-control" placeholder="Identificación" name="identificacion">
				    </div>

				    <div class="col-12" style="margin-bottom: 1em;">
				  		<button type="submit" class="btn btn-primary">Registrarse</button>
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