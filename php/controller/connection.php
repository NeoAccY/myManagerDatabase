<?php

$hostname = "localhost";
$port = 3306;
$user = "root";
$pass = "";

// require ('config.php');
// global $servername;
// global $username;
// global $password;

// $hostname = $servername;
// $user = $username;
// $pass = $password;

//revisar conexión con el XAMPP DE ISAAC
    $conexion = mysqli_connect($hostname, $user, $pass) or die ("No se pudo conectar con el servidor: " .mysqli_error($conexion));

    if (!$conexion) {
        die($sucessfullConecc="Conexion Fallo: " .mysqli_connect_error());
    }else {
        $sucessfullConecc = "La conexión ha sido exitosa.";
    }

?>