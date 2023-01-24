<?php
    require_once ('./controller/createDB.php');
    require_once ('../templates/header.php');

?>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <h1 style="color:black; margin-left: 130px; margin-top: 20px;">Has ingresado al menú  de nueva base de datos</h1>
        <div class="form" style="margin-top: 60px;">

            <h4 style="color:red; margin-left: 40px;" >Create New Database</h4>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <label for="" style="margin-left: 95px;">Name Database:</label>
        <input type="text" name="nameBD" id="nameBD">
        <input class="btn1" type="submit" name="Create" value="Create">
        <?php
        if($response != ''){
        ?>
        <p><?php echo "<div class='err'>".' '.$response.'</div>'; ?></p>
        <?php
        } 
        ?>
    </form>
    </div>

    <?php
        require_once ('../templates/footer.php');

?>
