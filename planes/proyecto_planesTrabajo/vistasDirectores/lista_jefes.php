<?php
require '../funciones/conexion.php';
$db = new Conect_MySql();
include $_SERVER['DOCUMENT_ROOT'] . "/wp-load.php";
$correo = get_userdata(get_current_user_id())->user_email;
$primera = "SELECT idDireccion FROM autoridades WHERE email = '$correo'";
$execute = $db->execute($primera);
$nombreDireccion = $db->fetch_row($execute);
$idDire = $nombreDireccion[0];
$consulta = "select nombre from direccion where id = '$idDire'";
$ejecutar = $db->execute($consulta);
$data = $db->fetch_row($ejecutar);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilos.css">
    </head>    
    <body>

        <div class="container">
            <br>
            <br>
            <center><h1>Dirección de <?php echo $data[0]; ?> </h1></center>
            <br>
            <br>
            <center><table class="table table-hover table-borderless" id="tabla">           
                    <tr>
                    </tr>
                    <?php
                    $sql = "SELECT id, email, nombre, idCargo
                             FROM autoridades
                             WHERE idDireccion = '$idDire' && idCargo = 4";

                    $query = $db->execute($sql);
                    while ($datos = $db->fetch_row($query)) {
                        ?>
                        <tr>
                            <td><a class="invisible"><?php echo $datos['id']; ?></a></td>
                            <td><?php echo $datos['nombre']; ?></td>
                            <td class=""><?php echo '<center><a href="lista_planesVistaDirec.php?id=' . $datos['id'] . '&correo='. $datos['email'] .'"><input type="button" style="background-color:#12548c; border: #12548c;" class="btn btn-primary" value="Lista Planes"></a></center>'; ?></td>
                        </tr>
                        <?php
                    }$db->close_db();
                    ?>
                </table></center>
            <input type="button" onclick="history.back();" value="Volver" class="btn btn-primary" style="background-color: #12548c; border: #12548c;">
        </div
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        <script src="../js/popper.min.js"></script>

    </body> 

</html>






