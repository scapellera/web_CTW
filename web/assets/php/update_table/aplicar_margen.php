<?php
include('../db.php');

$margen = $_POST['margen'];
$precio_con_margen = $_POST['precio_con_margen'];
$id_tronco_pre_factura_articulo = $_POST['id_tronco_pre_factura_articulo'];

$conn = connect();
$sql = "UPDATE TRONCO_PRE_FACTURA_ARTICULO
      SET margen= $margen , precio_total = $precio_con_margen
      WHERE ID_TRONCO_PRE_FACTURA_ARTICULO = $id_tronco_pre_factura_articulo";
$conn->query($sql);
close($conn);


?>