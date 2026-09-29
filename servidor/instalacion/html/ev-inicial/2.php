<?php
function descuentoCompra ($importe) {
    if ($importe < 50) {
        $porcentajeDescuento = 0;
    } else if ($importe >= 50 && $importe < 100) {
        $porcentajeDescuento = 5;
    } else {
        $porcentajeDescuento = 10;
    }

    $importeDescuento = $importe * $porcentajeDescuento / 100;
    $total = $importe - $importeDescuento;

    echo 'Importe: ' . $importe . ' €<br>';
    echo 'Descuento: ' . $porcentajeDescuento . ' %<br>';
    echo 'Importe del descuento: ' . $importeDescuento . ' €<br>';
    echo 'Precio final: ' . $total . ' €<br>';
}

descuentoCompra(120);