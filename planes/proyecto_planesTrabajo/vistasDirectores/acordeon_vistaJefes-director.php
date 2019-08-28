<?php
require '../funciones/conexion.php';
//se crea un objeto de la clase conexion, para heredar los métodos de ésta
//y así poder hacer llamados a la base de datos.
$db = new Conect_MySql();
$idPlan = $_GET['id'];
$query = "select * from planes where id = '$idPlan'";
$ejecuta = $db->execute($query);
$datos = $db->fetch_row($ejecuta);

$quer = "select * from archivo_verificador where id_plan = '$idPlan'";
$exe = $db->execute($quer);
$data = mysqli_num_rows($exe);

$fechaHoy = date("Y-m-d");
$a = 'A';
$b = 'B';
$c = 'C';

$idEtapa1 = $idPlan . $a;
$idEtapa2 = $idPlan . $b;
$idEtapa3 = $idPlan . $c;
?>

<html>
    <head>    
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/acordeonbonito.css">
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
        <div id="container-main">
            <div class="accordion-container">

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
                            <div class="form-group">
                                <br>
                                <br>
                                <?php
                                if ($data == 0) {
                                    echo '<label class="alert alert-info">NO HAY ARCHIVO VERIFICADOR</label>';
                                } else {
                                    echo '<a href="archivo_pdfVistaDirector.php?id=' . $idPlan . '&idEtapa=' . $idEtapa1 . '" target="_blank"><input type="button" class="btn btn-primary offset-sm-4" value="Visualizar Archivo Verificador"></a>';
                                }
                                ?>
                            </div>
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
                            <div class="form-group">
                                <br>
                                <br>
                                <?php
                                if ($data == 0) {
                                    echo '<label class="alert alert-info">NO HAY ARCHIVO VERIFICADOR</label>';
                                } else {
                                    echo '<a href="archivo_pdfVistaDirector.php?id=' . $idPlan . '&idEtapa=' . $idEtapa2 . '" target="_blank"><input type="button" class="btn btn-primary offset-sm-4" value="Visualizar Archivo Verificador"></a>';
                                }
                                ?>
                            </div>    
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
                            <div class="form-group">
                                <br>
                                <br>
                                <?php
                                if ($data == 0) {
                                    echo '<label class="alert alert-info">NO HAY ARCHIVO VERIFICADOR</label>';
                                } else {
                                    echo '<a href="archivo_pdfVistaDirector.php?id=' . $idPlan . '&idEtapa=' . $idEtapa3 . '" target="_blank"><input type="button" class="btn btn-primary offset-sm-4" value="Visualizar Archivo Verificador"></a>';
                                }
                                ?>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
            <input type="button" value="Volver" style="background-color:#12548c; border: #12548c;" onclick="history.back();" class="btn btn-primary"> 
        </div>
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/acordeon.js"></script>
        <script src="../js/funcionesPropias.js"></script>
    </body>


</html>
