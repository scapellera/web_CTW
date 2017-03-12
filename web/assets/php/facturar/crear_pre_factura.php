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
    #Declaramos las variables del formulario

    $nif_empresa = $_POST['select_box_nif_empresa'];
    $nombre_pre_factura = $_POST['nombre_pre_factura'];
    $id_string = $_POST['submit'];


    //Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
    $conn = connect();

    $sql = "INSERT INTO PRE_FACTURA (NIF_empresa, nombre)
					VALUES ('$nif_empresa', '$nombre_pre_factura')";


    if ($conn->query($sql) == TRUE) {

        $id_pre_factura = id_crear_cabecera_pre_factura($nombre_pre_factura);

        $sql2 = "INSERT INTO CABECERA_PRE_FACTURA (ID_pre_factura, nombre)
					VALUES ('$id_pre_factura', '$nombre_pre_factura')";
        if ($conn->query($sql2) == TRUE) {
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
                    progressnum.innerHTML = "Creando pre-factura...";
                    if (actualprogress == 300) {
                        document.getElementById('id_string').action = "../../../pre_factura/pre_factura_articulo.php";
                        document.getElementById("send_articulos").submit();
                        /*window.location = "../../../pre_factura/seleccion_pre_factura.php";*/
                    }
                }
            </script>

            <?php
        }
    } else {
        echo "Error: <br><br>" . $sql . "<br><br><br>" . $conn->error;
    }

    close($conn);

    ?>

</div>
<form method="POST" id="send_articulos" action="">
    <input type="hidden" id="id_string" name="id_string" value="<?php echo $id_string?>">
    <input style="display:none" type="submit" value="submit" id="buttonId"/>
</form>
</body>
</html>

<?php
} else {
    echo "false";
    header("location:../index.php");
}

?>