    <!doctype html>

<?php
session_start();
include('../assets/php/db.php');
include('../assets/php/selects.php');
include('../assets/php/functions.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--LIBRERIAS-->
    <!--LIBRERIA - GLOBAL-->
    <?php include('../assets/librerias/librerias_globales_buscador.html'); ?>
    <!--EDITOR DE TABLAS-->
    <?php
    if ($_SESSION["user_rol"] <= 1) {
        //<!--COLUMNAS QUE PUEDEN SER MODIFICADAS-->
        echo "<script type=\"text/javascript\" src=\"../assets/js/editor/edit_articulo.js\"></script>";
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
            include('../assets/html/logo/logo_buscador.html');
            include('../assets/html/menu/menu_buscador.html');
            ?>
            <!--CAMBIAR COLOR DE LA ENTRADA DE MENU ACTIVA-->
            <script>$(function () {
                    document.getElementById("menu_articulos").className = "active";
                });</script>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar2 navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Buscador artículos</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--USER & LOGOUT-->
                    <?php include('../assets/html/menu/user_logout_buscador.html'); ?>
                </div>
            </div>
        </nav>

        <!--ZONA DE CONTENIDO DE ESTA PAGINA, PONE 2 POR QUE ES UNA VARIACION DE LA QUE VIENE POR DEFECTO-->
        <div class="content2">
            <div class="container-fluid">
                <div class="row">
                    <div >
                        <div >

                                <table id="buscador_articulo" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Codigo de barras</th>
                                            <th>Mayorista</th>
                                            <th>Codigo producto del mayorista</th>
                                            <th>Número de serie</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Número de factura</th>
                                            <th>Ubicacion</th>
                                            <th>Fecha de alta</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $data = select_all_articulo();
                                            
                                            if ($data->num_rows > 0) {
                                                 // output data of each row
                                                 while($row = $data->fetch_assoc()) {
                                                    $pk = $row['ID_ARTICULO'];

                                        ?>
                                                    <tr>
                                                        
                                                        <td><label style="margin-top: 11px;"><a href="#" class="nombre" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['nombre']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="descripcion" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['descripcion']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['codigo_de_barras']?> </a</label></td>
                                                        <td><label style="margin-top: 11px;">
                                                        <a data-pk=<?php echo "\"$pk\""; ?>>
                                                        <?php 
                                                        $nif_mayorista = $row['NIF_mayorista'];
                                                        $nombreMayorista = select_nombre_mayorista($nif_mayorista);
                                                        echo $nombreMayorista;
                                                        ?> 
                                                        </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['codigo_producto_mayorista']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="numero_de_serie" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['numero_de_serie']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="precio" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['precio']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="cantidad" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['cantidad']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="numero_factura" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['numero_factura']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="ubicacion" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['ubicacion']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="fecha_de_alta" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['fecha_de_alta']?> </a></label></td>
                                                    </tr>

                                        <?php           
                                            }
                                            } else {
                                                 echo "0 results";
                                            }
                                        ?>
                                        
                                     
                                    </tbody>
                                </table>


                                
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
}else{
    echo "false";
    header("location:../index.php");
}

?>