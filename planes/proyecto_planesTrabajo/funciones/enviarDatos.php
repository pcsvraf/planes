<!DOCTYPE html>

<html>
    <head>

    </head>

    <body>
        <?php
        include 'conexion.php';
        //$db = objeto que obtiene los métodos clase que conecta a la BD
        $db = new Conect_MySql();
        $correo = $_POST['correo'];
        //obtenemos la variable correo, y la utilizamos para seleccionar el id de la autoridad
        if (isset($_POST['enviar'])) {
            date_default_timezone_set("America/Santiago");
            $fecha = getdate();
            $dia = $fecha['mday'];
            $mes = $fecha['mon'];
            $anio = $fecha['year'];
            $fechaDeHoy = "$dia-$mes-$anio";
            $sql = "select id, idUnidad, nombre from autoridades where email='$correo'";
            $consu = $db->execute($sql);
            $data = $db->fetch_row($consu);
            //obteniendo los datos de la primera parte del formulario
            $idAutoridad = $data['id'];
            $nombre = $data['nombre'];
            $idUnidad = $data['idUnidad'];
            $nombrePlan = $_POST['nombrePlan'];
            $resumen = $_POST['resumen'];
            $objetivo = $_POST['objetivo'];
            if ($_POST['select'] == 'otro1') {
                $select = $_POST['otro'];
            }else {
                $select = $_POST['select'];
            }
            $resultado = $_POST['resultado'];
            $indicador1 = $_POST['indicador1'];
            $indicador2 = $_POST['indicador2'];
            $indicador3 = $_POST['indicador3'];

            $consulta = "select nombre from unidad where id = '$idUnidad'";
            $ejecuta1 = $db->execute($consulta);
            $nombreUnidad = $db->fetch_row($ejecuta1);
            $nombreUni = $nombreUnidad[0];
            //obteniendo datos de la segunda parte del formulario
            //etapa 1
            $etapa1 = $_POST['etapa1'];
            $fechaIni = $_POST['fechaInicio1'];
            $fechaTerm = $_POST['fechaTermino1'];
            $medioVerifi = $_POST['medioVerificacion1'];
            //etapa 2
            $etapa2 = $_POST['etapa2'];
            $fechaIni2 = $_POST['fechaInicio2'];
            $fechaTerm2 = $_POST['fechaTermino2'];
            $medioVerifi2 = $_POST['medioVerificacion2'];
            //etapa 3
            $etapa3 = $_POST['etapa3'];
            $fechaIni3 = $_POST['fechaInicio3'];
            $fechaTerm3 = $_POST['fechaTermino3'];
            $medioVerificacion3 = $_POST['medioVerificacion3'];

            $idEtapa1 = '';
            $idEtapa2 = '';
            $idEtapa3 = '';
            $numero = 1;
            $letra1 = 'A';
            $letra2 = 'B';
            $letra3 = 'C';
            $query1 = "SELECT id FROM planes order by id DESC LIMIT 1";
            $ejecuta = $db->execute($query1);
            $id = $db->fetch_row($ejecuta);
            if ($id[0] == null || $id[0] == '') {
                $idEtapa1 = $numero . $letra1;
                $idEtapa2 = $numero . $letra2;
                $idEtapa3 = $numero . $letra3;
            } else {
                $idEtapa1 = ($id['id'] + 1) . $letra1;
                $idEtapa2 = ($id['id'] + 1) . $letra2;
                $idEtapa3 = ($id['id'] + 1) . $letra3;
            }



            $query = "insert into planes (id, idAutoridad, email, corresponde, resumen, objetivo, indicador1,
                              indicador2, indicador3, resultadoEsperado, nombre_plan, id_etapa1, etapa1, fecha_inicio1,
                              fecha_termino1, medio_verificacion1, id_etapa2, etapa2, fecha_inicio2, fecha_termino2,
                              medio_verificacion2, id_etapa3, etapa3, fecha_inicio3, fecha_termino3, medio_verificacion3, fechaIngreso, estado)
                              values ('null','$idAutoridad','$correo','$select','$resumen','$objetivo','$indicador1','$indicador2','$indicador3',
                                      '$resultado','$nombrePlan','$idEtapa1','$etapa1','$fechaIni','$fechaTerm',
                                      '$medioVerifi','$idEtapa2','$etapa2','$fechaIni2','$fechaTerm2','$medioVerifi2','$idEtapa3','$etapa3',
                                      '$fechaIni3','$fechaTerm3','$medioVerificacion3','$fechaDeHoy','Enviado')";
            $eje = $db->execute($query);
            if ($eje) {
                $destino = "john.cerda@alumnos.upla.cl, pcs@pucv.cl";
                $contenido = "El usuario: $nombre, ha ingresado su plan de trabajo";
                mail($destino, "Plataforma Planes de Trabajo - Unidad de $nombreUni - Ingreso Plan de Trabajo", $contenido);
                $text = 'true';
                echo "<script>"
                . "alerta($text);"
                . "</script> <script> location.href='https://www.d.pcspucv.cl/planes/proyecto_planesTrabajo/formulario_planes/primera_parte.php?correo=" . $correo . "'</script>;";
            } else {
                echo '<script type="text/javaScript">alert("lo sentimos, ocurrió un error :( ");</script>';
            }
        } else {
            date_default_timezone_set("America/Santiago");
            $fecha = getdate();
            $dia = $fecha['mday'];
            $mes = $fecha['mon'];
            $anio = $fecha['year'];
            $fechaDeHoy = "$dia-$mes-$anio";
            //obteniendo los datos de la primera parte del formulario
            $nombrePlan = $_POST['nombrePlan'];
            $resumen = $_POST['resumen'];
            $objetivo = $_POST['objetivo'];
            $resultado = $_POST['resultado'];
            $indicador1 = $_POST['indicador1'];
            $indicador2 = $_POST['indicador2'];
            $indicador3 = $_POST['indicador3'];
            if ($_POST['select'] == 'otro1') {
                $select = $_POST['otro'];
            }else {
                $select = $_POST['select'];
            }
            //obteniendo datos de la segunda parte del formulario
            //etapa 1
            $etapa1 = $_POST['etapa1'];
            $fechaIni = $_POST['fechaInicio1'];
            $fechaTerm = $_POST['fechaTermino1'];
            $medioVerifi = $_POST['medioVerificacion1'];
            //etapa 2
            $etapa2 = $_POST['etapa2'];
            $fechaIni2 = $_POST['fechaInicio2'];
            $fechaTerm2 = $_POST['fechaTermino2'];
            $medioVerifi2 = $_POST['medioVerificacion2'];
            //etapa 3
            $etapa3 = $_POST['etapa3'];
            $fechaIni3 = $_POST['fechaInicio3'];
            $fechaTerm3 = $_POST['fechaTermino3'];
            $medioVerificacion3 = $_POST['medioVerificacion3'];

            $idEtapa1 = '';
            $idEtapa2 = '';
            $idEtapa3 = '';
            $numero = 1;
            $letra1 = 'A';
            $letra2 = 'B';
            $letra3 = 'C';
            $query1 = "SELECT id FROM planes order by id DESC LIMIT 1";
            $ejecuta = $db->execute($query1);
            $id = $db->fetch_row($ejecuta);
            if ($id[0] == null || $id[0] == '') {
                $idEtapa1 = $numero . $letra1;
                $idEtapa2 = $numero . $letra2;
                $idEtapa3 = $numero . $letra3;
            } else {
                $idEtapa1 = ($id['id'] + 1) . $letra1;
                $idEtapa2 = ($id['id'] + 1) . $letra2;
                $idEtapa3 = ($id['id'] + 1) . $letra3;
            }

            $query = "insert into planes (id, idAutoridad, email, corresponde, resumen, objetivo, indicador1,
                              indicador2, indicador3, resultadoEsperado, nombre_plan, id_etapa1, etapa1, fecha_inicio1,
                              fecha_termino1, medio_verificacion1, id_etapa2, etapa2, fecha_inicio2, fecha_termino2,
                              medio_verificacion2, id_etapa3, etapa3, fecha_inicio3, fecha_termino3, medio_verificacion3, fechaIngreso, estado)
                              values ('null','$idAutoridad','$correo','$select','$resumen','$objetivo','$indicador1','$indicador2','$indicador3',
                                      '$resultado','$nombrePlan','$idEtapa1','$etapa1','$fechaIni','$fechaTerm',
                                      '$medioVerifi','$idEtapa2','$etapa2','$fechaIni2','$fechaTerm2','$medioVerifi2','$idEtapa3','$etapa3',
                                      '$fechaIni3','$fechaTerm3','$medioVerificacion3','$fechaDeHoy','Ingresado')";
            $eje = $db->execute($query);
            if ($eje) {
                $text = 'true';
                echo "<script>"
                . "alerta($text);"
                . "</script> <script> location.href='https://www.d.pcspucv.cl/planes/proyecto_planesTrabajo/formulario_planes/primera_parte.php?correo=" . $correo . "'</script>;";
            } else {
                echo '<script type="text/javaScript">alert("lo sentimos, ocurrió un error :( ");</script>';
            }
        }
        ?>
    </body>
    <script src="../js/funciones.js"></script>

</html>