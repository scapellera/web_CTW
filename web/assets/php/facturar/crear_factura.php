<!doctype html>

<?php
session_start();
include('../../php/db.php');
include('../../php/selects.php');
if ($_SESSION["login_done"] == true){
?>
<html lang="en">
<head>

    <!--INSERTS-->
    <link href="../../css/insert.css" rel="stylesheet"/>
    <!--CARGAR BARRA INSERT-->
    <link href="../../css/cargarinsert.css" rel="stylesheet"/>

</head>
<body onload="itv = setInterval(prog, 10)">

<div>

    <?php
    //variables
    $id_pre_factura = $_POST['id_pre_factura'];
    $nif_cliente=get_cliente_pre_factura($id_pre_factura);

    $ciudad_facturacion=get_ciudad_facturacion($nif_cliente);
    $ciudad_facturacion="\"$ciudad_facturacion\"";
    $codigo_postal_facturacion=get_codigo_postal_facturacion($nif_cliente);
    $codigo_postal_facturacion="\"$codigo_postal_facturacion\"";
    $calle_facturacion=get_calle_facturacion($nif_cliente);
    $calle_facturacion="\"$calle_facturacion\"";
    $numero_facturacion=get_numero_facturacion($nif_cliente);
    $nif_cliente="\"$nif_cliente\"";



    //creamos factura
    $crear_factura = "INSERT INTO FACTURA ()
                        VALUES ()";
    $conn = connect();
        if ($conn->query($crear_factura) == TRUE) {

    $ID_FACTURA = get_last_id_factura();
    echo $ID_FACTURA;

    $crear_cabecera_factura = "INSERT INTO CABECERA_FACTURA(ID_factura, NIF_cliente,ciudad_facturacion, codigo_postal_facturacion, calle_facturacion, numero_facturacion)
                        VALUES ($ID_FACTURA,$nif_cliente,$ciudad_facturacion, $codigo_postal_facturacion, $calle_facturacion, $numero_facturacion)";

    if ($conn->query($crear_cabecera_factura) == TRUE) {

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
                progressnum.innerHTML = "Creando factura...";

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
}else {
    echo "false";
    header("location:../index.php");
}

?>