<?php
require '../conexion.php';
$db = new Conect_MySql();

$query = "SELECT id_etapa1 FROM planes order by id DESC LIMIT 1";
$resultado = $db->execute($query);
$id = $db->fetch_row($resultado);
$ide = $id[0];

echo $ide++;
echo '<br>';
$l = "0";
for($i = 0; $i<29; $i++){
    
    echo $l++;
}
echo '<br>';


$queri = "SELECT concat(letra, id+$l) from prueba";
$res = $db->execute($queri);
$re = $db->fetch_row($res);

echo $re[0];

echo '<br>';
$o = 1;
$query2 = "SELECT concat(letra, id+$o) from prueba";
$r = $db->execute($query2);
$lol = $db->fetch_row($r);

echo $lol[0];
?>