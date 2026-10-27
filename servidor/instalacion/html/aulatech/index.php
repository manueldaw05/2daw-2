<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AulaTech</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)),
                url('https://images.unsplash.com/photo-1441986300917-64674bd600d8');
            background-size: cover;
            background-position: center;
            height: 500px;
            color: white;
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

    <?php include __DIR__ . '/menu/menu.php'; ?>

    <!-- Hero -->
    <section class="hero d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-3 fw-bold">Las mejores ofertas</h1>
            <p class="lead">Encuentra los productos que necesitas al mejor precio.</p>
            <a href="#" class="btn btn-primary btn-lg">Comprar Ahora</a>
        </div>
    </section>

    <!-- Productos destacados -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Productos Destacados</h2>

            <div class="row g-4">
                <div class="card product-card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Smartphone Premium</h5>
                        <p class="text-muted">Última generación.</p>
                        <h4 class="text-primary">599€</h4>
                        <button class="btn btn-primary w-100">
                            Añadir al carrito
                        </button>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="card product-card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Auriculares Bluetooth</h5>
                        <p class="text-muted">Sonido de alta calidad.</p>
                        <h4 class="text-primary">89€</h4>
                        <button class="btn btn-primary w-100">
                            Añadir al carrito
                        </button>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="card product-card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Reloj Inteligente</h5>
                        <p class="text-muted">Control total desde tu muñeca.</p>
                        <h4 class="text-primary">149€</h4>
                        <button class="btn btn-primary w-100">
                            Añadir al carrito
                        </button>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <?php include __DIR__ . '/menu/footer.php'; ?>

</body>

</html>