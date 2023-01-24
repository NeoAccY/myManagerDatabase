<?php
session_start();

$fallo = "";

if (!empty($_POST)) {

    $userL = ($_POST['user']);
    $passL = ($_POST['pass']);
    $userSis = "admin";
    $passSis = "admin";

    if (empty($userL) && empty($passL)) {
        $fallo = "Ingrese usuario y contraseña.";
        
    } elseif (empty($userL)) {
        $fallo = "Ingrese su usuario.";
        
    } elseif (empty($passL)){
        $fallo = "Ingrese una contraseña.";
        
    } elseif($userL != $userSis && $passL != $passSis){
        $fallo = "Usuario o contraseña son incorrectos";

    }else if ($userL != $userSis){
        $fallo = "Usuario incorrecto";

    }else if($passL != $passSis){
        $fallo = "Contraseña incorrecta";
    } else {

        if($userL == $userSis && $passL == $passSis){
            $_SESSION['user'] = "ok";
            $_SESSION['nombreUsuario'] = "admin";
            header('Location:php/main.php');
        }
        
    }
}
?>
