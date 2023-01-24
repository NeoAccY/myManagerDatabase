<?php
    require_once('php/controller/login.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Databases</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div>
        <!-- Aquí debe aparecer una imagen-->
        <nav class="nav">
                <img src="" alt="" class="logo">
        </nav>
    </div>
    <div class="container">
        <div class="form">
            <?php
            if($fallo != '') {
                echo'<div class="error"> • '.$fallo.'</div>';
        }
            ?>
            <!--Imagen del logo del Login-->
            <div class="thumbnail">
                <img src="images/icon.png"/>
            </div>
            <form name="formLogin" action="index.php" method="POST">
                <h2>Inicio de Sesión</h2>
                <label for="Usuario" class="text">Usuario</label>
                <input type="text" id="user" name="user" placeholder="Ingrese su Usuario" value="<?php if (isset($userL)) echo $userL ?>"/>
                <label for="Contraseña" class="text">Contraseña</label>
                <input type="password" id="pass" name="pass" placeholder="Ingrese su Contraseña" value="<?php if(isset($passL)) echo $passL ?>"/>
                <button class="boton" type="submit" name="Ingresar">Ingresar</button>
            </form>
        </div>
    </div>
    <footer class="footer">
        <div class="info">
            <p>My Management Databases</p>
            <h5> © 2022. Todos los derechos reservados.</h5>
        </div>
    </footer>    
</body>
</html>