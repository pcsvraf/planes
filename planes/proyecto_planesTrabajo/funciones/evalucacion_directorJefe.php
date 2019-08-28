<!DOCTYPE html>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    </head>

    <body>
        <?php

        class Evaluar {

            public $dataForm;

            function evaluarJefe() {
                //include 'conexion.php';
                require 'sesiones.php';
                

                if (isset($this->dataForm['evaluar'])) {
                    //$db = objeto que obtiene los métodos clase que conecta a la BD
                    $db = new Conect_MySql();
                    $sesiones = new sesions();
                    $sesiones->inicia_sesiones();
                    $correo = $_SESSION['correo'];
                    $quer = "select nombre from autoridades where email = '$correo'";
                    $ejecutar = $db->execute($quer);
                    $datos = $db->fetch_row($ejecutar);
                    $nota = $_POST['nota'];
                    $idJefe = $_SESSION['idJefe'];
                    $idPlan = $_POST['idPlan'];
                    $consulta = "select nombre from autoridades where id = '$idJefe'";
                    $exe = $db->execute($consulta);
                    $data = $db->fetch_row($exe);
                    $query = "update planes set notaDirector = '$nota' where idAutoridad = '$idJefe' && id = '$idPlan'";
                    $eje = $db->execute($query);
                    if ($eje) {
                        $destino = "pcsvraf@gmail.com";
                        $contenido = "El Director: $datos[0], ha Evaluado el Plan de Trabajo de: $data[0] con  Nota: $nota";
                        mail($destino, "contacto", $contenido);
                        $text = 'true';
                        echo "<script>"
                        . "alerta($text);"
                        . "</script> <script> location.href='../vistas/menu_directores.php?correo=" . $correo . "'</script>;";
                    } else {
                        echo '<script type="text/javaScript">alert("lo sentimos, ocurrio un error :( ");</script>';
                    }
                }
            }

            function evaluar($dataForm) {
                $this->dataForm = $dataForm;
            }

        }
        ?>
    </body>
    <script src="../js/funciones.js"></script>

</html>