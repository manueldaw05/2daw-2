<?php
session_start();
require_once __DIR__ . '/db/config.php';
include __DIR__ . '/user/userRepository.php';

$error = "";
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Mi Tienda</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            min-height: 100vh;
        }

        .login-card {
            border-radius: 20px;
            overflow: hidden;
        }

        .logo {
            font-size: 3rem;
        }

        .form-control {
            padding: 12px;
        }

        .btn-login {
            padding: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-5">
            <div class="card shadow-lg login-card border-0">

                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <div class="logo">🛒</div>
                        <h2 class="fw-bold">AulaTech</h2>
                        <p class="text-muted">
                            Accede a tu cuenta
                        </p>
                    </div>

                    <form action="" method="POST">

                        <div class="mb-3">
                            <label class="form-label">
                                Nombre de usuario
                            </label>
                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                placeholder="user00"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Contraseña
                            </label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="********"
                                required>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <input type="checkbox" id="recordar">
                                <label for="recordar">
                                    Recordarme
                                </label>
                            </div>

                            <a href="#" class="text-decoration-none">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100 btn-login">
                            Iniciar Sesión
                        </button>

                    </form>

                    <hr>

                    <div class="text-center">
                        <p class="mb-0">
                            ¿No tienes cuenta?
                            <a href="register.php"
                               class="text-decoration-none fw-bold">
                                Regístrate
                            </a>
                        </p>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>