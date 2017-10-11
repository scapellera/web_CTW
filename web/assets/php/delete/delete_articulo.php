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
    $id_articulo = $_GET['id'];
    $codigo_de_barras= codigo_de_barras_articulo($id_articulo);
    $cantidad= cantidad_articulo($id_articulo);
   
    $conn = connect();

    $sql = "DELETE FROM ARTICULO WHERE ID_ARTICULO = '" . $id_articulo . "'";

    if ($conn->query($sql) === TRUE) {


        $data = select_cantidad_stock($codigo_de_barras);

        $cantidad_total = $data - $cantidad;

        if ($cantidad_total <= 0) {
            $sql2 = "DELETE FROM STOCK WHERE CODIGO_DE_BARRAS = '$codigo_de_barras'";
        } else {
            $sql2 = "UPDATE STOCK SET cantidad_total = $cantidad_total  WHERE  CODIGO_DE_BARRAS = '$codigo_de_barras'";
        }

        if ($conn->query($sql2) === TRUE) {
            echo "Stock modificado";
        } else {
            echo "Error en Stock: <br><br>" . $sql . "<br><br><br>" . $conn->error;

        }

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
} else {
    echo "false";
    header("location:../index.php");
}

?>