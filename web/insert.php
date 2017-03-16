<!doctype html>

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
                    document.getElementById("menu_insert").className = "active";
                });</script>
            <style>
                @media (max-width: 600px) {
                    #menu_insert {
                        background-color: #ef9448;
                        margin-left: 12%;
                        border-top-left-radius: 50px;
                        border-top-right-radius: 50px;
                        border-bottom-right-radius: 50px;
                        border-bottom-left-radius: 50px;
                    }

                    #menu_insert1 {
                        margin-left: 17%;
                    }
                }
            </style>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--TITULO DE LA PÁGINA-->
                    <a class="navbar-brand">Insertar</a>
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
                        <div>
                        <center>
                            <a href="insert/insert_clientes.php" class="button_insert">Añadir<br>cliente</a>
                            <a href="insert/insert_sedes.php" class="button_insert">Añadir<br>sede</a>
                            <a href="insert/insert_contactos.php" class="button_insert">Añadir<br>contacto</a>
                            <a href="insert/insert_mayoristas.php" class="button_insert">Añadir<br>mayorista</a>
                            <a href="insert/insert_usuarios.php" class="button_insert">Añadir<br>usuario</a>
                            <a href="insert/insert_servicios.php" class="button_insert">Añadir<br>servicio</a>
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