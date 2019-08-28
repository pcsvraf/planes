<?php

require_once('../tcpdf/config/lang/eng.php');
require_once('../tcpdf/tcpdf.php');
require_once('../funciones/conexion.php');

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Documento Plataforma Planes de Trabajo'); //Titulo del pdf
$pdf->setPrintHeader(true); //No se imprime cabecera
$pdf->setPrintFooter(false); //No se imprime pie de pagina
$pdf->SetMargins(50, 40, 50, false); //Se define margenes izquierdo, alto, derecho
$pdf->SetAutoPageBreak(true, 20); //Se define un salto de pagina con un limite de pie de pagina
$pdf->setHeaderMargin(5);
$imagen = "logo.png";
$pdf->SetHeaderData($imagen, PDF_HEADER_LOGO_WIDTH, '', '');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->addPage();
$htm = "<h1>Documento Planes de Trabajo</h1><br>";

// print a block of text using Write()
$pdf->writeHTML($htm, true, false, true, false, '');

//$sql = "SELECT * FROM rescate ORDER BY id ASC";
//$cosas = $mysqli->query($sql);
$html = '';
$item = 1;

//datos soli
$db = new Conect_MySql();
$query = "select * from planes where id=" . $_GET['id'];
$ejecuta = $db->execute($query);
$datos = $db->fetch_row($ejecuta);

//foreach ($cosas as $row) {
//$idpeticion = $row['idPeticion'];
//$monto = $row['monto'];
//$registro = date('d/m/Y', strtotime($row['cosa_registro']));
//$fechaRescate = $row['fechaRescate'];
//$porcentajeGanancia = $row['porcentajeGanancia'];
//$descrip = $row['descripcion'];
$html .= '<h1>Datos Planes</h1>
    <table border="1" cellpadding="5"> 
    <tr>
        <td width="100" bgcolor="#E6E6E6"><b>ID: </b></td>
        <td width="220">' . $datos['id'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Nombre Plan: </b></td>
        <td>' . $datos['nombre_plan'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Su Plan de Acción Corresponde a: </b></td>
        <td>' . $datos['corresponde'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Resumen: </b></td>
        <td>' . $datos['resumen'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Objetivo: </b></td>
        <td>' . $datos['objetivo'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Indicador 1: </b></td>
        <td>' . $datos['indicador1'] . '</td>
    </tr>
     <tr>
        <td bgcolor="#E6E6E6"><b>Indicador 2: </b></td>
        <td>' . $datos['indicador2'] . '</td>
    </tr>
     <tr>
        <td bgcolor="#E6E6E6"><b>Indicador 3: </b></td>
        <td>' . $datos['indicador3'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Resultado Esperado: </b></td>
        <td>' . $datos['resultadoEsperado'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Fecha Ingreso: </b></td>
        <td>' . $datos['fechaIngreso'] . '</td>
    </tr>

</table><br><br><br>';

$html2 .= '<h1>Datos Etapa 1 Planes</h1>
    <table border="1" cellpadding="5">
    <tr>
        <td width="100" bgcolor="#E6E6E6"><b>Nombre: </b></td>
        <td width="220">' . $datos['etapa1'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Fecha Inicio: </b></td>
        <td>' . $datos['fecha_inicio1'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Fecha Término: </b></td>
        <td>' . $datos['fecha_termino1'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Medio Verificación: </b></td>
        <td>' . $datos['medio_verificacion1'] . '</td>
    </tr>
 
</table><br><br><br>';
$html2 .= '<h1>Datos Etapa 2 Planes</h1>
    <table border="1" cellpadding="5">
    <tr>
        <td width="100" bgcolor="#E6E6E6"><b>Nombre: </b></td>
        <td width="220">' . $datos['etapa2'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Fecha Inicio: </b></td>
        <td>' . $datos['fecha_inicio2'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Fecha Término: </b></td>
        <td>' . $datos['fecha_termino2'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Medio Verificación: </b></td>
        <td>' . $datos['medio_verificacion2'] . '</td>
    </tr>
</table><br><br><br>';
$html3 .= '<h1>Datos Etapa 3 Planes</h1>
    <table border="1" cellpadding="5">
    <tr>
        <td width="100" bgcolor="#E6E6E6"><b>Nombre: </b></td>
        <td width="220">' . $datos['etapa3'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Fecha Inicio: </b></td>
        <td>' . $datos['fecha_inicio3'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Fecha Término: </b></td>
        <td>' . $datos['fecha_termino3'] . '</td>
    </tr>
    <tr>
        <td bgcolor="#E6E6E6"><b>Medio Verificación: </b></td>
        <td>' . $datos['medio_verificacion3'] . '</td>
    </tr>

 
</table><br><br><br>';

$item = $item + 1;
//}


$pdf->SetFont('Helvetica', '', 10);
$pdf->writeHTML($html, true, 0, true, 0);
$pdf->writeHTML($html2, true, 0, true, 0);
$pdf->writeHTML($html3, true, 0, true, 0);
$pdf->writeHTML($html4, true, 0, true, 0);
$pdf->writeHTML($html5, true, 0, true, 0);

$pdf->lastPage();
$pdf->output('Reporte.pdf', 'I');
?>
