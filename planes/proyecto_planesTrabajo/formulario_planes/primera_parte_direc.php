<?php
include $_SERVER['DOCUMENT_ROOT'] . "/wp-load.php";

$correo = get_userdata(get_current_user_id())->user_email;
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" href="../css/menu.css">
        <style type="text/css">
            .fieldname {
                margin-right: 20px
            }

            .indicador {
                margin-top: 10px;
            }

            .indi{
                font-size: 13px; 
            }

            .contenedor{
                font-size: 17px;
                color: #000;
            }


        </style>
    </head>
    <body class="contenedor">
        <br>
        <div class="container">
            <form action="../funciones/enviarDatos_director.php" id="formulario" method="POST">
                <input type="hidden" name="correo" value="<?php echo $correo; ?>">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>NOMBRE</label>
                        <input class="form-control" type="text" required="" name="nombrePlan" id="nombrePlan">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <select class="form-control" name="select" required="" onchange="d1(this)" style="font-weight: bold;">
                            <option value="" selected="" disabled="">SU PLAN DE ACCIÓN CORRESPONDE A:</option><(
                            <option value="Calidad de Servicio">Calidad de Servicio</option>
                            <option value="Eficiencia Operacional">Eficiencia Operacional</option>
                            <option value="Mejoramiento Funcional/Proceso">Mejoramiento Funcional/Proceso</option>
                            <option value="otro1">Otro</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <input class="form-control" style="display: none;" placeholder="Otro" required="" type="text" id="prg1" name="otro" size="50" disabled="true">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>RESUMEN</label>
                        <textarea class="form-control" onkeypress="verificar_telefono();" maxlength="1000" name="resumen" placeholder="Describa su Plan de Acción, indicando su origen y la solución que propone (máximo 1000 caracteres)" id="resumen" type="text" required=""></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>OBJETIVO</label>
                        <textarea class="form-control txtarea" name="objetivo" id="objetivo" placeholder="Lo que se quiere lograr" type="text" required=""></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <label>INDICADOR (mínimo 1)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-2">
                        <input type="text" name="indicador" id="indicador" placeholder="Indicador 1: nivel de logro" required="" class="form-control">
                        <input type="button" value="Añadir otro Indicador" class="btn btn-secondary indicador" id="add" />
                    </div>
                    <fieldset id="buildyourform">
                    </fieldset>
                    <br>
                    <br>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-7 col-md-offset-2">
                        <label>RESULTADO ESPERADO</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <textarea class="form-control" name="resultado" id="resultado" placeholder="Meta Plan de Acción (valor que debe tomar el indicador)" type="text" required=""></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <label>ETAPA 1</label>
                        <textarea class="form-control" name="etapa1" placeholder="Describa etapa" id="etapa1" type="text" required=""></textarea>
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fechaInicio1" id="fecha1" class="form-control" required="">
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Término</label>
                        <input type="date" name="fechaTermino1" onchange="validate_fechaMayorQue();" id="fecha2" class="form-control" required="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>Medio de Verificación</label> 
                        <textarea class="form-control" name="medioVerificacion1" placeholder="Señale el o los Medios de Verificación" id="verificacion1" type="text" required=""></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <label>ETAPA 2</label>
                        <textarea class="form-control" name="etapa2" id="etapa2" placeholder="Describa etapa" type="text" required=""></textarea>
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fechaInicio2" id="fecha3" class="form-control" required="">
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Término</label>
                        <input type="date" name="fechaTermino2" id="fecha4" onchange="validate_fechaMayorQue2();" class="form-control" required="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>Medio de Verificación</label>
                        <textarea class="form-control" name="medioVerificacion2" placeholder="Señale el o los Medios de Verificación" id="verificacion2" id="nombreSolicitud" type="text" required=""></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <label>ETAPA 3</label>
                        <textarea class="form-control" name="etapa3" id="etapa3" placeholder="Describa etapa" type="text" required=""></textarea>
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fechaInicio3" id="fecha5" class="form-control" required="">
                    </div>
                    <div class="col-md-2">
                        <label>Fecha Término</label>
                        <input type="date" name="fechaTermino3" id="fecha6" onchange="validate_fechaMayorQue3();" class="form-control" required="">
                    </div>
                    <br>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <label>Medio de Verificación</label>
                        <textarea class="form-control" name="medioVerificacion3" placeholder="Señale el o los Medios de Verificación" id="verificacion3" type="text" required=""></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <center><div class="col-md-2 col-md-offset-2">
                            <?php echo '<a href="../vistasDirectores/menu_directores.php?correo=' . $correo . '"><input type="button" value="Volver" class="btn btn-primary offset-sm-3"></a>'; ?>
                        </div></center>
                    <center><div class="col-md-2">
                            <input type="button" value="Guardar" name="guardar" id="guardar" class="btn btn-info">
                        </div></center>
                    <center><div class="col-md-2">
                            <input type="button" value="Limpiar" name="limpiar" id="limpiar" class="btn btn-danger">
                        </div></center>
                    <center><div class="col-md-2">
                            <input type="submit" value="Enviar" name="enviar" class="offset-sm-4 btn btn-primary">
                        </div></center>
                </div>
            </form>
            <br>
            <br>
            <br>
        </div>    
    </body>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/guardar.js"></script>
    <script>
                            $(document).ready(function () {
                                $("#add").click(function () {
                                    var bCancelado = false;

                                    var intId = $("#buildyourform div").length + 1;
                                    var fieldWrapper = $("<div class=\"fieldwrapper col-sm-4 form-inline\" id=\"field" + intId + "\"/>");
                                    var fName = $("<input type=\"text\" class=\"fieldname form-control\" name=\"indicador" + intId + "\" id=\"indicador" + intId + "\" />");
                                    var removeButton = $("<input type=\"button\" class=\"remove btn btn-secondary indicador\" value=\"Borrar\" />");
                                    removeButton.click(function () {
                                        $(this).parent().remove();
                                    });

                                    if (intId > 2) {
                                        alert("no puede ingresar más de 3 indicadores");
                                        bCancelado = true;
                                    }

                                    if (bCancelado == false) {
                                        fieldWrapper.append(fName);
                                        fieldWrapper.append(removeButton);
                                        $("#buildyourform").append(fieldWrapper);
                                    }
                                });
                                $("#preview").click(function () {
                                    $("#yourform").remove();
                                    var fieldSet = $("<fieldset id=\"yourform\"><legend>Your Form</legend></fieldset>");
                                    $("#buildyourform div").each(function () {
                                        var id = "input" + $(this).attr("id").replace("field", "");
                                        var label = $("<label for=\"" + id + "\">" + $(this).find("input.fieldname").first().val() + "</label>");
                                        var input;
                                        switch ($(this).find("select.fieldtype").first().val()) {
                                            case "checkbox":
                                                input = $("<input type=\"checkbox\" id=\"" + id + "\" name=\"" + id + "\" />");
                                                break;
                                            case "textbox":
                                                input = $("<input type=\"text\" id=\"" + id + "\" name=\"" + id + "\" />");
                                                break;
                                            case "textarea":
                                                input = $("<textarea id=\"" + id + "\" name=\"" + id + "\" ></textarea>");
                                                break;
                                        }
                                        fieldSet.append(label);
                                        fieldSet.append(input);
                                    });
                                    $("body").append(fieldSet);
                                });
                            });
    </script>
    <script>
        $("#limpiar").click(function () {
            $('#nombrePlan').val('');
            $('input:radio[name="radios"]').prop('checked', false);
            $('#resumen').val('');
            $('#objetivo').val('');
            $('#indicador').val('');
            $('#indicador1').val('');
            $('#indicador2').val('');
            $('#resultado').val('');
            $('#etapa1').val('');
            $('#etapa2').val('');
            $('#etapa3').val('');
            $('#fecha1').val('');
            $('#fecha2').val('');
            $('#fecha3').val('');
            $('#fecha4').val('');
            $('#fecha5').val('');
            $('#fecha6').val('');
            $('#verificacion1').val('');
            $('#verificacion2').val('');
            $('#verificacion3').val('');
        });

        $("#guardar").click(function () {
            if ($("#nombrePlan").val() == '') {
                alert("debe completar el campo Nombre Plan de Acción para poder guardar");
                return false;
            } else {
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
            }
        });
    </script>
    <script language="javascript" type="text/javascript">
        function d1(selectTag) {
            if (selectTag.value == 'otro1') {
                document.getElementById('prg1').style.display = "block";
                document.getElementById('prg1').disabled = false;
            } else {
                document.getElementById('prg1').style.display = "none";
                document.getElementById('prg1').disabled = true;
            }
        }

        function verificar_telefono() {
            var textotelefono = document.getElementById('resumen').value;
            var numero = textotelefono.length;

            if (numero >= 1000) {
                alert("No puede superar los 1000 caracteres");
                textotelefono.slice(3, -1);
                return false;
            } else {
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