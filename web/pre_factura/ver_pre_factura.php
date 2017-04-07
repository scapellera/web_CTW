<!doctype html>

<?php
session_start();
include('../assets/php/db.php');
include('../assets/php/selects.php');
include('../assets/php/functions.php');
include('../assets/php/functions_array_prefacturas.php');
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
    <?php include('../assets/librerias/librerias_globales_pre_factura.html'); ?>

    <!--LIBRERIAS - BUSCADOR-->
    <?php include('../assets/librerias/librerias_pre_factura.html'); ?>
    <script type="text/javascript" src="../assets/js/functions.js"></script>
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
                    document.getElementById("menu_pre_factura").className = "active";
                });</script>
            <style>
                @media (max-width: 600px) {
                    #menu_pre_factura {
                        background-color: #ef9448;
                        margin-left: 12%;
                        border-top-left-radius: 50px;
                        border-top-right-radius: 50px;
                        border-bottom-right-radius: 50px;
                        border-bottom-left-radius: 50px;
                    }

                    #menu_pre_factura1 {
                        /*margin-left: 12%;*/
                    }
                }
            </style>
        </div>
    </div>

    <div class="main-panel">
        <!--DATOS DE LA PREFACTURA-->
        <?php
        $nif_empresa = $_POST['select_box_nif_empresa'];
        $pre_factura = $_POST['select_box_pre_factura_cliente'];
        $pre_facrura_array = explode('-', $pre_factura);
        $id_pre_factura = $pre_facrura_array[0];
        ?>
        <nav class="navbar navbar-default navbar-fixed">
            <form method="POST" id="send_servicios" action="../pre_factura/seleccion_pre_factura.php">
                <input type="hidden" id="id_string" name="id_string" value="">
                <input style="display:none" type="submit" value="submit" id="buttonId"/>
            </form>
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
                    <a class="navbar-brand">Ver pre-factura: <?php echo $pre_factura; ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--USER & LOGOUT-->
                    <?php include('../assets/html/menu/user_logout_pre_factura.html'); ?>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div>
                            <!--CABECERA PRE-FACTURA-->
                            <?php
                            $suma_precio_total = 0;
                            $cabecera_pre_factura = get_datos_cliente($nif_empresa);
                            // output data of each row
                            $row = $cabecera_pre_factura->fetch_assoc();

                            ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nº pre-factura</label>
                                        <input type="text" name="num_pre_factura"
                                               class="form-control" disabled
                                               value="<?php echo $pre_facrura_array[0] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre"
                                               class="form-control" disabled
                                               value="<?php echo $row['nombre_completo'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>NIF</label>
                                        <input type="text" name="NIF"
                                               class="form-control" disabled
                                               value="<?php echo $row['NIF_EMPRESA'] ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Dirección facturación</label>
                                        <input type="text" name="NIF"
                                               class="form-control" disabled
                                               value="<?php echo $row['calle_facturacion'] . " " . $row['numero_facturacion'] . ", " . $row['codigo_postal_facturacion'] . " " . $row['ciudad_facturacion'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="header">
                                        <h4 class="title"> Artículos </h4>
                                    </div>
                                    <div class="row">
                                        <table id="ver_pre_factura_articulos"
                                               class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Artículo</th>
                                                <th>Número de serie</th>
                                                <th>Precio</th>
                                                <th>Unidades</th>
                                                <th>Precio total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $data = get_ver_pre_factura_articulos($id_pre_factura);

                                            if ($data->num_rows > 0) {
                                                $i = 0;
                                                // output data of each row
                                                while ($row = $data->fetch_assoc()) {
                                                    $nombre_articulo = get_nombre_articulo($row['ID_articulo']);
                                                    $suma_precio_total = $suma_precio_total + $row['precio_total'];

                                                    ?>
                                                    <tr>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="nombre_articulo"><?php echo $nombre_articulo ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="numero_de_serie"><?php echo $row['numero_de_serie'] ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="precio"><?php echo $row['precio'] ?></a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="cantidad"><?php echo $row['cantidad'] ?></a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="suma_precio"><?php echo $row['precio_total'] ?></a></label>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            } else {
                                                echo "No hay nada pre-facturado";
                                            }
                                            ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="header">
                                        <h4 class="title"> Servicios </h4>
                                    </div>
                                    <div class="row">
                                        <table id="ver_pre_factura_servicios"
                                               class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Pack</th>
                                                <th>Precio</th>
                                                <th>Unidades</th>
                                                <th>Precio total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $data = get_ver_pre_factura_servicios($id_pre_factura);

                                            if ($data->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $data->fetch_assoc()) {
                                                    $nombre_pack = get_nombre_servicio($row['ID_servicio']);
                                                    $suma_precio_total = $suma_precio_total + $row['precio_total'];

                                                    ?>
                                                    <tr>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="nombre_articulo"><?php echo $nombre_pack ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="numero_de_serie"><?php echo $row['precio'] ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="cantidad"><?php echo $row['cantidad'] ?></a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="suma_precio"><?php echo $row['precio_total'] ?></a></label>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            } else {
                                                echo "No hay nada pre-facturado";
                                            }
                                            ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="header">
                                        <h4 class="title"> Minutaje </h4>
                                    </div>
                                    <div class="row">
                                        <table id="ver_pre_factura_minutajes"
                                               class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Servicio</th>
                                                <th>Precio/h del servicio</th>
                                                <th>Fecha</th>
                                                <th>Horas</th>
                                                <th>Precio total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $data = get_ver_pre_factura_minutajes($id_pre_factura);

                                            if ($data->num_rows > 0) {
                                                $i = 0;
                                                // output data of each row
                                                while ($row = $data->fetch_assoc()) {
                                                    $nombre_servicio = get_nombre_servicio($row['ID_servicio']);
                                                    $suma_precio_total = $suma_precio_total + $row['precio_total'];

                                                    ?>
                                                    <tr>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="nombre_servicio"><?php echo $nombre_servicio ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="precio_h_servicio"><?php echo $row['precio_servicio'] ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="fecha"><?php echo $row['fecha'] ?></a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="horas"><?php echo $row['horas'] ?></a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="precio_total"><?php echo $row['precio_total'] ?></a></label>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            } else {
                                                echo "No hay nada pre-facturado";
                                            }
                                            ?>


                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="nombre"
                                                       class="form-control" disabled
                                                       value="<?php echo $suma_precio_total?>">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
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