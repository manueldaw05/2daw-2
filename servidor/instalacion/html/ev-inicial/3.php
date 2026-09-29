<?php
$numero = 15;
$contador = 0;
$acumulador = 0;

for ($i = 1; $i <= $numero; $i++) {
    if ($i % 3 == 0) {
        $contador++;
        $acumulador += $i;

        echo $i . '<br>';
    }
}

echo '<br>Cantidad de múltiplos: ' . $contador . '<br>Suma: ' . $acumulador;