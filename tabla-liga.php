<?php session_start();
	//uso del archivo de configuracion
	require 'admin/config.php'; 
	//uso del archivo de funciones
	require 'functions.php'; 

	//Nos conectamos a la base de datos
	$conexion = func_conexion($bd_config);

	$errores = '';

	$page = 'evento';

	comprobarSession($conexion);

	$usuario = obtener_usuario($conexion, $_SESSION['user']);
	//print_r($usuario);
	$id = $usuario[0][0];
	$id_evento = $_GET['id'];
	//echo $id_evento;

	$evento = $conexion->prepare("SELECT * FROM eventos WHERE id_evento = '$id_evento' LIMIT 1");
	$evento->execute();
	$evento = $evento->fetchAll();

	$registros = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tabla_liga WHERE id_evento = '$id_evento' ORDER BY pts DESC,dif DESC");
	$registros->execute();
	$registros = $registros->fetchAll();

	//print_r($partidos);

 ?>

 <!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">

    <title>Admin. Set</title>
  </head>

  <body>

	<div class="container-fluid" style="padding: 0px;">

		<!--MENSAJES DE ERROR-->
		<?php if(!empty($errores)){ ?>
		<div class="row">
			<div class="col-12">
				<p><?php echo $errores; ?></p>
			</div>
		</div>
		<?php } ?>
		<!--//MENSAJES DE ERROR//-->

		<!--CONTENIDO DE LA PAGINA-->
		<!--MENU PRINCIPAL-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark navigation_bar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!--<ul class="navbar-nav mr-auto">-->
            <ul class="navbar-nav" style="width: 100%; padding-top: .5em;">
              <li class="nav-item">
                <h5 class="nav-link" style="color: #fff;">Administrador</h5>
              </li>
              <li class="nav-item" style="margin-left: 1em;">
                <a class="nav-link" href="administrador">Mis Eventos</a>
              </li>

              <li class="nav-item ml-auto">
                <a class="nav-link menu_link" href="cerrar.php">CERRAR SESIÓN</a>
              </li>
            
              </ul>
          </div>   
        </nav>

        <div class="row" style="margin: 0;">
        	<div class="col-12" style="padding: 2em 1em 1em 1em; text-align: center;">
        	<h2 style="text-align: center;"><?php echo $evento[0]['nombre']; ?></h2>
        	</div>
        </div>


        <div class="row d-flex justify justify-content-center">
			<div class="col-10">

				<table class="table" style="margin-top: 20px;">
				  <thead class="thead-light">
				    <tr>
				      <th scope="col">POS</th>
				      <th scope="col">Equipo</th>
				      <th scope="col">PJ</th>
				      <th scope="col">PG</th>
				      <th scope="col">PE</th>
				      <th scope="col">PP</th>
				      <th scope="col">GF</th>
				      <th scope="col">GC</th>
				      <th scope="col">DIF</th>
				      <th scope="col">Pts</th>
				    </tr>
				  </thead>
				  <tbody>

				  	<?php $i=0; foreach($registros as $reg): 

				  		$i += 1;

				  		?>
				    <tr>
				      <th scope="row"><?php echo $i; ?></th>
				      <td><?php echo $reg['equipo']; ?></td>
				      <td><?php echo $reg['pj']; ?></td>
				      <td><?php echo $reg['pg']; ?></td>
				      <td><?php echo $reg['pe']; ?></td>
				      <td><?php echo $reg['pp']; ?></td>
				      <td><?php echo $reg['gf']; ?></td>
				      <td><?php echo $reg['gc']; ?></td>
				      <td><?php echo $reg['dif']; ?></td>
				      <td><?php echo $reg['pts']; ?></td>
				    </tr>
				    <?php endforeach; ?>

				  </tbody>
				</table>

			</div>

		</div>
		

		</div>

		<!--//CONTENIDO DE LA PAGINA//-->

	</div>

	<script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
    	function actualizarResultado(){
    		var r1 = document.getElementById('r1');
    		var r2 = document.getElementById('r2');
    		console.log(r1.value + r2.value);
    	}
    </script>
  </body>
</html>