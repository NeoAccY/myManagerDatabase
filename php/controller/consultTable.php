<?php
    $nameData = $_GET['Database'];

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $myDB = mb_strtoupper(strval(trim($_GET['Database'])));
    $DB =  trim($_GET['Database']);

    $conexion = mysqli_connect($servername, $username, $pass, $myDB);

    if(!$conexion){
        echo "No se pudo conectar a Mysql";
        exit;
    }

    $sql = "SHOW TABLES";

    $resultado = mysqli_query($conexion,$sql);

    if (!$resultado) {
        echo 'No se pudieron listar las tablas : ' .mysqli_error($conexion);
        exit;
    }
?>