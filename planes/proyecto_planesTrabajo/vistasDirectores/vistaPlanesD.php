<?php
require '../funciones/conexion.php';

//objeto de la clase conexión
$db = new Conect_MySql();

//se obtiene el id para consultar los datos de los planes
$id = $_GET['id'];

//consulta que trae los datos de los planes
$query = "SELECT * FROM planes WHERE id = '$id'";

//se ejecuta la consulta
$ejecuta = $db->execute($query);
//se traen los datos como columna
$datos = $db->fetch_row($ejecuta);
//se obtiene el correo de la consulta
include $_SERVER['DOCUMENT_ROOT'] . "/wp-load.php";

$correo = get_userdata(get_current_user_id())->user_email;
//se consulta el nombre de la autoridad según el correo
$consulta = "SELECT nombre FROM autoridades WHERE email = '$correo'";
//se ejecuta la consulta
$execute = $db->execute($consulta);
//se traen datos como columnas
$nombre = $db->fetch_row($execute);
?>
<html>
    <head>
        <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
        <style>
            .neg {
                font-weight: bold;
            }

            .contenedor{
                font-size: 17px;
                color: #000;
            }
        </style>
    </head>
    <body class="contenedor">
        <div class="container">
            <center><h2>ID: <?php echo $datos['id']; ?></h2></center>
            <center><h3><a style="color: #DC7633">"<?php echo $datos['nombre_plan']; ?>"</a></h3></center>
            <center><h4><?php echo $datos['corresponde']; ?></h4></center>
            <center><h4><?php echo $nombre[0]; ?></h4></center>

            <br>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <label>RESUMEN</label>
                    <textarea class="form-control neg" readonly=""><?php echo $datos['resumen']; ?></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <label>OBJETIVO</label>
                    <textarea class="form-control neg" readonly=""><?php echo $datos['objetivo']; ?></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <label>INDICADOR 1</label>
                    <input type="text" class="form-control neg" readonly="" value="<?php echo $datos['indicador1']; ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <label>INDICADOR 2</label>
                    <input type="text" class="form-control neg" readonly="" value="<?php echo $datos['indicador2']; ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <label>INDICADOR 3</label>
                    <input type="text" class="form-control neg" readonly="" value="<?php echo $datos['indicador3']; ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <label>RESULTADO ESPERADO</label>
                    <textarea class="form-control neg" readonly=""><?php echo $datos['resultadoEsperado']; ?></textarea>
                </div>
            </div>
            <br>
            <br>
            <center><h1>ETAPAS</h1></center>
            <br>
            <br>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <label>ETAPA 1</label>
                    <textarea class="form-control neg" readonly=""><?php echo $datos['etapa1']; ?></textarea>
                </div>
                <div class="col-md-2">
                    <center><label>Fecha Inicio</label></center>
                    <input type="text" class="form-control neg" readonly="" value="<?php echo $datos['fecha_inicio1']; ?>">
                </div>
                <div class="col-md-2">
                    <center><label>Fecha Término</label></center>
                    <input type="text" class="form-control neg" readonly="" value="<?php echo $datos['fecha_termino1']; ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <center><label>Medio Verificación</label></center>
                    <textarea class="form-control neg" readonly=""><?php echo $datos['medio_verificacion1']; ?></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <label>ETAPA 2</label>
                    <textarea class="form-control neg" readonly=""><?php echo $datos['etapa2']; ?></textarea>
                </div>
                <div class="col-md-2">
                    <center><label>Fecha Inicio</label></center>
                    <input type="text" class="form-control neg" readonly="" value="<?php echo $datos['fecha_inicio2']; ?>">
                </div>
                <div class="col-md-2">
                    <center><label>Fecha Término</label></center>
                    <input type="text" class="form-control neg" readonly="" value="<?php echo $datos['fecha_termino2']; ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <center><label>Medio Verificación</label></center>
                    <textarea class="form-control neg" readonly=""><?php echo $datos['medio_verificacion1']; ?></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <label>ETAPA 3</label>
                    <textarea class="form-control neg" readonly=""><?php echo $datos['etapa1']; ?></textarea>
                </div>
                <div class="col-md-2">
                    <center><label>Fecha Inicio</label></center>
                    <input type="text" class="form-control neg" readonly="" value="<?php echo $datos['fecha_inicio1']; ?>">
                </div>
                <div class="col-md-2">
                    <center><label>Fecha Término</label></center>
                    <input type="text" class="form-control neg" readonly="" value="<?php echo $datos['fecha_termino1']; ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <center><label>Medio Verificación</label></center>
                    <textarea class="form-control neg" readonly=""><?php echo $datos['medio_verificacion1']; ?></textarea>
                </div>
            </div>
            <br>
            <br>
            <center><?php echo '<a><input type="button" value="Volver" class="btn btn-primary"></a>'; ?></center> 
        </div>
    </body>   
</html>