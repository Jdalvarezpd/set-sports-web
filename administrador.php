<?php session_start();
	//uso del archivo de configuracion
	require 'admin/config.php'; 
	//uso del archivo de funciones
	require 'functions.php'; 

	//Nos conectamos a la base de datos
	$conexion = func_conexion($bd_config);

	$errores = '';

	$page = 'administrador';

	comprobarSession($conexion);

	$usuario = obtener_usuario($conexion, $_SESSION['user']);
	//print_r($usuario);
	$id = $usuario[0][0];
	//echo $id;

	$eventos = $conexion->prepare("SELECT * FROM eventos WHERE id_creador = $id LIMIT 100");
	$eventos->execute();
	$eventos = $eventos->fetchAll();

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

              <li class="nav-item ml-auto" style="margin-right: 2em;">
                <form class="form-inline my-2 my-lg-0" method="get" action="admin_usuarios">
                <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Búsqueda" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Buscar</button>
              </form>
              </li>

              <li class="nav-item ml-auto">
                <a class="nav-link menu_link" href="cerrar.php">CERRAR SESIÓN</a>
              </li>
            
              </ul>
          </div>   
        </nav>

		<div class="row" style="margin-top: 1em; padding-left: 1em; padding-right: 1em;">
			<div class="col-12" style="overflow-x:auto;">

		        <table class="table table-striped" style="font-size: 0.8em;">
				  <thead>
				    <tr style="background-color: rgb( 50, 116, 162); color: #fff;">
				      <th scope="col">Nombre</th>
				      <th scope="col">Lugar</th>
				      <th>Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($eventos as $ev): ?>
				    <tr>
				      <th scope="row"><p><?php echo $ev['nombre']?></p></th>
				      <td><p><?php echo $ev['lugar'];?></p></td>
				      <td><a href="<?php echo 'evento?id=' . $ev['id_evento'] ?>">Editar</a></td>
				    </tr>
				    <?php endforeach;?>
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
  </body>
</html>