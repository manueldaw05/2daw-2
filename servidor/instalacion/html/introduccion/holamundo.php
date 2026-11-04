<?php
    
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
    if (isset($_POST["name"])) {
        $name = $_POST["name"];

    } else {
        $name = "";
    }

    if (isset($_POST["age"])) {
            $age = $_POST["age"];
    } else {
            $age = "";
    }

    if (isset($_POST["number"])) {
            $number = $_POST["number"];
    } else {
            $number = "";
    }

    if ($age != "" && $age < 18) {
        echo "$name, no puedes acceder a esta web";
    } elseif ($age != "" && $age >= 18) {
        echo "Bienvenido, $name";
    }

    if (isset($_POST["number"])) {
        echo "Tablas de multiplicar del número $number<br>";
        $result;
        for ($i = 1; $i <= 10; $i++) {
            $result = $number * $i;
            echo "$number x $i = $result <br>";
        }
    }
    
?>

<form method="post">
  <div class="form-group row">
    <label for="name" class="col-4 col-form-label">Nombre</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="name" name="name" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="age" class="col-4 col-form-label">Edad</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="age" name="age" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="number" class="col-4 col-form-label">Número</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-number">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="number" name="number" type="number" class="form-control">
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
  
</form>
