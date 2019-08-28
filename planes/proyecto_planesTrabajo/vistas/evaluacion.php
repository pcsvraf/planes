<?php
require '../funciones/conexion.php';
require '../funciones/evalucacion_directorJefe.php';
$evaluar = new Evaluar($_REQUEST);
$evaluar->evaluar($_REQUEST);
$evaluar->evaluarJefe();

$idPlan = $_GET['idPlan'];
$idJefe = $_GET['idJefe'];
$db = new Conect_MySql();

$query = "select * from planes where id = '$idPlan'";
$ejecuta = $db->execute($query);
$datos = $db->fetch_row($ejecuta);
?>
<html>
    <head>
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <br>
            <br>
            <center><h1>Evaluación del Plan de Trabajo: <?php echo $datos['nombre_plan'] ?></h1></center>
            <br>
            <br>
            <form action="evaluacion.php" method="POST">
                <div class="form-group">
                    <input type="hidden" name="idPlan" value="<?php echo $idPlan; ?>">
                    <input type="hidden" name="idJefe" vale="<?php echo $idJefe; ?>">
                    <center><label>NOTA:</label></center>
                    <center><input type="number" name="nota" class="form-control col-sm-5"></center>
                </div>
                <center><input type="submit" name="evaluar" value="CALIFICAR" class="btn btn-primary"></center>
            </form>

        </div>
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        <script src="../js/popper.min.js"></script>
    </body>

</html>