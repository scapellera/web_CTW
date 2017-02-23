<!doctype html>

<?php
session_start();
include('assets/php/db.php');
include('./assets/php/selects.php');
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
    <!--FORMULARIO - CSS-->
    <link href="./assets/css/insert.css" rel="stylesheet"/>

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
                    document.getElementById("menu_entrada_stock").className = "active";
                });</script>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!--TITULO DE LA PÁGINA-->
                    <a class="navbar-brand">Entrada de artículo</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a href="./user.php"> <?php echo $_SESSION["username"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                        </li>
                        <li>
                            <a href="../logout.php">Log out
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
                            <div class="container">
                                <form id="contact" action="./assets/php/post/post_articulos.php" method="post">
                                    <h3>Añadir Artículo</h3>
                                    <h4>Rellene el formulario para añadir el artículo al stock</h4>
                                    <fieldset>
                                        &nbsp;Nombre: <input placeholder="Nombre*" name="nombre" type="text" required>
                                    </fieldset>
                                    <fieldset>
                                        &nbsp;Descripción: <input placeholder="Descripción" name="descripcion"
                                                                  type="text">
                                    </fieldset>
                                    <fieldset>
                                        &nbsp;Código de barras: <input placeholder="Código de barras*"
                                                                       name="codigo_de_barras" type="text" required>
                                    </fieldset>

                                    <fieldset>&nbsp;Selecciona el NIF del mayorista:
                                        <?php $data = select_all_mayorista(); ?>
                                        <select name="select_box_nif_mayorista" class="select_box">
                                            <option value="" disabled selected>Selecciona el NIF del mayorista*</option>
                                            <?php
                                            if ($data->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $data->fetch_assoc()) {
                                                    ?>
                                                    <option
                                                        value="<?php echo $row['NIF_MAYORISTA'] ?>"><?php echo "$row[nombre_empresa] - $row[NIF_MAYORISTA]"; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </fieldset>
                                    <fieldset>
                                        &nbsp;Código producto del mayorista: <input
                                            placeholder="Código producto del mayorista" name="codigo_producto_mayorista"
                                            type="text">
                                    </fieldset>
                                    <fieldset>
                                        &nbsp;Número de serie: <input placeholder="Número de serie*"
                                                                      name="numero_de_serie" type="text" required>
                                    </fieldset>
                                    <fieldset>
                                        &nbsp;Precio: <input placeholder="Precio*" name="precio" type="text" required>
                                    </fieldset>
                                    <fieldset>
                                        &nbsp;Cantidad: <input placeholder="Cantidad*" name="cantidad" type="text"
                                                               required>
                                    </fieldset>
                                    <fieldset>
                                        &nbsp;Número de factura: <input placeholder="Número de factura*"
                                                                        name="numero_factura" type="text" required>
                                    </fieldset>
                                    <fieldset>
                                        &nbsp;Ubicación: <input placeholder="Ubicación" name="ubicacion" type="text">
                                    </fieldset>
                                    <fieldset>
                                        <button name="submit" type="submit" id="contact-submit"
                                                data-submit="...Sending">Submit
                                        </button>
                                    </fieldset>

                                </form>
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