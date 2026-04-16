<?php 

//Funcion de conexion a base de datos
	function func_conexion($bd_config){
		try {
			$conexion = new PDO('mysql:host='.$bd_config['host'].';dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);

			return $conexion;

		}catch (PDOException $e) {
			return false;
		}
	}

	//Funcion para comprobar si se inicio sesion correctamente y de esta manera no se puede acceder a la carpeta admin por medio de la url
	function comprobarSession(){
		if(!isset($_SESSION['user'])){
			header('Location: ' . RUTA);

			echo $_SESSION['user'];
		}
	}

	//funcion para limpiar los datos
	function limpiarDatos($datos){
		//Eliminar espacios al principio y final del texto
		$datos = trim($datos);
		//Quitar barras y concatenar para evitar inyeccion de codigo
		$datos = stripcslashes($datos);
		//Quitar caracteres especiales apra evitar inyeccion de codigo
		$datos = htmlspecialchars($datos);
		return $datos;
	}

	//FUNCION PARA OBTENER TIPO DE USUARIO
	function login($conexion, $usu, $pass){
		$sentencia = $conexion->prepare("SELECT * FROM doctores WHERE usuario = '$usu' AND clave = '$pass' LIMIT 1");
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	function obtener_usuario($conexion, $correo){
		//Orden de los elementos por fecha descendente
		$sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE correo = '$correo' LIMIT 1");
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	//obtenemos el id que llega por GET, lo limpiamos y lo convertimos a entero
	function id_convertir($id){
		return (int)limpiarDatos($id);
	}

	//FUNCION PARA CONSULTAR SI UN EMAIL YA ESTA REGISTRADO EN LA BASE DE DATOS
	function consultar_existencia_por_email($conexion, $correo){
		$sentencia = $conexion->prepare('SELECT * FROM usuarios WHERE correo = :correo LIMIT 1');
		$sentencia->execute(array(':correo' => $correo));
		$resultado = $sentencia->fetch();
		return $resultado;
	}

	function consultar_existencia_por_email_admin($conexion, $correo){
		$tipo = 2
		;
		$sentencia = $conexion->prepare('SELECT * FROM usuarios WHERE correo = :correo AND tipo = :tipo LIMIT 1');
		$sentencia->execute(array(':correo' => $correo, ':tipo' => $tipo));
		$resultado = $sentencia->fetch();
		return $resultado;
	}

	//FUNCION PARA GENERAR CLAVE RANDOM PARA CAMBIAR CONTRSEÑA
	function randHash($len=32)
	{
		return substr(md5(openssl_random_pseudo_bytes(20)),-$len);
	}

	function reset_pass_verify($conexion, $correo, $key){
		$sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE correo = '$correo' AND resetkey = '$key' LIMIT 1");
		$sentencia->execute();
		return $sentencia->fetchAll();
	}

	include 'functions-set.php';
 ?>