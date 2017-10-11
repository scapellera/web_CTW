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
    $id_servicio_facturado = $_GET['id'];

    $conn = connect();



    $eliminar_servicio_prefactura = "DELETE FROM TRONCO_PRE_FACTURA_SERVICIO WHERE id_servicio_facturado = $id_servicio_facturado ";

    if ($conn->query($eliminar_servicio_prefactura) === TRUE) {

        $eliminar_servicio_facturado="DELETE FROM SERVICIO_FACTURADO WHERE ID_SERVICIO_FACTURADO = $id_servicio_facturado ";
        $conn->query($eliminar_servicio_facturado);
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

} else {
    echo "false";
    header("location:../index.php");


}


?>