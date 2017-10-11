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
                progressnum.innerHTML = "Añadiendo minutaje...";
                if (actualprogress == 300) {
                    window.location = "../../../minutaje_automatico.php";
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