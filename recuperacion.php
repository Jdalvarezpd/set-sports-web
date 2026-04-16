<?php
	require 'admin/config.php'; 
	require 'functions.php'; 

	function obtner_usuario($conexion, $correo){
		$sentencia = $conexion->prepare('SELECT * FROM usuarios WHERE correo = :correo LIMIT 1');
		$sentencia->execute(array(':correo' => $correo));
		$resultado = $sentencia->fetch();
		return $resultado;
	}

	//NOS CONECTAMOS A LA BASE DE DATOS
	$conexion = func_conexion($bd_config);

	//func_comprobarSession();

	//SI NO EXISTE CONECCION A LA BASE DE DATOS, SE REDIRIGE A LA PAGINA DE ERRORES
	if (!$conexion) {
		header('Location: error.php');
	} 


	if($_SERVER['REQUEST_METHOD'] =='POST'){
	$email = limpiarDatos($_POST['email']);

	$errores = '';

	$consultarUsuario = obtner_usuario($conexion, $email);

	if($consultarUsuario !=false){

		$key = randHash();
		$link = RUTA . "/nuevaclave.php?key=$key&m=$email";

		$sql = "UPDATE usuarios SET resetkey = :resetkey WHERE correo = :correo LIMIT 1";

		$statement = $conexion->prepare($sql);

		$statement->execute(array(
				':resetkey' => $key,
				':correo' => $email
		));


		#si no hay errores
	    if(!$errores){
	        $enviar_a = "$email";
	        $asunto = "Recuperación de contraseña";
	        //$mensaje_preparado = "From: Pressources\nGo to the link to reset your password\n";
	        //$mensaje_preparado .= "$link";

	        $mensaje_preparado = '
	        <html>
			<body>
			<p>Usa el link de abajo para crear una nueva contraseña</p>
			<a href="'.$link.'">Click Aquí!!!</a>
			</body>
			</html>
			';
	        /*$cabeceras = 'From: info@pressources.com' . "\r\n" .
	        'X-Mailer: PHP/' . phpversion();
	        $cabeceras .= "Content-type: text/html; charset= iso-8859-1\n";*/

	        $headers  = "Content-type: text/html;" . "\r\n";
	        $headers  .=  "From: soporte@setsportscol.com";


	        #enviamos el correo
	        //mail($enviar_a, $asunto, $mensaje_preparado);
	        mail($enviar_a, $asunto, $mensaje_preparado, $headers);
	        $enviado='true';

	        echo "<script type='text/javascript'>confirmar(); 

			function confirmar()
				{
					alert('Te enviamos un correo con instrucciones para crear una nueva contraseña');
					window.location.href = 'index.php';
				} 

			</script>";
	    }

	    //header("Location: $link");
	}else{
		$errores = "El correo ingresado es inválido";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>

    <div class="container-fluid d-flex justify-content-center fondo_inicial">

        <div class="card" style="width: 20rem; margin-top: 10em;">
          <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Correo" style="margin-bottom: 1em;" required autofocus>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Enviar</button>
            </form><!-- /form -->
            <?php if(!empty($errores)): ?>

                <div class="row">
                  <div class="col-12">
                      <div class="alert alert-danger" role="alert" style="margin-top: 1em;">
                         <?php echo $errores; ?>
                      </div>
                    </div>
                  </div>

               <?php endif; ?>
          </div>
        </div>
    </div><!-- /container -->

    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>


</html>