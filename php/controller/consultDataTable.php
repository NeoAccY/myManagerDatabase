<?php

    $nameTable = $_GET['table'];
    $nameData = $_GET['Database'];

    $servername = "localhost";
    $username = "root";
    $pass = "";

    $conexion = mysqli_connect($servername, $username, $pass, $nameData);

    if(!$conexion){
        echo "No se pudo conectar al Servidor";
        exit;
    }

    $sql = "SHOW COLUMNS FROM {$nameTable}";

    $result = mysqli_query($conexion, $sql);
    if(!$result){
        echo "No se puedieron listar ,as columnas de la tabla: {$nameTable}".mysqli_error($conexion);
        exit;
    }

    $rows = mysqli_num_rows($result);
    if ($rows < 0) {
        echo "La tabla solicitada no cuenta con ninguna columna ...";
    }

    $sql2 = "SELECT * FROM {$nameTable}";

    $result2 = mysqli_query($conexion,$sql2);

    if(!$result2){
        echo "No se pudieron listar las filas insertadas en la tabla: {$nameTable}".mysqli_error($conexion);
    }

//  if($row = mysqli_num_rows($result2)){
            // $array = $fila;
            // foreach($array as $v){
                // echo '<>'.$v.'</>';
                // echo "<br>";
            // }
            // echo "</br>";

        // for ($fila=0; $fila <= $data=mysqli_fetch_assoc($result2); $fila++) { 
        //     echo "<p>{$data[$fila]}</p>";
        // }
    // }else{
    //     echo mysqli_num_rows($result2);
    // }


?>