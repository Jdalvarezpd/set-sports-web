<?php  
require 'admin/config.php';
require 'functions.php';

//NOS CONECTAMOS A LA BASE DE DATOS
	$conexion = func_conexion($bd_config);

	//SI NO EXISTE CONECCION A LA BASE DE DATOS, SE REDIRIGE A LA PAGINA DE ERRORES
	if (!$conexion) {
		header('Location: error.php');
	} 
	$ready = false;

	

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['m']) && isset($_GET['key'])){
		$email = limpiarDatos($_GET['m']);
		$key = limpiarDatos($_GET['key']);
	}else{
		$email = "";
		$key = "";
	}
	

	$user = reset_pass_verify($conexion, $email, $key);

	if($user){
		if($user[0]['resetkey'] != "empty"){
			$ready = true;
			//echo "si";
		}
	}
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$newpass = limpiarDatos($_POST['newpass']);
	$email = limpiarDatos($_POST['email']);
	$key = limpiarDatos($_POST['key']);

	$pass_encrypted = password_hash($newpass, PASSWORD_DEFAULT, array("cost" =>12));
	
	$user = reset_pass_verify($conexion, $email, $key);

	$sql = "UPDATE usuarios SET password = :password, resetkey = :resetkey WHERE correo = :correo LIMIT 1";

		$statement = $conexion->prepare($sql);

		$statement->execute(array(
				':password' => $pass_encrypted,
				':resetkey' => "empty",
				':correo' => $email
		));

		header('Location: ' . RUTA);
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container-fluid d-flex justify-content-center fondo_inicial">

        <div class="card" style="width: 20rem; margin-top: 10em;">
          <div class="card-body">

          	<?php if($ready){ ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="password" id="inputEmail" name="newpass" class="form-control" placeholder="Nueva Contraseña" style="margin-bottom: 1em;" required autofocus>
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="hidden" name="key" value="<?php echo $key; ?>">
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Continue</button>
            </form><!-- /form -->
			<?php }else{ ?>
				<p>Link error</p>
			<?php } ?>

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

    <?php require 'views/footer.php'; ?>