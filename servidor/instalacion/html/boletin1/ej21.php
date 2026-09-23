<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de productos</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <h1>Gestión de productos</h1>
    <form action="" method="get">
        <button type="submit" name="opcion" value="stock">
            Productos con stock
        </button>

        <button type="submit" name="opcion" value="inventario">
            Valor total del inventario
        </button>

        <button type="submit" name="opcion" value="precio">
            Productos por precio
        </button>
    </form>

<?php
$productos = [
    ["nombre" => "Camiseta", "precio" => 15.99, "stock" => 10],
    ["nombre" => "Pantalón", "precio" => 35.5, "stock" => 0],
    ["nombre" => "Zapatos", "precio" => 55.0, "stock" => 5],
    ["nombre" => "Gorra", "precio" => 12.0, "stock" => 20],
];

if (isset($_GET["opcion"])) {
    $opcion = $_GET["opcion"];

    if ($opcion == "stock") {
        echo "<h2>Productos con stock disponible</h2>";

        foreach ($productos as $producto) {
            if ($producto["stock"] > 0) {
                echo "<p>";
                echo $producto["nombre"] . " - Stock: " . $producto["stock"];
                echo "</p>";
            }
        }
    }

    if ($opcion == "inventario") {
        $totalInventario = 0;

        foreach ($productos as $producto) {
            $totalInventario += $producto["precio"] * $producto["stock"];
        }

        echo "<h2>Valor total del inventario</h2>";
        echo "<p>";
        echo "El valor total del inventario es: "
            . number_format($totalInventario, 2)
            . " €";
        echo "</p>";
    }

    if ($opcion == "precio") {
        usort($productos, function($a, $b) {
            return $b["precio"] <=> $a["precio"];
        });

        echo "<h2>Productos ordenados por precio</h2>";

        foreach ($productos as $producto) {
            echo "<p>";
            echo $producto["nombre"]
                . " - "
                . $producto["precio"]
                . " €";
            echo "</p>";
        }
    }
}
?>

</body>
</html>
