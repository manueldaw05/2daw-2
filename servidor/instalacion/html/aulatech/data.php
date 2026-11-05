<?php
session_start();

require_once __DIR__ . '/db/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
} else {
    $id = $_SESSION['user_id'];

    $stmt = $pdo->prepare('SELECT username, full_name, email FROM users WHERE id = :id');

    $stmt->execute([
        'id' => $id
    ]);

    $user = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        defer></script>

    <title>Mis Datos</title>
</head>

<body class="bg-light">

    <?php include 'menu/menu.php'; ?>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-md-8 col-lg-6">

                <div class="card shadow border-0">

                    <div class="card-header bg-primary text-white text-center py-3">
                        <h1 class="h3 mb-0">
                            <i class="bi bi-person-circle me-2"></i>
                            Mis Datos
                        </h1>
                    </div>

                    <div class="card-body p-4">

                            <div class="list-group list-group-flush">

                                <div class="list-group-item py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person-fill text-primary me-3 fs-4"></i>
                                        <div>
                                            <small class="text-muted d-block">
                                                Nombre de usuario
                                            </small>
                                            <strong>
                                                <?= htmlspecialchars($user['username']) ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-card-text text-success me-3 fs-4"></i>
                                        <div>
                                            <small class="text-muted d-block">
                                                Nombre completo
                                            </small>
                                            <strong>
                                                <?= htmlspecialchars($user['full_name']) ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item py-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-envelope-fill text-danger me-3 fs-4"></i>
                                        <div>
                                            <small class="text-muted d-block">
                                                Correo electrónico
                                            </small>
                                            <strong>
                                                <?= htmlspecialchars($user['email']) ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                            </div>

                    </div>

                    <div class="card-footer text-center bg-white">

                        <a href="index.php" class="btn btn-outline-primary">
                            <i class="bi bi-house-door-fill me-1"></i>
                            Volver al inicio
                        </a>

                        <a href="logout.php" class="btn btn-outline-danger ms-2">
                            <i class="bi bi-box-arrow-right me-1"></i>
                            Cerrar sesión
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>