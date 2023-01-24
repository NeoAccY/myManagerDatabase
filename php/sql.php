<?php
require_once('../templates/header.php');
  $data = $_GET['Database'];
  $bd = $data;
  $table = $_GET['table'];
  $tabla = $table;
?>
<div class="container" style="width: max-content;">
    <div class="alert alert-warning" role="alert">
        <a href="consult.php<?php echo "?Database=".$bd."&table=".$tabla; ?>" class="alert-link text-warning">Select
            Data</a>. Click on the option you want to execute
    </div>
    <div class="alert alert-primary" role="alert">
        <a href="alterTable.php<?php echo "?Database=".$bd."&table=".$tabla; ?>" class="alert-link text-primary">Alter
            Table</a>. Click on the option you want to execute
    </div>
    <div class="alert alert-secondary" role="alert">
        <a href="updateTable.php<?php echo "?Database=".$bd."&table=".$tabla; ?>" class="alert-link text-dark">Update
            Table</a>. Click on the option you want to execute
    </div>
    <div class="alert alert-success" role="alert">
        <a href="insertTable.php<?php echo "?Database=".$bd."&table=".$tabla; ?>" class="alert-link text-success">Insert
            Into</a>. Click on the option you want to execute
    </div>
</div>
<?php
require_once('../templates/footer.php');
?>