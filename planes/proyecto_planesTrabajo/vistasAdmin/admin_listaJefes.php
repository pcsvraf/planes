<?php
require '../funciones/conexion.php';

$db = new Conect_MySql();

$id = $_GET['id'];

$query = "SELECT id, nombre, idCargo, email FROM autoridades WHERE idDireccion = '$id'";

$ejecuta = $db->execute($query);

$sql = "SELECT nombre FROM direccion WHERE id = '$id'";

$execute = $db->execute($sql);

$direccion = $db->fetch_row($execute);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <br>
            <center><h1>Dirección de <?php echo $direccion[0]; ?></h1></center>
            <br>
            <br>
            <center><table class="table table-hover table-borderless">
                    <?php
                    while ($datos = $db->fetch_row($ejecuta)) {
                           $consulta = "SELECT nombre FROM cargo WHERE id='". $datos['idCargo'] ."'";
                           $nombre = $db->execute($consulta);
                           $nombreCargo = $db->fetch_row($nombre);
                        ?>
                        <tr>
                            <td><a class="invisible"><?php echo $datos['id']; ?></a></td>
                            <td><?php echo $nombreCargo[0]; ?></td>
                            <td><?php echo $datos['nombre']; ?></td>
                            <td><?php echo $datos['email']; ?></td>
                            <td class=""><?php echo '<center><a href="lista_planesJefeAdmin.php?correo=' . $datos['email'] . '"><input type="button" style="background-color:#12548c; border: #12548c;" class="btn btn-primary" value="Ver"></a></center>'; ?></td>
                        </tr>
                    <?php } ?>
                </table></center>
        </div>
        <script type="text/javascript" src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    </body>

</html>