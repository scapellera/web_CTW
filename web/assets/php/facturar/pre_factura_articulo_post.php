<?php
//DEFINIR VARIABLES
$id_string = $_POST['submit'];
$id_array = explode(',', $id_string);
$cantidad = array("cantidad");

for ($i = 1; $i <= count($id_array) - 1; $i++) {
    $num = "cantidad_".$i;
    array_push($cantidad, $_POST["$num"]);
}

?>

