<?php
$arr = [["cod" => 1, "nombre" => "Inma", "apellidos" => "Olías", "edad" => 30, "profesion" => "Profesora"],
    ["cod" => 2, "nombre" => "Manuel", "apellidos" => "García", "edad" => 25, "profesion" => "Mecánico"],
    ["cod" => 3, "nombre" => "Carlos", "apellidos" => "Fernández", "edad" => 20, "profesion" => "Ganadero"]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            echo "<tr><td><a href = \"?cod=" . $persona["cod"] . "\">" . $persona["cod"] . "</a></td>" . "<td>" . $persona["nombre"] . "</td>" . "<td>" . $persona["apellidos"] . "</td>" . "<td>" . $persona["edad"] . "</td>" . "<td>" . $persona["profesion"] . "</td>";
        }
    ?>
</table>

<?php
if (isset($_GET["cod"])) {
    $cod = $_GET["cod"];
}
?>
</body>
</html>
