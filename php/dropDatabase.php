<?php
include ('./controller/file.php');
mysqli_report(MYSQLI_REPORT_ERROR);
session_start();
    $nameData = $_GET['Database'];
    
    require_once ('../templates/header.php');
    $response = "";

    if(isset($_POST['Drop'])){
        require_once ('controller/connection.php');
        global $conexion;
        $Database = $_POST['nameData'];

        $sql = "DROP DATABASE ".$Database;

        $result=mysqli_query($conexion,$sql);

        if($result){
            // echo '<script type="text/javascript">
            // alert("Database '.$Database.' deleted with success");
            // window.location.href="viewDatabase.php";
            // </script>';
            $response =  "Database ".$Database." deleted with success";
        }else{
            echo '<script type="text/javascript">
            alert("Error when wanting to delete the databases");
            </script>';
        }
    }

?>

<link rel="stylesheet" type="text/css" href="../css/styles.css">
<div class="form" style="margin-top: 60px;">
    <h3 style="color:red; margin-left: 72px;">Drop Database</h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="" style="margin-left: 110px;">Name Database:</label>
        <input readonly disabled class="form-control-plaintext text-white bg-danger text-center font-weight-bold"
            type="text" name="nameBD" id="nameBD" value="<?php echo mb_strtoupper($nameData);?>">
        <input class="btn btn-warning" type="submit" name="Drop" value="Drop">
        <input type="hidden" id='nameData' name='nameData' value="<?= $nameData?>">
        <?php
                if($response != ''){
                ?>
        <p><?php
                echo "<div class='err'>".' '.$response.'</div>'; 
                ?></p>
        <?php
                } 
                ?>
    </form>
</div>

<?php

    require_once ('../templates/footer.php');
?>