<?php
    session_start();

    $response ="";

        if(!isset($_SESSION["nombreUsuario"])){
            header("Location:../index.php");
        }else{
            if (isset($_POST['Create'])){
                require_once ("./controller/connection.php");
                global $conexion;
                $servername = "localhost";
                $username = "root";
                $password = "";
    
                // Create connection
                $conn = mysqli_connect ($servername, $username, $password);
                // Test connection
                if (!$conn) {
                die ( "Connection failed:". mysqli_connect_error ());
                }
    
                // if(isset($_POST['Create'])){
                    // CREATE DATABASE dbname CHARACTER SET utf8 COLLATE utf8_general_ci;

                    $consult= "CREATE DATABASE ";
                    $nameDB = trim($_POST['nameBD']);
                    $complement = " CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
    
    
                    $sql = $consult.$nameDB.$complement;
                    $exe = mysqli_query ($conn,$sql);
    
                    if ($exe) {
                        $response = "Database successfully created: ".$nameDB;
                    } else {
                        $response = "Error creating database: " .mysqli_error($conn);
                    }
                    mysqli_close ($conn);
    
                
            }
        }
?>