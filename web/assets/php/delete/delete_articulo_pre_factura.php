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
    $id_articulo_facturado = $_GET['id'];

    $conn = connect();
    $data = get_articulo_facturado($id_articulo_facturado);
    if ($data->num_rows > 0) {
    // output data of each row
    while ($row = $data->fetch_assoc()) {
        //filtrado de nulls
        $sql_nombre = $row['nombre'];
        $sql_nombre = "\"$sql_nombre\"";

        $sql_descripcion = $row['descripcion'];
        $sql_descripcion = "\"$sql_descripcion\"";

        $codigo_de_barras = $row['codigo_de_barras'];
        $sql_codigo_de_barras = $row['codigo_de_barras'];
        $sql_codigo_de_barras = "\"$sql_codigo_de_barras\"";

        $sql_NIF_mayorista = $row['NIF_mayorista'];
        $sql_NIF_mayorista = "\"$sql_NIF_mayorista\"";

        $sql_codigo_producto_mayorista = $row['codigo_producto_mayorista'];
        $sql_codigo_producto_mayorista = "\"$sql_codigo_producto_mayorista\"";

        $sql_numero_de_serie = $row['numero_de_serie'];
        $sql_numero_de_serie = "\"$sql_numero_de_serie\"";

        $sql_ubicacion = $row['ubicacion'];
        $sql_ubicacion = "\"$sql_ubicacion\"";

        $sql_precio = $row['precio'];
        $sql_precio = "\"$sql_precio\"";

        $sql_cantidad = $row['cantidad'];
        $sql_cantidad = "\"$sql_cantidad\"";

        $sql_numero_factura = $row['numero_factura'];
        $sql_numero_factura = "\"$sql_numero_factura\"";

        $sql_fecha_de_alta = $row['fecha_de_alta'];
        $sql_fecha_de_alta = "\"$sql_fecha_de_alta\"";

        $sql_NIF_cliente_articulo = 'null';


        if ($sql_codigo_producto_mayorista == "\"\"") {
            $sql_codigo_producto_mayorista = 'null';
        }
        if ($sql_descripcion == "\"\"") {
            $sql_descripcion = 'null';
        }
        if ($sql_NIF_mayorista == "\"\"") {
            $sql_NIF_mayorista = 'null';
        }
        if ($sql_numero_de_serie == "\"\"") {
            $sql_numero_de_serie = 'null';
        }
        if ($sql_ubicacion == "\"\"") {
            $sql_ubicacion = 'null';
        }

    }

    $sql = "INSERT INTO ARTICULO (nombre, descripcion, codigo_de_barras, NIF_mayorista,  codigo_producto_mayorista, 	numero_de_serie, precio, cantidad, 	numero_factura, ubicacion, fecha_de_alta, NIF_cliente_articulo)
					VALUES ($sql_nombre,$sql_descripcion,$sql_codigo_de_barras,$sql_NIF_mayorista,$sql_codigo_producto_mayorista, $sql_numero_de_serie ,$sql_precio,$sql_cantidad,$sql_numero_factura,$sql_ubicacion, $sql_fecha_de_alta,$sql_NIF_cliente_articulo)";

    if ($conn->query($sql) === TRUE) {
        $data = get_row_stock($codigo_de_barras);

        $sql = "INSERT INTO ARTICULO (nombre, descripcion, codigo_de_barras, NIF_mayorista,  codigo_producto_mayorista, 	numero_de_serie, precio, cantidad, 	numero_factura, ubicacion, fecha_de_alta, NIF_cliente_articulo)
					VALUES ($sql_nombre,$sql_descripcion,$sql_codigo_de_barras,$sql_NIF_mayorista,$sql_codigo_producto_mayorista, $sql_numero_de_serie ,$sql_precio,$sql_cantidad,$sql_numero_factura,$sql_ubicacion, $sql_fecha_de_alta,$sql_NIF_cliente_articulo)";

        echo "$data"

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
                if (actualprogress == 500) {
                    window.location = "../../../buscador/buscador_articulos.php";
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