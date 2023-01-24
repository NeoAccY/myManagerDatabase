<?php
    require_once ('../templates/header.php');
    require_once ('./controller/consultDB.php');
?>


<div  class="inform_data">
        <h1>Bases de Datos Disponibles</h1>
        <br>
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {

                $nameData = $fila['Database'];
            echo '<div class="info_data">';
                echo '<section class="mark_list">';
                    echo '<div class="mark_item">';
                    echo '<br>';
                    echo '<div class="text_mark">';
                        echo '<p class="name_data"> NameDB: ' .$fila['Database']. '</p>';
                    echo '</div>';
                echo '</div>';
                // echo '<a href="#"><button class="btn1" type="submit" name="Consultar">Consultar</button></a>';
                echo"<a href='structureTableDB.php?Database=$nameData'><button class='btn1' type='submit' name'Consultar'>Consult</button></a>";
                echo "<p></p>";
                echo"<a href='dropDatabase.php?Database=$nameData'><button class='btn1' type='submit' name'dropDatabase'>Drop Database</button></a>";
                echo "<p></p>";
                echo"<a href='createTableBD.php?Database=$nameData'><button class='btn1' type='submit' name'dropDatabase'>Create Table</button></a>";
                
                // echo"<a href='viewTableDB.php?Database=$nameData'>Actualizar o eliminar</a>";
                echo '</section>';
            echo '</div>';

            // echo "<p>".($i+1)." Name: ".mysql_db_name($db_list, $i) . "\n"."</p>";
            //$fila++;
        }
    }
        ?>
    </div>
<?php
    require_once ('../templates/footer.php');
?>

