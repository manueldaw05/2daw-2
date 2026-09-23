<?php
$alumnos = [
 ["nombre" => "Ana", "edad" => 19, "nota" => 7.5],
 ["nombre" => "Luis", "edad" => 21, "nota" => 6.8],
 ["nombre" => "Marta", "edad" => 18, "nota" => 9.2],
 ["nombre" => "Carlos", "edad" => 20, "nota" => 5.4],
];

$mayorNota = $alumnos[0]["nota"];
$notaMedia = 0;
$alumnosMayoresDe19 = [];

foreach ($alumnos as $alumno) {
    $notaMedia += $alumno["nota"];
        if ($alumno["nota"] > $mayorNota) {
            $alumnoMayorNota = $alumno["nombre"];
        }

        if ($alumno["edad"] > 19) {
            array_push($alumnosMayoresDe19, $alumno);
        }
}

$notaMedia = $notaMedia / count($alumnos);

echo $alumnoMayorNota . " tiene la mayor nota<br><br>";
echo "La nota media de la clase es de " . $notaMedia . "<br><br>";
echo "Los alumnos mayores de 19 años son: <br>";

foreach ($alumnosMayoresDe19 as $alumno) {
    echo "- " . $alumno["nombre"]. "<br>";
}
