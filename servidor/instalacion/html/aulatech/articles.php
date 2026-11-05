<?php
session_start();
include __DIR__ . '/db/connection.php';

$itemsPerPage = 25;
$currentPage = isset($_GET['page'])
    ? max(1, (int) $_GET['page'])
    : 1;

$offset = ($currentPage - 1) * $itemsPerPage;

try {
    $countStmt = $pdo->prepare('SELECT COUNT(*) FROM articles');
    $countStmt->execute();

    $totalItems = (int) $countStmt->fetchColumn();

    $stmt = $pdo->prepare(
        'SELECT name, description, category, price, stock
         FROM articles
         LIMIT :itemsPerPage OFFSET :offset'
    );

    $stmt->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();

    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $totalPages = (int) ceil($totalItems / $itemsPerPage);
} catch (PDOException $e) {
    echo $e->getMessage();
}

function renderPagination(int $currentPage, int $totalPages): void
{
    $range = 1;

    echo '<nav aria-label="Article pagination">';
    echo '<ul class="pagination justify-content-center">';

    // Previous
    echo '<li class="page-item ' . ($currentPage <= 1 ? 'disabled' : '') . '">';
    echo '<a class="page-link" href="?page=' . ($currentPage - 1) . '">Anterior</a>';
    echo '</li>';

    // First page
    echo '<li class="page-item ' . ($currentPage === 1 ? 'active' : '') . '">';
    echo '<a class="page-link" href="?page=1">1</a>';
    echo '</li>';

    if ($currentPage > $range + 2) {
        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
    }

    $startPage = max(2, $currentPage - $range);
    $endPage = min($totalPages - 1, $currentPage + $range);

    for ($page = $startPage; $page <= $endPage; $page++) {
        echo '<li class="page-item ' . ($page === $currentPage ? 'active' : '') . '">';
        echo '<a class="page-link" href="?page=' . $page . '">' . $page . '</a>';
        echo '</li>';
    }

    if ($currentPage < $totalPages - $range - 1) {
        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
    }

    if ($totalPages > 1) {
        echo '<li class="page-item ' . ($currentPage === $totalPages ? 'active' : '') . '">';
        echo '<a class="page-link" href="?page=' . $totalPages . '">' . $totalPages . '</a>';
        echo '</li>';
    }

    // Next
    echo '<li class="page-item ' . ($currentPage >= $totalPages ? 'disabled' : '') . '">';
    echo '<a class="page-link" href="?page=' . ($currentPage + 1) . '">Siguiente</a>';
    echo '</li>';

    echo '</ul>';
    echo '</nav>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        defer></script>

    <title>Artículos</title>
</head>

<body class="bg-light">
    <?php include 'menu/menu.php'; ?>

    <div class="container py-5">

        <h1 class="text-center mb-4">
            Catálogo de artículos
        </h1>

        <?php if (isset($articles)) : ?>

            <div class="row g-4">

                <?php foreach ($articles as $article) : ?>

                    <div class="col-lg-6">
                        <div class="card shadow-sm h-100">

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title">
                                        <?= htmlspecialchars($article['name']) ?>
                                    </h5>

                                    <span class="badge bg-primary">
                                        <?= htmlspecialchars($article['category']) ?>
                                    </span>
                                </div>

                                <p class="card-text text-muted">
                                    <?= htmlspecialchars($article['description']) ?>
                                </p>

                                <div class="row">

                                    <div class="col-6">
                                        <strong>Precio</strong><br>
                                        <?= number_format($article['price'], 2) ?> €
                                    </div>

                                    <div class="col-6">
                                        <strong>Stock</strong><br>

                                        <?php if ($article['stock'] > 1) : ?>
                                            <span class="badge bg-success">
                                                <?php echo $article['stock'];
                                                if ($article['stock'] !== 1) : echo ' disponibles';
                                                else : echo ' disponible';
                                                endif; ?>

                                            </span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">
                                                Sin stock
                                            </span>
                                        <?php endif; ?>

                                    </div>
                                </div>

                            </div>

                            <?php if (
                                isset($_SESSION['role']) &&
                                $_SESSION['role'] === 'admin'
                            ) : ?>

                                <div class="card-footer bg-white">

                                    <div class="d-flex gap-2">

                                        <button class="btn btn-warning btn-sm">
                                            Modificar
                                        </button>

                                        <button class="btn btn-danger btn-sm">
                                            Borrar
                                        </button>

                                    </div>

                                </div>

                            <?php endif; ?>

                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

            <div class="mt-5">
                <?php
                isset($totalPages)
                    ? renderPagination($currentPage, $totalPages)
                    : print(
                        '<div class="alert alert-danger">
                        Unable to load pagination.
                    </div>'
                    );
                ?>
            </div>

        <?php else : ?>

            <div class="alert alert-danger">
                An error occurred while loading the articles.
            </div>

        <?php endif; ?>

    </div>

</body>

</html>