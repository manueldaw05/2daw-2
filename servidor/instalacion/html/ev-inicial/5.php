<?php
function calcularPrecioFinal($precio, $porcentaje) {
    return $precio * (100 - $porcentaje) / 100;
}

echo 'Teclado: ' . calcularPrecioFinal(30, 10) . ' €<br>';
echo 'Monitor: ' . calcularPrecioFinal(180, 15) . ' €<br>';
echo 'Disco SSD: ' . calcularPrecioFinal(75, 5) . ' €<br>';