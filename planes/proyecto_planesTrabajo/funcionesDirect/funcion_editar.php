<?php

include '../funciones/conexion.php';
$db = new Conect_MySql();
if (isset($_POST['enviar'])) {
    $id = $_POST['id'];
    $correo = $_POST['correo'];
    $nombrePlan = $_POST['nombrePlan'];
    if ($_POST['select'] == 'otro1') {
        $corresponde = $_POST['otro'];
    } else {
        $corresponde = $_POST['select'];
    }
    date_default_timezone_set("America/Santiago");
    $fecha = getdate();
    $dia = $fecha['mday'];
    $mes = $fecha['mon'];
    $anio = $fecha['year'];
    $fechaDeHoy = "$dia-$mes-$anio";
    $resumen = $_POST['resumen'];
    $objetivo = $_POST['objetivo'];
    $indicador1 = $_POST['indicador1'];
    $indicador2 = $_POST['indicador2'];
    $indicador3 = $_POST['indicador3'];
    $resultado = $_POST['resultado'];
    $etapa1 = $_POST['etapa1'];
    $fechaIni1 = $_POST['fechaInicio1'];
    $fechaTerm1 = $_POST['fechaTermino1'];
    $verificacion1 = $_POST['medioVerificacion1'];
    $etapa2 = $_POST['etapa2'];
    $fechaIni2 = $_POST['fechaInicio2'];
    $fechaTerm2 = $_POST['fechaTermino2'];
    $verificacion2 = $_POST['medioVerificacion2'];
    $etapa3 = $_POST['etapa3'];
    $fechaIni3 = $_POST['fechaInicio3'];
    $fechaTerm3 = $_POST['fechaTermino3'];
    $verificacion3 = $_POST['medioVerificacion3'];

    //se seleccionan datos de las autoridades que nos ayudarán a enviar el correo
    $sqlo = "select id, idDireccion, nombre from autoridades where email='$correo'";
    $consu = $db->execute($sqlo);
    $data = $db->fetch_row($consu);
    $idAutoridad = $data['id'];
    $nombre = $data['nombre'];
    $idDireccion = $data['idDireccion'];
    //se selecciona el nombre de la unidad, para esto se pasa el id de la unidad
    $consulta = "select nombre from unidad where id = '$idDireccion'";
    $ejecuta1 = $db->execute($consulta);
    $nombreUnidad = $db->fetch_row($ejecuta1);
    $nombreUni = $nombreUnidad[0];

    $idEtapa1 = '';
    $idEtapa2 = '';
    $idEtapa3 = '';
    $numero = 1;
    $letra1 = 'A';
    $letra2 = 'B';
    $letra3 = 'C';

    $idEtapa1 = $id . $letra1;
    $idEtapa2 = $id . $letra2;
    $idEtapa3 = $id
            . $letra3;


    $sql = "update planes set ";
    $sql .= "corresponde='" . $corresponde . "', ";
    $sql .= "resumen='" . $resumen . "', ";
    $sql .= "objetivo='" . $objetivo . "', ";
    $sql .= "indicador1='" . $indicador1 . "', ";
    $sql .= "indicador2='" . $indicador2 . "',";
    $sql .= "indicador3='" . $indicador3 . "',";
    $sql .= "resultadoEsperado='" . $resultado . "',";
    $sql .= "nombre_plan='" . $nombrePlan . "',";
    $sql .= "id_etapa1='" . $idEtapa1 . "',";
    $sql .= "etapa1='" . $etapa1 . "',";
    $sql .= "fecha_inicio1='" . $fechaIni1 . "',";
    $sql .= "fecha_termino1='" . $fechaTerm1 . "',";
    $sql .= "medio_verificacion1='" . $verificacion1 . "',";
    $sql .= "id_etapa2='" . $idEtapa2 . "',";
    $sql .= "etapa2='" . $etapa2 . "',";
    $sql .= "fecha_inicio2='" . $fechaIni2 . "',";
    $sql .= "fecha_termino2='" . $fechaTerm2 . "',";
    $sql .= "medio_verificacion2='" . $verificacion2 . "',";
    $sql .= "id_etapa3='" . $idEtapa3 . "',";
    $sql .= "etapa3='" . $etapa3 . "',";
    $sql .= "fecha_inicio3='" . $fechaIni3 . "',";
    $sql .= "fecha_termino3='" . $fechaTerm3 . "',";
    $sql .= "medio_verificacion3='" . $verificacion3 . "',";
    $sql .= "fechaIngreso='" . $fechaDeHoy . "',";
    $sql .= "estado='Enviado'";
    $sql .= "where id = " . $_POST["id"];
    $ejecutar = $db->execute($sql);
    if ($ejecutar) {
        $destino = "pcsvraf@gmail.com, pcs@pucv.cl";
        $contenido = "El usuario: $nombre, ha ingresado su plan de trabajo";
        mail($destino, "Plataforma Planes de Trabajo - Direccion de $nombreUni - Ingreso Plan de Trabajo", $contenido);
        header('Location: https://d.pcspucv.cl/planes/proyecto_planesTrabajo/vistasDirectores/accionEnPlanesD.php?correo='.$correo);
    } else {
        echo "no se actualizaron los campos";
    }
} else {
    $correo = $_POST['correo'];
    $nombrePlan = $_POST['nombrePlan'];
    if ($_POST['select'] == 'otro1') {
        $corresponde = $_POST['otro'];
    } else {
        $corresponde = $_POST['select'];
    }
    $resumen = $_POST['resumen'];
    $objetivo = $_POST['objetivo'];
    $indicador1 = $_POST['indicador1'];
    $indicador2 = $_POST['indicador2'];
    $indicador3 = $_POST['indicador3'];
    $resultado = $_POST['resultado'];
    $etapa1 = $_POST['etapa1'];
    $fechaIni1 = $_POST['fechaInicio1'];
    $fechaTerm1 = $_POST['fechaTermino1'];
    $verificacion1 = $_POST['medioVerificacion1'];
    $etapa2 = $_POST['etapa2'];
    $fechaIni2 = $_POST['fechaInicio2'];
    $fechaTerm2 = $_POST['fechaTermino2'];
    $verificacion2 = $_POST['medioVerificacion2'];
    $etapa3 = $_POST['etapa3'];
    $fechaIni3 = $_POST['fechaInicio3'];
    $fechaTerm3 = $_POST['fechaTermino3'];
    $verificacion3 = $_POST['medioVerificacion3'];

    $sql = "update planes set ";
    $sql .= "corresponde='" . $corresponde . "', ";
    $sql .= "resumen='" . $resumen . "', ";
    $sql .= "objetivo='" . $objetivo . "', ";
    $sql .= "indicador1='" . $indicador1 . "', ";
    $sql .= "indicador2='" . $indicador2 . "',";
    $sql .= "indicador3='" . $indicador3 . "',";
    $sql .= "resultadoEsperado='" . $resultado . "',";
    $sql .= "nombre_plan='" . $nombrePlan . "',";
    $sql .= "etapa1='" . $etapa1 . "',";
    $sql .= "fecha_inicio1='" . $fechaIni1 . "',";
    $sql .= "fecha_termino1='" . $fechaTerm1 . "',";
    $sql .= "medio_verificacion1='" . $verificacion1 . "',";
    $sql .= "etapa2='" . $etapa2 . "',";
    $sql .= "fecha_inicio2='" . $fechaIni2 . "',";
    $sql .= "fecha_termino2='" . $fechaTerm2 . "',";
    $sql .= "medio_verificacion2='" . $verificacion2 . "',";
    $sql .= "etapa3='" . $etapa3 . "',";
    $sql .= "fecha_inicio3='" . $fechaIni3 . "',";
    $sql .= "fecha_termino3='" . $fechaTerm3 . "',";
    $sql .= "medio_verificacion3='" . $verificacion3 . "',";
    $sql .= "estado='Ingresado'";
    $sql .= "where id = " . $_POST["id"];
    $ejecutar = $db->execute($sql);
    if ($ejecutar) {
        header('Location: https://d.pcspucv.cl/planes/proyecto_planesTrabajo/vistasDirectores/accionEnPlanesD.php?correo='.$correo);
    } else {
        echo "no se actualizaron los campos";
    }
}
?>