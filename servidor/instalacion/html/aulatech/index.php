<?php
session_start();

include __DIR__ . '/db/connection.php';
include __DIR__ . '/user/userRepository.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AulaTech</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        defer
    ></script>

    <style>
        .hero {
            background: linear-gradient(rgb(7, 7, 7), rgb(20, 40, 90));

            background-size: cover;
            background-position: center;
            min-height: 500px;
            color: white;
        }

        .product-card {
            height: 100%;
            transition: .3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            height: 250px;
            object-fit: cover;
        }

        .category-card {
            transition: .3s;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        footer {
            background: #212529;
        }
    </style>

</head>

<body>

    <!-- Menú -->
    <?php include __DIR__ . '/menu/menu.php'; ?>

    <!-- Hero -->
    <section class="hero d-flex align-items-center">

        <div class="container text-center">

            <h1 class="display-3 fw-bold">
                Las mejores ofertas
            </h1>

            <p class="lead">
                Encuentra los productos que necesitas al mejor precio.
            </p>

            <a href="#" class="btn btn-primary btn-lg">
                Comprar ahora
            </a>

        </div>

    </section>

    <!-- Productos destacados -->
    <section class="bg-light py-5">

        <div class="container">

            <h2 class="text-center mb-5">
                Productos destacados
            </h2>

            <div class="row g-4">

                <!-- Producto 1 -->
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card product-card shadow-sm">

                        <img
                            src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd"
                            class="card-img-top"
                            alt="Smartphone Premium"
                        >

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">
                                Smartphone Premium
                            </h5>

                            <p class="text-muted">
                                Última generación.
                            </p>

                            <h4 class="text-primary">
                                599€
                            </h4>

                            <button class="btn btn-primary w-100 mt-auto">
                                Añadir al carrito
                            </button>

                        </div>

                    </div>

                </div>

                <!-- Producto 2 -->
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card product-card shadow-sm">

                        <img
                            src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e"
                            class="card-img-top"
                            alt="Auriculares Bluetooth"
                        >

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">
                                Auriculares Bluetooth
                            </h5>

                            <p class="text-muted">
                                Sonido de alta calidad.
                            </p>

                            <h4 class="text-primary">
                                89€
                            </h4>

                            <button class="btn btn-primary w-100 mt-auto">
                                Añadir al carrito
                            </button>

                        </div>

                    </div>

                </div>

                <!-- Producto 3 -->
                <div class="col-12 col-md-6 col-lg-4">

                    <div class="card product-card shadow-sm">

                        <img
                            src="https://images.unsplash.com/photo-1523275335684-37898b6baf30"
                            class="card-img-top"
                            alt="Reloj Inteligente"
                        >

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">
                                Reloj Inteligente
                            </h5>

                            <p class="text-muted">
                                Control total desde tu muñeca.
                            </p>

                            <h4 class="text-primary">
                                149€
                            </h4>

                            <button class="btn btn-primary w-100 mt-auto">
                                Añadir al carrito
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->
    <?php include __DIR__ . '/menu/footer.php'; ?>

</body>

</html>
