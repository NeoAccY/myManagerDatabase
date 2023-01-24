<?php
// mysqli_report(MYSQLI_REPORT_ERROR);
session_start();
    $nameData = $_GET['Database'];

    // require_once ('../templates/header.php');
    $response = "";

if(isset($_POST['Execute'])){
    $servername = "localhost";
            $username = "root";
            $password = "";

			$db = $_POST['nameData'];

            // Create connection
            $conn = mysqli_connect ($servername, $username, $password, $db);
            // Test connection
            if (!$conn) {
            die ( "Connection failed:".mysqli_connect_error ());
            }else{
				echo "success";
			}
        $Database = $_POST['nameData'];

        $sql = $_POST['texDesc'];

        $result=mysqli_query($conexion,$sql);

        if($result){
            $response =  "Database ".$sql." deleted with success";
        }else{
            echo '<script type="text/javascript">
            alert("Error execute SQL '.$sql. mysqli_error($conn).'");
            </script>';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Textarea styling</title>
    <!-- <link rel="stylesheet" type="text/css" href="../css/consult.css"> -->
</head>
<body>
    <div class="container">
    <?php
                if($response != ''){
                ?>
                <p><?php
                echo "<div class='err'>".' '.$response.'</div>'; 
                ?></p>
                <?php
                } 
                ?>
        <form name="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label class="labels" style= "margin-left: 450px; font-size:20px">EXECUTE SQL COMMANDS</label><br>
            <div class="textarea_style">
                <textarea class="textarea" id="texDesc" name="texDesc" style="min-width: 1105px; width: 1105px; min-height: 110px; height: 340px; max-width: 1105px; max-height: 340px"rows="4" cols="37"minlength="3" placeholder="Escriba su consulta..."></textarea>
                <input class="botons" type="submit" name="Execute" value="Execute">
                <input type="hidden" id='nameData' name='nameData' value="<?= $nameData?>">
            </div>

        </form>
    </div>
</body>
</html>
<?php
    // require_once ('../templates/footer.php');
?>


<?php
    // require_once ('./controller/createDB.php');
    // require_once ('../templates/header.php');

?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>Textarea styling</title>
	<link rel="stylesheet" type="text/css" href="../css/consult.css">
</head>
<body>
	<div class="container">
		<form>
			<label class="labels" style= "margin-left: 450px; font-size:20px">EXECUTE SQL COMMANDS</label><br>
			<div class="textarea_style">
				<textarea class="textarea" id="textarea" name="textarea_description" style="min-width: 1105px; width: 1105px; min-height: 110px; height: 340px; max-width: 1105px; max-height: 340px"rows="4" cols="37"minlength="3" placeholder="Escriba su consulta..."></textarea>
                <input class="botons" type="submit" name="Execute" value="Execute">
			</div>
		</form>
	</div>
</body>
</html> -->
<?php
    // require_once ('../templates/footer.php');
?>