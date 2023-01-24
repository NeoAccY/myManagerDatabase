<?php
    require_once ('./controller/consultDataTable.php');
    require_once ('../templates/header.php');
?>
<div class="inform_data">
    <h1>Database Structure: <b><?php echo $nameData;?> </b></h1>
    <br>
    <div class="container" style="margin-left: 2px">
        <div class="row">
            <div class="col-sm-24">
                <div class="card text-left">
                    <div class="card-header" style="background-color: #041E6E;">
                        Showing total records in table <b><?php echo $nameTable; ?> </b> of database
                        <B><?php echo $nameData; ?></B> </div>
                    <div class="card-body" style="background-color: #E0E0E0; color: #7F7B7B;">
                        <hr>
                        <div id="tablaDatatable">
                            <div class="">
                                <table class="table table-hover table-condensed table-bordered" id="iddatatable">
                                    <thead style="background-color: #350081;color: white; font-weight: bold;">
                                        <tr>
                                            <?php
                                if($result){
                                    while($rowes = mysqli_fetch_row($result)){
                                        echo "<td>{$rowes[0]}</td>";
                                    }
                                }
                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                        $BD=$nameData;
                        if($row = mysqli_num_rows($result2)){
                        while($fila = mysqli_fetch_assoc($result2)){
                            echo '<tr style="background-color: #fff; color:black;">';

                        $array = $fila;
                        foreach($array as $v){
                            echo '<td>'.utf8_encode($v).'</td>';
                            // echo "<br>";
                        }
                        echo '</tr>';
                    }
                }else{
                    echo mysqli_num_rows($result2);
                }
                        ?>
                                        </tr>
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
        $("#querydatatablesets").css("width", "100%");
    });
    </script>