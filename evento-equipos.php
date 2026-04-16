<?php session_start();
	//uso del archivo de configuracion
	require 'admin/config.php'; 
	//uso del archivo de funciones
	require 'functions.php'; 

	//Nos conectamos a la base de datos
	$conexion = func_conexion($bd_config);

	$errores = '';

	$page = 'evento-equipos';

	comprobarSession($conexion);

	$usuario = obtener_usuario($conexion, $_SESSION['user']);
	//print_r($usuario);
	$id = $usuario[0][0];
	//echo $id;
	$id_evento = $_GET['id'];
	//echo $id_evento;

	$evento = $conexion->prepare("SELECT * FROM eventos WHERE id_evento = '$id_evento' LIMIT 1");
	$evento->execute();
	$evento = $evento->fetchAll();

	$equipos = $conexion->prepare("SELECT equipos.id_equipo, equipos.id_creador, equipos.id_capitan, 
										equipos.nombre, equipos.descripcion, equipos.imagen, eventos.numero_equipos FROM equipos 
										INNER JOIN eventos_equipos 
										ON equipos.id_equipo = eventos_equipos.id_equipo 
										INNER JOIN eventos ON eventos_equipos.id_evento = eventos.id_evento
										WHERE eventos.id_evento = '$id_evento'");
	$equipos->execute();
	$equipos = $equipos->fetchAll();

	//print_r($equipos);

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
                <a class="nav-link <?php if($page=='mi_tratamiento'){echo 'links_menu_activo';}else{echo 'links_menu';} ?>" href="administrador">Mis Eventos</a>
              </li>

              <li class="nav-item ml-auto">
                <a class="nav-link menu_link" href="cerrar.php">CERRAR SESIÓN</a>
              </li>
            
              </ul>
          </div>   
        </nav>

        <?php require 'menu-administrador.php'; ?>

        <div class="row" style="margin: 0;">

        	<div class="col-md-4">
        		<div class="row" style="margin: 0;">
			<?php foreach ($equipos as $equipo) { ?>
			<div class="col-12" style="padding: 1em;">
				<p><?php echo $equipo['nombre']; ?></p>
        	</div>
        	<?php } ?>
      		</div>
        	</div>
        </div>
		
		

		</div>

		<!--//CONTENIDO DE LA PAGINA//-->

	</div>

	<script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>