<?php
include ('./controller/file.php');
mysqli_report(MYSQLI_REPORT_ERROR);
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

    $sql = "DROP TABLE ".$Database.".".$Table;

    $result=mysqli_query($conexion,$sql);

    if($result){
        $response =  "Table ".$Table." of Database deleted with success";
    }else{
        echo '<script type="text/javascript">
        alert("Error when wanting to delete the databases");
        </script>';
    }
}
?>

<link rel="stylesheet" type="text/css" href="../css/styles.css">
<div class="form" style="margin-top: 60px;">
    <h5 style="color:red; margin-left: 30px;">Delete Table from database: <b
            style="color:green"><?= mb_strtoupper($dataDabase) ?></b></h5>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="" style="margin-left: 125px;">Name Table:</label>
        <input readonly disabled class="form-control-plaintext text-white bg-danger text-center font-weight-bold"
            type="text" name="nameBD" id="nameBD" value="<?php echo mb_strtoupper($nameTable);?>">
        <input class="btn btn-warning" type="submit" name="Drop" value="Drop">
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