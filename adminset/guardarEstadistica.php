<?php session_start();
	//uso del archivo de configuracion
	require '../admin/config.php'; 
	//uso del archivo de funciones
	require '../functions.php'; 

	//Nos conectamos a la base de datos
	$conexion = func_conexion($bd_config);

	$errores = '';

	comprobarSession($conexion);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    	$id_jugador = $_POST['idjugador'];
		$tipo_estad = $_POST['tipoestad'];
		$nombre = $_POST['nombrejugador'];
		$equipo_jugador = $_POST['equipojugador'];
		$id_evento = $_POST['idevento'];
		$id_partido = $_POST['idpartido'];
		$id_eq_uno = $_POST['eq1'];
		$id_eq_dos = $_POST['eq2'];


		echo $id_jugador . '<br>';
		echo $tipo_estad . '<br>';
		echo $nombre . '<br>';
		echo $id_evento . '<br>';
		echo $id_partido . '<br>';
		echo $id_eq_uno . '<br>';
		echo $id_eq_dos . '<br>';


		$statement = $conexion->prepare("INSERT INTO eventosdelpartido(id_partido, id_jugador, tipo, jugador, equipo)
          VALUES (:id_partido, :id_jugador, :tipo, :jugador, :equipo)");

          $statement->execute(array(
          ':id_partido' => $id_partido,
          ':id_jugador' => $id_jugador,
          ':tipo' => $tipo_estad,
          ':jugador' => $nombre,
          ':equipo' => $equipo_jugador
          ));

          header('Location: ../partido?id=' . $id_partido . '&id_evento=' . $id_evento . '&epx=' . $id_eq_uno . '&epy=' . $id_eq_dos);

  	}

 ?>
