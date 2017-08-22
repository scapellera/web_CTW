<!doctype html>
<!--VERIFICAR QUE LOGIN SE HA REALIZADO-->
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
        echo "<script type=\"text/javascript\" src=\"../assets/js/editor/edit_cliente.js\"></script>";
    }
    ?>
    <!--LIBRERIAS - BUSCADOR-->
    <?php include('../assets/librerias/librerias_buscador.html'); ?><!--LIBRERIA - INSERT-->
    <?php include('../assets/librerias/librerias_insert.html'); ?>
    <!--Funciones javascript-->
    <script src="../assets/js/functions.js"></script>

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

        </div>
    </div>
    <!--BARRA SUPERIOR, PONE 2 POR QUE ES UNA VARIACION DE LA QUE VIENE POR DEFECTO-->
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">

                    <a class="navbar-brand">Buscador clientes</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--USER & LOGOUT-->
                    <?php include('../assets/html/menu/user_logout_buscador.html'); ?>
                </div>
            </div>
        </nav>
        <!--ZONA DE CONTENIDO DE ESTA PAGINA, PONE 2 POR QUE ES UNA VARIACION DE LA QUE VIENE POR DEFECTO-->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="container">

                                <!--variables de minutaje o articulos-->
                                <?php
                                $id_pre_factura = $_POST['id_pre_factura'];
                                $total_neto = $_POST['precio_sin_iva'];
                                $total_facturado = $_POST['precio_con_iva'];
                                $iva = $_POST['select_box_iva'];

                                $last_factura = get_last_fecha_factura();
                                $date = date('Y-m-d', $last_factura);
                                ?>

                                <form id="contact" action="../assets/php/facturar/crear_factura.php" method="post"
                                      name="f_cliente_sede">
                                    <input type="hidden" name="id_pre_factura" value="<?php echo $id_pre_factura ?>">
                                    <input type="hidden" name="precio_sin_iva" value="<?php echo $total_neto ?>">
                                    <input type="hidden" name="precio_con_iva" value="<?php echo $total_facturado ?>">
                                    <input type="hidden" name="select_box_iva" value="<?php echo $iva ?>">
                                    <input type="hidden" name="fecha_factura" class="fecha_factura">




                                    <h3>Crear factura</h3>
                                    <h4>Selecciona la fecha de factura</h4>


                                    <fieldset>
                                        <input type="radio" name="radio_fecha" class="radio_fecha_automatica" value="fecha_sistema" required/>
                                        Seleccionar la fecha del sistema.


                                    </fieldset>
                                    <fieldset>
                                        <input type="radio" name="radio_fecha" class="radio_fecha_manual" value="fecha_seleccionada" required/>
                                        Seleccionar fecha manualmente.
                                        <br>
                                        <input placeholder="Fecha*" name="fecha" class="seleccionar_fecha_calendario" type="date" min="<?php echo $date; ?>">

                                    </fieldset>

                                    <fieldset>
                                        <button name="submit" type="submit" id="contact-submit"
                                                data-submit="...Sending">Submit
                                        </button>
                                    </fieldset>
                                </form>
                                <script>
                                    $(document).ready(function () {
                                        $(".radio_fecha_automatica").change(function () {
                                            $(".seleccionar_fecha_calendario").removeAttr('required');
                                            $('.fecha_factura').val("auto");
                                        });
                                        $(".radio_fecha_manual").change(function () {
                                            $(".seleccionar_fecha_calendario").attr("required", "true");
                                        });
                                        $(".seleccionar_fecha_calendario").change(function () {
                                            var fecha = $('.seleccionar_fecha_calendario').val();
                                            $('.fecha_factura').val(fecha);
                                        });

                                    });
                                </script>
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
<!--SI NO HA PASSADO POR EL LOGIN LO MANDAMOS PARA QUE SE AUTENTIFIQUE-->
<?php
} else {
    header("location:../index.php");
}
?>