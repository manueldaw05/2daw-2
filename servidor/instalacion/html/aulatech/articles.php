<?php
include __DIR__ . '/db/connection.php';

// Número de registros por página
$limit = 25;

// Página actual
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calcular el offset
$offset = ($page - 1) * $limit;

try {
    $stmt = $pdo->prepare('SELECT name, description, category, price, stock FROM articles LIMIT :limit OFFSET :offset');

    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();
    $articles = $stmt->fetchAll();
} catch (PDOException $e) {
    $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($articles)) {
        foreach ($articles as $article) { ?>
            <div>
                <span>Nombre: <?php echo $article['name'] ?></span>
                <span>Descripción: <?php echo $article['description'] ?></span>
                <span>Categoría: <?php echo $article['category'] ?></span>
                <span>Precio: <?php echo $article['price'] ?></span>
                <span>Stock: <?php echo $article['stock'] ?></span>
            </div>
        <?php }
    } else { ?>
        <div>Ha ocurrido un error y no hemos podido cargar los artículos.</div>
    <?php } ?>
</body>

</html>