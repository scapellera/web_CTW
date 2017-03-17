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
    //DEFINIR VARIABLES
    $contador=0;
    $cliente = $_POST['cliente'];
    $id_string = $_POST['submit'];
    $id_array = explode(',', $id_string);
    $cantidad_seleccionada = array("cantidad");
    $cantidad_total = array("cantidad");
    // Buscar cantidad que se desea facturar de articulos seleccionados
    for ($i = 1; $i <= count($id_array) - 1; $i++) {
        $num = "cantidad_" . $i;
        array_push($cantidad_seleccionada, $_POST["$num"]);
    }
    // Buscar cantidad total de articulos seleccionados
    for ($i = 1; $i <= count($id_array) - 1; $i++) {
        $id = $id_array[$i];

        $cantidad_total_valor = cantidad_articulo($id);
        array_push($cantidad_total, $cantidad_total_valor);
    }

    //Passar el articulo a articulo_articulo facturado
    for ($i = 1; $i <= count($id_array) - 1; $i++) {
        $data = get_articulo_pre_factura($id_array[$i]);
        if ($data->num_rows > 0) {
            // output data of each row
            $row = $data->fetch_assoc();
            //Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
            $conn = connect();
            $sql = "INSERT INTO ARTICULO_FACTURADO (ID_ARTICULO, nombre, descripcion, NIF_mayorista, codigo_de_barras, codigo_producto_mayorista, 	numero_de_serie, precio, cantidad, 	numero_factura, ubicacion, fecha_de_alta, cliente_facturado)
					VALUES (".$row['ID_ARTICULO'].",'". $row['nombre']."','". $row['descripcion']."','".$row['NIF_mayorista']."','". $row['codigo_de_barras']."','".$row['codigo_producto_mayorista']."','". $row['numero_de_serie']."',". $row['precio'].",". $row['cantidad'].",'". $row['numero_factura']."','". $row['ubicacion']."','". $row['fecha_de_alta']."','$cliente')";

            if ($conn->query($sql) === TRUE) {

            }else{
                $contador++;
            }


           /* $sql="INSERT INTO tabla1 SELECT *FROM tabla2 WHERE condicion";*/
        } else {
            echo "0 results";
        }
    }





    if ($contador==0) {
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
                progressnum.innerHTML = "Añadiendo cliente...";
                if (actualprogress == 300) {
                    window.location = "../../../insert/insert_clientes.php";
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
