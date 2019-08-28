<?php
session_start();
$varsesion = $_SESSION['correo'];

if ($varsesion == null || $varsesion == '') {
    echo 'Lo sentimos, debe loguearse para tener acceso';
    die();
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilos.css"  type="text/css">
        <title>Lista de Archivos Verificadores</title>
    </head>
    <body>
        <div class="container">
            <table class="table table-hover table-borderless">
                <center><h2>
                        <br>
                        Lista de Archivos Verificadores
                    </h2></center>
                <br>
                <?php
                include '../funciones/conexion.php';
                $idSoli = $_GET['id'];
                $db = new Conect_MySql();
                $sql = "select * from archivo_verificador where id_plan=" . $idSoli;
                $query = $db->execute($sql);
                while ($datos = $db->fetch_row($query)) {
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a style="color: #12548c" target="_blank" href="archivo_pdf.php?id=<?php echo $datos['id'] ?>"><?php echo $datos['nombre_archivo']; ?></a></td>
                    </tr>
                <?php } ?>

            </table>
            <a class="offset-3" href="acordeon.php?id=<?php echo $idSoli ?>"><button class="btn btn-primary" style=" background-color: #12548c; border: #12548c;">Volver</button></a>

        </div>

        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        <script src="../js/popper.min.js"></script>

    </body>
</html>

