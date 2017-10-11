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
    //DEFINIR VARIABLES
    $contador = 0;
    $cliente = $_POST['cliente'];
    $nombre_pre_factura = $_POST['nombre_pre_factura'];
    $nombre_pre_factura_array = explode('-', $nombre_pre_factura);
    $id_pre_factura=$nombre_pre_factura_array[0];
    $id_string = $_POST['submit'];
    $id_array = explode(',', $id_string);
    $cantidad_seleccionada = array("cantidad");

    // Buscar cantidad que se desea facturar de articulos seleccionados
    for ($i = 1; $i <= count($id_array) - 1; $i++) {
        $num = "cantidad_" . $i;
        array_push($cantidad_seleccionada, $_POST["$num"]);
    }

    //Passar el servicio a servicio facturado
    for ($i = 1; $i <= count($id_array) - 1; $i++) {
        $data = get_servicio_pre_factura($id_array[$i]);
        if ($data->num_rows > 0) {
            // output data of each row
            $row = $data->fetch_assoc();
            $sql_nombre = $row['nombre'];
            $sql_nombre = "\"$sql_nombre\"";
            $sql_descripcion = $row['descripcion'];
            $sql_descripcion = "\"$sql_descripcion\"";

            //Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
            $conn = connect();

            $sql = "INSERT INTO SERVICIO_FACTURADO (ID_servicio, nombre, descripcion, precio, cantidad, NIF_cliente)
					VALUES (" . $row['ID_SERVICIO'] . ",$sql_nombre,$sql_descripcion," . $row['precio'] . ",$cantidad_seleccionada[$i],'$cliente')";

            if ($conn->query($sql) === TRUE) {
            } else {
                $contador++;
                echo "Error: <br><br>" . $sql . "<br><br><br>" . $conn->error;
            }


            //AÑADIMOS EL SERVICIO EN LA TABLA TRONCO_PRE_FACTURA_SERVICIO
            $precio_total=$row['precio']*$cantidad_seleccionada[$i];
            $last_id_articulo_facturado=last_id_servicio_facturado();
            $insert_tronco_pre_factura_servicio = "INSERT INTO TRONCO_PRE_FACTURA_SERVICIO(ID_pre_factura, ID_servicio, precio, cantidad, precio_total, id_servicio_facturado)
			VALUES (" . $id_pre_factura . "," . $row['ID_SERVICIO'] . ",".$row['precio'].",$cantidad_seleccionada[$i], $precio_total, $last_id_articulo_facturado)";

            if($conn->query($insert_tronco_pre_factura_servicio) === TRUE){

            }else {
                $contador++;
                echo "Error: <br><br>" . $insert_tronco_pre_factura_servicio . "<br><br><br>" . $conn->error;
            }


        } else {
            echo "0 results";
        }
    }


    if ($contador == 0) {
        ?>

        <div id="precargador">
            <p id="progressnum"></p>
            <div id="progressbar">
                <div id="indicador"></div>
            </div>
        </div>

        <script>
            //document.body.style.background = "#ea7f33";
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
                progressnum.innerHTML = "Pre_facturando ...";
                if (actualprogress == 300) {
                    window.location = "../../../buscador/buscador_servicios.php";
                }
            }
        </script>

        <?php
    } else {

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
