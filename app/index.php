<?php include "conexionPDO.php";
		//include "tabla_prueba.php";

	//permitir acceso controlado - Para no tener acceso de cualquier lado
	header("Access-Control-Allow-Origin: *");

	//En caso de que el metodo no sea post nos saca
	if($_SERVER['REQUEST_METHOD'] !== 'POST'){
		echo json_encode(array('status' => false));
		exit;
	}

	$postdata = file_get_contents("php://input");

	$datos=json_decode($postdata, true);


	switch ($datos['funcion']) {
		case 'getInfo':
			getInfo($datos);
			break;

		case 'login':
			$conexion = func_conexion($bd_config);
			login($datos, $conexion);
			break;

		case 'register':
			$conexion = func_conexion($bd_config);
			register($datos, $conexion);
			break;

		case 'actualizarPerfil':
			$conexion = func_conexion($bd_config);
			actualizarPerfil($datos, $conexion);
			break;

		case 'getInfoUsuario':
			$conexion = func_conexion($bd_config);
			getInfoUsuario($datos, $conexion);
			break;

		case 'getEventos':
			$conexion = func_conexion($bd_config);
			getEventos($conexion);
			break;

		case 'getEquipos':
			$conexion = func_conexion($bd_config);
			getEquipos($conexion);
			break;

		case 'getEquiposBusqueda':
			$conexion = func_conexion($bd_config);
			getEquiposBusqueda($datos, $conexion);
			break;

		case 'getJugadoresBusqueda':
			$conexion = func_conexion($bd_config);
			getJugadoresBusqueda($datos, $conexion);
			break;

		case 'getUsuarios':
			$conexion = func_conexion($bd_config);
			getUsuarios($conexion);
			break;

		case 'getEquiposUsuario':
			$conexion = func_conexion($bd_config);
			getEquiposUsuario($datos, $conexion);
			break;

		case 'getEquiposEvento':
			$conexion = func_conexion($bd_config);
			getEquiposEvento($datos, $conexion);
			break;

		case 'getPartidos':
			$conexion = func_conexion($bd_config);
			getPartidos($datos, $conexion);
			break;

		case 'getOtrosPartidos':
			$conexion = func_conexion($bd_config);
			getOtrosPartidos($datos, $conexion);
			break;

		case 'getId':
			$conexion = func_conexion($bd_config);
			getId($datos, $conexion);
			break;

		case 'getTipoTorneo':
			$conexion = func_conexion($bd_config);
			getTipoTorneo($datos, $conexion);
			break;

		case 'getNotifications':
			$conexion = func_conexion($bd_config);
			getNotifications($conexion);
			break;

		case 'crearLiga':
			$conexion = func_conexion($bd_config);
			crearLiga($datos, $conexion);
			break;

		case 'crearTorneo':
			$conexion = func_conexion($bd_config);
			crearTorneo($datos, $conexion);
			break;

		case 'getInfoTorneo':
			$conexion = func_conexion($bd_config);
			getInfoTorneo($datos, $conexion);
			break;

		case 'getInfoPartido':
			$conexion = func_conexion($bd_config);
			getInfoPartido($datos, $conexion);
			break;

		case 'getGolesTorneo':
			$conexion = func_conexion($bd_config);
			getGolesTorneo($datos, $conexion);
			break;

		case 'getAsistenciasTorneo':
			$conexion = func_conexion($bd_config);
			getAsistenciasTorneo($datos, $conexion);
			break;

		case 'getRojasTorneo':
			$conexion = func_conexion($bd_config);
			getRojasTorneo($datos, $conexion);
			break;

		case 'getAmarillasTorneo':
			$conexion = func_conexion($bd_config);
			getAmarillasTorneo($datos, $conexion);
			break;

		case 'getNoticiasTorneo':
			$conexion = func_conexion($bd_config);
			getNoticiasTorneo($datos, $conexion);
			break;

		case 'getInfoPartidoLibre':
			$conexion = func_conexion($bd_config);
			getInfoPartidoLibre($datos, $conexion);
			break;

		case 'getInfoEquipo':
			$conexion = func_conexion($bd_config);
			getInfoEquipo($datos, $conexion);
			break;

		case 'actualizarResultado':
			$conexion = func_conexion($bd_config);
			actualizarResultado($datos, $conexion);
			break;

		case 'getTabla':
			$conexion = func_conexion($bd_config);
			getTabla($datos, $conexion);
			break;

		case 'getTablaTotal':
			$conexion = func_conexion($bd_config);
			getTablaTotal($datos, $conexion);
			break;

		case 'actualizarTabla':
			$conexion = func_conexion($bd_config);
			actualizarTabla($datos, $conexion);
			break;

		case 'cambiarEquipo':
			$conexion = func_conexion($bd_config);
			cambiarEquipo($datos, $conexion);
			break;

		case 'getPlantilla':
			$conexion = func_conexion($bd_config);
			getPlantilla($datos, $conexion);
			break;

		case 'getPlantillaPorNombre':
			$conexion = func_conexion($bd_config);
			getPlantillaPorNombre($datos, $conexion);
			break;

		case 'guardarPlantillaPartido':
			$conexion = func_conexion($bd_config);
			guardarPlantillaPartido($datos, $conexion);
			break;

		case 'agregarEventoPartido':
			$conexion = func_conexion($bd_config);
			agregarEventoPartido($datos, $conexion);
			break;

		case 'getEventosPartido':
			$conexion = func_conexion($bd_config);
			getEventosPartido($datos, $conexion);
			break;

		case 'reiniciarPartido':
			$conexion = func_conexion($bd_config);
			reiniciarPartido($datos, $conexion);
			break;

		case 'cambiarEquipoPartido':
			$conexion = func_conexion($bd_config);
			cambiarEquipoPartido($datos, $conexion);
			break;

		case 'borrarEventoPartido':
			$conexion = func_conexion($bd_config);
			borrarEventoPartido($datos, $conexion);
			break;

		case 'crearEquipo':
			$conexion = func_conexion($bd_config);
			crearEquipo($datos, $conexion);
			break;

		case 'guardarPartidoLibre':
			$conexion = func_conexion($bd_config);
			guardarPartidoLibre($datos, $conexion);
			break;

		case 'getPartidosLibres':
			$conexion = func_conexion($bd_config);
			getPartidosLibres($datos, $conexion);
			break;

		case 'agregarPartido':
			$conexion = func_conexion($bd_config);
			agregarPartido($datos, $conexion);
			break;

		case 'eliminarPartido':
			$conexion = func_conexion($bd_config);
			eliminarPartido($datos, $conexion);
			break;

		case 'getNotificaciones':
			$conexion = func_conexion($bd_config);
			getNotificaciones($datos, $conexion);
			break;

		case 'invitacionEquipo':
			$conexion = func_conexion($bd_config);
			invitacionEquipo($datos, $conexion);
			break;

		case 'aceptarInvitacion':
			$conexion = func_conexion($bd_config);
			aceptarInvitacion($datos, $conexion);
			break;

		case 'guardarNotas':
			$conexion = func_conexion($bd_config);
			guardarNotas($datos, $conexion);
			break;

		case 'actualizarFecha':
			$conexion = func_conexion($bd_config);
			actualizarFecha($datos, $conexion);
			break;

		case 'actualizarLugar':
			$conexion = func_conexion($bd_config);
			actualizarLugar($datos, $conexion);
			break;

		
		default:
			# code...
			break;
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


	function getInfo($datos){
		$query="SELECT * FROM usuarios WHERE id_usuario='{$datos['id_usuario']}'";
		execQuery($query);
	}

	function getId($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM eventos WHERE id_evento='{$datos['idEvento']}' LIMIT 1");
		$sentencia->execute();
		$evento = $sentencia->fetchAll();

		imprime($evento);
	}

	function getTipoTorneo($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM eventos WHERE id_evento='{$datos['idEvento']}' LIMIT 1");
		$sentencia->execute();
		$evento = $sentencia->fetchAll();

		imprime($evento);
	}

	function login($datos, $conexion){
		$pass = limpiarDatos("{$datos['datos']['pass']}");

		$sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE (correo='{$datos['datos']['name']}' OR usuario='{$datos['datos']['name']}') LIMIT 1");
		$sentencia->execute();
		$usuario = $sentencia->fetchAll();
		
		if(!empty($usuario)){
			$pass_db = $usuario[0]['password'];

			if(password_verify($pass, $pass_db)){
				imprime($usuario, "acceder");
			}else{
				imprime("denegar");
			}

		}else{
			imprime("denegar");
		}
	}

	function register($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE correo='{$datos['datos']['correo']}'");
		$sentencia->execute();
		$usuario = $sentencia->fetchAll(); 

		$sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE usuario='{$datos['datos']['usu']}'");
		$sentencia->execute();
		$username = $sentencia->fetchAll();
		
		if(!empty($usuario)){
			imprime("correo_existente");
		}else{

			//PREGUTNAR SI YA EXISTE EL NOMBRE DE USUARIO
			if(!empty($username)){
				imprime("usuario_existente");
			}else{
				$guardarUsuario = $conexion->prepare('INSERT INTO usuarios (usuario, cedula, nombre, apellido, correo, password, lugar_nacimiento, fecha_nacimiento, estatura, peso)
				VALUES(:usuario, :cedula, :nombre, :apellido, :correo, :password, :lugar_nacimiento, :fecha_nacimiento, :estatura, :peso)');

				//$fecha = "{$datos['datos']['year']}-{$datos['datos']['mes']}-{$datos['datos']['dia']}";

				$pass = limpiarDatos("{$datos['datos']['pass']}");
				$pass_encrypted = password_hash($pass, PASSWORD_DEFAULT, array("cost" =>12));

				$guardarUsuario->execute(array(
					':usuario' => "{$datos['datos']['usu']}",
					':cedula' => "000",
					':nombre' => "{$datos['datos']['nom']}",
					':apellido' => "{$datos['datos']['ape']}",
					':correo' => "{$datos['datos']['correo']}",
					':password' => $pass_encrypted,
					':lugar_nacimiento' => "{$datos['datos']['ciudad']}",
					':fecha_nacimiento' => null,
					':estatura' => "0",
					':peso' => "0"
				));

				imprime("registrado");
			}

		}
	}

	function actualizarPerfil($datos, $conexion){
		$statement = $conexion->prepare(
			'UPDATE usuarios SET nombre = :nombre, apellido = :apellido, posicion = :posicion WHERE id_usuario = :id_usuario'
			);

			$statement->execute(array(
				':nombre' => "{$datos['datos']['nombre']}",
				':apellido' => "{$datos['datos']['apellido']}",
				':posicion' => "{$datos['datos']['posicion']}",
				':id_usuario' => "{$datos['datos']['idUsuario']}"
			));

			imprime("registrado");
	}

	function actualizarFecha($datos, $conexion){
		$statement = $conexion->prepare(
			'UPDATE partidos SET fecha = :fecha WHERE id_partido = :id_partido'
			);

			$statement->execute(array(
				':fecha' => "{$datos['fecha']}",
				':id_partido' => "{$datos['id_partido']}"
			));

			imprime("registrado");
	}

	function actualizarLugar($datos, $conexion){
		$statement = $conexion->prepare(
			'UPDATE partidos SET lugar = :lugar WHERE id_partido = :id_partido'
			);

			$statement->execute(array(
				':lugar' => "{$datos['lugar']}",
				':id_partido' => "{$datos['id_partido']}"
			));

			imprime("registrado");
	}

	function crearEquipo($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM equipos WHERE nombre='{$datos['datos']['nom']}'");
		$sentencia->execute();
		$equipo = $sentencia->fetchAll(); 
		
		if(!empty($equipo)){
			imprime("equipo_existente");
		}else{
			$guardarEquipo = $conexion->prepare('INSERT INTO equipos (id_creador, id_capitan, nombre, descripcion)
				VALUES(:id_creador, :id_capitan, :nombre, :descripcion)');

				$guardarEquipo->execute(array(
					':id_creador' => "{$datos['datos']['idUsuario']}",
					':id_capitan' => "{$datos['datos']['idUsuario']}",
					':nombre' => "{$datos['datos']['nom']}",
					':descripcion' => "{$datos['datos']['desc']}"
				));

				/*INSTRUCCION PARA INCLUIR AL CREADOR COMO JUGADOR DEL EQUIPO*/
				$sentencia2 = $conexion->prepare("SELECT id_equipo FROM equipos WHERE nombre='{$datos['datos']['nom']}'");
				$sentencia2->execute();
				$id_equipo = $sentencia2->fetchAll();

				$guardarJugador = $conexion->prepare('INSERT INTO usuarios_equipos (id_equipo, id_usuario)
				VALUES(:id_equipo, :id_usuario)');

				$guardarJugador->execute(array(
					':id_equipo' => $id_equipo[0][0],
					':id_usuario' => "{$datos['datos']['idUsuario']}"
				));				 

				imprime("registrado");
		}
	}

	function getPlantilla($datos, $conexion){
		/*$sentencia = $conexion->prepare("SELECT id_usuario FROM usuarios 
										INNER JOIN usuarios_equipos 
										ON usuarios.id_usuario = usuarios_equipos.id_usuario 
										WHERE usuarios_equipos.id_equipo = 106");*/
										//imprime('llega');
		$sentencia = $conexion->prepare("SELECT usuarios.id_usuario, usuarios.correo, usuarios.nombre, usuarios.apellido, usuarios.usuario  FROM usuarios 
										INNER JOIN usuarios_equipos 
										ON usuarios_equipos.id_usuario = usuarios.id_usuario
										WHERE usuarios_equipos.id_equipo = '{$datos['id_equipo']}'");
		
		$sentencia->execute();
		$jugadores = $sentencia->fetchAll();

		imprime($jugadores);
	}

	function getPlantillaPorNombre($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT usuarios.id_usuario, usuarios.correo, usuarios.nombre, usuarios.apellido FROM usuarios 
										INNER JOIN usuarios_equipos 
										ON usuarios_equipos.id_usuario = usuarios.id_usuario
										INNER JOIN equipos
										ON usuarios_equipos.id_equipo = equipos.id_equipo
										WHERE equipos.nombre = '{$datos['nombre']}'");
		
		$sentencia->execute();
		$jugadores = $sentencia->fetchAll();

		imprime($jugadores);
	}

	function cambiarEquipoPartido($datos, $conexion){

		if($datos['numero_equipo']==1){
			$statement = $conexion->prepare(
			'UPDATE partidos SET equipo_uno = :equipo_uno WHERE id_partido = :id_partido'
			);

			$statement->execute(array(
				':equipo_uno' => "{$datos['nombre_equipo']}",
				':id_partido' => "{$datos['id_partido']}"
			));

			imprime("datos_agregados");
		}else if($datos['numero_equipo']==2){
			$statement = $conexion->prepare(
			'UPDATE partidos SET equipo_dos = :equipo_dos WHERE id_partido = :id_partido'
			);

			$statement->execute(array(
				':equipo_dos' => "{$datos['nombre_equipo']}",
				':id_partido' => "{$datos['id_partido']}"
			));

			imprime("datos_agregados");
		}
	}

	function guardarPlantillaPartido($datos, $conexion){

		if($datos['numeroEquipo'] == '1'){
			$statement = $conexion->prepare(
			'UPDATE partidos SET plantilla_uno = :plantilla WHERE id_partido = :id'
			);

			$statement->execute(array(
				':plantilla' => "{$datos['plantilla']}",
				':id' => "{$datos['idPartido']}"
			));
		}else{
			$statement = $conexion->prepare(
			'UPDATE partidos SET plantilla_dos = :plantilla WHERE id_partido = :id'
			);

			$statement->execute(array(
				':plantilla' => "{$datos['plantilla']}",
				':id' => "{$datos['idPartido']}"
			));
		}

		

			imprime("datos_agregados");
	}

	function guardarNotas($datos, $conexion){
		$statement = $conexion->prepare(
		'UPDATE partidos SET notas = :notas WHERE id_partido = :id'
		);

		$statement->execute(array(
			':notas' => "{$datos['datos']['notas']}",
			':id' => "{$datos['idPartido']}"
		));

		imprime("datos_agregados");
	}


	function agregarEventoPartido($datos, $conexion){
		//AGREGAR EL EVENTO A LA TABLA DE EVENTOS DEL PARTIDO
		$guardarEventoPartido = $conexion->prepare('INSERT INTO eventosdelpartido(id_partido, id_jugador, tipo, jugador, equipo)
		VALUES(:id_partido, :id_jugador, :tipo, :jugador, :equipo)');

		$guardarEventoPartido->execute(array(
			':id_partido' => "{$datos['idPartido']}",
			':id_jugador' => "{$datos['idUsuario']}",
			':tipo' => "{$datos['evento']}",
			':jugador' => "{$datos['nombreUsuario']}",
			':equipo' => "{$datos['equipo']}"
		));

		//CONSULTAR SI YA EXISTE UN REGISTRO DEL JUGADOR PARA ACTUALIZAR LA TABLA (tabla_eventos) Y NO INSERTAR UN NUEVO DATO
		$sentencia = $conexion->prepare("SELECT * FROM tabla_eventos WHERE id_jugador='{$datos['idUsuario']}' AND id_evento ='{$datos['idEvento']}' LIMIT 1");
		$sentencia->execute();
		$estadistica = $sentencia->fetchAll();

		//SI YA EXISTE UN REGISTRO SE ACTUALIZA
		if($estadistica){
			if($datos['evento'] == 'GOL'){
				$statement3 = $conexion->prepare('UPDATE tabla_eventos SET goles = :goles WHERE id_tabla_eventos = :id_tabla_eventos');
				$statement3->execute(array(':goles' => $estadistica[0]['goles']+1,':id_tabla_eventos' => $estadistica[0]['id_tabla_eventos']));
			}

			if($datos['evento'] == 'AST'){
				$statement3 = $conexion->prepare('UPDATE tabla_eventos SET asistencias = :asistencias WHERE id_tabla_eventos = :id_tabla_eventos');
				$statement3->execute(array(':asistencias' => $estadistica[0]['asistencias']+1,':id_tabla_eventos' => $estadistica[0]['id_tabla_eventos']));
			}

			if($datos['evento'] == 'ROJA'){
				$statement3 = $conexion->prepare('UPDATE tabla_eventos SET rojas = :rojas WHERE id_tabla_eventos = :id_tabla_eventos');
				$statement3->execute(array(':rojas' => $estadistica[0]['rojas']+1,':id_tabla_eventos' => $estadistica[0]['id_tabla_eventos']));
			}

			if($datos['evento'] == 'AMR'){
				$statement3 = $conexion->prepare('UPDATE tabla_eventos SET amarillas = :amarillas WHERE id_tabla_eventos = :id_tabla_eventos');
				$statement3->execute(array(':amarillas' => $estadistica[0]['amarillas']+1,':id_tabla_eventos' => $estadistica[0]['id_tabla_eventos']));
			}

		}else{
			if($datos['evento'] == 'GOL'){
			$guardarTablaEvento = $conexion->prepare('INSERT INTO tabla_eventos(id_evento, id_partido, id_jugador, jugador, equipo, goles)
			VALUES(:id_evento, :id_partido, :id_jugador, :jugador, :equipo, :goles)');

			$guardarTablaEvento->execute(array(
				':id_evento' => "{$datos['idEvento']}",
				':id_partido' => "{$datos['idPartido']}",
				':id_jugador' => "{$datos['idUsuario']}",
				':jugador' => "{$datos['nombreUsuario']}",
				':equipo' => "{$datos['equipo']}",
				':goles' => 1
			));
			}

			if($datos['evento'] == 'AST'){
			$guardarTablaEvento = $conexion->prepare('INSERT INTO tabla_eventos(id_evento, id_partido, id_jugador, jugador, equipo, asistencias)
			VALUES(:id_evento, :id_partido, :id_jugador, :jugador, :equipo, :asistencias)');

			$guardarTablaEvento->execute(array(
				':id_evento' => "{$datos['idEvento']}",
				':id_partido' => "{$datos['idPartido']}",
				':id_jugador' => "{$datos['idUsuario']}",
				':jugador' => "{$datos['nombreUsuario']}",
				':equipo' => "{$datos['equipo']}",
				':asistencias' => 1
			));
			}

			if($datos['evento'] == 'ROJA'){
			$guardarTablaEvento = $conexion->prepare('INSERT INTO tabla_eventos(id_evento, id_partido, id_jugador, jugador, equipo, rojas)
			VALUES(:id_evento, :id_partido, :id_jugador, :jugador, :equipo, :rojas)');

			$guardarTablaEvento->execute(array(
				':id_evento' => "{$datos['idEvento']}",
				':id_partido' => "{$datos['idPartido']}",
				':id_jugador' => "{$datos['idUsuario']}",
				':jugador' => "{$datos['nombreUsuario']}",
				':equipo' => "{$datos['equipo']}",
				':rojas' => 1
			));
			}

			if($datos['evento'] == 'AMR'){
			$guardarTablaEvento = $conexion->prepare('INSERT INTO tabla_eventos(id_evento, id_partido, id_jugador, jugador, equipo, amarillas)
			VALUES(:id_evento, :id_partido, :id_jugador, :jugador, :equipo, :amarillas)');

			$guardarTablaEvento->execute(array(
				':id_evento' => "{$datos['idEvento']}",
				':id_partido' => "{$datos['idPartido']}",
				':id_jugador' => "{$datos['idUsuario']}",
				':jugador' => "{$datos['nombreUsuario']}",
				':equipo' => "{$datos['equipo']}",
				':amarillas' => 1
			));
			}
		}
		

		imprime("datos_agregados");
	}

	function borrarEventoPartido($datos, $conexion){

		//CONSULTAR EL REGISTRO DE LA TABLA
		$sentencia2 = $conexion->prepare("SELECT * FROM tabla_eventos WHERE id_jugador='{$datos['id_jugador']}' AND id_evento ='{$datos['id_evento']}' LIMIT 1");
		$sentencia2->execute();
		$estadistica = $sentencia2->fetchAll();

		//RESTAR EN LA TABLA EL EVENTO
		if($datos['evento'] == 'GOL'){
			imprime('YES');
			$statement3 = $conexion->prepare('UPDATE tabla_eventos SET goles = :goles WHERE id_tabla_eventos = :id_tabla_eventos');
			$statement3->execute(array(':goles' => $estadistica[0]['goles']-1,':id_tabla_eventos' => $estadistica[0]['id_tabla_eventos']));
		}

		if($datos['evento'] == 'AST'){
			$statement3 = $conexion->prepare('UPDATE tabla_eventos SET asistencias = :asistencias WHERE id_tabla_eventos = :id_tabla_eventos');
			$statement3->execute(array(':asistencias' => $estadistica[0]['asistencias']-1,':id_tabla_eventos' => $estadistica[0]['id_tabla_eventos']));
		}

		if($datos['evento'] == 'ROJA'){
			$statement3 = $conexion->prepare('UPDATE tabla_eventos SET rojas = :rojas WHERE id_tabla_eventos = :id_tabla_eventos');
			$statement3->execute(array(':rojas' => $estadistica[0]['rojas']-1,':id_tabla_eventos' => $estadistica[0]['id_tabla_eventos']));
		}

		if($datos['evento'] == 'AMR'){
			$statement3 = $conexion->prepare('UPDATE tabla_eventos SET amarillas = :amarillas WHERE id_tabla_eventos = :id_tabla_eventos');
			$statement3->execute(array(':amarillas' => $estadistica[0]['amarillas']-1,':id_tabla_eventos' => $estadistica[0]['id_tabla_eventos']));
		}

		$sentencia = $conexion->prepare("DELETE FROM eventosdelpartido WHERE id_eventosdelpartido = '{$datos['id']}'");
		$sentencia->execute();
		return $sentencia->fetchAll();

		imprime('Evento borrado');
	}

	function getEventosPartido($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM eventosdelpartido WHERE id_partido='{$datos['idPartido']}'");
		$sentencia->execute();
		$eventos = $sentencia->fetchAll();

		imprime($eventos);
	}

	function agregarPartido($datos, $conexion){
		$nuevoPartido = $conexion->prepare('INSERT INTO partidos(id_evento, equipo_uno, equipo_dos, etapa)
		VALUES(:id_evento, :equipo_uno, :equipo_dos, :etapa)');

		//$fecha = "{$datos['datos']['year']}-{$datos['datos']['mes']}-{$datos['datos']['dia']}";

		$nuevoPartido->execute(array(
			':id_evento' => "{$datos['id_evento']}",
			':equipo_uno' => '',
			':equipo_dos' => '',
			':etapa' => "{$datos['etapa']}"
		));

		imprime("datos_agregados");
	}


	function actualizarResultado($datos, $conexion){

		if(isset($datos['datos']['r1']) && isset($datos['datos']['r2'])){

			$statement = $conexion->prepare(
			'UPDATE partidos SET r1 = :r1, r2 = :r2 WHERE id_partido = :id'
			);

			$statement->execute(array(
				':r1' => "{$datos['datos']['r1']}",
				':r2' => "{$datos['datos']['r2']}",
				':id' => "{$datos['datos']['id_partido']}"
			));

			actualizarTabla($datos, $conexion);
			//imprime("resultado_uno_actualizado");

		}else if(isset($datos['datos']['r1'])){

			$statement = $conexion->prepare(
			'UPDATE partidos SET r1 = :r1 WHERE id_partido = :id'
			);

			$statement->execute(array(
				':r1' => "{$datos['datos']['r1']}",
				':id' => "{$datos['datos']['id_partido']}"
			));

			//imprime("resultado_uno_actualizado");
			actualizarTabla($datos, $conexion);

		}else if(isset($datos['datos']['r2'])){

			$statement = $conexion->prepare(
			'UPDATE partidos SET r2 = :r2 WHERE id_partido = :id'
			);

			$statement->execute(array(
				':r2' => "{$datos['datos']['r2']}",
				':id' => "{$datos['datos']['id_partido']}"
			));


			//imprime("resultado_uno_actualizado");
			actualizarTabla($datos, $conexion);

		}else{
			imprime("ningun_cambio");
			//actualizarTabla($datos, $conexion);
		}
		
	}

	function reiniciarPartido($datos, $conexion){
		$statement = $conexion->prepare(
			'UPDATE partidos SET r1 = :r1, r2 = :r2 WHERE id_partido = :id'
			);

			$statement->execute(array(
				':r1' => null,
				':r2' => null,
				':id' => "{$datos['id_partido']}"
			));

			imprime("partido reiniciado");
	}

	function cambiarEquipo($datos, $conexion){

		$sentencia = $conexion->prepare("SELECT * FROM eventos_equipos WHERE id_equipo = '{$datos['id_equipo_nuevo']}' AND id_evento = '{$datos['id_evento']}'");
		$sentencia->execute();
		$equipo = $sentencia->fetchAll();

		if(!empty($equipo)){
			imprime("existe");
		}else{

			$statement = $conexion->prepare(
			'UPDATE eventos_equipos SET id_equipo = :id_equipo_nuevo WHERE id_evento = :id_evento AND id_equipo = :id_equipo LIMIT 1'
			);

			$statement->execute(array(
				':id_equipo_nuevo' => "{$datos['id_equipo_nuevo']}",
				':id_evento' => "{$datos['id_evento']}",
				':id_equipo' => "{$datos['id_equipo']}"
			));
			cambiarPartidosEvento($datos, $conexion);
			cambiarTablaDeLiga($datos, $conexion);
			imprime('actualizado');
		}
	}

	function cambiarPartidosEvento($datos, $conexion){
		$statement = $conexion->prepare(
			'UPDATE partidos SET equipo_uno = :equipo_uno_nuevo WHERE id_evento = :id_evento AND equipo_uno = :equipo_uno'
			);

			$statement->execute(array(
				':equipo_uno_nuevo' => "{$datos['nombre_equipo_nuevo']}",
				':id_evento' => "{$datos['id_evento']}",
				':equipo_uno' => "{$datos['nombre_equipo']}"
			));

		$statement2 = $conexion->prepare(
			'UPDATE partidos SET equipo_dos = :equipo_uno_nuevo WHERE id_evento = :id_evento AND equipo_dos = :equipo_uno'
			);

			$statement2->execute(array(
				':equipo_uno_nuevo' => "{$datos['nombre_equipo_nuevo']}",
				':id_evento' => "{$datos['id_evento']}",
				':equipo_uno' => "{$datos['nombre_equipo']}"
			));
	}

	function getTabla($datos, $conexion){
		//imprime('yes');
		$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento = '{$datos['id_evento']}' AND grupo = '{$datos['grupo']}' ORDER BY pts DESC,dif DESC");
		
		$sentencia->execute();
		$tabla = $sentencia->fetchAll();

		imprime($tabla);
	}

	function getTablaTotal($datos, $conexion){
		//imprime('yes');
		$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento = '{$datos['id_evento']}' ORDER BY grupo");
		
		$sentencia->execute();
		$tabla = $sentencia->fetchAll();

		imprime($tabla);
	}

	function cambiarTablaDeLiga($datos, $conexion){
		$statement = $conexion->prepare(
			'UPDATE tabla_liga SET equipo = :equipo_nuevo WHERE id_evento = :id_evento AND equipo = :equipo'
			);

			$statement->execute(array(
				':equipo_nuevo' => "{$datos['nombre_equipo_nuevo']}",
				':id_evento' => "{$datos['id_evento']}",
				':equipo' => "{$datos['nombre_equipo']}"
			));
	}

	function crearTorneo($datos, $conexion){
		//imprime("entra");

		$sentencia = $conexion->prepare("SELECT * FROM eventos WHERE nombre='{$datos['datos']['nom']}'");
		$sentencia->execute();
		$evento = $sentencia->fetchAll(); 

		if(!empty($evento)){
			imprime("denegar");
		}else{

		$guardarUsuario = $conexion->prepare('INSERT INTO eventos (id_creador, nombre, lugar, tipo, numero_equipos)
			VALUES(:id_creador, :nombre, :lugar, :tipo, :numero_equipos)');

			$guardarUsuario->execute(array(
				':id_creador' => "1",
				':nombre' => "{$datos['datos']['nom']}",
				':lugar' => "{$datos['datos']['lug']}",
				':tipo' => "{$datos['datos']['tipo_torneo']}",
				':numero_equipos' => "{$datos['datos']['numero_equipos']}"
			));


			$sentencia2 = $conexion->prepare("SELECT id_evento FROM eventos WHERE nombre='{$datos['datos']['nom']}'");
			$sentencia2->execute();
			$id_evento = $sentencia2->fetchAll();

			$numero_equipos = "{$datos['datos']['numero_equipos']}";

			//CREAR LA TABLA DE LIGA
			//crearTabla($numero_equipos, $id_evento $conexion);

			//SE GENERAN LOS PARTIDOS
			generarPartidos($numero_equipos, $id_evento[0][0], $conexion);

			//imprime("registrado");
			}
	}

	function generarPartidos($numero_equipos, $id_evento, $conexion){

		//$numero_equipos = 4;
		if($numero_equipos == 4){
			$jornada = array(3,2,1,1,2,3);
		}

		if($numero_equipos == 6){
			$jornada = array(2,4,5,3,1,5,3,1,4,1,2,3,4,2,5);
		}

		/*if($numero_equipos == 12){
			$jornada = array(2,9,4,11,8,3,1,7,10,5,6,5,11,7,4,10,8,3,6,1,9,7,3,11,6,4,10,2,8,1 //
							,9,6,1,10,5,8,3,2,2,8,6,1,4,10,5,5,3,9,1,7,10,9,4,7,2,11,2,5,11,7 //8+12
							,11,6,8,9,3,4);
		}*/

		if($numero_equipos == 12){
			$jornada = array(1,11,10,9,8,7,6,5,4,3,2,6,11,5,10,4,9,3,8,2,7,5,10,4,9,3,8,2,7,1 //
							,4,9,3,8,2,7,1,6,3,8,2,7,1,6,11,2,7,1,6,11,5,1,6,11,5,10,11,5,10,4 //8+12
							,10,4,9,9,3,8);
		}

		$arreglo_equipos = array();

		for ($i=0; $i < $numero_equipos; $i++) {
			$num = $i+1;
			array_push($arreglo_equipos, 'Equipo '. $num);
		}

		//CONTADOR PARA HACER TRES CICLOS QUE ES EL NUMERO DE PARTIDOS A LA MITAD
		$contador = 1;

		//CONTADOR PARA PODER ITERAR Y AGREGAR LA JORNADA CORRECTA DEPENDIENDO DEL AREGLO JORNADA
		$contador_jornada = 0;

		$fechas = array();

		for ($i=0; $i < count($arreglo_equipos); $i++) {
			
			for ($j=$contador; $j < count($arreglo_equipos); $j++) {
				//echo $uno[$i] . "-" . $uno[$j] . '<br>';
				array_push($fechas, $arreglo_equipos[$i] . " vs " . $arreglo_equipos[$j]);

				$guardarPartido = $conexion->prepare('INSERT INTO partidos (id_evento, equipo_uno, equipo_dos, etapa, jornada, grupo)
				VALUES(:id_evento, :equipo_uno, :equipo_dos, :etapa, :jornada, :grupo)');

				//$fecha = "{$datos['datos']['year']}-{$datos['datos']['mes']}-{$datos['datos']['dia']}";

				$guardarPartido->execute(array(
					':id_evento' => $id_evento,
					':equipo_uno' => $arreglo_equipos[$i],
					':equipo_dos' => $arreglo_equipos[$j],
					':etapa' => 'Grupos',
					':jornada' => $jornada[$contador_jornada],
					':grupo' => 'A'
				));

				$contador_jornada++;

			}

			$contador++;		
		}

		//GUARDAR LA JORNADA

		imprime("registrado");
	}

	function generarPartidos4x4(){

	}


	//FUNCION PARA CREAR LA TABLA DE LIGA
	function crearTabla($num_equipos, $id_evento, $conexion){
		$guardarPartido = $conexion->prepare('INSERT INTO tabla_liga (id_evento, equipo_uno, equipo_dos, resultado, jornada)
		VALUES(:id_evento, :equipo_uno, :equipo_dos, :resultado, :jornada)');

		//$fecha = "{$datos['datos']['year']}-{$datos['datos']['mes']}-{$datos['datos']['dia']}";

		$guardarPartido->execute(array(
			':id_evento' => $id_evento,
			':equipo_uno' => $arreglo_equipos[$i],
			':equipo_dos' => $arreglo_equipos[$j],
			':resultado' => "0-0",
			':jornada' => $jornada[$contador_jornada]
		));
	}

	function getInfoTorneo($datos, $conexion){
		//OBTENGO EL EVENTO CON AYUDA DE SU NOMBRE
		//$sentencia = $conexion->prepare("SELECT * FROM eventos WHERE nombre = '{$datos['nomEvent']['nombreEvento']}' LIMIT 1");
		$sentencia = $conexion->prepare("SELECT * FROM eventos WHERE id_evento = '{$datos['id']['id_evento']}' LIMIT 1");
		$sentencia->execute();
		$evento = $sentencia->fetchAll();

		//OBTENGO EL ID DEL EVENTO
		$id = $evento[0]['id_evento'];

		//OBTENGO LOS PARTIDOS RELACIONADOS A ESE ID
		$sentencia2 = $conexion->prepare("SELECT * FROM partidos WHERE id_evento = $id");
		$sentencia2->execute();
		$partidos = $sentencia2->fetchAll();

		if($partidos){
			imprime($partidos);
		}
		//imprime('');
	}

	function crearLiga($datos, $conexion){

		$numero_equipos = 5;
		$arreglo_equipos = array();

		for ($i=0; $i < $numero_equipos; $i++) { 
			$num = $i+1;
			array_push($arreglo_equipos, 'Equipo'. $num);
		}

		$contador = 1;

		$fechas = array();

		for ($i=0; $i < count($arreglo_equipos); $i++) { 
			
			for ($j=$contador; $j < count($arreglo_equipos); $j++) { 
				//echo $uno[$i] . "-" . $uno[$j] . '<br>';
				array_push($fechas, $arreglo_equipos[$i] . " vs " . $arreglo_equipos[$j]);

				$guardarPartido = $conexion->prepare('INSERT INTO partidos (id_evento, equipo_uno, equipo_dos, resultado)
				VALUES(:id_evento, :equipo_uno, :equipo_dos, :resultado)');

				//$fecha = "{$datos['datos']['year']}-{$datos['datos']['mes']}-{$datos['datos']['dia']}";

				$guardarPartido->execute(array(
					':id_evento' => "1",
					':equipo_uno' => $arreglo_equipos[$i],
					':equipo_dos' => $arreglo_equipos[$j],
					':resultado' => "0-0"
				));
			}
			$contador++;		
		}

		imprime("registrado");
	}

	

	function getEquipos($conexion){
		//imprime('yes');
		$sentencia = $conexion->prepare("SELECT * FROM equipos 
			WHERE id_equipo >= 100 
			LIMIT 100");
		$sentencia->execute();
		$eventos = $sentencia->fetchAll();

		imprime($eventos);
	}

	function getEquiposBusqueda($datos, $conexion){
		//imprime('yes');
		$sentencia = $conexion->prepare("SELECT * FROM equipos 
			WHERE nombre LIKE '%{$datos['querytext']}%' 
			AND id_equipo >= 100");
		$sentencia->execute();
		$equipos = $sentencia->fetchAll();

		imprime($equipos);
	}

	function getJugadoresBusqueda($datos, $conexion){
		//imprime('yes');

		/*$comprobarQueNoEsteEnElEquipo = $conexion->prepare("SELECT * FROM usuarios_equipos 
			WHERE id_equipo = '{$datos['idEquipo']}' LIMIT 100");
		$comprobarQueNoEsteEnElEquipo->execute();*/

		$sentencia = $conexion->prepare("SELECT * FROM usuarios 
		WHERE (nombre LIKE '%{$datos['querytext']}%') OR (apellido LIKE '%{$datos['querytext']}%') OR (correo LIKE '%{$datos['querytext']}%') LIMIT 100");
		$sentencia->execute();
		$jugadores = $sentencia->fetchAll();

		imprime($jugadores);
	}

	function getUsuarios($conexion){
		//imprime('yes');
		$sentencia = $conexion->prepare("SELECT * FROM usuarios 
			WHERE id_usuario >= 1 
			LIMIT 200");
		$sentencia->execute();
		$usuarios = $sentencia->fetchAll();

		imprime($usuarios);
	}

	function getEquiposUsuario($datos, $conexion){
		//imprime('yes');
		/*$sentencia = $conexion->prepare("SELECT * FROM equipos 
			WHERE id_creador = '{$datos['idUsuario']}'");
		$sentencia->execute();
		$equipos = $sentencia->fetchAll();*/

		$sentencia = $conexion->prepare("SELECT * FROM equipos
			INNER JOIN usuarios_equipos
			ON equipos.id_equipo = usuarios_equipos.id_equipo
			WHERE id_usuario = '{$datos['idUsuario']}'");
		$sentencia->execute();
		$equipos = $sentencia->fetchAll();

		imprime($equipos);
	}

	function getEquiposEvento($datos, $conexion){
		//imprime('yes');
		$sentencia = $conexion->prepare("SELECT equipos.id_equipo, equipos.id_creador, equipos.id_capitan, 
										equipos.nombre, equipos.descripcion, equipos.imagen, eventos.numero_equipos FROM equipos 
										INNER JOIN eventos_equipos 
										ON equipos.id_equipo = eventos_equipos.id_equipo 
										INNER JOIN eventos ON eventos_equipos.id_evento = eventos.id_evento
										WHERE eventos.id_evento = '{$datos['id_evento']}'");
		
		$sentencia->execute();
		$equipos = $sentencia->fetchAll();

		imprime($equipos);
	}

	function getEventos($conexion){
		$sentencia = $conexion->prepare("SELECT * FROM eventos WHERE id_evento != 57 LIMIT 30");
		$sentencia->execute();
		$eventos = $sentencia->fetchAll();

		imprime($eventos);
	}

	function getPartidos($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_evento = '{$datos['idEvento']}' AND etapa = 'Grupos' ORDER BY jornada");
		$sentencia->execute();
		$partidos = $sentencia->fetchAll();

		imprime($partidos);
	}

	function eliminarPartido($datos, $conexion){
		$sentencia = $conexion->prepare("DELETE FROM partidos WHERE id_partido = '{$datos['id_partido']}'");
		$sentencia->execute();
		return $sentencia->fetchAll();

		imprime('Evento borrado');
	}

	function getOtrosPartidos($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_evento = '{$datos['idEvento']}' AND etapa != 'Grupos' ORDER BY jornada");
		$sentencia->execute();
		$partidos = $sentencia->fetchAll();

		imprime($partidos);
	}

	function getInfoUsuario($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = '{$datos['idUsuario']}'");
		$sentencia->execute();
		$usuario = $sentencia->fetchAll();

		imprime($usuario);
	}

	function getInfoPartido($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_partido = '{$datos['idPartido']}' LIMIT 1");
		$sentencia->execute();
		$partido = $sentencia->fetchAll();

		imprime($partido);
	}

	function getInfoPartidoLibre($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM partidos_libres WHERE id_partido_libre = '{$datos['id_partido_libre']}' LIMIT 1");
		$sentencia->execute();
		$partido = $sentencia->fetchAll();

		imprime($partido);
	}

	function getInfoEquipo($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM equipos WHERE id_equipo = '{$datos['idEquipo']}' LIMIT 1");
		$sentencia->execute();
		$equipo = $sentencia->fetchAll();

		imprime($equipo);
	}

	function getGolesTorneo($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM tabla_eventos WHERE id_evento = '{$datos['idEvento']}' AND goles > 0 ORDER BY goles DESC LIMIT 5");
		$sentencia->execute();
		$goles = $sentencia->fetchAll();

		imprime($goles);
	}

	function getAsistenciasTorneo($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM tabla_eventos WHERE id_evento = '{$datos['idEvento']}' AND asistencias > 0 ORDER BY asistencias DESC LIMIT 5");
		$sentencia->execute();
		$asistencias = $sentencia->fetchAll();

		imprime($asistencias);
	}

	function getRojasTorneo($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM tabla_eventos WHERE id_evento = '{$datos['idEvento']}' AND rojas > 0 ORDER BY rojas DESC LIMIT 5");
		$sentencia->execute();
		$rojas = $sentencia->fetchAll();

		imprime($rojas);
	}

	function getAmarillasTorneo($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM tabla_eventos WHERE id_evento = '{$datos['idEvento']}' AND amarillas > 0 ORDER BY amarillas DESC LIMIT 5");
		$sentencia->execute();
		$amarillas = $sentencia->fetchAll();

		imprime($amarillas);
	}

	function getNoticiasTorneo($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM noticias WHERE id_evento = '{$datos['idEvento']}' ORDER BY fecha DESC LIMIT 10");
		$sentencia->execute();
		$noticias = $sentencia->fetchAll();

		imprime($noticias);
	}


	function getNotifications($conexion){
		$sentencia = $conexion->prepare("SELECT * FROM notificaciones");
		$sentencia->execute();
		$notificaciones = $sentencia->fetchAll();

		imprime($notificaciones);
	}

	function invitacionEquipo($datos, $conexion){
		//COMPROBAR SI YA PERTENECE AL EQUIPO
		$perteneceAEquipo = $conexion->prepare("SELECT * FROM usuarios_equipos WHERE id_equipo = '{$datos['idEquipo']}' AND id_usuario = '{$datos['idDestinatario']}'");
		$perteneceAEquipo->execute();
		$pertenece = $perteneceAEquipo->fetchAll();

		if(!empty($pertenece)){
			imprime('ya esta en el team');
		}else{
			//COMPROBAR SI YA SE ENVIO UNA NOTIFICACION Y NO HA SIDO ACEPTADA O DENEGADA
			$sentencia = $conexion->prepare("SELECT * FROM notificaciones WHERE accion = '{$datos['idDestinatario']}/{$datos['idEquipo']}' AND estado = '0'");
			$sentencia->execute();
			$notificaciones = $sentencia->fetchAll();

			if(!empty($notificaciones)){
				imprime('ya existe la notificacion');
			}else{
				$notificacion = $conexion->prepare('INSERT INTO notificaciones(id_usuario, id_destinatario, estado, tipo, mensaje, accion)
				VALUES(:id_usuario, :id_destinatario, :estado, :tipo, :mensaje, :accion)');

					//$fecha = "{$datos['datos']['year']}-{$datos['datos']['mes']}-{$datos['datos']['dia']}";

				$notificacion->execute(array(
					':id_usuario' => "{$datos['idUsuario']}",
					':id_destinatario' => "{$datos['idDestinatario']}",
					':estado' => '0',
					':tipo' => 'inv_equipo',
					':mensaje' => "{$datos['nombreEquipo']} Te ha invitado a ser parte de su plantilla",
					':accion' => "{$datos['idDestinatario']}/{$datos['idEquipo']}"
				));

				imprime('listo');
			}
		}
	
		}

	function imprime($resultado){
		echo json_encode($resultado);
	}

	function execQuery($query){
		include "conexion.php";
		$consulta=$db->query($query);
		$res=array();
		if($consulta){
			$resultado=mysqli_fetch_assoc($consulta);
			$res[]=$resultado;
			imprime($res);
		}else{
			imprime(mysqli_error($db));
		}
	}

	function guardarPartidoLibre2($datos, $conexion){

		$fecha = "{$datos['datos']['year']}-{$datos['datos']['mes']}-{$datos['datos']['dia']}";

		$guardarUsuario = $conexion->prepare('INSERT INTO partidos_libres (id_usuario, equipo_uno, equipo_dos, r1, r2, plantilla, comentario, fecha, eventos)
			VALUES(:id_usuario, :equipo_uno, :equipo_dos, :r1, :r2, :plantilla, :comentario, :fecha, :eventos)');

			$guardarUsuario->execute(array(
				':id_usuario' => "{$datos['datos']['idUsuario']}",
				':equipo_uno' => "{$datos['datos']['equipo']}",
				':equipo_dos' => "{$datos['datos']['rival']}",
				':r1' => "{$datos['datos']['r1']}",
				':r2' => "{$datos['datos']['r2']}",
				':plantilla' => "{$datos['datos']['plantilla']}",
				':comentario' => "{$datos['datos']['coment']}",
				':fecha' => $fecha,
				':eventos' => "{$datos['datos']['eventos_partido']}"
			));

			imprime("registrado");
	}

	function guardarPartidoLibre($datos, $conexion){


		$guardarUsuario = $conexion->prepare('INSERT INTO partidos_libres (id_usuario, id_equipo, equipo_uno, equipo_dos, r1, r2, plantilla, comentario)
			VALUES
			(:id_usuario, :id_equipo, :equipo_uno, :equipo_dos, :r1, :r2, :plantilla, :comentario)');

			$guardarUsuario->execute(array(
				':id_usuario' => "{$datos['datos']['idUsuario']}",
				':id_equipo' => "{$datos['datos']['idEquipo']}",
				':equipo_uno' => "{$datos['datos']['equipo']}",
				':equipo_dos' => "{$datos['datos']['rival']}",
				':r1' => "{$datos['datos']['r1']}",
				':r2' => "{$datos['datos']['r2']}",
				':plantilla' => null,
				':comentario' => "{$datos['datos']['comentario']}"
			));

			imprime("registrado");
	}

	function getPartidosLibres($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM partidos_libres WHERE id_equipo = '{$datos['id_equipo']}'");
		$sentencia->execute();
		$partidos = $sentencia->fetchAll();

		imprime($partidos);
	}

	/*function actualizarTabla($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_evento = '{$datos['id_evento']}'");
		$sentencia->execute();
		$partidos = $sentencia->fetchAll();

		//PRIMERO VACIAR LA TABLA DE LIGA
			$vaciar = $conexion->prepare(
				"UPDATE tabla_liga SET pj = :pj, pg = :pg, pe = :pe, pp = :pp, gf = :gf, gc = :gc, dif = :dif, pts = :pts WHERE id_evento = '{$datos['id_evento']}'"
				);

				$vaciar->execute(array(
					':pj' => 0,
					':pg' => 0,
					':pe' => 0,
					':pp' => 0,
					':gf' => 0,
					':gc' => 0,
					':dif' => 0,
					':pts' => 0
				));

		
		//DESPUES RECORRER LA CANTIDAD DE PARTIDOS
		for ($i=0; $i < count($partidos); $i++) {

			if($partidos[$i]['r1'] > $partidos[$i]['r2']){
				//echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia2->execute();
				$tabla = $sentencia2->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pg = :pg, pts = :pts WHERE equipo = :equipo'
				);

				$statement->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pg' => $tabla[0]['pg']+1,
					':pts' => $tabla[0]['pts']+3,
					':equipo' => $partidos[$i]['equipo_uno']
				));

			}

			if($partidos[$i]['r1'] < $partidos[$i]['r2']){
				//echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia3 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia3->execute();
				$tabla = $sentencia3->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pp = :pp WHERE equipo = :equipo'
				);

				$statement->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pp' => $tabla[0]['pp']+1,
					':equipo' => $partidos[$i]['equipo_uno']
				));

			}

			if($partidos[$i]['r1'] == $partidos[$i]['r2']){
				//echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia3 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia3->execute();
				$tabla = $sentencia3->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pe = :pe, pts = :pts WHERE equipo = :equipo'
				);

				$statement->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pe' => $tabla[0]['pe']+1,
					':pts' => $tabla[0]['pts']+1,
					':equipo' => $partidos[$i]['equipo_uno']
				));

			}

			//echo "<br>";
		}


		//DESPUES RECORRER LA CANTIDAD DE PARTIDOS
		for ($i=0; $i < count($partidos); $i++) {

			if($partidos[$i]['r1'] > $partidos[$i]['r2']){
				//echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla = $sentencia2->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pg = :pg, pts = :pts WHERE equipo = :equipo'
				);

				$statement->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pg' => $tabla[0]['pg']+1,
					':pts' => $tabla[0]['pts']+3,
					':equipo' => $partidos[$i]['equipo_dos']
				));

			}

			if($partidos[$i]['r1'] < $partidos[$i]['r2']){
				//echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia3 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia3->execute();
				$tabla = $sentencia3->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pp = :pp WHERE equipo = :equipo'
				);

				$statement->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pp' => $tabla[0]['pp']+1,
					':equipo' => $partidos[$i]['equipo_dos']
				));

			}

			if($partidos[$i]['r1'] == $partidos[$i]['r2']){
				//echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia3 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia3->execute();
				$tabla = $sentencia3->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pe = :pe, pts = :pts WHERE equipo = :equipo'
				);

				$statement->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pe' => $tabla[0]['pe']+1,
					':pts' => $tabla[0]['pts']+1,
					':equipo' => $partidos[$i]['equipo_dos']
				));

			}

			//echo "<br>";
		}
	}*/

	/*function execLoginQuery($query){
		include "conexion.php";
		$consulta=$db->query($query);
		$res=array();
		if($consulta){
			imprime("si");
		}else{
			imprime(mysqli_error($db));
		}
	}*/

	/*function execQuery2($query){
		include "Conexion.php";
		$consulta = $db->query($query);
		if($consulta){
			$mensaje="true";
		}else{
			$mensaje=mysqli_error($db);
		}
		imprime($mensaje);
	}*/


	/*function actualizarTabla($datos, $conexion){
		imprime('llega');
		$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_evento=60");
		$sentencia->execute();
		$partidos = $sentencia->fetchAll();

		//PRIMERO VACIAR LA TABLA DE LIGA
			$vaciar = $conexion->prepare(
				"UPDATE tabla_liga SET pj = :pj, pg = :pg, pe = :pe, pp = :pp, gf = :gf, gc = :gc, dif = :dif, pts = :pts WHERE id_evento = 60"
				);

				$vaciar->execute(array(
					':pj' => 0,
					':pg' => 0,
					':pe' => 0,
					':pp' => 0,
					':gf' => 0,
					':gc' => 0,
					':dif' => 0,
					':pts' => 0
				));

		
		//DESPUES RECORRER LA CANTIDAD DE PARTIDOS
		for ($i=0; $i < count($partidos); $i++) {

			if($partidos[$i]['r1'] > $partidos[$i]['r2']){
				echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla2 = $sentencia2->fetchAll();

				//print_r($tabla[0]['pj']);


				$statement3 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pg = :pg, pts = :pts WHERE equipo = :equipo'
				);

				$statement3->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pg' => $tabla[0]['pg']+1,
					':pts' => $tabla[0]['pts']+3,
					':equipo' => $partidos[$i]['equipo_uno']
				));


				$statement4 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pp = :pp, pts = :pts WHERE equipo = :equipo'
				);

				$statement4->execute(array(
					':pj' => $tabla2[0]['pj']+1,
					':pp' => $tabla2[0]['pp']+1,
					':pts' => $tabla2[0]['pts'],
					':equipo' => $partidos[$i]['equipo_dos']
				));

			}

			if($partidos[$i]['r1'] < $partidos[$i]['r2']){
				echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla2 = $sentencia2->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement3 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pp = :pp WHERE equipo = :equipo'
				);

				$statement3->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pp' => $tabla[0]['pp']+1,
					':equipo' => $partidos[$i]['equipo_uno']
				));

				$statement4 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pg = :pg, pts = :pts WHERE equipo = :equipo'
				);

				$statement4->execute(array(
					':pj' => $tabla2[0]['pj']+1,
					':pg' => $tabla2[0]['pg']+1,
					':pts' => $tabla2[0]['pts']+3,
					':equipo' => $partidos[$i]['equipo_dos']
				));

			}

			if($partidos[$i]['r1'] == $partidos[$i]['r2']){
				echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla2 = $sentencia2->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement3 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pe = :pe, pts = :pts WHERE equipo = :equipo'
				);

				$statement3->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pe' => $tabla[0]['pe']+1,
					':pts' => $tabla[0]['pts']+1,
					':equipo' => $partidos[$i]['equipo_uno']
				));


				$statement4 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pe = :pe, pts = :pts WHERE equipo = :equipo'
				);

				$statement4->execute(array(
					':pj' => $tabla2[0]['pj']+1,
					':pe' => $tabla2[0]['pe']+1,
					':pts' => $tabla2[0]['pts']+1,
					':equipo' => $partidos[$i]['equipo_dos']
				));

			}

			echo "<br>";
		}
		imprime("resultado_uno_actualizado");
	}*/

	function getNotificaciones($datos, $conexion){
		$sentencia = $conexion->prepare("SELECT * FROM notificaciones WHERE id_destinatario = '{$datos['idUsuario']}' AND estado = '0' ORDER BY fecha_creacion");
		$sentencia->execute();
		$notificaciones = $sentencia->fetchAll();

		imprime($notificaciones);
	}

	function aceptarInvitacion($datos, $conexion){

		if($datos['tipo'] == 'inv_equipo'){

			$texto_partido = explode('/', $datos['accion']);

			$agregarJugador = $conexion->prepare('INSERT INTO usuarios_equipos(id_equipo, id_usuario)
			VALUES(:id_equipo, :id_usuario)');

			//$fecha = "{$datos['datos']['year']}-{$datos['datos']['mes']}-{$datos['datos']['dia']}";

			$agregarJugador->execute(array(
				':id_equipo' => $texto_partido[1],
				':id_usuario' => $texto_partido[0]
			));
		}

		$statement = $conexion->prepare(
			'UPDATE notificaciones SET estado = :estado WHERE id_notificacion = :id_notificacion'
		);

		$statement->execute(array(
			':estado' => "1",
			':id_notificacion' => "{$datos['idNotificacion']}"
		));

		imprime('yes');
		
	}

	function actualizarTabla($datos, $conexion){
		
		/*$tipo = 'A';
		$dat = limpiarDatos("{$datos['datos']['tipo']}");

		if($dat == 1){
			$tipo = 'A';
		}*/


		//$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_evento= '{$datos['datos']['id_evento']}' AND etapa = 'Grupos' AND grupo = '".$tipo."'");
		$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_evento= '{$datos['datos']['id_evento']}' AND etapa = 'Grupos' AND grupo = '{$datos['datos']['grupo']}'");
		$sentencia->execute();
		$partidos = $sentencia->fetchAll();

		//PRIMERO VACIAR LA TABLA DE LIGA
			$vaciar = $conexion->prepare(
				"UPDATE tabla_liga SET pj = :pj, pg = :pg, pe = :pe, pp = :pp, gf = :gf, gc = :gc, dif = :dif, pts = :pts WHERE id_evento = '{$datos['datos']['id_evento']}' AND grupo = '{$datos['datos']['grupo']}'"
				);

				$vaciar->execute(array(
					':pj' => 0,
					':pg' => 0,
					':pe' => 0,
					':pp' => 0,
					':gf' => 0,
					':gc' => 0,
					':dif' => 0,
					':pts' => 0
				));

				//DESPUES RECORRER LA CANTIDAD DE PARTIDOS
		for ($i=0; $i < count($partidos); $i++) {

			if($partidos[$i]['r1'] > $partidos[$i]['r2']){
				//echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '{$datos['datos']['id_evento']}' AND equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '{$datos['datos']['id_evento']}' AND equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla2 = $sentencia2->fetchAll();

				//print_r($tabla[0]['pj']);


				$statement3 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pg = :pg, gf = :gf, gc = :gc, pts = :pts WHERE equipo = :equipo'
				);

				$statement3->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pg' => $tabla[0]['pg']+1,
					':gf' => $tabla[0]['gf']+$partidos[$i]['r1'],
					':gc' => $tabla[0]['gc']+$partidos[$i]['r2'],
					':pts' => $tabla[0]['pts']+3,
					':equipo' => $partidos[$i]['equipo_uno']
				));


				$statement4 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pp = :pp, gf = :gf, gc = :gc, pts = :pts WHERE equipo = :equipo'
				);

				$statement4->execute(array(
					':pj' => $tabla2[0]['pj']+1,
					':pp' => $tabla2[0]['pp']+1,
					':gf' => $tabla2[0]['gf']+$partidos[$i]['r2'],
					':gc' => $tabla2[0]['gc']+$partidos[$i]['r1'],
					':pts' => $tabla2[0]['pts'],
					':equipo' => $partidos[$i]['equipo_dos']
				));

			}

			if($partidos[$i]['r1'] < $partidos[$i]['r2']){
				//echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '{$datos['datos']['id_evento']}' AND equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '{$datos['datos']['id_evento']}' AND equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla2 = $sentencia2->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement3 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pp = :pp, gf = :gf, gc = :gc, pts = :pts WHERE equipo = :equipo'
				);

				$statement3->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pp' => $tabla[0]['pp']+1,
					':gf' => $tabla[0]['gf']+$partidos[$i]['r1'],
					':gc' => $tabla[0]['gc']+$partidos[$i]['r2'],
					':pts' => $tabla[0]['pts'],
					':equipo' => $partidos[$i]['equipo_uno']
				));

				$statement4 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pg = :pg, gf = :gf, gc = :gc, pts = :pts WHERE equipo = :equipo'
				);

				$statement4->execute(array(
					':pj' => $tabla2[0]['pj']+1,
					':pg' => $tabla2[0]['pg']+1,
					':gf' => $tabla2[0]['gf']+$partidos[$i]['r2'],
					':gc' => $tabla2[0]['gc']+$partidos[$i]['r1'],
					':pts' => $tabla2[0]['pts']+3,
					':equipo' => $partidos[$i]['equipo_dos']
				));

			}

			if($partidos[$i]['r1'] == $partidos[$i]['r2']){

				if($partidos[$i]['r1'] != null){



				//echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '{$datos['datos']['id_evento']}' AND equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '{$datos['datos']['id_evento']}' AND equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla2 = $sentencia2->fetchAll();

				//print_r($tabla[0]['pj']);

				$statement3 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pe = :pe, gf = :gf, gc = :gc, pts = :pts WHERE equipo = :equipo'
				);

				$statement3->execute(array(
					':pj' => $tabla[0]['pj']+1,
					':pe' => $tabla[0]['pe']+1,
					':gf' => $tabla[0]['gf']+$partidos[$i]['r1'],
					':gc' => $tabla[0]['gc']+$partidos[$i]['r2'],
					':pts' => $tabla[0]['pts']+1,
					':equipo' => $partidos[$i]['equipo_uno']
				));


				$statement4 = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pe = :pe, gf = :gf, gc = :gc, pts = :pts WHERE equipo = :equipo'
				);

				$statement4->execute(array(
					':pj' => $tabla2[0]['pj']+1,
					':pe' => $tabla2[0]['pe']+1,
					':gf' => $tabla2[0]['gf']+$partidos[$i]['r2'],
					':gc' => $tabla2[0]['gc']+$partidos[$i]['r1'],
					':pts' => $tabla2[0]['pts']+1,
					':equipo' => $partidos[$i]['equipo_dos']
				));


				}
			}

			//echo "<br>";
		}

		actualizarDiferenciaGoles($datos, $conexion);
	}

	function actualizarDiferenciaGoles($datos, $conexion){

		$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '{$datos['datos']['id_evento']}'");
		$sentencia->execute();
		$equipos = $sentencia->fetchAll();

		for ($i=0; $i < count($equipos); $i++) {

			$vaciar = $conexion->prepare(
			"UPDATE tabla_liga SET dif = :dif WHERE id_evento = '{$datos['datos']['id_evento']}' AND id_tabla_liga = :id");

			$vaciar->execute(array(
				':dif' => $equipos[$i]['gf'] - $equipos[$i]['gc'],
				':id' =>  $equipos[$i]['id_tabla_liga']
			));
		}

		imprime("resultado_uno_actualizado");
	}


 ?>