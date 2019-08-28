<?php
require '../conexion.php';
$db = new Conect_MySql();
if (isset($_POST['enviar'])) {
    //obteniendo datos de la primera parte del formulario
    $correo = $_GET['correo'];
    $nombre = $_POST['nombrePlan'];
    $resumen = $_POST['resumen'];
    $obj = $_POST['objetivo'];
    $radio = $_POST['radios'];
    $result = $_POST['resultado'];
    $indicador1 = $_POST['indicador'];
    $otroindi1 = $_POST['indicador1'];
    $otroindi2 = $_POST['indicador2'];

    if (empty($otroindi1)) {
        $otroindi1 = null;
    }
    if (empty($otroindi2)) {
        $otroindi2 = null;
    }

    if ($radio == 1) {
        $rb = "Calidad de Servicio";
    } else if ($radio == 2) {
        $rb = "Eficiencia Operacional";
    } else if ($radio == 3) {
        $rb = "Mejoramiento Funcional/Proceso";
    }
    //obteniendo datos de la segunda parte del formulario
    //obteniendo los datos de la etapa 1
    $etapa1 = $_POST['etapa1'];
    $fechaIni1 = $_POST['fechaInicio1'];
    $fechaTerm1 = $_POST['fechaTermino1'];
    $medio1 = $_POST['medioVerificacion1'];
    //obteniendo los datos de la etapa 2
    $etapa2 = $_POST['etapa2'];
    $fechaIni2 = $_POST['fechaInicio2'];
    $fechaTerm2 = $_POST['fechaTermino2'];
    $medio2 = $_POST['medioVerificacion2'];

    //onbteniendo los datos de la etapa 3
    $etapa3 = $_POST['etapa3'];
    $fechaIni3 = $_POST['fechaInicio3'];
    $fechaTerm3 = $_POST['fechaTermino3'];
    $medio3 = $_POST['medioVerificacion3'];
    

}

$destino = "pcsvraf@gmail.com";

$contenido = "El usuario: $correo, ha ingresado su plan de trabajo";

mail($destino,"contacto", $contenido);

?>