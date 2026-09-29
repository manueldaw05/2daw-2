<?php
$productos = [
    ["nombre" => "Teclado", "precio" => 25, "stock" => 10],
    ["nombre" => "Ratón", "precio" => 15, "stock" => 4],
    ["nombre" => "Monitor", "precio" => 180, "stock" => 2],
    ["nombre" => "Webcam", "precio" => 45, "stock" => 0],
    ["nombre" => "SSD", "precio" => 75, "stock" => 7]
];

function stockDisponible ($productos) {
    foreach ($productos as $producto) {
        if ($producto["stock"] > 0) {
            echo $producto["nombre"] . ' - ' . $producto["precio"] . ' € - Stock: ' . $producto["stock"] . '<br>';
        }
    }
}

function valorStock ($productos) {
    $valorStock = 0;

    foreach ($productos as $producto) {
        $valorStock = $producto["precio"] * $producto["stock"];
        echo 'Valor del stock de ' . $producto["nombre"] . ': ' . $valorStock . ' €<br>';
    }
}

function productoMasCaro ($productos) {
    $precioMasCaro = $productos[0]["precio"];
    $nombrePrecioMasCaro = $productos[0]["nombre"];

    foreach ($productos as $producto) {
        if ($precioMasCaro < $producto["precio"]) {
            $precioMasCaro = $producto["precio"];
            $nombrePrecioMasCaro = $producto["nombre"];
        }
    }

    echo 'El producto más caro es ' . $nombrePrecioMasCaro . ' - ' . $precioMasCaro . ' €';
}

function sinStock ($productos) {
    $contador = 0;

    foreach ($productos as $producto) {
        if ($producto["stock"] === 0) {
            $contador++;
        }
    }

    echo 'Cantidad de productos sin stock: ' . $contador;
}

stockDisponible($productos);
echo '<br><br>';
valorStock($productos);
echo '<br><br>';
productoMasCaro($productos);
echo '<br><br>';
sinStock($productos);
echo '<br><br>';
