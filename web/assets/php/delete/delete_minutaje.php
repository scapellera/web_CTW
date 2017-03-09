<!doctype html>

<?php
session_start();
include('../db.php');
include('../selects.php');
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
    $id_minutaje = $_GET['id'];
    $conn = connect();
    $sql = "DELETE FROM MINUTAJE WHERE ID_MINUTAJE = '" . $id_minutaje . "'";


    if ($conn->query($sql) === TRUE) {
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
                progressnum.innerHTML = "Eliminando minutaje...";
                if (actualprogress == 300) {
                    window.location = "../../../buscador/buscador_minutaje.php";
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