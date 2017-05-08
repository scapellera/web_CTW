<?php
include('../db.php');
$para = $_POST['para'];


$margen = $_POST['margen'];
$precio_con_margen = $_POST['precio_con_margen'];
$id_tronco_pre_factura = $_POST['id_tronco_pre_factura'];

if ($para == "articulo") {
    $conn = connect();
    $sql = "UPDATE TRONCO_PRE_FACTURA_ARTICULO
      SET margen= $margen , precio_total = $precio_con_margen
      WHERE ID_TRONCO_PRE_FACTURA_ARTICULO = $id_tronco_pre_factura";
    $conn->query($sql);
    close($conn);

}
if($para=="servicio"){
    $conn = connect();
    $sql = "UPDATE TRONCO_PRE_FACTURA_SERVICIO
      SET margen= $margen , precio_total = $precio_con_margen
      WHERE ID_TRONCO_PRE_FACTURA_SERVICIO = $id_tronco_pre_factura";
    $conn->query($sql);
    close($conn);
}if($para=="minutaje"){
    $conn = connect();
    $sql = "UPDATE TRONCO_PRE_FACTURA_MINUTAJE
      SET margen= $margen , precio_total = $precio_con_margen
      WHERE ID_TRONCO_PRE_FACTURA_MINUTAJE = $id_tronco_pre_factura";
    $conn->query($sql);
    close($conn);
}

?>