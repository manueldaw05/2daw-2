<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de alumnos</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <h1>Gestión de alumnos</h1>

    <form action="" method="get">
        <button type="submit" name="opcion" value="mayorNota">
            Alumno con mayor nota
        </button>

        <button type="submit" name="opcion" value="media">
            Media de las notas
        </button>

        <button type="submit" name="opcion" value="mayores19">
            Alumnos mayores de 19
        </button>
    </form>

<?php
$alumnos = [
    ["nombre" => "Ana", "edad" => 19, "nota" => 7.5],
    ["nombre" => "Luis", "edad" => 21, "nota" => 6.8],
    ["nombre" => "Marta", "edad" => 18, "nota" => 9.2],
    ["nombre" => "Carlos", "edad" => 20, "nota" => 5.4],
];

if (isset($_GET["opcion"])) {
    $opcion = $_GET["opcion"];

    if ($opcion == "mayorNota") {
        $mayorNota = $alumnos[0]["nota"];
        $alumnoMayorNota = $alumnos[0]["nombre"];

        foreach ($alumnos as $alumno) {
            if ($alumno["nota"] > $mayorNota) {
                $mayorNota = $alumno["nota"];
                $alumnoMayorNota = $alumno["nombre"];
            }
        }

        echo "<h2>Alumno con mayor nota</h2>";
        echo "<p>$alumnoMayorNota tiene la mayor nota: $mayorNota</p>";
    }

    if ($opcion == "media") {
        $suma = 0;

        foreach ($alumnos as $alumno) {
            $suma += $alumno["nota"];
        }

        $media = $suma / count($alumnos);

        echo "<h2>Media de las notas</h2>";
        echo "<p>La nota media de la clase es: $media</p>";
    }

    if ($opcion == "mayores19") {
        echo "<h2>Alumnos mayores de 19 años</h2>";

        foreach ($alumnos as $alumno) {

            if ($alumno["edad"] > 19) {
                echo "<p>- " . $alumno["nombre"] . "</p>";
            }
        }
    }
}
?>

</body>
</html>
