<?php
$saludos = ["es" => "Hola", "en" => "Hello", "fr" => "Bonjour"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <form method="POST">
        <label for="idioma">Idioma</label>
        <select name="idioma">
            <option value="es" name="es">Español</option>
            <option value="en" name="en">Inglés</option>
            <option value="fr" name="fr">Francés</option>
        </select>
        <input type="submit"></input>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idioma = $_REQUEST["idioma"];

        if ($idioma === "es") {
            echo $saludos["es"];
        } else if ($idioma === "en") {
            echo $saludos["en"];
        } else if ($idioma === "fr") {
            echo $saludos["fr"];
        }
    }
    ?>
</body>
</html>