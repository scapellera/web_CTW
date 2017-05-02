
<?php
include('../db.php');

$margen= $_POST['margen'];
$precio_con_margen= $_POST['precio_con_margen'];
$id_tronco_pre_factura_articulo= $_POST['id_tronco_pre_factura_articulo'];

        $conn = connect();
        $sql = "UPDATE SEDE
      SET " . $_POST['name'] . " = '" . $_POST['value'] . "'
      WHERE ID_SEDE = '" . $_POST['pk'] . "'";
        $result = $conn->query($sql);
        close($conn);


?>