<?php
$arr = [
    ["cod" => 1, "nombre" => "Inma", "apellidos" => "Olías", "edad" => 30, "profesion" => "Profesora"],
    ["cod" => 2, "nombre" => "Manuel", "apellidos" => "García", "edad" => 25, "profesion" => "Mecánico"],
    ["cod" => 3, "nombre" => "Carlos", "apellidos" => "Fernández", "edad" => 20, "profesion" => "Ganadero"]
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>

    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <style>
        td a {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <h1>Personas</h1>

    <table>

        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Profesión</th>
        </tr>

        <?php
        foreach ($arr as $persona) {

            echo "<tr>
                    <td>
                        <a href='?cod=" . $persona["cod"] . "'>"
                        . $persona["cod"] .
                        "</a>
                    </td>
                    <td>" . $persona["nombre"] . "</td>
                    <td>" . $persona["apellidos"] . "</td>
                    <td>" . $persona["edad"] . "</td>
                    <td>" . $persona["profesion"] . "</td>
                </tr>";
        }

        ?>

    </table>

<?php
if (isset($_GET["cod"])) {
    $cod = $_GET["cod"];

    foreach ($arr as $persona) {

        if ($persona["cod"] == $cod) {

            echo '<form action="" method="GET">

                    <input type="hidden" name="cod" value="' . $persona["cod"] . '">

                    <label for="nombre">Nombre</label><br>
                    <input type="text" id="nombre" name="nombre" value="' . $persona["nombre"] . '" required>
                    <br><br>

                    <label for="apellidos">Apellidos</label><br>
                    <input type="text" id="apellidos" name="apellidos" value="' . $persona["apellidos"] . '" required>
                    <br><br>

                    <label for="edad">Edad</label><br>
                    <input type="number" id="edad" name="edad" value="' . $persona["edad"] . '" required>
                    <br><br>

                    <label for="profesion">Profesión</label><br>
                    <input type="text" id="profesion" name="profesion" value="' . $persona["profesion"] . '" required>
                    <br><br>

                    <button type="submit">Modificar</button>

                </form>';

        }
    }
}

?>

</body>
</html>
