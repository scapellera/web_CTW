<!doctype html>

<?php
session_start();
include('assets/php/db.php');
include('assets/php/selects.php');
include('assets/php/functions.php');
if ($_SESSION["login_done"] == true){
?>


<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

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
                    document.getElementById("menu_inicio").className = "active";
                });</script>
            <style>
                @media (max-width: 600px) {
                    #menu_inicio {
                        background-color: #ef9448;
                        margin-left: 12%;
                        border-top-left-radius: 50px;
                        border-top-right-radius: 50px;
                        border-bottom-right-radius: 50px;
                        border-bottom-left-radius: 50px;
                    }

                    #menu_inicio1 {
                        margin-left: 22%;
                    }
                }
            </style>
        </div>
    </div>

    <div class="stickyfloat_element">
        <div id="dock-container">
            <div id="dock">
                <ul>
                    <li><a href="http://android.com"><img src="assets/img/iconos_menu/email.png"/></a></li>
                    <li><a href="http://android.com"><img src="assets/img/iconos_menu/twitter.png"/></a></li>
                    <li><a href="http://android.com"><img src="assets/img/iconos_menu/user.png"/></a></li>
                    <li><a href="http://android.com"><img src="assets/img/iconos_menu/facebook.png"/></a></li>
                    <li><a href="http://android.com"><img src="assets/img/iconos_menu/herramientas.png"/></a></li>
                    <li><a href="http://android.com"><img src="assets/img/iconos_menu/logout.png"/></a></li>
                </ul>
                <div class="base"></div>
            </div>
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
                    <a class="navbar-brand">Página de inicio</a>
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
                            <!--CONTENIDO VA AQUI-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h1>sdfsd</h1>
        <h1>sdfsd</h1>
        <h1>sdfsd</h1>
        <h1>sdfsd</h1>
        <h1>sdfsd</h1>
        <h1>sdfsd</h1>
        <h1>sdfsd</h1>


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