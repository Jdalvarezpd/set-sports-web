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
	//echo $id;
	$id_partido = $_GET['id'];
	$id_evento = $_GET['id_evento'];
	$id_eq_uno = $_GET['epx'];
	$id_eq_dos = $_GET['epy'];
	//echo $id_evento;

	$evento = $conexion->prepare("SELECT * FROM eventos WHERE id_evento = '$id_evento' LIMIT 1");
	$evento->execute();
	$evento = $evento->fetchAll();

	$partido = $conexion->prepare("SELECT * FROM partidos WHERE id_partido = '$id_partido' LIMIT 1");
	$partido->execute();
	$partido = $partido->fetchAll();

	$estadisticas = $conexion->prepare("SELECT * FROM eventosdelpartido WHERE id_partido = '$id_partido'");
	$estadisticas->execute();
	$estadisticas = $estadisticas->fetchAll();

	$usuarios_equipo_uno = $conexion->prepare("SELECT * FROM usuarios INNER JOIN usuarios_equipos ON usuarios.id_usuario = usuarios_equipos.id_usuario WHERE id_equipo = '$id_eq_uno'");
	$usuarios_equipo_uno->execute();
	$usuarios_equipo_uno = $usuarios_equipo_uno->fetchAll();

	$usuarios_equipo_dos = $conexion->prepare("SELECT * FROM usuarios INNER JOIN usuarios_equipos ON usuarios.id_usuario = usuarios_equipos.id_usuario WHERE id_equipo = '$id_eq_dos'");
	$usuarios_equipo_dos->execute();
	$usuarios_equipo_dos = $usuarios_equipo_dos->fetchAll();

	//print_r($usuarios_equipo_uno);

	$plantilla_uno = $partido[0]['plantilla_uno'];
	$plantilla_uno_exp = explode("/", $plantilla_uno);

	$plantilla_dos = $partido[0]['plantilla_dos'];
	$plantilla_dos_exp = explode("/", $plantilla_dos);
	//print_r($plantilla_uno_exp);

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

    <style>
		.list-group-item:last-child {
		    margin-bottom: 0;
		    border-bottom-right-radius: 0;
		    border-bottom-left-radius: 0;
		}
	</style>
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
		
		<div class="row" style="margin: 0; padding: 1em;">
			<div class="col-md-3" style="background-color: #f2f2f2; padding: 1em; height: 80vh;">
				<form action="adminset/actualizarResultado" method="POST">
				  <div class="form-group">
				  	<input type="hidden" name="id_partido" value="<?php echo $id_partido; ?>">
				  	<input type="hidden" name="id_evento" value="<?php echo $id_evento; ?>">
				  	<input type="hidden" name="grupo" value="<?php echo $partido[0]['grupo']; ?>">
				    <label for="r1">Resultado <?php echo $partido[0]['equipo_uno']; ?></label>
				    <input type="number" class="form-control" id="r1" name="r1" style="font-size: .8em;" placeholder="<?php echo $partido[0]['r1']; ?>" aria-describedby="emailHelp">

				    <label for="r2">Resultado <?php echo $partido[0]['equipo_dos']; ?></label>
				    <input type="number" class="form-control" name="r2" style="font-size: .8em;" placeholder="<?php echo $partido[0]['r2']; ?>" id="r2">
				  </div>

				  <button type="submit" class="btn btn-primary" style="border-radius: 0; width: 100%;">Actualizar</button>
				</form>

				<form action="adminset/actualizarNotaPartido" method="POST" style="margin-top: 2em;">
      				<input type="hidden" name="id_partido" value="<?php echo $id_partido; ?>">
				  	<input type="hidden" name="id_evento" value="<?php echo $id_evento; ?>">
				  <div class="form-group">
				    <textarea class="form-control" id="nota" name="nota" rows="3" style="font-size: .8em;"><?php echo $partido[0]['notas']; ?></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary" style="border-radius: 0; width: 100%;">Actualizar</button>
				</form>
			</div>
			<div class="col-8" style="text-align: center;">
				<div class="row">
					<div class="col-md-12">
						<h5 class="text-info"><?php echo $evento[0]['nombre']; ?></h5>
						<h4><?php echo $partido[0]['equipo_uno'] . ' VS ' . $partido[0]['equipo_dos']; ?></h4>
						<h4><?php echo $partido[0]['r1'] . ' - ' . $partido[0]['r2']; ?></h4>
					</div>
				</div>

				<div class="row" style="margin-top: 1em;">
					<div class="col-md-4">
						<p><?php echo $partido[0]['equipo_uno']; ?></p>
						
						<div class="list-group border-none" style="border-radius: 0;">

						  <?php for ($i = 0; $i<count($plantilla_uno_exp)-1; $i++){ ?>

							<button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#estadModal" style="font-size: .7em; padding: .5em; cursor: pointer;" onclick="jugadorSeleccionado('<?php echo $plantilla_uno_exp[$i] .'-'. $partido[0]['equipo_uno']; ?>')">
								
								<?php 
									$break = explode("-", $plantilla_uno_exp[$i]);
									echo $break[1];
								?>

							</button>

						  <?php } ?>

						  <button type="button" class="list-group-item list-group-item-action active" data-toggle="modal" data-target="#plantillaModal" style="cursor: pointer; font-size: .8em;">
						    Modificar Plantilla
						  </button>
						</div>

					</div>

					<div class="col-md-4">
						<p><?php echo $partido[0]['equipo_dos']; ?></p>

						<div class="list-group border-none" style="border-radius: 0;">

						  <?php for ($i = 0; $i<count($plantilla_dos_exp)-1; $i++){ ?>

							<button type="button" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#estadModal" style="font-size: .7em; padding: .5em; cursor: pointer;">
								
								<?php 
									$break = explode("-", $plantilla_dos_exp[$i]);
									echo $break[1]; 
								?>

							</button>

						  <?php } ?>

						  <button type="button" class="list-group-item list-group-item-action active" data-toggle="modal" data-target="#plantillaModal2" style="cursor: pointer; font-size: .8em;">
						    Modificar Plantilla
						  </button>
						</div>
					</div>

					<div class="col-md-4">
						<p>Estadisticas</p>
						<?php foreach ($estadisticas as $key ): ?>
							<div class="alert alert-info alert-dismissible fade show" role="alert" style="font-size: .8em;">
								<?php echo $key['tipo']  . ' - ' . $key['jugador'];?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="borrarEstadistica('<?php echo $key['id_eventosdelpartido']; ?>')" style="font-size: 1.5em;">
								    <span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endforeach; ?>
					</div>




					<!-- Modal Estadisticas-->
					<div class="modal fade" id="estadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Tipo de estadística</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <button type="button" class="btn btn-success" onclick="estadisticaSeleccionada('GOL');">GOL</button>
					        <button type="button" class="btn btn-warning" onclick="estadisticaSeleccionada('AMR');">AMARILLA</button>
					        <button type="button" class="btn btn-danger" onclick="estadisticaSeleccionada('ROJ');">ROJA</button>
					        <button type="button" class="btn btn-info" onclick="estadisticaSeleccionada('ASS');">ASISTENCIA</button>
					      </div>
					    </div>
					  </div>
					</div>

					<!-- Modal Plantilla Uno-->
					<div class="modal fade" id="plantillaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Plantilla del partido</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body" style="text-align: left;">
					      	<?php foreach ($usuarios_equipo_uno as $key): ?>
								<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1">
							    <label class="form-check-label" ><?php echo $key['nombre'] . ' ' . $key['apellido']; ?></label>
							  </div>
					      	<?php endforeach; ?>
					      </div>

					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					        <button type="button" class="btn btn-primary">Guardar</button>
					      </div>

					    </div>
					  </div>
					</div>


					<!-- Modal Plantilla Dos-->
					<div class="modal fade" id="plantillaModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Plantilla del partido</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body" style="text-align: left;">
					      	<?php foreach ($usuarios_equipo_dos as $key): ?>
								<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1">
							    <label class="form-check-label" ><?php echo $key['nombre'] . ' ' . $key['apellido']; ?></label>
							  </div>
					      	<?php endforeach; ?>
					      </div>

					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					        <button type="button" class="btn btn-primary">Guardar</button>
					      </div>

					    </div>
					  </div>
					</div>


					<form action="adminset/guardarEstadistica" method="POST" name="form_estadistica" id="form_estadistica">
						<input type="hidden" value="" id="idjugador" name="idjugador">
						<input type="hidden" value="" id="tipoestad" name="tipoestad">
						<input type="hidden" value="<?php ?>" id="nombrejugador" name="nombrejugador">
						<input type="hidden" value="<?php ?>" id="equipojugador" name="equipojugador">

						<input type="hidden" value="<?php echo $id_partido ?>" id="idpartido" name="idpartido">
						<input type="hidden" value="<?php echo $id_evento ?>" id="idevento" name="idevento">	
						<input type="hidden" value="<?php echo $id_eq_uno ?>" id="eq1" name="eq1">
						<input type="hidden" value="<?php echo $id_eq_dos ?>" id="eq2" name="eq2">
					</form>

				</div>
			</div>
      	</div>

		</div>

		<!--//CONTENIDO DE LA PAGINA//-->

	</div>

	<script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
    	var id_player;
    	var tipo_estad;
    	var nombre_player;
    	var equipo_jugador;
    	function actualizarResultado(){
    		var r1 = document.getElementById('r1');
    		var r2 = document.getElementById('r2');
    		console.log(r1.value + r2.value);
    	}

    	function jugadorSeleccionado(player){
    		var arrayDeCadenas = player.split('-');
    		console.log(arrayDeCadenas[0]);
    		id_player = arrayDeCadenas[0];
    		nombre_player = arrayDeCadenas[1];
    		equipo_jugador = arrayDeCadenas[2];
    	}

    	function estadisticaSeleccionada(tipo){
    		tipo_estad = tipo;
    		enviarEstadistica();
    	}

    	function enviarEstadistica(){
    		console.log(id_player);
    		console.log(tipo_estad);
    		var idjugador = document.getElementById('idjugador');
    		var estad = document.getElementById('tipoestad');
    		var nombre = document.getElementById('nombrejugador');
    		var equipojugador = document.getElementById('equipojugador');
    		idjugador.value = id_player;
    		estad.value = tipo_estad;
    		nombre.value = nombre_player;
    		equipojugador.value = equipo_jugador;

    		enviar_formulario();
    	}

    	function enviar_formulario(){
		   document.form_estadistica.submit();
		}

		function borrarEstadistica(id){
			console.log(id);
		}

    </script>
  </body>
</html>