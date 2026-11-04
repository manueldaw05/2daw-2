<?php
$loggedIn = isset($_SESSION['role']);
$isAdmin = $loggedIn && $_SESSION['role'] === 'admin';
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            🛒 AulaTech
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu"
            aria-controls="menu"
            aria-expanded="false"
            aria-label="Mostrar navegación"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <?php
                if ($loggedIn) {
                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="articles.php">Artículos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Mis datos</a>
                    </li>

                    <?php
                    if ($isAdmin) {
                    ?>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Añadir artículo</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Gestionar usuarios</a>
                        </li>

                    <?php
                    }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            Cerrar sesión
                        </a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a href="#" class="btn btn-outline-light">
                            🛒 Carrito
                        </a>
                    </li>

                <?php
                } else {
                ?>

                    <li class="nav-item">
                        <a href="login.php" class="btn btn-outline-light">
                            Iniciar sesión
                        </a>
                    </li>

                <?php
                }
                ?>

            </ul>

        </div>

    </div>

</nav>
