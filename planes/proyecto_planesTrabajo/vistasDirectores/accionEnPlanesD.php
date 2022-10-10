<?php
include '../funciones/conexion.php';
//se obtiene el correo para hacer un filtro en la consulta
include $_SERVER['DOCUMENT_ROOT'] . "/wp-load.php";

$correo = get_userdata(get_current_user_id())->user_email;
//se crea objeto de la clase conexión
$connect = new Conect_MySql();
//consulta
$query = "SELECT * FROM planes WHERE email = '$correo' ORDER BY id DESC";
//se ejecuta la consulta
$result = $connect->execute($query);
?>  
<!DOCTYPE html>  
<html>  
    <head>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
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
            <h2 align="center">MIS PLANES DE ACCIÓN</h2>  
            <br/>  
            <div class="table-responsive">  
                <table id="tablaPlanes" class="table table-striped">  
                    <thead>  
                        <tr> 
                    <input type="hidden" id="correo" value="<?php echo $correo; ?>"> 
                    <td class="tituloTabla">ID</td>  
                    <td class="tituloTabla">Nombre Plan</td>  
                    <td class="tituloTabla">Fecha</td>
                    <td class="tituloTabla">Estado</td>
                    <td class="tituloTabla">Editar</td>
                    <td class="tituloTabla">Eliminar</td>
                    <td class=""><center>VER</center></td>
                    <td class=""><center>EXCEL</center></td>
                    <td class=""><center>PDF</center></td>
                    </tr>  
                    </thead>  
                    <?php
                    // se hace un ciclo while para recorres y traer los datos de los planes
                    while ($row = $connect->fetch_row($result)) {
                        ?>
                        <tr>  
                            <td><?php echo $row["id"]; ?></td>  
                            <td><?php echo utf8_encode($row["nombre_plan"]); ?></td>  
                            <td><?php echo $row["fechaIngreso"]; ?></td>
                            <td><?php echo $row["estado"]; ?></td>
                            <?php if ($row["estado"] == 'Ingresado') { ?>
                                <td><?php echo '<button type="button" value="' . $row['id'] . '" class="btn btn-primary editar">Editar</button>'; ?></td>
                                <td><?php echo '<button type="button" value="' . $row['id'] . '" onClick="confirmarEliminacion2(' . $row['id'] . ');" class="btn btn-danger eliminar">Eliminar</button>'; ?></td>
                                <td><center><button type="button" class="btn btn-secondary" disabled="">ver</button></center></td>
                            <td><center><button type="button" class="btn btn-secondary" disabled="">.xls</button></center></td>
                            <td><center><button type="button" class="btn btn-secondary" disabled="">.pdf</button></center></td>
                        <?php } else if ($row["estado"] == 'Enviado') { ?>
                            <td><?php echo '<button type="button" value="' . $row['id'] . '" disabled="" class="btn btn-primary editar">Editar</button>'; ?></td>
                            <td><?php echo '<button type="button" value="' . $row['id'] . '" disabled="" onClick="confirmarEliminacion2(' . $row['id'] . ');" class="btn btn-danger eliminar">Eliminar</button>'; ?></td>
                            <td><center><?php echo '<input type="image" class="image plan" value="' . $row['id'] . '" src="https://vaf.ucv.cl:8443/Circulares/archivo?codNivel=0001054000&codDcto=00010540001903141802&type=doc">'; ?></center></td>
                            <td><center><button type="button" class="btn btn-secondary" disabled="">.xls</button></center></td>
                            <td><center><button type="button" class="btn btn-secondary" disabled="">.pdf</button></center></td>
                        <?php } else if ($row["estado"] == 'Revisado por PCS') { ?>
                            <td><button type="button" class="btn btn-secondary" disabled="">Editar</button></td>
                            <td><button type="button" class="btn btn-secondary" disabled="">Eliminar</button></td>
                            <td><center><?php echo '<input type="image" class="image plan" value="' . $row['id'] . '" src="https://vaf.ucv.cl:8443/Circulares/archivo?codNivel=0001054000&codDcto=00010540001903141802&type=doc">'; ?></center></td>
                            <td><center><?php echo '<input type="image" class="image excel" value="' . $row['id'] . '" src="https://vaf.ucv.cl:8443/Circulares/archivo?codNivel=0001054000&codDcto=00010540001903131038&type=doc">'; ?> </center></td>
                            <td><center><?php echo '<input type="image" class="image pdf" value="' . $row['id'] . '" src="https://vaf.ucv.cl:8443/Circulares/archivo?codNivel=0001054000&codDcto=00010540001903131035&type=doc">'; ?></center></td>
                        <?php } else if ($row["estado"] == 'Rechazado por PCS') { ?>
                            <td><button type="button" class="btn btn-secondary" disabled="">Editar</button></td>
                            <td><?php echo '<button type="button" value="' . $row['id'] . '" onClick="confirmarEliminacion2(' . $row['id'] . ');" class="btn btn-danger eliminar">Eliminar</button>'; ?></td>
                            <td><center><?php echo '<input type="image" class="image plan" value="' . $row['id'] . '" src="https://vaf.ucv.cl:8443/Circulares/archivo?codNivel=0001054000&codDcto=00010540001903141802&type=doc">'; ?></center></td>
                            <td><center><?php echo '<input type="image" class="image excel" value="' . $row['id'] . '" src="https://vaf.ucv.cl:8443/Circulares/archivo?codNivel=0001054000&codDcto=00010540001903131038&type=doc">'; ?> </center></td>
                            <td><center><?php echo '<input type="image" class="image pdf" value="' . $row['id'] . '" src="https://vaf.ucv.cl:8443/Circulares/archivo?codNivel=0001054000&codDcto=00010540001903131035&type=doc">'; ?></center></td>
                        <?php } ?>
                        </tr>  
                        <?php
                    }
                    ?>  
                </table>  
            </div>  
        </div>
        <script type="text/javascript" src="../js/funciones.js"></script>
    </body>  
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

    $(document).on('click', '.editar', function () {
        var id = $(this).val();
        var correo = '<?php echo $correo ?>';
        window.location = 'editar.php?id=' + id + '&correo=' + correo;
    });

    $(document).on('click', '.excel', function () {
        var id = $(this).val();
        window.open('../funciones/export_jefes.php?id=' + id);
    });

    $(document).on('click', '.pdf', function () {
        var id = $(this).val();
        window.open('../funciones/pdf_planesJefes.php?id=' + id);
    });

    $(document).on('click', '.plan', function () {
        var id = $(this).val();
        var correo = '<?php echo $correo ?>';
        window.location = 'vistaPlanesD.php?id=' + id + '&correo=' + correo;
    });

</script>  
</html>