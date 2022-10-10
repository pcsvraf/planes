<?php

require 'conexion.php';
$db = new Conect_MySql();
$id = $_GET['id'];
$output = '';

//if (isset($_POST["export"])) {

$query = "select * from planes where id=" . $id;
$result = $db->execute($query);
if ($db->get_num_rows($result) > 0) {
    $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th>
                         <th>Nombre Plan</th>  
                         <th>Su Plan de Acción Corresponde a</th>  
                         <th>Resumen</th>  
                         <th>Objetivo</th>
                         <th>Indicador 1</th>
                         <th>Indicador 2</th>
                         <th>Indicador 3</th>
                         <th>Resultado Esperado</th>
                         <th>Etapa 1</th>
                         <th>Fecha Inicio</th>
                         <th>Fecha Termino</th>
                         <th>Medio Verificación</th>
                         <th>Etapa 2</th>
                         <th>Fecha Inicio</th>
                         <th>Fecha Termino</th>
                         <th>Medio Verificación</th>
                         <th>Etapa 3</th>
                         <th>Fecha Inicio</th>
                         <th>Fecha Termino</th>
                         <th>Medio Verificación</th>
                         <th>Fecha Ingreso</th>
                    </tr>
  ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
                    <tr>  
                         <td>' . $row["id"] . '</td>  
                         <td>' . $row["nombre_plan"] . '</td>  
                         <td>' . $row["corresponde"] . '</td>  
                         <td>' . $row["resumen"] . '</td>  
                         <td>' . $row["objetivo"] . '</td>
                         <td>' . $row["indicador1"] . '</td>
                         <td>' . $row["indicador2"] . '</td>
                         <td>' . $row["indicador3"] . '</td>
                         <td>' . $row["resultadoEsperado"] . '</td>
                         <td>' . $row["etapa1"] . '</td>
                         <td>' . $row["fecha_inicio1"] . '</td>
                         <td>' . $row["fecha_termino1"] . '</td>
                         <td>' . $row["medio_verificacion1"] . '</td>
                         <td>' . $row["etapa2"] . '</td>
                         <td>' . $row["fecha_inicio2"] . '</td>
                         <td>' . $row["fecha_termino2"] . '</td>
                         <td>' . $row["medio_verificacion2"] . '</td>
                         <td>' . $row["etapa3"] . '</td>
                         <td>' . $row["fecha_inicio3"] . '</td>
                         <td>' . $row["fecha_termino3"] . '</td>
                         <td>' . $row["medio_verificacion3"] . '</td>
                         <td>' . $row["fechaIngreso"] . '</td>
                    </tr>
   ';
    }
    $output .= '</table>';
    header('Content-Type: application/xls; charset=UTF-8');
    header('Content-Disposition: attachment; filename=PlanesDeTrabajo.xls');
    echo utf8_decode($output);
}
//}
?>
