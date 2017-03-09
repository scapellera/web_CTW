<?php
session_start();
include('assets/php/db.php');
if ($_SESSION["login_done"] == true){
?>


<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!--LIBRERIAS-->
    <!--LIBRERIA - GLOBAL-->
    <?php include('assets/librerias/librerias_globales.html'); ?>


</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <!--MENU Y LOGO-->
            <?php
            include('assets/html/logo/logo.html');
            include('assets/html/menu/menu_principal.html');
            ?>
            <!--CAMBIAR COLOR DE LA ENTRADA DE MENU ACTIVA-->
            <script>$(function () {
                    document.getElementById("menu_buscador").className = "active";
                });</script>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!--TITULO DE LA PÁGINA-->
                    <a class="navbar-brand">Buscador</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--USER & LOGOUT-->
                    <?php include('assets/html/menu/user_logout.html'); ?>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <center>
                            <a href="./buscador/buscador_clientes.php" class="button_buscador">Buscar<br>cliente</a>
                            <a href="./buscador/buscador_sedes.php" class="button_buscador">Buscar<br>sede</a>
                            <a href="./buscador/buscador_contactos.php" class="button_buscador">Buscar<br>contacto</a>
                            <a href="./buscador/buscador_mayoristas.php" class="button_buscador">Buscar<br>mayorista</a>
                            <a href="./buscador/buscador_usuarios.php" class="button_buscador">Buscar<br>usuario</a>
                            <a href="./buscador/buscador_servicios.php" class="button_buscador">Buscar<br>servicio</a>
                            <a href="./buscador/buscador_articulos.php" class="button_buscador">Buscar<br>artículo</a>
                            <a href="./buscador/buscador_stock.php" class="button_buscador">Buscar<br>stock</a>
                            <a href="./buscador/buscador_minutaje.php" class="button_buscador">Buscar<br>minutaje</a>
                            <!--
                            <a href="./buscador/buscador_clientes.php" class="button_buscador">Buscar cliente</a>
                            <a href="./buscador/buscador_sedes.php" class="button_buscador">Buscar <br> sede</a>
                            <a href="./buscador/buscador_contactos.php" class="button_buscador">Buscar contacto</a>
                            <a href="./buscador/buscador_mayoristas.php" class="button_buscador">Buscar mayorista</a>
                            <a href="./buscador/buscador_usuarios.php" class="button_buscador">Buscar usuario</a>
                            <a href="./buscador/buscador_servicios.php" class="button_buscador">Buscar servicio</a>
                            <a href="./buscador/buscador_articulos.php" class="button_buscador">Buscar artículo</a>
                            <a href="./buscador/buscador_stock.php" class="button_buscador">Buscar stock</a>
                            <a href="./buscador/buscador_minutaje.php" class="button_buscador">Buscar minutaje</a>
                            -->
                        </center>
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