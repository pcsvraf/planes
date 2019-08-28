<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Archivo</title>
    </head>
    <body>
        <?php
        include '../funciones/conexion.php';

        $db = new Conect_MySql();
        $id = $_GET['id'];
        $sql = "select * from archivo_verificador where id = '$id'";
        $query = $db->execute($sql);
        if ($datos = $db->fetch_row($query)) {
            if ($datos['nombre_archivo'] == "") {
                ?>
                <p>NO tiene archivos</p>
            <?php } else { ?>
                <iframe width="1340" height="630" src="../archivos/<?php echo $datos['nombre_archivo']; ?>">
                </iframe>

                <?php
            }
        }
        ?>
    </body>
</html>


