<!doctype html>

<?php
session_start();
include('../../php/db.php');
include('../../php/selects.php');
if ($_SESSION["login_done"] == true){
?>


<html lang="en">
<head>
    <meta charset="UTF-8">

    <!--INSERTS-->
    <link href="../../css/insert.css" rel="stylesheet"/>
    <!--CARGAR BARRA INSERT-->
    <link href="../../css/cargarinsert.css" rel="stylesheet"/>

</head>
<body onload="itv = setInterval(prog, 10)">
<div>

    <?php
    #Declaramos las variables del formulario
    $NIF_cliente = $_POST['cliente_minutaje'];
    $sede = $_POST['sede_minutaje'];
    $servicio = $_POST['select_box_servicio'];
    $usuario = $_SESSION["id_usuario"];
    $fecha = $_POST['fecha_minutaje'];
    $hora_entrada = $_POST['hora_entrada_minutaje'];
    $hora_salida = $_POST['hora_salida_minutaje'];


    $conn = connect();
    $data = select_id_sede($sede);

    //Conectamos con la base de datos, hacemos los inserts y cerramos conexion.


    $sql = "INSERT INTO MINUTAJE (fecha, hora_entrada, hora_salida, ID_servicio, ID_usuario, ID_sede, NIF_cliente)
					VALUES ('$fecha','$hora_entrada', '$hora_salida','$servicio','$usuario','$data','$NIF_cliente')";


    if ($conn->query($sql) === TRUE) {
        header('Location: ../../../minutaje_automatico.php?ok=altaMinutajeAutomatico');
    } else {
        header('Location: ../../../minutaje_automatico.php?ok=altaMinutajeAutomatico');
    }

    close($conn);

    ?>

</div>

</body>
</html>

<?php
} else {
    echo "false";
    header("location:../index.php");
}

?>