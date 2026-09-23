<?php
$productos = [
 ["nombre" => "Camiseta", "precio" => 15.99, "stock" => 10],
 ["nombre" => "Pantalón", "precio" => 35.5, "stock" => 0],
 ["nombre" => "Zapatos", "precio" => 55.0, "stock" => 5],
 ["nombre" => "Gorra", "precio" => 12.0, "stock" => 20],
];

$stockDisponible = [];
$totalInventario = 0;

foreach ($productos as $producto) {
    if ($producto["stock"] > 0) {
        $stockDisponible[] = $producto["nombre"];
    }

    $totalInventario += $producto["precio"] * $producto["stock"];

}

foreach ($stockDisponible as $producto) {
    echo $producto . "<br>";
}
echo $totalInventario;