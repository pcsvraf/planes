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
        $idPlan = $_GET['id'];
        $idEtapa = $_GET['idEtapa'];

        $sql = "select * from archivo_verificador where id_plan = '$idPlan' AND id_etapa = '$idEtapa' ";
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