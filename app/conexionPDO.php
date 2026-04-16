<?php 

//Funcion de conexion a base de datos
function func_conexion($bd_config){
	try {
		$conexion = new PDO('mysql:host='.$bd_config['host'].';dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);

		return $conexion;

	} catch (PDOException $e) {
		return false;
	}
}

$bd_config = array(
		'basedatos' => 'soccer_manager',
		'usuario' => 'root',
		'pass' => '',
		'host' => 'localhost'
	);

 ?>