<?php
include '../funciones/conexion.php';

$db = new Conect_MySql();
$id = $_POST['ide'];
$correo = $_POST['correo'];
$rechazo = $_POST['rechazo'];

$query = "UPDATE planes SET estado = 'Rechazado por PCS', observacion = '$rechazo' WHERE id = '$id'";

$ejecuta = $db->execute($query);

if ($ejecuta) {
    $destino = "pcsvraf@gmail.com, pcs@pucv.cl";
    $contenido = "El Plan de Acción N° $id, ha sido rechazado con la siguiente observación: $rechazo";
    mail($destino, "Plataforma Planes de Trabajo - Rechazo Planes de Acción", $contenido);
    header('Location: https://d.pcspucv.cl/planes/proyecto_planesTrabajo/vistasAdmin/lista_planesJefeAdmin.php?correo=' . $correo);
}
?>