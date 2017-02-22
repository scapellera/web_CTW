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

    <title>WEB TEST</title>

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
                    <a class="navbar-brand">Inserts</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../user.php"> <?php echo $_SESSION["username"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                        </li>
                        <li>
                            <a href="../../logout.php">Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <a href="insert_clientes.php" class="button_insert">Añadir cliente</a>
                            <a href="insert_sedes.php" class="button_insert">Añadir <br> sede</a>
                            <a href="insert_contactos.php" class="button_insert">Añadir contacto</a>
                            <a href="insert_mayoristas.php" class="button_insert">Añadir mayorista</a>
                            <a href="insert_usuarios.php" class="button_insert">Añadir usuario</a>
                            <a href="insert_servicios.php" class="button_insert">Añadir servicio</a>


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