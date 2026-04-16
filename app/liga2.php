<?php 

$equipos = array('A','B','C', 'D');
$partidos = array();

foreach($equipos as $k){
    foreach($equipos as $j){
        if($k == $j){
            continue;
        }
        $z = array($k,$j);
        sort($z);
        if(!in_array($z,$partidos)){
            $partidos[] = $z;
        }
    }
}

//print_r($partidos);

$jornada_1 = array(0, 5);
$jornada_2 = array(1, 4);
$jornada_3 = array(2, 3);

for($i=0; $i< count($jornada_1); $i++){
    print_r($partidos[$jornada_1[$i]]);
}

echo '<br>';

for($i=0; $i< count($jornada_2); $i++){
    print_r($partidos[$jornada_2[$i]]);
}

echo '<br>';

for($i=0; $i< count($jornada_3); $i++){
    print_r($partidos[$jornada_3[$i]]);
}


//Suma de puntos

echo '<br><br><br><br> Tabla';
$partidos_jugados = 0;
$puntos_A = 0;
$puntos_B = 0;

$partido_1 = array('A', 'B', 2, 2);

if($partido_1[2]>$partido_1[3]){
	$puntos_A = $puntos_A + 3;	
	
}else if($partido_1[3]>$partido_1[2]){
	$puntos_B = $puntos_B + 3;	
	
}else if($partido_1[3]==$partido_1[2]){
	$puntos_A = $puntos_A + 1;
	$puntos_B = $puntos_B + 1;	
}

$partidos_jugados = 1;


echo '<br><br>';

echo 'Equipo A = ' . $puntos_A;
echo '<br>';
echo 'Equipo B = ' . $puntos_B;


 ?>