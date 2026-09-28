<?php

function comprobarNumero ($num) {
    if ($num > 0 ) {
        echo "El numero es positivo";
    } else if ($num == 0) {
        echo "El numero es cero";
    } else {
        echo "El numero es negativo";
    }
}

$num1 = -1;
$num2 = 0;
$num3 = 1;

comprobarNumero($num1);
comprobarNumero($num2);
comprobarNumero($num3);