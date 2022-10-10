<?php

include '../funciones/conexion.php';
$db = new Conect_MySql();
include $_SERVER['DOCUMENT_ROOT'] . "/wp-load.php";

$correo = get_userdata(get_current_user_id())->user_email;
$idSoli = $_GET['id'];
$sql = "delete from planes where id=" . $idSoli;
$solicitud = $db->execute($sql) or die("Error al eliminar Peticion" . mysqli_error($db));
if ($solicitud) {
    header('Location: https://d.pcspucv.cl/planes/proyecto_planesTrabajo/vistasDirectores/accionEnPlanesD.php?correo=' . $correo);
} else {
    echo "no se actualizaron los campos";
}
?>
