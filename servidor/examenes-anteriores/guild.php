<?php
/*
 * PRUEBA PRÁCTICA: GREMIO DE HÉROES EN PRÁCTICAS
 *
 * El formulario y los estilos ya están preparados.
 */

session_start();

// CATÁLOGO DE OBJETOS
$items = [
    "sword" => ["name" => "Espada de prácticas", "weight" => 4],
    "shield" => ["name" => "Escudo de tapa de olla", "weight" => 3],
    "potion" => ["name" => "Poción de café", "weight" => 1],
    "duck" => ["name" => "Pato de apoyo emocional", "weight" => 2]
];

// ALMACEN DE HÉROES
$heroes = [
    "wizard" => [
        "name" => "Gandalf el Despistado",
        "capacity" => 6,
        "itemCodes" => []
    ],
    "explorer" => [
        "name" => "Lara Croft de FP",
        "capacity" => 8,
        "itemCodes" => []
    ],
    "warrior" => [
        "name" => "Link sin presupuesto",
        "capacity" => 5,
        "itemCodes" => []
    ]
];

// VARIABLES DE TRABAJO: el HTML inferior utiliza estos nombres.
$heroCode = "";             // Variable para almacenar el código del personaje solicitado, si lo hay.
$hero = null;               // Variable para almacenar el heroe, si se ha seleccionado heroe.
// Si no hay ningun seleccionado estará a null.
$error = "";                // Mensaje de error; vacío si no hay error.
$success = "";              // Mensaje de confirmación; vacío si no hay éxito.

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['heroCode'])) {
        $heroCode = $_GET['heroCode'];
        
        foreach ($heroes as $key => $value) {
            if ($heroCode === $key) {
                $hero = $value;
                $success = 'Personaje encontrado';
            }
        }

        if (is_null($hero)) {
            $error = 'Personaje no encontrado';
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST)) {
        
    }
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gremio de héroes en prácticas</title>
    <!-- Bootstrap está preparado. Su carga por CDN requiere conexión. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
</head>

<body class="bg-body-tertiary">
    <header class="bg-dark text-white border-bottom border-warning border-4">
        <div class="container py-4">
            <span class="badge text-bg-warning mb-2">OFICINA DE AVENTURAS</span>
            <h1 class="h2 fw-bold mb-2">Gremio de héroes en prácticas</h1>
            <p class="mb-0 text-white-50">
                Prepara la mochila. Salva el mundo. Vuelve antes del recreo.
            </p>
        </div>
    </header>

    <main class="container py-4">
        <!-- Mensajes preparados: basta con dar valor a $error o $success. -->
        <?php if ($error !== "") { ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php } ?>

        <?php if ($success !== "") { ?>
            <div class="alert alert-success" role="alert">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php } ?>

        <section class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h2 class="h4">Personajes del gremio</h2>
                <p class="text-secondary">Cada héroe tiene un límite. Su mochila también.</p>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Personaje</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col">Equipo actual</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            /*
                             * TODO. 2. Listado de personajes.
                             * Debajo tienes una fila de ejemplo.
                             * Esta fila es para que te sirva para ver un estilo decentillo, 
                             * debes quitala y poner la información de los héroes
                            */
                            ?>

                            <?php
                            foreach ($heroes as $heroCode => $value) {
                            ?>
                            <tr>
                                <td class="fw-semibold"><a href="?heroCode=<?php echo $heroCode; ?>"><?php echo $heroCode; ?></a></td>
                                <td><span class="badge text-bg-dark"><?php echo $value['capacity']; ?></span></td>
                                <td>
                                    <?php if (empty($value['itemCodes'])) { ?>
                                    <span class="badge text-bg-secondary">
                                        <?php echo 'Sin equipo'; ?>
                                    </span>
                                    <?php } else {
                                        foreach ($heroes as $hero) { ?>
                                            <span class="badge text-bg-secondary">
                                                <?php echo ''; ?>
                                            </span>
                                        <?php }
                                    } ?>
                                </td>
                                <td>
                                    <a href="" class="btn btn-outline-primary btn-sm">Preparar mochila</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- FORMULARIO PREPARADO: se muestra cuando $hero contiene un personaje. -->
        <?php if ($hero !== null) { ?>
            <section class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-start mb-3">
                        <div>
                            <h2 class="h4 mb-1">Preparar mochila</h2>
                            <p class="text-secondary mb-0">
                                <?= htmlspecialchars($hero["name"]) ?>
                            </p>
                        </div>
                        <span class="badge text-bg-warning p-2">
                            Capacidad: <?= $hero["capacity"] ?> unidades
                        </span>
                    </div>

                    <form  method="POST">
                        <fieldset>
                            <legend class="fs-6 fw-semibold">Elige uno o varios objetos</legend>
                            <div class="row g-3">
                                <?php foreach ($items as $key => $value) { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"? name="<?php echo $key; ?>">
                                        <label for="<?php echo $key;?>"><?php echo $value['name']; ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </fieldset>

                        <p class="form-text mt-3">
                            La nueva selección sustituirá la mochila anterior.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary">Guardar mochila</button>
                            <a href="guild.php" class="btn btn-outline-secondary">Volver al listado</a>
                        </div>
                    </form>
                </div>
            </section>
        <?php } ?>

        <p class="small text-secondary text-center mt-4 mb-0">
            El gremio no se hace responsable de las aventuras sin café.
        </p>
    </main>
</body>

</html>