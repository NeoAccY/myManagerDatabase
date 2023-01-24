<?php

include ('./controller/file.php');

$response1 = '';
$response2 = '';
$response3 = '';

    $data = $_GET['Database'];
    $table = $_GET['table'];

    $servername = "localhost";
    $username = "root";
    $pass = "";

    $conexion = mysqli_connect($servername, $username, $pass, $data);

    if(!$conexion){
        echo "No se pudo conectar al Servidor";
        exit;
    }

    $sql = "SHOW COLUMNS FROM {$table}";

    $result = mysqli_query($conexion, $sql);
    if(!$result){
        echo "No se puedieron listar las columnas de la tabla: {$table}".mysqli_error($conexion);
        exit;
    }

    $rows = mysqli_num_rows($result);
    if ($rows < 0) {
        echo "La tabla solicitada no cuenta con ninguna columna ...";
    }


    // $conexion = mysqli_connect('localhost', 'root', '');
    // $resultado = mysqli_query($conexion, "SHOW DATABASES ");
    
    if(isset($_POST['Execute'])){
        $bd = $_POST['data'];
        $info = $_POST['consulta'];
        $consulta = trim($_POST['consulta']);

        $conexion = mysqli_connect('localhost', 'root', '', $bd);

        if(!$conexion){
            die ( "Connection failed: ".mysqli_connect_error());
        }else{
            $exito="<br> Conexion con exito";
        }
        $sql = trim($consulta);

        $result = mysqli_query($conexion, $sql);
        if($result){
            $response1 =  '<h5>Insert into aplicado exitosamente...</h5>';
            $response2 =  nl2br($sql).'<br><br>';
        }else{
            $response3= "<br>Insert into error: Ingrese una consulta SQL valida ->".mysqli_error($conexion);
        }
    }
    require_once('../templates/header.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <form action="" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
        enctype="multipart/form-data">

        <div class="title-cards">
            <h2 style="color:red">Insert Into</h2>
        </div>
        <div class="container-card">

            <div class="card">

                <div class="contenido-card">
                    <h3 style="color:blue">Database</h3>
                    <label style="" for="">Database ('USE'): <?php echo $data ?></label>

                </div>
            </div>
            <div class="card">

                <div class="contenido-card">
                    <h3 style="color:blue">Table</h3>
                    <br><label for="">Insert into table: <?php echo $table ?></label>

                </div>
            </div>
            <div class="card">

                <div class="contenido-card">
                    <h3 style="color:blue">Table fields</h3>
                    <?php
     if($result!=""){
        echo "Campos de la tabla: {$table} ";
        while($rowes = mysqli_fetch_row($result)){
            echo "| {$rowes[0]}.{$rowes[1]}.' '.{$rowes[2]}. ' '. {$rowes[3]}  ";
        }
    }
     ?>

                </div>
            </div>
        </div>

        <!-- <select name="base" id="base">
        <option value="0">Select base datos.</option>
        <?php
            // while($row = mysqli_fetch_assoc($resultado)){
            //     echo "<option value='".$row['Database']."'>".$row['Database']."</option>";
            // }
        ?>
    </select> -->
        <p></p>
        <textarea
            style="margin-left:130px; min-width: 950px; width: 950px; min-height: 100px; height: 200px; max-width: 950px; max-height: 200px"
            name="consulta" id="consulta" cols="70" rows="10"></textarea>
        <p></p>
        <input style="margin-left:530px;" class="btn btn-green" type="submit" name="Execute" value="Execute">
        <input class="btn btn-red" type="reset" name="limpiar" value="Clean SQL">

        <input type="hidden" name="data" value="<?= $_GET['Database'];?>">
    </form>

    <?php
        if($response1 != '' && $response2 != ''){
            echo $response1;
            echo $response2;
        }else{
            if($response3 != ''){
                echo $response3;
            }
        }
    ?>
    </div>

</body>

</html>


<?php
    require_once('../templates/footer.php');
?>