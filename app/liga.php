<?php 
	
	$numero_equipos = 4;
	$arreglo_equipos = array();

	for ($i=0; $i < $numero_equipos; $i++) {
		$num = $i+1;
		array_push($arreglo_equipos, 'Equipo'. $num);
	}

	//print_r($arreglo_equipos);
						
	//$uno = array('1', '2', '3', '4', '5', '6');
	$contador = 1;

	$fechas = array();

	for ($i=0; $i < count($arreglo_equipos); $i++) {
		
		for ($j=$contador; $j < count($arreglo_equipos); $j++) {
			//echo $uno[$i] . "-" . $uno[$j] . '<br>';
			array_push($fechas, $arreglo_equipos[$i] . " vs " . $arreglo_equipos[$j] . "<br>");
		}
		$contador++;
	}

	print_r($fechas);

 ?>