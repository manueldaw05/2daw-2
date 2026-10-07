<?php
session_start();

require_once "menu.php";

$catalogue = [
    [
        "id" => 1,
        "name" => "Teclado",
        "price" => 25.99,
        "category" => "Periféricos",
        "stock" => 15
    ],
    [
        "id" => 2,
        "name" => "Ratón",
        "price" => 18.50,
        "category" => "Periféricos",
        "stock" => 30
    ],
    [
        "id" => 3,
        "name" => "Monitor",
        "price" => 199.99,
        "category" => "Pantallas",
        "stock" => 8
    ],
    [
        "id" => 4,
        "name" => "Webcam",
        "price" => 45.75,
        "category" => "Accesorios",
        "stock" => 12
    ],
    [
        "id" => 5,
        "name" => "Auriculares",
        "price" => 39.95,
        "category" => "Audio",
        "stock" => 20
    ],
    [
        "id" => 6,
        "name" => "Alfombrilla",
        "price" => 9.99,
        "category" => "Accesorios",
        "stock" => 50
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (!isset($_GET['action'])) {
            if (!isset($_GET['product'])) {
                foreach ($catalogue as $product) {
                    echo "<div>ID: " . $product["id"] . "<br>";
                    echo "Nombre: <a href=\"?product=" . $product["id"] . "\">" . $product["name"] . "</a><br>";
                    echo "Precio: " . $product["price"] . " €<br>";
                    echo "Categoría: " . $product["category"] . "<br>";
                    echo "Stock: " . $product["stock"] . "</div>";
                }
            } else {
                $id = $_GET["product"];

                foreach ($catalogue as $product) {
                    if ($id == $product["id"]) {
                        echo "<div>ID: " . $product["id"] . "<br>";
                        echo "Nombre: <a href=\"?product=" . $product["id"] . "\">" . $product["name"] . "</a><br>";
                        echo "Precio: " . $product["price"] . " €<br>";
                        echo "Categoría: " . $product["category"] . "<br>";
                        echo "Stock: " . $product["stock"] . "<div><br>";
                        echo '<button onclick="window.location.href=\'index.php\'">Volver al catálogo</button>';
                    }
                }
            }
        } else if (isset($_GET["action"])) {
            switch ($_GET['action']) {
                case 'addProducts':
                    foreach ($catalogue as $product) {
                        echo "<div>ID: " . $product["id"] . "<br>";
                        echo "Nombre: <a href=\"?product=" . $product["id"] . "\">" . $product["name"] . "</a><br>";
                        echo "Precio: " . $product["price"] . " €<br>";
                        echo "Categoría: " . $product["category"] . "<br>";
                        echo "Stock: " . $product["stock"] . "</div>";
                        echo '<form method="POST"><input type="checkbox" name="' . $product["id"] . '" value="' . $product["id"] . '">';
                    }
                    
                    break;

                case 'cart':

                    break;

                case 'emptyCart':
                    
                    break;

                case 'buy':

                    break;
                
                default:
                    echo '<h1>Petición inválida. Asegúrate de que el valor sea correcto.</h1>';
                
                    break;
            }
        }  
    } else {
        echo '<h1>Petición inválida. Asegúrate de que los valores sean correctos.</h1>';
    }

    ?>
</body>
</html>