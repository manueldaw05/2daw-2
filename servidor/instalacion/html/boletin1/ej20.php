<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de alumnos</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?opcion=1">Ver media <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ejercicio20.php?opcion=2">Ver nota mayor</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="ejercicio20.php?opcion=3">Ver listado de mayores</a>
      </li>
  </div>
</nav>
hola

<?php
  $selectedInterests = isset($_POST["intereses[]"]) ? $_POST["intereses[]"] : "";
?>

<form method ="POST"> 
<p>Intereses (selecciona los que apliquen):</p>

<label><input type="checkbox" name="intereses[]" value="tecnologia" <?php if ($selectedInterests == array_search("tecnologia", $selectedInterests)) echo "selected"; ?>>Tecnología</label>
<br>
<label><input type="checkbox" name="intereses[]" value="deporte" <?php if ($selectedInterests == array_search("deporte", $selectedInterests)) echo "selected"; ?>> Deporte</label>
<br>
<label><input type="checkbox" name="intereses[]" value="lectura" <?php if ($selectedInterests == array_search("lectura", $selectedInterests)) echo "selected"; ?>> Lectura</label>
<br>
<label><input type="checkbox" name="intereses[]" value="viajes" <?php if ($selectedInterests == array_search("viajes", $selectedInterests)) echo "selected"; ?>> Viajes</label>
<br><br>

<?php
$selectedGender = isset($_POST["genero"]) ? $_POST["genero"] : "";
?>
<p>Género:</p>
<label><input type="radio" name="genero" value="hombre" <?php if ($selectedGender == "hombre") echo "selected"; ?>> Hombre</label><br>
<label><input type="radio" name="genero" value="mujer" <?php if ($selectedGender == "mujer") echo "selected"; ?>> Mujer</label><br>
<label><input type="radio" name="genero" value="otro" <?php if ($selectedGender == "otro") echo "selected"; ?>> Otro</label><br><br>

<?php
$selectedYear = isset($_POST["curso"]) ? $_POST["curso"] : "";
?>
<p>Curso:</p>
<label><input type="radio" name="curso" value="primero" <?php if ($selectedYear == "primero") echo "selected"; ?>> 1º Daw</label><br>
<label><input type="radio" name="curso" value="segundo" <?php if ($selectedYear == "segundo") echo "selected"; ?>> 2º Daw</label><br>
<label><input type="radio" name="curso" value="otro" <?php if ($selectedYear == "otro") echo "selected"; ?>> Otro</label><br><br>

<label>
País:
<?php
  $selectedCountry = isset($_POST["pais"]) ? $_POST["pais"]: "";
?>
<select name="pais">

  <option value="es" <?php if ($selectedCountry== "es") echo "selected";?> >España</option>
  <option value="mx" <?php if ($selectedCountry== "mx") echo "selected";?> >México</option>
  <option value="ar" <?php if ($selectedCountry== "ar") echo "selected";?> >Argentina</option>
</select>
</label><br><br>

<input type="submit">


</form>
</body>
</html>
