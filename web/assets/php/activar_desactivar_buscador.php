<?php


include('db.php');


$para= $_POST['para'];
$accion= $_POST['accion'];
$pk= $_POST['pk'];

$function = $para."_".$accion;
// ACTIVAR DESACTIVAR CLIENTES
if($function == "cliente_activar"){
    cliente_activar($pk);

}else if($function == "cliente_desactivar"){
    cliente_desactivar($pk);
}


///////////////
//FUNCIONES
//////////////


function cliente_activar($pk){
    $conn = connect();
    $sql = "UPDATE CLIENTE
    SET activo = 1
    WHERE NIF_EMPRESA = '".$pk."'";
    $result = $conn->query($sql);
    close($conn);
}
function cliente_desactivar($pk){
    $conn = connect();
    $sql = "UPDATE CLIENTE
    SET activo = 0
    WHERE NIF_EMPRESA = '".$pk."'";
    $result = $conn->query($sql);
    close($conn);
}