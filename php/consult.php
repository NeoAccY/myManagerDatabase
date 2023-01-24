<?php
include ('./controller/file.php');
require_once ('../templates/header.php');


 if($_POST['Execute']){ 
 if (!empty($_GET)) {
	$server='localhost';
	$user='root';
	$pass='';

    $db = $_REQUEST['db'];
    $consulta = $_REQUEST['consul'];
    $data = trim($consulta);
    //conexion nueva con la db
    $conn = mysqli_connect($server, $user, $pass, $db);

    $datos = mysqli_query($conn, $data);


    if (!$conn) {
        die("La conexión ha fallado: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $consulta)) {
        // Mostramos mensaje si la tabla ha sido creado correctamente!
        $succes =  "Successfully";
    } else {
        // Mostramos mensaje si hubo algún error en el proceso de creación
        echo "Error: " . mysqli_error($conn);
    }
}
 }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL</title>
</head>
<style>
.btn {
    border-radius: 3px;
    display: inline-block;
    text-decoration: none;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.3);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
}

.btn-green {
    color: white;
    background-color: #3CC93F;
}

.btn-green:hover {
    background-color: #37B839;
}

.btn-green:active {
    background-color: #29962A;
}
</style>

<body>
    <div style="margin-left:70px;">
        <?php
        echo $db, ' -- ', $consulta;
        ?>
        <form action="" method="POST">
            <br>use
            <input style="margin-left: 25px;" type="text" name="db" id="db" placeholder="Nombre de la base de datos"
                value="<?= $_GET['Database']; ?>">
            <p></p>
            <textarea style="margin-left:55px; min-width: 950px; width: 950px; min-height: 100px; height: 200px; max-width: 950px; max-height: 200px" type='text' name="consul" id="consul" cols="100" rows="10"></textarea>
            <p></p>
            <input style="margin-left:470px;" type="submit" value="Execute" name="Execute" class="btn btn-green">
            <input type="hidden" name="data" value="<?= $_GET['Database'];?>">
        </form>

        <div style="margin-top:5px;margin-left: 85px; padding:20px; background-color:white; width:75%">
            <?php
        while ($fila = mysqli_fetch_row($datos)){
            foreach ($fila as $filas) {
            echo utf8_encode($filas). " | ";
            }
            echo "<p>";
        }
    ?>
        </div>
    </div>
</body>

</html>

<?php
    require_once ('../templates/footer.php');
?>