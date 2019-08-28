<?php
header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include $_SERVER['DOCUMENT_ROOT'] . "/wp-load.php";

$correo = get_userdata(get_current_user_id())->user_email;

require '../funciones/conexion.php';
$db = new Conect_MySql();
$query = "select nombre from autoridades where email = '$correo'";
$execute = $db->execute($query);
$datos = $db->fetch_row($execute);

//if ($varsesion == null || $varsesion == '') {
//    echo 'Lo sentimos, usted debe loguearse para tener acceso';
//    die();
// }
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilos.css">
    </head>  
    <body>
        <br>
        <br>
    <center><h1>Bienvenido: <?php echo $datos['nombre']; ?></h1></center>
    <div class="container">
        <br>
        <br>
        <center><h1>¿Que desea Realizar?</h1></center>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-3 col-md-offset-3">
                <?php echo '<a href="../formulario_planes/primera_parte.php?correo=' . $correo . '" class="form-group"><input type="image" style="height:250px"; src="../imagenes/descarga.png"></a>'; ?>
            </div>
            <div class="col-md-3">
                <?php echo '<a href="accionEnPlanesJ.php?correo=' . $correo . '"><input type="image" src="../imagenes/notepad.png"></a>'; ?>
            </div>
        </div>
    </div>
    <br>
    <br>
    <center><footer class="alert alert-light">&copy; Copyright 2018 Programa Calidad de Servicios</footer></center>

</body>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
<script src="../js/popper.min.js"></script>
<script languaje="javascript">


</script>
</html>