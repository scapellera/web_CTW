<!doctype html>

<?php
session_start();
include('../assets/php/db.php');
include('../assets/php/selects.php');
include('../assets/php/functions.php');
if ($_SESSION["login_done"] == true){
?>


<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!--LIBRERIAS-->


    <!--LIBRERIA - GLOBAL-->
    <?php include('../assets/librerias/librerias_globales_buscador.html'); ?>
    <!--EDITOR DE TABLAS-->
    <?php
    if ($_SESSION["user_rol"] <= 1) {
        //<!--COLUMNAS QUE PUEDEN SER MODIFICADAS-->
        echo "<script type=\"text/javascript\" src=\"../assets/js/editor/edit_usuario.js\"></script>";
    }
    ?>
    <!--LIBRERIAS - BUSCADOR-->
    <?php include('../assets/librerias/librerias_buscador.html'); ?>


</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <!--MENU Y LOGO-->
            <?php
            include('../assets/html/logo/logo_pre_factura.html');
            include('../assets/html/menu/menu_pre_factura.html');
            ?>
            <!--CAMBIAR COLOR DE LA ENTRADA DE MENU ACTIVA-->
            <script>$(function () {
                    document.getElementById("menu_factura").className = "active";

                });</script>
            <style>
                @media (max-width: 600px) {
                    #menu_factura {
                        background-color: #ef9448;
                        margin-left: 12%;
                        border-top-left-radius: 50px;
                        border-top-right-radius: 50px;
                        border-bottom-right-radius: 50px;
                        border-bottom-left-radius: 50px;
                    }

                    #menu_factura1 {
                        margin-left: 15%;
                    }
                }
            </style>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--TITULO DE LA PÁGINA-->
                    <a class="navbar-brand">Buscador usuarios</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--USER & LOGOUT-->
                    <?php include('../assets/html/menu/user_logout_buscador.html'); ?>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <table id="buscador_facturas" class="table table-striped table-bordered">
                        <?php
                        $nif_cliente = $_POST['select_box_nif_empresa'];
                        $numero_factura = $_POST['numero_factura'];
                        $fecha_desde = $_POST['fecha_1'];
                        $fecha_hasta = $_POST['fecha_2'];
                        $data= buscador_de_facturas($nif_cliente, $numero_factura, $fecha_desde, $fecha_hasta);
                        $year=date("Y");
                        $year=substr( $year, -2 );
                        ?>

                        <thead>
                        <tr>
                            <th>Nº Factura</th>
                            <th>NIF_Cliente</th>
                            <th>Fecha de facturacion</th>
                            <th>FACTURA</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if ($data->num_rows > 0) {
                            // output data of each row
                            while ($row = $data->fetch_assoc()) {
                                $pk = $row['ID_factura'];

                                ?>
                                <tr>

                                    <td><label style="margin-top: 11px;"><a href="#" class="N_factura"
                                                                            data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['ID_factura'] ?> </a></label>
                                    </td>
                                    <td><label style="margin-top: 11px;"><a href="#" class="NIF_cliente"
                                                                            data-pk=<?php echo "\"$pk\""; ?>><?php
                                                $nombre_empresa=get_nombre_empresa($row['NIF_cliente']);

                                                echo $row['NIF_cliente']." - ".$nombre_empresa ?> </a></label>
                                    </td>
                                    <td><label style="margin-top: 11px;"><a href="#" class="fecha_facturacion"
                                                                            data-pk=<?php echo "\"$pk\""; ?>><?php
                                                $datetime = explode(" ", $row['fecha_factura']);
                                                $fecha_factura = $datetime[0];
                                                echo $fecha_factura;
                                                ?> </a></label>
                                    </td>
                                    <td><label style="margin-top: 11px;"><a download="" href="../factura_pdf/<?php echo $year."_".$row['ID_factura'].".pdf"?>" class="factura_pdf"
                                                                            data-pk=<?php echo "\"$pk\""; ?>>Descargar PDF</a></label>
                                    </td>

                                </tr>

                                <?php
                            }
                        } else {
                            echo "No se han encontrado facturas";
                        }
                        ?>


                        </tbody>
                    </table>


                </div>
            </div>
        </div>


    </div>
</div>


</body>


</html>

<?php
} else {
    echo "false";
    header("location:../index.php");
}

?>