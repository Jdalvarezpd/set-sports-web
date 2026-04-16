<?php 

function actualizarResultado1($conexion, $r1, $r2, $id_partido){

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

	function actualizarResultado($conexion, $r1, $r2, $id_partido){

		echo $r1;
		echo $r2;
		echo $id_partido;
		
	}


 ?>