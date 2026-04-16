<?php 

$bd_config = array(
		'basedatos' => 'soccer_manager',
		'usuario' => 'root',
		'pass' => '',
		'host' => 'localhost'
	);

//Funcion de conexion a base de datos
function func_conexion($bd_config){
	try {
		$conexion = new PDO('mysql:host='.$bd_config['host'].';dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);

		return $conexion;

	} catch (PDOException $e) {
		return false;
	}
}

$conexion = func_conexion($bd_config);
getPlantilla(1, $conexion);

function getPlantilla($datos, $conexion){
		/*$sentencia = $conexion->prepare("SELECT id_usuario FROM usuarios 
										INNER JOIN usuarios_equipos 
										ON usuarios.id_usuario = usuarios_equipos.id_usuario 
										WHERE usuarios_equipos.id_equipo = 106");*/
										//imprime('llega');
		$sentencia = $conexion->prepare("SELECT usuarios.id_usuario FROM usuarios 
										INNER JOIN usuarios_equipos 
										ON usuarios.id_usuario = usuarios_equipos.id_usuario");
		
		$sentencia->execute();
		$jugadores = $sentencia->fetchAll();

		print_r($jugadores);
	}

 ?>