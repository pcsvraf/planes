<?php
require '../funciones/conexion.php';
require '../funciones/sesiones.php';
$db = new Conect_MySql();
$sesiones = new sesions();
$sesiones->inicia_sesiones();
$varsesion = $_SESSION['correo'];

if ($varsesion == null || $varsesion == '') {
    echo 'Lo sentimos, debe loguearse para tener acceso';
    die();
}

$correo = $_GET['correo'];
$idSoli = $_GET['id'];

$query1 = "select idDireccion, nombre from autoridades where email ='$correo' ";
$eje = $db->execute($query1);
$data = $db->fetch_row($eje);
$nombreAutoridad = $data['nombre'];
$idDireccion = $data['idDireccion'];

$sql = "SELECT *
        FROM planes
        WHERE id='$idSoli'";

$query = $db->execute($sql);
$datos = $db->fetch_row($query);

$consulta = "select nombre from direccion where id = '$idDireccion'";
$ejecuta = $db->execute($consulta);
$idDire = $db->fetch_row($ejecuta);
$nombreDire = $idDire[0];

$fechaHoy = date("Y-m-d");
$valido = false;
$valido2 = false;
$valido3 = false;

$nombrePlan = $datos['nombre_plan'];

if (strtotime($fechaHoy) <= strtotime($datos['fecha_termino1'])) {
    $valido = true;
}
if (strtotime($fechaHoy) <= strtotime($datos['fecha_termino2'])) {
    $valido2 = true;
}
if (strtotime($fechaHoy) <= strtotime($datos['fecha_termino3'])) {
    $valido3 = true;
}
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../css/acordeonbonito.css" type="text/css">
    </head>
    <body style="color: #12548c;">
        <br>
        <br>
        <br>
        <h2>
            <center><?php echo $datos['nombre_plan'] ?></center>
        </h2>
        <br>
        <br>
        <br>
        <br> 
        <div id="container-main">
            <div class="accordion-container">
                <div class="offset-sm-11">
                    <a href="../vistas/listar_pdf.php?id=<?php echo $idPlan; ?> " class ="btn" style="color:#fff; background-color: #12548c">lista</a>
                </div>
                <br>
                <a href="#" class="accordion-titulo">Etapa 1<span class="toggle-icon"></span></a>
                <div class="accordion-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="form-group col-sm-9">
                                <label class="control-label"><b>Descripción:</b></label>
                                <textarea class="form-control" name="termino" rows="4" readonly=""><?php echo $datos['etapa1']; ?></textarea>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="form-group col-sm-4">
                                <label class="control-label"><b>Término:</b></label>
                                <input class="form-control" name="termino" readonly="" value="<?php echo $datos['fecha_termino1'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-7">
                                <label><b>Medio de Verificación:</b></label>
                                <textarea class="form-control" rows="3" readonly=""><?php echo $datos['medio_verificacion1'] ?></textarea>
                            </div>
                            <?php
                            if ($valido) {
                                ?>
                                <div class="form-group col-sm-5">
                                    <div id="boton">
                                        <input type="file" name="archivo" style="color: #fff; background-color: #12548c; width: 350px" id="archivo" class="btn" required="">
                                    </div>
                                    <br>
                                    <br>
                                    <button type="submit" style="background-color: #12548c" 
                                            class="btn col-sm-5" name="enviar1" id="enviar"><a style="color: #fff">Enviar</a></button>
                                </div>
                                <?php
                            } else {
                                ?>
                                <button class="btn  btn-warning disabled" style="width: 350px; height: 75px;" type="button">Su fecha límite ha caducado!</button>
                                <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>

            <div class="accordion-container">
                <a href="#" class="accordion-titulo">Etapa 2<span class="toggle-icon"></span></a>
                <div class="accordion-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="form-group col-sm-9">
                                <label class="control-label"><b>Descripción:</b></label>
                                <textarea class="form-control" name="termino" rows="4" readonly=""><?php echo $datos['etapa2']; ?></textarea>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="form-group col-sm-4">
                                <label class="control-label"><b>Término:</b></label>
                                <input class="form-control" name="termino" readonly="" value="<?php echo $datos['fecha_termino2'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-7">
                                <label><b>Medio de Verificación:</b></label>
                                <textarea class="form-control" rows="3" readonly=""><?php echo $datos['medio_verificacion2'] ?></textarea>
                            </div>
                            <?php
                            if ($valido2) {
                                ?>
                                <div class="form-group col-sm-5">
                                    <input type="file" name="archivo" style="color: #fff; background-color: #12548c; width: 350px" id="archivo" class="btn" required="">
                                    <br>
                                    <br>
                                    <button type="submit" style="background-color: #12548c" 
                                            class="btn col-sm-5" name="enviar2" id="enviar2"><a style="color: #fff">Enviar</a></button>
                                </div>
                                <?php
                            } else {
                                ?>
                                <button class="btn  btn-warning disabled" style="width: 350px; height: 75px;" type="button">Su fecha límite ha caducado!</button>
                                <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="accordion-container">
                <a href="#" class="accordion-titulo">Etapa 3<span class="toggle-icon"></span></a>
                <div class="accordion-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="form-group col-sm-9">
                                <label class="control-label"><b>Descripción:</b></label>
                                <textarea class="form-control" name="termino" rows="4" readonly=""><?php echo $datos['etapa3']; ?></textarea>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="form-group col-sm-4">
                                <label class="control-label"><b>Término:</b></label>
                                <input class="form-control" name="termino" readonly="" value="<?php echo $datos['fecha_termino3'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-7">
                                <label><b>Medio de Verificación:</b></label>
                                <textarea class="form-control" rows="3" readonly=""><?php echo $datos['medio_verificacion3'] ?></textarea>
                            </div>
                            <?php
                            if ($valido3) {
                                ?>
                                <div class="form-group col-sm-5">
                                    <input type="file" name="archivo" style="color: #fff; background-color: #12548c; width: 350px" id="archivo" class="btn" required="">
                                    <br>
                                    <br>
                                    <button type="submit" style="background-color: #12548c" 
                                            class="btn col-sm-5" name="enviar3" id="enviar2"><a style="color: #fff">Enviar</a></button>
                                </div>
                                <?php
                            } else {
                                ?>
                                <button class="btn  btn-warning disabled" style="width: 350px; height: 75px;" type="button">Su fecha límite ha caducado!</button>
                                <?php
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <a <?php echo 'href="lista_planesDirec.php?correo='. $correo .'"'; ?>><button class="btn btn-primary offset-2" style="background-color: #12548c; border: #12548c;">Volver</button></a>
        <br>
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/acordeon.js"></script>
        <script src="../js/funcionesPropias.js"></script>
    </body>
</html>

<?php
if (isset($_POST['enviar1'])) {
    $id1 = $datos['id_etapa1'];
    $nombreplan = $datos['nombre_plan'];
    $email = $datos['email'];
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $prefix = "doc_";
    $ext = explode(".", $nombre)[1];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "../archivos/" . $nombre;
    $realName = uniqid($prefix, TRUE) . '.' . $ext;
    if ($nombre != "") {
        if (move_uploaded_file($ruta, $destino)) {
            $sql = "INSERT INTO archivo_verificador(id_plan,id_etapa,email,tamanio,tipo,nombre_archivo,nombre_random,fechaIngreso,nombrePlan) VALUES('$idSoli','$id1','$email','$tamanio','$tipo','$nombre','$realName','$fechaHoy','$nombreplan')";
            $query = $db->execute($sql);

            if ($query) {
                $text = 'true';
            }
            echo "<script>"
            . "mostrarAlerta($text);"
            . "</script>";
            $destino = "john.cerda@alumnos.upla.cl, pcs@pucv.cl";
            $contenido = "El usuario: $nombreAutoridad, ha ingresado un archivo verificador de la etapa uno del plan de trabajo: $nombrePlan";
            mail($destino, "Plataforma Planes de Trabajo - Dirección de $nombreDire - Carga de Medio de Verificación", $contenido);
        } else {
            echo "Error";
        }
    }
} elseif (isset($_POST['enviar2'])) {
    $id2 = $datos['id_etapa2'];
    $nombreplan = $datos['nombre_plan'];
    $email = $datos['email'];
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $prefix = "doc_";
    $ext = explode(".", $nombre)[1];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "../archivos/" . $nombre;
    $realName = uniqid($prefix, TRUE) . '.' . $ext;
    if ($nombre != "") {
        if (move_uploaded_file($ruta, $destino)) {
            $sql = "INSERT INTO archivo_verificador(id_plan,id_etapa,email,tamanio,tipo,nombre_archivo,nombre_random,fechaIngreso,nombrePlan) VALUES('$idSoli','$id2','$email','$tamanio','$tipo','$nombre','$realName','$fechaHoy','$nombreplan')";
            $query = $db->execute($sql);

            if ($query) {
                $text = 'true';
            }
            echo "<script>"
            . "mostrarAlerta($text);"
            . "</script>";
            $destino = "john.cerda@alumnos.upla.cl, pcs@pucv.cl";
            $contenido = "El usuario: $nombreAutoridad, ha ingresado un archivo verificador de la etapa tres del plan de trabajo: $nombrePlan";
            mail($destino, "Plataforma Planes de Trabajo - Dirección de $nombreDire - Carga de Medio de Verificación", $contenido);
        } else {
            echo "Error";
        }
    }
} elseif (isset($_POST['enviar3'])) {
    $id3 = $datos['id_etapa3'];
    $nombreplan = $datos['nombre_plan'];
    $email = $datos['email'];
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $prefix = "doc_";
    $ext = explode(".", $nombre)[1];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "../archivos/" . $nombre;
    $realName = uniqid($prefix, TRUE) . '.' . $ext;
    if ($nombre != "") {
        if (move_uploaded_file($ruta, $destino)) {
            $sql = "INSERT INTO archivo_verificador(id_plan,id_etapa,email,tamanio,tipo,nombre_archivo,nombre_random,fechaIngreso,nombrePlan) VALUES('$idSoli','$id3','$email','$tamanio','$tipo','$nombre','$realName','$fechaHoy','$nombreplan')";
            $query = $db->execute($sql);

            if ($query) {
                $text = 'true';
            }
            echo "<script>"
            . "mostrarAlerta($text);"
            . "</script>";
            $destino = "john.cerda@alumnos.upla.cl, pcs@pucv.cl";
            $contenido = "El usuario: $nombreAutoridad, ha ingresado un archivo verificador de la etapa dos del plan de trabajo: $nombrePlan";
            mail($destino, "Plataforma Planes de Trabajo - Dirección de $nombreDire - Carga de Medio de Verificación", $contenido);
        } else {
            echo "Error";
        }
    }
}
?>
