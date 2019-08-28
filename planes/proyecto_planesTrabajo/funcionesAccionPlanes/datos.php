<?php
//fetch.php
$connect = mysqli_connect("localhost", "pcspucv_planes", "pcs2018", "pcspucv_planes");
$columns = array("planes.id", "planes.resultadoEsperado", "planes.nombre_plan", "planes.fechaIngreso");

$query = "SELECT * FROM planes";

$query .= " WHERE ";

if (isset($_POST["search"]["value"])) {
    $query .= '(planes.id LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR planes.resultadoEsperado LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR planes.nombre_plan LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR planes.fechaIngreso LIKE "%' . $_POST["search"]["value"] . '%") ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["nombre_plan"];
    $sub_array[] = $row["resultadoEsperado"];
    $sub_array[] = $row["fechaIngreso"];
    $data[] = $sub_array;
}

function get_all_data($connect) {
    $query = "SELECT * FROM planes";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data" => $data
);

echo json_encode($output);
?>
