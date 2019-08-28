<?php
include $_SERVER['DOCUMENT_ROOT'] . "/wp-load.php";

$correo = get_userdata(get_current_user_id())->user_email;

require '../funciones/conexion.php';
$db = new Conect_MySql();
$query = "select nombre from autoridades where email = '$correo'";
$execute = $db->execute($query);
$datos = $db->fetch_row($execute);
?>
<html>
    <head>
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <header>
                <br>
                <input class="btn btn-primary offset-sm-9" type="button" value="Cerrar Sesión">
            </header>
            <br>
            <br>
            <center><h1>Bienvenido <?php echo $datos[0]; ?></h1></center>
            <center><h2>¿Que desea Realizar?</h2></center>
            <br>
            <br>
            <br>
            <center><a href="lista_direccionesAdmin.php"><h3>Lista de Direcciones</h3></a></center>

        </div>
    </body>



</html>