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
    	$nota = $_POST['nota'];
		$id_partido = $_POST['id_partido'];
		$id_evento = $_POST['id_evento'];

		echo $nota;
		echo $id_partido . '<br>';
		echo $id_evento . '<br>';

		$statement = $conexion->prepare('UPDATE partidos SET notas = :nota WHERE id_partido = :id');

		$statement->execute(array(
			':nota' => $nota,
			':id' => $id_partido
		));

		header('Location: ../partido?id=' . $id_partido . '&id_evento=' . $id_evento);
	}

 ?>
