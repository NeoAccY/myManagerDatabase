<?php
    require_once ('./controller/consultTable.php');
    require_once ('../templates/header.php');
?>
    <div  class="inform_data">
        <h1>Database Structure: <b><?php echo $nameData;?> </b></h1>
        <br>
        <div class="container" style="margin-left: 2px">
        <div class="row">
        <div class="col-sm-12">
            <div class="card text-left">
                <div class="card-header" style="background-color: #041E6E;">
                    Showing total of database tables
                </div>
                <div class="card-body" style="background-color: #E0E0E0; color: #7F7B7B;">
                <hr>
            <div id="tablaDatatable">
            <div>
                <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                    <thead style="background-color: #350081;color: white; font-weight: bold;">
                        <tr>
                            <td>No. Table</td>
                            <td>Table Name</td>
                            <td>Execute SQL</td>
                            <td>Review</td>
                            <td>Structure</td>
                            <td>Drop Table</td>
                            <td>Delete Logs</td>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $BD=$nameData; 
                        $x=1;
                        while ($fila=mysqli_fetch_row($resultado)) {
                            $table=$fila[0];
               
                            ?>
                            <tr style="background-color: #fff; color:black;">
                                <td><?php echo $x++; ?></td>
                                <td><?php echo $fila[0]; ?></td>
                                <td style="text-align: center;">
                                <a href="sql.php<?php echo "?table=".$table."&Database=".$BD; ?>"><span class="btn btn-secondary btn-sm">
                                        <span class='bx bx-send bx-spin bx-flip-horizontal'></span>
                                    </span></a>
                                </td>
                                <td style="text-align: center;">
                                <a href="reviewDataTable.php<?php echo "?table=".$table."&Database=".$BD; ?>"><span class="btn btn-success btn-sm">
                                        <span class="bx bxs-show"></span>
                                    </span></a>
                                </td>
                                <td style="text-align: center;">
                                <a href="structureColumns.php<?php echo "?table=".$table."&Database=".$BD; ?>"><span class="btn btn-primary btn-sm">
                                        <span class="bx bxs-collection"></span>
                                    </span></a>
                                </td>
                                <td style="text-align: center;">
                                <a href="dropTable.php<?php echo "?table=".$table."&Database=".$BD; ?>"><span class="btn btn-danger btn-sm">
                                        <span class="bx bx-x-circle"></span>
                                    </span></a>
                                </td>                                
                                <td style="text-align: center;">
                                <a href='truncateLogs.php<?php echo "?table=".$table."&Database=".$BD; ?>'><span class="btn btn-warning btn-sm">
                                        <span class="bx bx-trash"></span>
                                    </span></a>
                                </td>
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
