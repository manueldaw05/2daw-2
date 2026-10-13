<?php
session_start();

if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

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

if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_GET['action'] ?? '') === 'addProducts') {

    foreach ($_POST['products'] ?? [] as $selectedId) {
        foreach ($catalogue as $product) {
            if ($product['id'] == $selectedId) {
                $id = $product['id'];
                $quantity = (int) ($_POST['quantity'][$id] ?? 1);

                if ($quantity >= 1 && $quantity <= $product['stock']) {

                    if (isset($_SESSION['cart'][$id])) {
                        $_SESSION['cart'][$id]['quantity'] += $quantity;
                    } else {
                        $_SESSION['cart'][$id] = [
                            'product' => $product,
                            'quantity' => $quantity
                        ];
                    }

                }

                break;
            }
        }
    }

    header('Location: ?action=cart');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <?php
    echo '<h1>Tienda</h1>';
    require_once "menu.php";

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (!isset($_GET['action'])) {
            if (!isset($_GET['product'])) {
                echo '<h2>Catálogo</h2>';

                foreach ($catalogue as $product) {
                    echo "<div>ID: " . $product["id"] . "<br>";
                    echo "Nombre: <a href=\"?product=" . $product["id"] . "\">" . $product["name"] . "</a><br>";
                    echo "Precio: " . $product["price"] . " €<br>";
                    echo "Categoría: " . $product["category"] . "<br>";
                    echo "Stock: " . $product["stock"] . "</div><hr>";
                }
            } else {
                $id = $_GET["product"];
                $found = false;

                foreach ($catalogue as $product) {
                    if ($id == $product["id"]) {
                        $found = true;

                        echo "<div>ID: " . $product["id"] . "<br>";
                        echo "Nombre: <a href=\"?product=" . $product["id"] . "\">" . $product["name"] . "</a><br>";
                        echo "Precio: " . $product["price"] . " €<br>";
                        echo "Categoría: " . $product["category"] . "<br>";
                        echo "Stock: " . $product["stock"] . "<div><br>";
                        echo '<button onclick="window.location.href=\'index.php\'">Volver al catálogo</button>';
                    }
                }

                if (!$found) {
                    echo '<h1>Error</h1>';
                    echo '<p>No existe el producto que estás intentando buscar</p>';
                    echo '<button onclick="window.location.href=\'index.php\'">Volver al catálogo</button>';
                }
            }
        } else if (isset($_GET["action"])) {
            switch ($_GET['action']) {
                case 'addProducts':
                    echo '<h2>Añadir productos</h2>';
                    echo '<form method="POST" action="?action=addProducts">';

                    foreach ($catalogue as $product) {
                        echo '<div>';
                        echo 'ID: ' . $product["id"] . '<br>';
                        echo 'Nombre: ' . $product["name"] . '<br>';
                        echo 'Precio: ' . $product["price"] . ' €<br>';
                        echo 'Categoría: ' . $product["category"] . '<br>';
                        echo 'Stock: ' . $product["stock"] . '<br>';

                        echo '<label>';
                        echo '<input type="checkbox" name="products[]" value="'
                            . $product["id"] . '"> ';
                        echo 'Seleccionar';
                        echo '</label>';
                        
                        echo '<label for="quantity_' . $product["id"] . '">Cantidad:</label>';
                        echo '<input type="number" '
                            . 'id="quantity_' . $product["id"] . '" '
                            . 'name="quantity[' . $product["id"] . ']" '
                            . 'min="1" max="' . $product["stock"] . '" value="1">';

                        echo '</div><hr>';
                    }

                    echo '<button type="submit">Añadir a la cesta</button>';
                    echo '</form>';
                    break;

                
                case 'cart':
                    echo '<h2>Mi cesta</h2>';

                    if (empty($_SESSION['cart'])) {
                        echo '<p>La cesta está vacía.</p>';

                    } else {
                        $total = 0;

                        foreach ($_SESSION['cart'] as $item) {
                            $product = $item['product'];
                            $quantity = $item['quantity'];
                            $subtotal = $product['price'] * $quantity;

                            $total += $subtotal;

                            echo '<div>';
                            echo '<strong>' . $product['name'] . '</strong><br>';
                            echo 'Precio: ' . $product['price'] . ' €<br>';
                            echo 'Cantidad: ' . $quantity . '<br>';
                            echo 'Subtotal: ' . $subtotal . ' €';
                            echo '</div><hr>';
                        }

                        echo '<h3>Total: ' . $total . ' €</h3>';
                    }

                    break;
                
                case 'emptyCart':
                    $_SESSION['cart'] = [];
                    echo '<p>La cesta está vacía.</p>';
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