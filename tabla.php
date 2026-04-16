<?php 
	//uso del archivo de configuracion
	require 'admin/config.php'; 
	//uso del archivo de funciones
	require 'functions.php';

	//Nos conectamos a la base de datos
	$conexion = func_conexion($bd_config);

	$page = 'tabla';

	//si al conexion es incorrecta redirigimos a error.php
	if (!$conexion) {
		header('Location: error.php');
	}

	$registros = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tabla_liga WHERE id_evento = 60 ORDER BY pts DESC,dif DESC");
	$registros->execute();
	$registros = $registros->fetchAll();

	$noticias = $conexion->prepare("SELECT * FROM noticias WHERE id_evento = 60 ORDER BY fecha DESC LIMIT 3");
	$noticias->execute();
	$noticias = $noticias->fetchAll();

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

		<div class="row d-flex justify justify-content-center">
			<div class="col-12">

				<table class="table" style="margin-top: 100px;">
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

		<div class="row" style="margin-top: 3em;">
			<div class="col-12">
				<h2 style="background-color: #FDB927; padding: .5em;">Noticias</h2>
			</div>
			
			<?php foreach($noticias as $not): ?>
			<div class="col-md-3">
				<div class="card" style="width: 100%; margin-bottom: 1em;">
				  <img class="card-img-top" src="<?php echo $not['imagen'] ?>" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $not['titulo'] ?></h5>
				    <p class="card-text" style="font-size: .9em;"><?php echo $not['descripcion'] ?></p>
				  </div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		
	</div>

	<script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>