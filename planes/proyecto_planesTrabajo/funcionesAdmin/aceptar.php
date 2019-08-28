<?php

require '../funciones/conexion.php';

$db = new Conect_MySql();
date_default_timezone_set("America/Santiago");
$fecha = getdate();
$dia = $fecha['mday'];
$mes = $fecha['mon'];
$anio = $fecha['year'];
$fechaDeHoy = "$dia-$mes-$anio";
$id = $_POST['ide2'];
$aceptacion = $_POST['aceptar'];
$correo = $_POST['correo2'];

$query = "UPDATE planes SET estado = 'Revisado por PCS', observacion = '$aceptacion', fechaValidacionPCS = '$fechaDeHoy'"
        . " WHERE id = '$id'";

$ejecuta = $db->execute($query);

if ($ejecuta) {
    $destino = "pcsvraf@gmail.com, pcs@pucv.cl";
    $contenido = "El Plan de Acción N° $id, ha sido Aceptado con la siguiente observación: $aceptacion";
    mail($destino, "Plataforma Planes de Trabajo - Aceptación Planes de Acción", $contenido);
    header('Location: https://d.pcspucv.cl/planes/proyecto_planesTrabajo/vistasAdmin/lista_planesJefeAdmin.php?correo=' . $correo);
} else {
    echo 'no se pudo ejecutar la consulta';
    header('Location: https://d.pcspucv.cl/planes/proyecto_planesTrabajo/vistasAdmin/lista_planesJefeAdmin.php?correo=' . $correo);
}
?>