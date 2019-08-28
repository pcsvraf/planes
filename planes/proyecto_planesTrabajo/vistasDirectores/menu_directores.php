<?php
// metodo de seguridad, que guarda una fecha falsa de incio de sesion,
// también nos protege del caché, ya que con esto no guarda caché, y así
// evitamos posibles ataques de SESIONES.
header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

require '../funciones/conexion.php';
// se crea un objeto de conexion $db, que hereda los métodos de la clase conexion.php,
// se selecciona el id de la direccion de las autoridades segun el email del director,
// esto para hacer todo genérico para los directores, así se ocupa solo una vista.
$db = new Conect_MySql();
$correo = $_GET['correo'];
$query = "SELECT idDireccion, nombre from autoridades WHERE email = '$correo'";
$ejecutar = $db->execute($query);
$datos = $db->fetch_row($ejecutar);
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
    <body>
        <header>
            <br>
            <a href="../funciones/cerrarSesion.php"><input type="button" id="cerrar" name="cerrar" class="btn btn-primary offset-sm-9" value="Cerrar Sesión"></a>
        </header>
        <div class="container">
            <center><h1>Bienvenido: <?php echo $datos['nombre']; ?></h1></center>
            <br>
            <center><h2>¿Que Desea Realizar?</h2></center>
            <br>
            <br>
            <br>
            <center>
                <a class="" <?php echo 'href="lista_jefes.php?correo=' . $correo . '"'; ?>>Jefaturas</a>
                <a class="invisible">kasjkasjkajksjak</a>
                <a class="" <?php echo 'href="../formulario_planes/primera_parte_direc.php?correo=' . $correo . '"'; ?>>Ingresar Plan de Trabajo</a>
                <a class="" <?php echo 'href="accionEnPlanesD.php?correo=' . $correo . '"'; ?>>Mis Planes</a>
            </center>
        </div>

    </body>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
</html>