<?php session_start();
  //uso del archivo de configuracion
  require 'admin/config.php'; 
  //uso del archivo de funciones
  require 'functions.php'; 

  //Nos conectamos a la base de datos
  $conexion = func_conexion($bd_config);

  $errores = '';

  $page = 'evento-jornadas';

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

  $partidos = $conexion->prepare("SELECT * FROM partidos WHERE id_evento = '$id_evento' LIMIT 100");
  $partidos->execute();
  $partidos = $partidos->fetchAll();

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
          <div class="col-md-12">
            <div class="row" style="margin: 0;">

          <?php foreach ($partidos as $partido) { ?>
            <div class="col-3" style="padding: 1em;">
              <div class="shadow-sm p-3 mb-5" style="background-color: #f2f2f2; border:2px solid #efefef; padding: 1em; text-align: center;">
                <p style="text-align: left; font-size: .8em;"><?php echo 'Jornada ' . $partido['jornada'] . ' <span style="color: #29A5F7;">' . $partido['etapa'] . '</span>'; ?></p>
                <p style="font-size: .8em;"><?php echo $partido['equipo_uno'] . ' VS ' . $partido['equipo_dos']; ?></p>
                <p style="font-size: .8em;"><?php echo $partido['r1'] . ' - ' . $partido['r2']; ?></p>
                <a href="<?php echo 'partido?id=' . $partido['id_partido'] . '&id_evento=' . $id_evento . '&epx=' . $partido['id_equipo_uno'] . '&epy=' . $partido['id_equipo_dos'] ?>" class="btn btn-secondary btn-sm" style="border-radius: 0;">Editar Partido</a>
              </div>
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