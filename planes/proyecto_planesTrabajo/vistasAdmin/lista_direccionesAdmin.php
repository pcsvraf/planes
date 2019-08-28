<?php
require '../funciones/conexion.php';

$db = new Conect_MySql();

$query = "SELECT id, nombre FROM direccion";

$execute = $db->execute($query);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <br>
            <center><h1>Direcciones</h1></center>
            <br>
            <br>
            <center><table class="table table-hover table-borderless" id="tabla"> 
                    <?php
                    while ($datos = $db->fetch_row($execute)) {
                        ?>
                        <tr>
                            <td><a class="invisible"><?php echo $datos['id']; ?></a></td>
                            <td><?php echo $datos['nombre']; ?></td>
                            <td class=""><?php echo '<center><a href="admin_listaJefes.php?id=' . $datos['id'] . '"><input type="button" style="background-color:#12548c; border: #12548c;" class="btn btn-primary" value="Ver"></a></center>'; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table></center>
        </div>
        <script type="text/javascript" src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    </body>
</html>
