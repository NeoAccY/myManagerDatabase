<div class="container" style="margin-left: 15px">
    <div class="row">
        <div class="col-sm-24">
            <div class="card text-left">
                <div class="card-header">
                    Tablas dinamicas con datatable y php
                </div>
                <div class="card-body">
                    <span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
                        Agregar nuevo <span class="fa fa-plus-circle"></span>
                    </span>
                    <hr>
                    <div id="tablaDatatable"></div>
                </div>
                <div class="card-footer text-muted">
                    By Facultad Autodidacta y JAAT
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaDatatable').load('structureTableDB.php');
    })
</script>