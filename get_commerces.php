<?php

$a[] = array(
	'id' => 1,
    'text' => 'Playa Union 1'
);
$a[] = array(
	'id' => 2,
    'text' => 'Playa Union 2'
);
$a[] = array(
	'id' => 3,
    'text' => 'Puerto Madryn 1'
);
$a[] = array(
	'id' => 4,
    'text' => 'Puerto Madryn 2'
);
$a[] = array(
	'id' => 5,
    'text' => 'Comodoro Riv. 1'
);
$a[] = array(
	'id' => 6,
    'text' => 'Esquel 1'
);
$a[] = array(
	'id' => 7,
    'text' => 'Esquel 2'
);
$a[] = array(
	'id' => 8,
    'text' => 'Paso de Indios 1'
);

sleep(3);
echo json_encode($a); 
?>