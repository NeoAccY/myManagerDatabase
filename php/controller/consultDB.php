<?php
    require_once ('connection.php');
    global $conexion;
    // $conexion = mysql_connect('localhost', 'root', '');
//     $db_list = mysql_list_dbs($conexion);

//     $i = 0;
//     $cnt = mysql_num_rows($db_list);
// 

$resultado = mysqli_query($conexion, "SHOW DATABASES ");

?>