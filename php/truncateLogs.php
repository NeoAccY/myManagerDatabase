<?php
include ('./controller/file.php');
session_start();
    $response = '';
    $dataDabase = $_GET['Database'];
    $nameTable = $_GET['table'];

    require_once ('../templates/header.php');

    if(isset($_POST['Drop'])){

    require_once ('controller/connection.php');
    global $conexion;
    $Database = $_POST['nameData'];
    $Table = $_POST['nameTable'];

    $sql = "TRUNCATE TABLE ".$Database.".".$Table;

    $result=mysqli_query($conexion,$sql);

    if($result){
        $response =  "The records in table ".$Table." have been successfully deleted.";
    }else{
        echo '<script type="text/javascript">
        alert("Error trying to delete records in table '.$Table.'");
        </script>';
    }
}
?>

<link rel="stylesheet" type="text/css" href="../css/styles.css">
<div class="form" style="margin-top: 60px;">
    <h5 style="color:red; margin-left: 30px;">You are about to TRUNCATE an entire table!: <b
            style="color:green"><?= mb_strtoupper($nameTable) ?></b></h5>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <!-- <label for="" style="margin-left: 72px;">Name Table:</label>
            <input readonly disabled class="form-control-plaintext text-white bg-danger text-center font-weight-bold" type="text" name="nameBD" id="nameBD" value="<?php // echo mb_strtoupper($nameTable);?>"> -->
        <input class="btn btn-warning" type="submit" name="Drop" value="Truncate">
        <input type="hidden" id='nameData' name='nameData' value="<?= $dataDabase?>">
        <input type="hidden" id='nameTable' name='nameTable' value="<?= $nameTable?>">
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