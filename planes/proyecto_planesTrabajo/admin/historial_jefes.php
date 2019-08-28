<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilos.css"  type="text/css">
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/archivo.css">
    </head>
    <br>
    <br>
    <center><h1>HISTORIAL ARCHIVOS JEFES DE UNIDAD</h1></center>
    <body>
        <br>
        <br>
        <div class="container">
            <table class="table table-bordered table-hover">
                <tr>  
                    <td class="btn-info" style="background-color: #12548c">ID Plan</td>
                    <td class="btn-info" style="background-color: #12548c">Correo</td>
                    <td class="btn-info" style="background-color: #12548c">Nombre Plan</td>
                    <td class="btn-info" style="background-color: #12548c">ID Etapa</td>
                    <td class="btn-info" style="background-color: #12548c">Nombre Archivo</td>
                </tr>
                <?php
                include '../conexion.php';
                $db = new Conect_MySql();

                $sql = "select
                             id,
                             id_plan,
                             email,
                             nombrePlan,
                             id_etapa,
                             nombre_archivo
                             from archivo_verificador
                        ORDER BY id DESC";




                $query = $db->execute($sql);
                while ($datos = $db->fetch_row($query)) {
                    ?>
                    <tr>
                        <td class="invisible"><?php echo $datos['id']; ?></td>
                        <td><?php echo $datos['id_plan']; ?></td>
                        <td><?php echo $datos['email']; ?></td>                                                                  
                        <td><?php echo $datos['nombrePlan']; ?></td>
                        <td><?php echo $datos['id_etapa']; ?></td>
                        <td><?php echo $datos['nombre_archivo'] ?></td>
                        <td><?php echo '<center><a href="../archivo_pdf.php?id_plan=' . $datos['id'] . '" style="color: #12548c"><input type="image" src="../imagenes/Editar.png" width="30" height="30"></a></center>'; ?></td>                      
                    </tr>
                    <?php
                }$db->close_db();
                ?>   
            </table>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>   
</html>