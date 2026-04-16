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
    	$r1 = $_POST['r1'];
		$r2 = $_POST['r2'];
		$id_partido = $_POST['id_partido'];
		$id_evento = $_POST['id_evento'];
		$grupo = $_POST['grupo'];

		/*echo $r1 . '<br>';
		echo $r2 . '<br>';
		echo $id_partido . '<br>';
		echo $id_evento . '<br>';
		echo $grupo . '<br>';*/

		if($r1 != '' && $r2 != ''){

			$statement = $conexion->prepare(
			'UPDATE partidos SET r1 = :r1, r2 = :r2 WHERE id_partido = :id'
			);

			$statement->execute(array(
				':r1' => $r1,
				':r2' => $r2,
				':id' => $id_partido
			));

			actualizarTabla($conexion, $id_evento, $grupo, $id_partido); 
			//echo "Actualizado ambos resultados";

		}else if($r1 != '' && $r2 == ''){

			$statement = $conexion->prepare(
			'UPDATE partidos SET r1 = :r1 WHERE id_partido = :id'
			);

			$statement->execute(array(
				':r1' => $r1,
				':id' => $id_partido
			));

			actualizarTabla($conexion, $id_evento, $grupo, $id_partido);
			//echo "Actualizado Resultado 1";

		}else if($r1 == '' && $r2 != ''){

			$statement = $conexion->prepare(
			'UPDATE partidos SET r2 = :r2 WHERE id_partido = :id'
			);

			$statement->execute(array(
				':r2' => $r2,
				':id' => $id_partido
			));


			actualizarTabla($conexion, $id_evento, $grupo, $id_partido);
			//echo "Actualizado Rsultado 2";

		}else{
			echo "falta algo";
			//actualizarTabla($datos, $conexion);
		}

  	}

  	function actualizarTabla($conexion, $id_evento, $grupo, $id_partido){

		$sentencia = $conexion->prepare("SELECT * FROM partidos WHERE id_evento= '$id_evento' AND etapa = 'Grupos' AND grupo = '$grupo'");
		$sentencia->execute();
		$partidos = $sentencia->fetchAll();

		//PRIMERO VACIAR LA TABLA DE LIGA
			$vaciar = $conexion->prepare(
				"UPDATE tabla_liga SET pj = :pj, pg = :pg, pe = :pe, pp = :pp, gf = :gf, gc = :gc, dif = :dif, pts = :pts WHERE id_evento = '$id_evento' AND grupo = '$grupo'"
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

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '$id_evento' AND equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '$id_evento' AND equipo = '". $partidos[$i]['equipo_dos'] ."' ");
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

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '$id_evento' AND equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '$id_evento' AND equipo = '". $partidos[$i]['equipo_dos'] ."' ");
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

				$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '$id_evento' AND equipo = '". $partidos[$i]['equipo_uno'] ."' ");
				$sentencia->execute();
				$tabla = $sentencia->fetchAll();

				$sentencia2 = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '$id_evento' AND equipo = '". $partidos[$i]['equipo_dos'] ."' ");
				$sentencia2->execute();
				$tabla2 = $sentencia2->fetchAll();

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

		actualizarDiferenciaGoles($conexion, $id_evento, $id_partido);
	}

	function actualizarDiferenciaGoles($conexion, $id_evento, $id_partido){

		$sentencia = $conexion->prepare("SELECT * FROM tabla_liga WHERE id_evento= '$id_evento'");
		$sentencia->execute();
		$equipos = $sentencia->fetchAll();

		for ($i=0; $i < count($equipos); $i++) {

			$vaciar = $conexion->prepare(
			"UPDATE tabla_liga SET dif = :dif WHERE id_evento = '$id_evento' AND id_tabla_liga = :id");

			$vaciar->execute(array(
				':dif' => $equipos[$i]['gf'] - $equipos[$i]['gc'],
				':id' =>  $equipos[$i]['id_tabla_liga']
			));
		}

		//echo "Diferencia de goles actualizada";
		header('Location: ../partido?id=' . $id_partido . '&id_evento=' . $id_evento);
	}

 ?>
