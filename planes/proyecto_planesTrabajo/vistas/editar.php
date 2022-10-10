<?php
require '../funciones/conexion.php';

$db = new Conect_MySql();

$correo = $_GET['correo'];

$id = $_GET['id'];

$query = "SELECT * FROM planes WHERE id = '$id'";

$ejecuta = $db->execute($query);

$datos = $db->fetch_row($ejecuta);
?>
<html>
    <head>
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilos.css">
        <style type="text/css">
            .contenedor {
                font-size: 17px;
                color: #000;
            }
        </style>
    </head>
    <body class="contenedor">
        <br>
        <div class="container">
            <form action="../funciones/funcion_editar.php" id="formulario" method="POST">
                <input type="hidden" name="correo" value="<?php echo $correo; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>NOMBRE</label>
                        <input class="form-control" type="text" required="" value="<?php echo $datos['nombre_plan']; ?>" name="nombrePlan" id="nombrePlan">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <select class="form-control" style="font-weight: bold;" onchange="d1(this)" required="" name="select">
                            <option value="" <?php if ($datos['corresponde'] == '') { ?> selected="" <?php } ?>disabled="">SU PLAN DE ACCIÓN CORRESPONDE A:</option>
                            <option value="Calidad de Servicio" <?php if ($datos['corresponde'] == 'Calidad de Servicio') { ?> selected="" <?php } ?>>Calidad de Servicio</option>
                            <option value="Eficiencia Operacional" <?php if ($datos['corresponde'] == 'Eficiencia Operacional') { ?> selected="" <?php } ?>>Eficiencia Operacional</option>
                            <option value="Mejoramiento Funcional/Proceso" <?php if ($datos['corresponde'] == 'Mejoramiento Funcional/Proceso') { ?> selected="" <?php } ?>>Mejoramiento Funcional/Proceso</option>
                            <option value="otro1" <?php
                            if ($datos['corresponde'] != '' && $datos['corresponde'] != 'Calidad de Servicio' &&
                                    $datos['corresponde'] != 'Eficiencia Operacional' && $datos['corresponde'] != 'Mejoramiento Funcional/Proceso') {
                                ?> selected="" <?php } ?>>Otro</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div>
                        <div class="col-md-6 col-md-offset-2">
                            <input class="form-control" <?php
                            if ($datos['corresponde'] != '' && $datos['corresponde'] != 'Calidad de Servicio' &&
                                    $datos['corresponde'] != 'Eficiencia Operacional' && $datos['corresponde'] != 'Mejoramiento Funcional/Proceso') {
                                ?> style="display: block;" <?php } else {
                                ?> style="display: none;" <?php } ?> placeholder="Otro" required="" value="<?php echo $datos['corresponde']; ?>" type="text" id="prg1" name="otro" size="50">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>RESUMEN</label>
                        <textarea class="form-control" name="resumen" onkeypress="verificar_telefono();" maxlength="1000" placeholder="Describa su Plan de Acción, indicando su origen y la solución que propone (máximo 1000 caracteres)" 
                                  id="resumen" type="text" required=""><?php echo $datos['resumen']; ?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>OBJETIVO</label>
                        <textarea class="form-control txtarea" maxlength="1000" name="objetivo" placeholder="Lo que se quiere lograr" id="objetivo" type="text" required=""><?php echo $datos['objetivo']; ?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-7 col-sm-offset-2">
                        <label>INDICADOR (mínimo 1)</label>
                    </div>
                    <div class="col-md-3 col-md-offset-2">
                        <input type="text" name="indicador1" value="<?php echo $datos['indicador1']; ?>" id="indicador1" placeholder="Indicador 1: nivel de logro" required="" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="indicador2" value="<?php echo $datos['indicador2']; ?>" id="indicador2" placeholder="Indicador 2" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="indicador3" value="<?php echo $datos['indicador3']; ?>" id="indicador3" placeholder="Indicador 3" class="form-control">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>RESULTADO ESPERADO</label>
                        <textarea class="form-control" name="resultado" id="resultado" type="text" placeholder="Meta Plan de Acción (valor que debe tomar el indicador)" required=""><?php echo $datos['resultadoEsperado']; ?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <label>ETAPA 1</label>
                        <textarea class="form-control" name="etapa1" id="etapa1" placeholder="Describa etapa" type="text" required=""><?php echo $datos['etapa1']; ?></textarea>
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fechaInicio1" id="fecha1" class="form-control" value="<?php echo $datos['fecha_inicio1']; ?>" required="">
                    </div>   
                    <div class="col-md-2">
                        <label>Fecha Término</label>
                        <input type="date" name="fechaTermino1" id="fecha2" onchange="validate_fechaMayorQue();" class="form-control" value="<?php echo $datos['fecha_termino1']; ?>" required="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>Medio de Verificación</label>
                        <textarea class="form-control" placeholder="Señale el o los Medios de Verificacion" name="medioVerificacion1" id="verificacion1" type="text" required=""><?php echo $datos['medio_verificacion1']; ?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <label>ETAPA 2</label>
                        <textarea class="form-control" placeholder="Describa la etapa" name="etapa2" id="etapa2" type="text" required=""><?php echo $datos['etapa2']; ?></textarea>
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fechaInicio2" id="fecha3" class="form-control" value="<?php echo $datos['fecha_inicio2']; ?>" required="">
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Término</label>
                        <input type="date" name="fechaTermino2" id="fecha4" onchange="validate_fechaMayorQue2();" class="form-control" value="<?php echo $datos['fecha_termino2']; ?>" required="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>Medio de Verificación</label>
                        <textarea class="form-control" name="medioVerificacion2" id="verificacion2" placeholder="Señale el o los Medios de Verificación" id="nombreSolicitud" type="text" required=""><?php echo $datos['medio_verificacion2']; ?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <label>ETAPA 3</label>
                        <textarea class="form-control" placeholder="Describa la etapa" name="etapa3" id="etapa3" type="text" required=""><?php echo $datos['etapa3']; ?></textarea>
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fechaInicio3" id="fecha5" class="form-control" value="<?php echo $datos['fecha_inicio3']; ?>" required="">
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Término</label>
                        <input type="date" name="fechaTermino3" id="fecha6" onchange="validate_fechaMayorQue3();" class="form-control" value="<?php echo $datos['fecha_inicio3']; ?>" required="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>Medio Verificación</label>
                        <textarea class="form-control" placeholder="Señale el o los Medios de Verificación" name="medioVerificacion3" id="verificacion3" type="text" required=""><?php echo $datos['medio_verificacion3']; ?></textarea>
                    </div>
                </div>
                <br>
                <center><input type="button" value="Volver" onclick="history.back();" name="volver" id="volver" class="btn btn-secondary">
                    <input type="button" value="Guardar" name="guardar" id="guardar" class="btn btn-info">
                    <input type="submit" value="Enviar" name="enviar" class="offset-sm-4 btn btn-primary"></center>
            </form>      
        </div>    
    </body>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">

                    $(document).on('click', '#guardar', function () {
                        $('#nombrePlan').removeProp('required', false);
                        $('#radio1').removeProp('required', false);
                        $('#radio2').removeProp('required', false);
                        $('#radio3').removeProp('required', false);
                        $('#resumen').removeProp('required', false);
                        $('#objetivo').removeProp('required', false);
                        $('#indicador1').removeProp('required', false);
                        $('#indicador2').removeProp('required', false);
                        $('#indicador3').removeProp('required', false);
                        $('#resultado').removeProp('required', false);
                        $('#cta').removeProp('required', false);
                        $('#cheque').removeProp('required', false);
                        $('#otro').removeProp('required', false);
                        $('#etapa1').removeProp('required', false);
                        $('#etapa2').removeProp('required', false);
                        $('#etapa3').removeProp('required', false);
                        $('#fecha1').removeProp('required', false);
                        $('#fecha2').removeProp('required', false);
                        $('#fecha3').removeProp('required', false);
                        $('#verificacion1').removeProp('required', false);
                        $('#verificacion2').removeProp('required', false);
                        $('#verificacion3').removeProp('required', false);
                        $('#formulario').submit();
                    });
    </script>
    <script language="javascript" type="text/javascript">
        function d1(selectTag) {
            if (selectTag.value == 'otro1') {
                document.getElementById('prg1').style.display = "block";
            } else {
                document.getElementById('prg1').style.display = "none";
            }
        }
        
        function verificar_telefono() {
            var textotelefono = document.getElementById('resumen').value;
            var numero = textotelefono.length;

            if (numero >= 1000) {
                alert("No puede superar los 1000 caracteres");
                textotelefono.slice(3, -1);
                return false;
            }else{
                return true;
            }
        }
        
        function validate_fechaMayorQue() {
            var rangoini = document.getElementById('fecha1').value;
            var rangofin = document.getElementById('fecha2').value;
            if ((Date.parse(rangoini)) > (Date.parse(rangofin))) {
                alert("La Fecha de Inicio no puede ser mayor a la Fecha de Término");
                $('#fecha1').val('');
                $('#fecha2').val('');
            } else if ((Date.parse(rangoini)) < (Date.parse(rangofin))) {

            } else {
                alert("Las Fechas no pueden ser iguales");
                $('#fecha1').val('');
                $('#fecha2').val('');
            }
        }
        
         function validate_fechaMayorQue2() {
            var rangoini = document.getElementById('fecha3').value;
            var rangofin = document.getElementById('fecha4').value;
            if ((Date.parse(rangoini)) > (Date.parse(rangofin))) {
                alert("La Fecha de Inicio no puede ser mayor a la Fecha de Término");
                $('#fecha3').val('');
                $('#fecha4').val('');
            } else if ((Date.parse(rangoini)) < (Date.parse(rangofin))) {

            } else {
                alert("Las Fechas no pueden ser iguales");
                $('#fecha3').val('');
                $('#fecha4').val('');
            }
        }
        
         function validate_fechaMayorQue3() {
            var rangoini = document.getElementById('fecha5').value;
            var rangofin = document.getElementById('fecha6').value;
            if ((Date.parse(rangoini)) > (Date.parse(rangofin))) {
                alert("La Fecha de Inicio no puede ser mayor a la Fecha de Término");
                $('#fecha5').val('');
                $('#fecha6').val('');
            } else if ((Date.parse(rangoini)) < (Date.parse(rangofin))) {

            } else {
                alert("Las Fechas no pueden ser iguales");
                $('#fecha5').val('');
                $('#fecha6').val('');
            }
        }
    </script> 
</html>