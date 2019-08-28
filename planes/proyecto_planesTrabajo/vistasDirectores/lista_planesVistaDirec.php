<?php
include '../funciones/conexion.php';
//se obtiene el correo
$correo = $_GET['correo'];
//se crea objeto de conexión
$db = new Conect_MySql();
//consulta que se realiza a la base de datos
$query = "SELECT * FROM planes WHERE email = '$correo' && estado != 'Rechazado por PCS' && estado != 'Ingresado'"
        . " && estado != 'Enviado' && estado != 'Rechazado por Director' ORDER BY id DESC";
//variable que ejecuta la consulta
$ejecuta = $db->execute($query);

$consulta = "SELECT nombre FROM autoridades where email = '$correo'";
$restult = $db->execute($consulta);
$data = $db->fetch_row($restult);
?>  
<!DOCTYPE html>  
<html>  
    <head>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            .image {
                width: 40px;
                height: 40px;
            }
            .tituloTabla {
                font-weight: 550; 
                color: #DC7633;
            }
        </style>
    </head>  
    <body>
        <br /><br />  
        <div class="container">  
            <h2 align="center">Planes de Acción de <?php echo $data[0]; ?></h2>  
            <br/>  
            <div class="table-responsive">  
                <table id="tablaPlanes" class="table table-striped">  
                    <thead>  
                        <tr> 
                    <input type="hidden" id="correo" value="<?php echo $correo; ?>"> 
                    <td class="tituloTabla">ID</td>  
                    <td class="tituloTabla">Nombre Plan</td>  
                    <td class="tituloTabla">Fecha</td>
                    <td class="tituloTabla">VER</td>
                    <td class="tituloTabla">Aceptar</td>
                    <td class="tituloTabla">Rechazar</td>
                    <td class="tituloTabla">Estado</td>
                    <td class="tituloTabla">Observación</td>
                    </tr>  
                    </thead>  
                    <?php
                    while ($row = $db->fetch_row($ejecuta)) {
                        ?>
                        <tr>  
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombre_plan']; ?></td>
                            <td><?php echo $row['fechaIngreso']; ?></td>
                            <?php if ($row['estado'] == 'Revisado por PCS') { ?>
                                <td><button type="button" class="btn btn-primary plan" value="<?php echo $row['id']; ?>">Visualizar</button></td>
                                <td><button type="button" class="btn btn-info aceptar" value="<?php echo $row['id']; ?>">Aceptar</button></td>
                                <td><button type="button" class="btn btn-danger rechazar" value="<?php echo $row['id']; ?>">Rechazar</button></td>
                            <?php } else if ($row['estado'] == 'Validado por Director de Área') { ?>
                                <td><button type="button" class="btn btn-primary plan" value="<?php echo $row['id']; ?>">Visualizar</button></td>
                                <td><button type="button" class="btn btn-info aceptar" disabled="" value="<?php echo $row['id']; ?>">Aceptar</button></td>
                                <td><button type="button" class="btn btn-danger rechazar" disabled="" value="<?php echo $row['id']; ?>">Rechazar</button></td>
                            <?php } else if ($row['estado'] == 'Rechazado por Director') { ?>
                                <td><button type="button" class="btn btn-primary plan" value="<?php echo $row['id']; ?>">Visualizar</button></td>
                                <td><button type="button" class="btn btn-info aceptar" disabled="" value="<?php echo $row['id']; ?>">Aceptar</button></td>
                                <td><button type="button" class="btn btn-danger rechazar" disabled="" value="<?php echo $row['id']; ?>">Rechazar</button></td>
                            <?php } ?>
                            <td><?php echo $row['estado']; ?></td>
                            <td><?php echo $row['observacion']; ?></td>
                        </tr>  
                        <?php
                    }
                    ?>  
                </table>  
            </div>
            <div class="modal fade" id="myModal" role="dialog">
                <form action="../funcionesDirect/rechazar.php" method="POST">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Rechazar Plan de Acción</h4>
                            </div>
                            <div class="modal-body">
                                <p>Ingrese Razón de rechazo del plan</p>
                                <input type="hidden" name="correo" value="<?php echo $correo; ?>">
                                <input type="hidden" name="ide" id="ide">
                                <textarea name="rechazo" required="" id="rechazo" onkeypress="verificarTamaño();" maxlength="500" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary rech" value="Enviar">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal fade" id="myModal2" role="dialog">
                <form action="../funcionesDirect/aceptar.php" method="POST">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Aceptar Plan de Acción</h4>
                            </div>
                            <div class="modal-body">
                                <p>Ingrese Razón de aceptación del plan</p>
                                <input type="hidden" name="correo2" value="<?php echo $correo; ?>">
                                <input type="hidden" name="ide2" id="ide2">
                                <textarea name="aceptar" id="aceptar" onkeypress="verificar_telefono();" maxlength="500" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary rech" value="Enviar">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="../js/funciones.js"></script>
    </body>  
</html>  
<script>
                                    $(document).ready(function () {
                                        $('#tablaPlanes').DataTable({
                                            "language": {
                                                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                                            },
                                            "order": false,
                                            "ordering": false
                                        });
                                    });

                                    $(document).on('click', '.rechazar', function () {
                                        var id = $(this).val();
                                        $("#myModal").modal({backdrop: true});
                                        $("#ide").val(id);
                                    });

                                    $(document).on('click', '.plan', function () {
                                        var id = $(this).val();
                                        var correo = '<?php echo $correo ?>';
                                        window.location = 'vistaPlanesD.php?id=' + id + '&correo=' + correo;
                                    });

                                    $(document).on('click', '.aceptar', function () {
                                        var id = $(this).val();
                                        $("#myModal2").modal({backdrop: true});
                                        $('#ide2').val(id);
                                    });

                                    function verificarTamaño() {
                                        var textotelefono = document.getElementById('rechazo').value;
                                        var numero = textotelefono.length;

                                        if (numero >= 500) {
                                            alert("No puede superar los 500 caracteres");
                                            textotelefono.slice(3, -1);
                                            return false;
                                        } else {
                                            return true;
                                        }
                                    }

                                    function verificar_telefono() {
                                        var textotelefono = document.getElementById('aceptar').value;
                                        var numero = textotelefono.length;

                                        if (numero >= 500) {
                                            alert("No puede superar los 500 caracteres");
                                            textotelefono.slice(3, -1);
                                            return false;
                                        } else {
                                            return true;
                                        }
                                    }

</script>  