<?php
    require_once ('./controller/consultColumns.php');
    require_once ('../templates/header.php');
?>
    <div  class="inform_data">
        <h1>Table Structure: <b><?php echo $nameTable;?></b></h1>
        <br>
        <div class="container" style="margin-left: 2px">
        <div class="row">
        <div class="col-sm-12">
            <div class="card text-left">
                <div class="card-header" style="background-color: #041E6E;">
                    Showing total Columns of table <?php echo mb_strtoupper($nameTable); ?>
                </div>
                <div class="card-body" style="background-color: #E0E0E0; color: #7F7B7B;">
                <hr>
            <div id="tablaDatatable">
            <div>
                <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                    <thead style="background-color: #350081;color: white; font-weight: bold;">
                        <tr>
                            <td>No. Colum</td>
                            <td>Field</td>
                            <td>Type</td>
                            <td>Null</td>
                            <td>Key</td>
                            <td>Default</td>
                            <td>Extra</td>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $x=1;
                        while ($fila=mysqli_fetch_row($resultado)) {
                            $colum=$fila[0];
                            ?>
                            <tr style="background-color: #fff; color:black;">
                                <td><?php echo $x++; ?></td>
                                <td><?php echo $fila[0]; ?></td>
                                <td><?php echo $fila[1]; ?></td>
                                <td><?php
                                echo $fila[2]; 
                                ?></td>
                                <td><?php
                                if($fila[3] == NULL){
                                    echo "CAMPO";
                                }else{
                                    echo $fila[3];
                                } 
                                ?></td>
                                <td><?php
                                if($fila[4] == NULL){
                                    echo "NULL";
                                }else{ 
                                    echo $fila[4];
                                } 
                                ?></td>
                                <td><?php echo $fila[5]; ?></td>
                            </tr>
                            <?php
                        }
                        mysqli_free_result($resultado);
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
            </div>
		<div class="card-footer text-muted" style="background-color: #D3D3D5;">
			By Management DataBases v1
		</div>
		</div>
		</div>
        </div>
	</div>

<?php
    require_once ('../templates/footer.php');
?>


<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>
