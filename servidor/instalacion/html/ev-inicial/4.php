<?php
$temperaturas = [18, 21, 19, 25, 27, 23, 20];

$temperaturaMaxima = $temperaturas[0];
$temperaturaMinima = $temperaturas[0];
$temperaturaMedia = 0;
$superiorA22 = 0;

foreach ($temperaturas as $temperatura) {
    if ($temperatura > $temperaturaMaxima) {
        $temperaturaMaxima = $temperatura;
    } else if ($temperatura < $temperaturaMinima) {
        $temperaturaMinima = $temperatura;
    }

    if($temperatura > 22) {
        $superiorA22++;
    }
    $temperaturaMedia += $temperatura;
}

$temperaturaMedia /= 7 //Pongo 7 porque se me ha olvidado el método para obtener el tamaño de un array

echo 'Temperatura máxima: ' . $temperaturaMaxima . '<br>';
echo 'Temperatura mínima: ' . $temperaturaMinima . '<br>';
echo 'Temperatura media: ' . $temperaturaMedia . '<br>';
echo 'Días con temperatura superior a 22: ' . $superiorA22 . '<br>';