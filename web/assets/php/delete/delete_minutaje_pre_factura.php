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
    $id_minutaje_facturado = $_GET['id'];

    $conn = connect();
    $data = get_minutaje_facturado($id_minutaje_facturado);
    if ($data->num_rows > 0) {
    // output data of each row
    while ($row = $data->fetch_assoc()) {
        //filtrado de nulls
        $sql_fecha = $row['fecha'];
        $sql_fecha = "\"$sql_fecha\"";

        $sql_hora_entrada = $row['hora_entrada'];
        $sql_hora_entrada = "\"$sql_hora_entrada\"";

        $sql_hora_salida = $row['hora_salida'];
        $sql_hora_salida = "\"$sql_hora_salida\"";

        $sql_id_servicio = $row['ID_SERVICIO'];
        $sql_id_servicio = "\"$sql_id_servicio\"";

        $sql_ID_usuario = $row['ID_USUARIO'];

        $sql_ID_sede = $row['ID_SEDE'];

        $sql_NIF_cliente = $row['NIF_cliente'];
        $sql_NIF_cliente = "\"$sql_NIF_cliente\"";


    }

    $deolver_minutaje_disponible = "INSERT INTO MINUTAJE (fecha, hora_entrada, hora_salida, ID_servicio, ID_usuario, ID_sede, NIF_cliente)
					VALUES ($sql_fecha,$sql_hora_entrada,$sql_hora_salida,$sql_id_servicio,$sql_ID_usuario, $sql_ID_sede ,$sql_NIF_cliente)";

    if ($conn->query($deolver_minutaje_disponible) === TRUE) {

        $eliminar_de_prefactura="DELETE FROM TRONCO_PRE_FACTURA_MINUTAJE WHERE id_minutaje_facturado = $id_minutaje_facturado ";
        $conn->query($eliminar_de_prefactura);

        $eliminar_minutaje_facturado="DELETE FROM ARTICULO_FACTURADO WHERE ID_MINUTAJE_FACTURADO = $id_minutaje_facturado ";
        $conn->query($eliminar_minutaje_facturado);


        ?>

        <div id="precargador">
            <p id="progressnum"></p>
            <div id="progressbar">
                <div id="indicador"></div>
            </div>
        </div>

        <script>

            var maxprogress = 300;
            var actualprogress = 0;
            var itv = 0;
            function prog() {
                if (actualprogress >= maxprogress) {
                    clearInterval(itv);
                    return;
                }
                var progressnum = document.getElementById("progressnum");
                var indicador = document.getElementById("indicador");
                actualprogress += 2;
                indicador.style.width = actualprogress + "px";
                progressnum.innerHTML = "Eliminando articulo...";
                if (actualprogress == 300) {
                    window.location = "../../../pre_factura/ver_prefactura_seleccion.php";
                }
            }
        </script>

        <?php
    } else {
        echo "Error: <br><br>" . $sql . "<br><br><br>" . $conn->error;
    }

    close($conn);

    ?>

</div>


</body>


</html>

<?php
}
} else {
    echo "false";
    header("location:../index.php");


}


?>