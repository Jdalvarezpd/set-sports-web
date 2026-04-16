<?php 

$bd_config = array(
		'basedatos' => 'soccer_manager',
		'usuario' => 'set_admin',
		'pass' => 'Sets302019',
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
		$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_evento= 61 AND etapa = 'Grupos' AND grupo = 'A'");
		$sentencia->execute();
		$partidos = $sentencia->fetchAll();

		//PRIMERO VACIAR LA TABLA DE LIGA
			$vaciar = $conexion->prepare(
				"UPDATE tabla_liga SET pj = :pj, pg = :pg, pe = :pe, pp = :pp, gf = :gf, gc = :gc, dif = :dif, pts = :pts WHERE id_evento = 61 AND grupo = 'A' ");

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

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= 61 AND equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= 61 AND equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla2 = $sentencia2->fetchAll();

				//print_r($tabla[0]['pj']);

				//CALCULAR LA DIFERENCIA DE GOL
				$dif = $tabla[0]['dif'] + ($partidos[$i]['r1']-$partidos[$i]['r2']);
				$dif2 = $tabla2[0]['dif'] + ($partidos[$i]['r2']-$partidos[$i]['r1']);

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

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= 61 AND equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= 61 AND equipo = '". $partidos[$i]['equipo_dos'] ."' ");
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

				if($partidos[$i]['r1'] != null){



				echo $partidos[$i]['r1'] . '-' . $partidos[$i]['r2'];

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= 61 AND equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= 61 AND equipo = '". $partidos[$i]['equipo_dos'] ."' ");
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
			}

			echo "<br>";
		}
	}

 ?>