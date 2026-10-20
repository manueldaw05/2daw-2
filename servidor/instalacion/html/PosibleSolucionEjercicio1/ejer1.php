<?php
session_start();

function findProductById($products, $productId)
{
    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            return $product;
        }
    }

    return null;
}

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Teclado', 'price' => 25.00, 'category' => 'Periféricos', 'stock' => 10],
        ['id' => 2, 'name' => 'Ratón', 'price' => 15.00, 'category' => 'Periféricos', 'stock' => 12],
        ['id' => 3, 'name' => 'Monitor', 'price' => 149.90, 'category' => 'Pantallas', 'stock' => 5],
        ['id' => 4, 'name' => 'Webcam', 'price' => 39.90, 'category' => 'Periféricos', 'stock' => 8],
        ['id' => 5, 'name' => 'Auriculares', 'price' => 29.90, 'category' => 'Audio', 'stock' => 6],
        ['id' => 6, 'name' => 'Alfombrilla', 'price' => 9.50, 'category' => 'Accesorios', 'stock' => 15]
    ];
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$products = $_SESSION['products'];
$cart = $_SESSION['cart'];
$errors = [];
$message = '';
$displayProducts = $products;
$subTotal = 0;
$tax = 0;
$total = 0;
$action = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedProducts = $_POST['selectedProducts'] ?? [];
    $quantities = $_POST['quantities'] ?? [];

    if (!isset($selectedProducts) || !isset($quantities)) {
        $errors[] = 'Los datos enviados no son válidos.';
        $selectedProducts = [];
        $quantities = [];
        $displayProducts = [];
    } elseif (empty($selectedProducts)) {
        $errors[] = 'Selecciona al menos un producto.';
        $displayProducts = [];
    } else {
        $pendingProducts = [];
        foreach ($selectedProducts as $productId) {
            // Debería comprobar que productId es un número y es positivo.
            $product = findProductById($products, $productId);


            if ($productId === false || $product === null) {
                $errors[] = 'Se ha seleccionado un producto inexistente.';
            } else {
                // Commprobar que exite el índice. Importante
                $quantity = $quantities[$productId] > 0  ? $quantities[$productId] : false;

                $currentQuantity = $cart[$productId] ?? 0;
                if ($quantity === false) {
                    $errors[] = 'La cantidad de ' . $products[$productId]['name'] . ' debe ser un numero positivo.';
                } elseif ($currentQuantity + $quantity > $product['stock']) {
                    $errors[] = 'Stock insuficiente de ' . $product['name'] . '. Ya tienes ' . $currentQuantity . ' unidades en la cesta.';
                } else {
                    $pendingProducts[$productId] = $quantity;
                }
            }
        }
        // Si hay algún error, no se añade ninguno de los productos.
        if (empty($errors)) {
            foreach ($pendingProducts as $productId => $quantity) {
                $cart[$productId] = ($cart[$productId] ?? 0) + $quantity;
            }

            $_SESSION['cart'] = $cart;
            header('Location: ejer1.php?accion=anadirCesta');
            return;
        } else {
            $displayProducts = [];
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['accion'] ?? '';
    if ($action === 'vaciar') {
        $_SESSION['cart'] = [];
        $message = 'Se ha vaciado la cesta';
    } elseif ($action === 'comprar') {
        $displayProducts = [];

        if (empty($cart)) {
            $errors[] = 'No puedes comprar porque la cesta está vacía.';
        } else {
            foreach ($cart as $productId => $quantity) {
                $product = findProductById($products, $productId);

                if ($product == null || $quantity > $product['stock']) {
                    $errors[] = 'No hay existencias suficientes para completar la compra del producto ' . $product["name"];
                }

                $displayProducts[$productId] = $product;
                $displayProducts[$productId]['quantity'] = $quantity;
            }
        }
    } elseif ($action === 'cesta' || $action === 'anadirCesta') {
        if ($action === 'anadirCesta') {
            $message = "Productos añadidos a la cesta";
        }
        $displayProducts = [];
        foreach ($cart as $productId => $quantity) {
            $product = findProductById($products, $productId);

            if ($product == null || $quantity > $product['stock']) {
                $errors[] = 'No hay existencias suficientes para completar la compra del producto ' . $product["name"];
            }

            $displayProducts[$productId] = $product;
            $displayProducts[$productId]['quantity'] = $quantity;
        }
    } elseif ($action === 'seleccionar') {
        $displayProducts = $products;
    } elseif ($action === '') {
        $displayProducts = $products;
    } else {
        $message = "Opción no válida";
    }
}

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cesta de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php require_once __DIR__ . '/menu.php'; ?>
    <main class="container pb-5">
        <!--  Si hay algún mensaje lo muestro -->
        <?php if ($message !== '') { ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($message); ?></div>
        <?php } ?>
        <!-- Si hay algún error, lo muestro -->
        <?php foreach ($errors as $error) { ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php } ?>

        <?php if ($action === 'cesta' && empty($cart)) { ?>
            <div class="alert alert-info">La cesta está vacía.</div>
        <?php } ?>
        <?php if (!empty($displayProducts)) { ?>
            <?php if ($action === 'seleccionar') { ?>
                <p>Marca los productos e indica cuántas unidades quieres añadir.</p>
                <form method="post">
                <?php }
            $showTotals = false; ?>
                <div class="table-responsive bg-white rounded shadow-sm">
                    <table class="table table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Categoría</th>
                                <th>Precio unitario</th>
                                <th>Stock</th>
                                <?php if ($action === 'seleccionar') { ?><th>Seleccionar</th><?php } ?>

                                <?php if ($action === 'seleccionar' || $action === 'cesta' || $action === 'comprar') { ?><th>Cantidad</th><?php } ?>
                                <?php if ($action === 'comprar') { ?><th>Importe</th><?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($displayProducts as $productId => $product) {
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($product['id']); ?></td>
                                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                                    <td><?php echo htmlspecialchars($product['category']); ?></td>
                                    <td><?php echo $product['price']; ?></td>
                                    <td><?php echo $product['stock']; ?></td>
                                    <?php if (isset($product['quantity'])) { ?>
                                        <td><?php echo $product['quantity']; ?></td>
                                        <?php if ($action === 'comprar') {
                                            echo "<td>" . $product['quantity'] * $product['price'] . "</td>";
                                            $subTotal += $product['quantity'] * $product['price'];
                                        } ?>
                                    <?php } elseif ($action === 'seleccionar') { ?>
                                        <td><input class="form-check-input" type="checkbox" name="selectedProducts[]" value="<?php echo $product['id']; ?>"></td>
                                        <td><input class=" form-control" style="max-width:110px" type="number" name="quantities[<?php echo $product['id']; ?>]" min="1" max="<?php echo $product['stock']; ?>" value="1"></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php if ($action === 'seleccionar') { ?>
                    <button class="btn btn-primary mt-3" type="submit">Añadir a la cesta</button>
                </form>
            <?php } ?>
            <?php if ($action === 'comprar') {

                foreach ($products as $productIndex => $product) {
                    if (isset($cart[$product['id']])) {
                        $products[$productIndex]['stock']
                            -= $cart[$product['id']];
                    }
                }

                $_SESSION['products'] = $products;

                // Vaciamos tanto la sesión como la copia local.
                $_SESSION['cart'] = [];
                $tax = $subTotal * 21 / 100;
                $total = $subTotal + $tax;

            ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <p>Subtotal: <?php echo $subTotal; ?></p>
                        <p>IVA (21 %): <?php echo $tax; ?></p>
                        <p class="fw-bold mb-0">Total: <?php echo $total; ?></p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </main>
</body>

</html>