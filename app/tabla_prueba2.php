<?php 
echo "string";

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
actualizarTabla($conexion);

//print_r($tabla);


function actualizarTabla($conexion){
		$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_evento=57");
		$sentencia->execute();
		$partidos = $sentencia->fetchAll();

		//PRIMERO VACIAR LA TABLA DE LIGA
			$vaciar = $conexion->prepare(
				'UPDATE tabla_liga SET pj = :pj, pg = :pg, pe = :pe, pp = :pp, gf = :gf, gc = :gc, dif = :dif, pts = :pts WHERE id_evento = 57'
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
				echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

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
				echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

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

			echo "<br>";
		}


		//DESPUES RECORRER LA CANTIDAD DE PARTIDOS
		for ($i=0; $i < count($partidos); $i++) {

			if($partidos[$i]['r1'] > $partidos[$i]['r2']){
				echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla = $sentencia2->fetchAll();

				print_r($tabla[0]['pj']);

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
				echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia3 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia3->execute();
				$tabla = $sentencia3->fetchAll();

				print_r($tabla[0]['pj']);

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
				echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia3 = $conexion->prepare("SELECT * FROM tabla_liga WHERE equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia3->execute();
				$tabla = $sentencia3->fetchAll();

				print_r($tabla[0]['pj']);

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

			echo "<br>";
		}
	}

 ?>