<?php
    require_once('controller/connection.php');
    require_once('../templates/header.php');
?>
        <div style="margin-left: 5%;">
        <h1>Bienvenido a su Gestor de Bases de Datos</h1>
            <span style="color: #E52800;"><?php  echo $sucessfullConecc; ?></span>
        </div>
    </section>

<?php
    require_once('../templates/footer.php');
?>