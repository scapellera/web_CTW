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
<body <!--onload="itv = setInterval(prog, 10)"-->>


<div>

    <?php
    #Declaramos las variables del formulario
    $id_pre_factura = $_POST['id_pre_factura'];
    $descripcion_factura = $_POST['descripcion_factura'];
    $NIF_empresa = $_POST['NIF_empresa'];

    $conn = connect();
    /*PER_FACTURA --> FACTURA*/
    $sql = "INSERT INTO FACTURA ( NIF_empresa, descripcion_factura)
        VALUES(\"".$NIF_empresa."\", \"".$descripcion_factura."\")";
        $conn->query($sql);

    /*CABECERA_PER_FACTURA --> CABECERA_FACTURA*/
    $sql = "INSERT INTO CABECERA_FACTURA (ID_FACTURA, NIF_empresa, descripcion_factura)
        SELECT ID_PRE_FACTURA, Nif_empresa, nombre
        FROM   PRE_FACTURA
        WHERE  ID_PRE_FACTURA =".$id_pre_factura;
    $conn->query($sql);


    $array_length = count($_SESSION['id_articulos']);
    for ($i = 0; $i < $array_length; $i++) {
        echo $_SESSION['id_articulos'][$i] . ",";
        /*PASAMOS LAS FILAS DE ARTICULOS PRE FACTURADOS A ARTICULOS FACTURADOS*/
        /*$sql = "INSERT INTO courses (name, location, gid)
        SELECT name, location, 1
        FROM   courses
        WHERE  cid = 2";
        $conn->query($sql);*/
    }
    $array_length = count($_SESSION['id_servicios']);
    for ($i = 0; $i < $array_length; $i++) {
        echo $_SESSION['id_servicios'][$i] . "-";
    }
    $array_length = count($_SESSION['id_minutaje']);
    for ($i = 0; $i < $array_length; $i++) {
        echo $_SESSION['id_minutaje'][$i] . "*";
    }


    /*
        //Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
        $conn = connect();

        $sql = "INSERT INTO PRE_FACTURA (NIF_empresa, nombre)
                        VALUES ('$nif_empresa', '$nombre_pre_factura')";


        if ($conn->query($sql) == TRUE) {

            $id_pre_factura = id_crear_cabecera_pre_factura($nombre_pre_factura, $nif_empresa);
            $ciudad_facturacion=ciudad_facturacion_crear_cabecera_pre_factura($nif_empresa);
            $codigo_postal_facturacion=codigo_postal_facturacion_crear_cabecera_pre_factura($nif_empresa);
            $calle_facturacion=calle_facturacion_crear_cabecera_pre_factura($nif_empresa);
            $numero_facturacion=numero_facturacion_crear_cabecera_pre_factura($nif_empresa);
            $nombre_pre_factura="$id_pre_factura - "."$nombre_pre_factura";

            $sql2 = "INSERT INTO CABECERA_PRE_FACTURA (ID_pre_factura, nombre, ciudad_facturacion, codigo_postal_facturacion, calle_facturacion, numero_facturacion)
                        VALUES ('$id_pre_factura', '$nombre_pre_factura', '$ciudad_facturacion', '$codigo_postal_facturacion', '$calle_facturacion', '$numero_facturacion')";
            if ($conn->query($sql2) == TRUE) {

                ?>

                <form method="POST" id="send_articulos" action="../../../pre_factura/pre_factura_<?php echo $ruta?>">
                    <input type="hidden" id="select_box_nif_empresa" name="select_box_nif_empresa" value="<?php echo $nif_empresa?>">
                    <input type="hidden" id="id_string" name="id_string" value="<?php echo $id_string?>">
                    <input type="hidden" id="id_string" name="select_box_pre_factura_cliente" value="<?php echo $nombre_pre_factura?>">
                    <input style="display:none" type="submit" value="submit" id="buttonId"/>
                </form>

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

                            document.getElementById("send_articulos").submit();

                        }
                    }
                </script>

                <?php
            }
        } else {
            echo "Error: <br><br>" . $sql . "<br><br><br>" . $conn->error;
        }
*/
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