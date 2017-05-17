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
    <script type="text/javascript" src="../assets/js/aplicar_margenes.js"></script>
    <link href="../assets/css/insert.css" rel="stylesheet"/>
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

                .factura_pre_factura {
                    cursor: pointer;
                    width: 100%;
                    border: none;
                    background: #ea8f43;
                    color: #FFF;
                    margin: 0 0 5px;
                    padding: 10px;
                    font-size: 15px;
                }

                .factura_pre_factura:hover {
                    background: #d5672b;
                    -webkit-transition: background 0.3s ease-in-out;
                    -moz-transition: background 0.3s ease-in-out;
                    transition: background-color 0.3s ease-in-out;
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
                <form id="crear_factura" action="../assets/php/facturar/crear_factura.php" method="post">
                    <input type="hidden" name="id_pre_factura" value="<?php echo $pre_facrura_array[0] ?>">
                    <input type="hidden" name="NIF_empresa" value="<?php echo $nif_empresa ?>">

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
                                                    <th style=" width: 150px ;">Margen</th>
                                                    <th style=" width: 50px ;">Precio total</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                $id_articulos = array();
                                                $data = get_ver_pre_factura_articulos($id_pre_factura);
                                                $_SESSION['id_articulos'] = $id_articulos;

                                                if ($data->num_rows > 0) {
                                                    $val = 0;
                                                    // output data of each row
                                                    while ($row = $data->fetch_assoc()) {
                                                        array_push($id_articulos,$row['ID_TRONCO_PRE_FACTURA_ARTICULO'] );
                                                        $_SESSION['id_articulos'] = $id_articulos;
                                                        $val++;
                                                        $nombre_articulo = get_nombre_articulo($row['ID_articulo']);
                                                        $suma_precio_total = $suma_precio_total + $row['precio_total'];

                                                        ?>
                                                        <tr content="<?php echo $row['ID_TRONCO_PRE_FACTURA_ARTICULO'] ?>"
                                                            id="<?php echo $val ?>">
                                                            <td><label style="margin-top: 11px;"><a href="#"
                                                                                                    class="nombre_articulo"><?php echo $nombre_articulo ?> </a></label>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a href="#"
                                                                                                    class="numero_de_serie"><?php echo $row['numero_de_serie'] ?> </a></label>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a href="#"
                                                                                                    name="<?php echo $row['precio'] ?>"
                                                                                                    class="precio articulo_precio_val_<?php echo $val ?>"><?php echo $row['precio'] ?></a></label>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a href="#"
                                                                                                    name="<?php echo $row['cantidad'] ?>"
                                                                                                    class="cantidad precio articulo_cantidad_val_<?php echo $val ?>"><?php echo $row['cantidad'] ?></a></label>
                                                            </td>
                                                            <?php
                                                            $margenes = get_margenes();
                                                            $margen_name = 1;
                                                            ?>
                                                            <td>
                                                                <select name="select_box_margenes"
                                                                        class="form-control articulo_select_margen"
                                                                        value="test"
                                                                >
                                                                    <option value="" disabled selected>Margen
                                                                        actual = <?php echo $row['margen'] ?>
                                                                    </option>
                                                                    <?php
                                                                    if ($margenes->num_rows > 0) {

                                                                        // output data of each row
                                                                        while ($row_margenes = $margenes->fetch_assoc()) {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $row_margenes['m_margen'] ?>"><?php echo $row_margenes['m_margen']; ?></option>
                                                                            <?php

                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>

                                                            <td><label style="margin-top: 11px;">
                                                                    <a href="#"
                                                                       name="<?php echo $row['precio_total'] ?>"
                                                                       class="articulo_precio_total_<?php echo $val ?> suma_precio ">
                                                                        <?php echo $row['precio_total'] ?>
                                                                    </a>
                                                                </label>
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
                                                    <th>Descripción</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th style=" width: 150px ;">Margen</th>
                                                    <th style=" width: 50px ;">Precio total</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                $data = get_ver_pre_factura_servicios($id_pre_factura);
                                                $id_servicios = array();
                                                $_SESSION['id_servicios'] = $id_servicios;

                                                if ($data->num_rows > 0) {


                                                    $val = 0;
                                                    // output data of each row
                                                    while ($row = $data->fetch_assoc()) {
                                                        array_push($id_servicios,$row['ID_TRONCO_PRE_FACTURA_SERVICIO'] );
                                                        $_SESSION['id_servicios'] = $id_servicios;
                                                        $val++;
                                                        $nombre_pack = get_nombre_servicio($row['ID_servicio']);
                                                        $descripcion_servicio = get_descripcion_servicio($row['ID_servicio']);
                                                        $suma_precio_total = $suma_precio_total + $row['precio_total'];

                                                        ?>
                                                        <tr content="<?php echo $row['ID_TRONCO_PRE_FACTURA_SERVICIO'] ?>"
                                                            id="<?php echo $val ?>">
                                                            <td><label style="margin-top: 11px;"><a
                                                                        href="#"><?php echo $nombre_pack ?> </a></label>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a
                                                                        href="#"><?php echo $descripcion_servicio ?> </a></label>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a
                                                                        href="#" name="<?php echo $row['precio'] ?>"
                                                                        class="servicio_precio_val_<?php echo $val ?>"><?php echo $row['precio'] ?> </a></label>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a
                                                                        href="#" name="<?php echo $row['cantidad'] ?>"
                                                                        class="servicio_cantidad_val_<?php echo $val ?>"><?php echo $row['cantidad'] ?></a></label>
                                                            </td>
                                                            <?php
                                                            $margenes = get_margenes();
                                                            $margen_name = 1;
                                                            ?>
                                                            <td>
                                                                <select name="select_box_margenes"
                                                                        class="form-control servicio_select_margen"
                                                                        value="test"
                                                                >
                                                                    <option value="" disabled selected>Margen
                                                                        actual = <?php echo $row['margen'] ?>
                                                                    </option>
                                                                    <?php
                                                                    if ($margenes->num_rows > 0) {

                                                                        // output data of each row
                                                                        while ($row_margenes = $margenes->fetch_assoc()) {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $row_margenes['m_margen'] ?>"><?php echo $row_margenes['m_margen']; ?></option>
                                                                            <?php

                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a
                                                                        href="#"
                                                                        name="<?php echo $row['precio_total'] ?>"
                                                                        class="servicio_precio_total_<?php echo $val ?>"><?php echo $row['precio_total'] ?></a></label>
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
                                                    <th style=" width: 150px ;">Margen</th>
                                                    <th style=" width: 50px ;">Precio total</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                $data = get_ver_pre_factura_minutajes($id_pre_factura);
                                                $id_minutaje = array();
                                                $_SESSION['id_minutaje'] = $id_minutaje;
                                                if ($data->num_rows > 0) {


                                                    $val = 0;
                                                    $i = 0;
                                                    // output data of each row
                                                    while ($row = $data->fetch_assoc()) {
                                                        array_push($id_minutaje,$row['ID_TRONCO_PRE_FACTURA_MINUTAJE'] );
                                                        $_SESSION['id_minutaje'] = $id_minutaje;
                                                        $val++;
                                                        $nombre_servicio = get_nombre_servicio($row['ID_servicio']);
                                                        $suma_precio_total = $suma_precio_total + $row['precio_total'];

                                                        ?>
                                                        <tr content="<?php echo $row['ID_TRONCO_PRE_FACTURA_MINUTAJE'] ?>"
                                                            id="<?php echo $val ?>">
                                                            <td><label style="margin-top: 11px;"><a href="#"
                                                                                                    class="nombre_servicio"><?php echo $nombre_servicio ?> </a></label>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a href="#" name="<?php echo $row['precio_servicio'] ?>"
                                                                                                    
                                                                                                    class="precio_h_servicio minutaje_precio_val_<?php echo $val ?>"><?php echo $row['precio_servicio'] ?> </a></label>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a href="#"
                                                                                                    class="fecha"><?php echo $row['fecha'] ?></a></label>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a href="#" name="<?php echo $row['horas'] ?>"
                                                                                                    class="horas minutaje_horas_val_<?php echo $val ?>"><?php echo $row['horas'] ?></a></label>
                                                            </td>
                                                            <?php
                                                            $margenes = get_margenes();
                                                            $margen_name = 1;
                                                            ?>
                                                            <td>
                                                                <select name="select_box_margenes"
                                                                        class="form-control minutaje_select_margen"
                                                                        value="test"
                                                                >
                                                                    <option value="" disabled selected>Margen
                                                                        actual = <?php echo $row['margen'] ?>
                                                                    </option>
                                                                    <?php
                                                                    if ($margenes->num_rows > 0) {

                                                                        // output data of each row
                                                                        while ($row_margenes = $margenes->fetch_assoc()) {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $row_margenes['m_margen'] ?>"><?php echo $row_margenes['m_margen']; ?></option>
                                                                            <?php

                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td><label style="margin-top: 11px;"><a href="#"
                                                                                                    name="<?php echo $row['precio_total'] ?>"
                                                                                                    class="precio_total minutaje_precio_total_<?php echo $val ?>"
                                                                    ><?php echo $row['precio_total'] ?></a></label>
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
                                            <div class="col-md-3 col-md-offset-9">
                                                <div class="form-group">
                                                    <label>Precio sin IVA</label>
                                                    <input name="precio_sin_iva"
                                                           class="form-control precio_sin_iva" disabled
                                                           value="<?php echo $suma_precio_total ?>">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-md-3 col-md-offset-6">
                                                <div class="form-group">
                                                    <label>IVA</label>
                                                    <?php $data = select_all_iva(); ?>
                                                    <select name="select_box_iva" class="form-control select_iva"
                                                            required>
                                                        
                                                        <?php
                                                        if ($data->num_rows > 0) {
                                                            // output data of each row
                                                            while ($row = $data->fetch_assoc()) {
                                                                ?>
                                                                <option
                                                                    value="<?php echo $row['IVA'] ?>"><?php echo "$row[IVA]"; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="form-group">
                                                    <label>Precio con IVA</label>
                                                    <input name="precio_con_iva"
                                                           class="form-control precio_con_iva_value" disabled
                                                           value="<?php echo $suma_precio_total ?>" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                <label>Descripción para la factura</label>
                                                <input name="descripcion_factura"
                                                       class="form-control " 
                                                       required>
                                            </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <div class="form-group">
                                                        <button name="submit" class="factura_pre_factura" type="submit">
                                                            Facturar la pre-factura
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </form>
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