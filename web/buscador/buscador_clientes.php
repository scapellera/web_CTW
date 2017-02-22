<!doctype html>
<!--VERIFICAR QUE LOGIN SE HA REALIZADO-->
<?php
session_start();
include('../assets/php/db.php');
include('../assets/php/selects.php');
if($_SESSION["login_done"]==true){
?>

<html lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>CTW - intranet</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />

<!-- ARCHIVOS NECESARIOS PARA DATATABLES-->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<!--Si el usuario tiene rol suficiente puede editar las tablas-->
<?php
if($_SESSION["user_rol"]<=1){
//<!--COLUMNAS QUE PUEDEN SER MODIFICADAS-->
echo"<script type=\"text/javascript\" src=\"../assets/js/editor/edit_cliente.js\"></script>";
}?>

<!-- DATATABLES TABLAS ESPECIFICAS (CLIENTES, CONTACTOS, SEDES...) -->
<script src="../assets/table/tables.js"></script>

<!--Fonts and icons-->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
<!--CSS-->
<!--  Light Bootstrap Table core CSS  1-->
<link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<!--<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>-->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<!--EDIT DATATABLE CODE TYPE TABLE-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<link href="../assets/css/table_editor.css" rel="stylesheet"/>
<!--TABLE CSS-->
<link href="../assets/css/table.css" rel="stylesheet"/>
<!--BOTONES TABLA-->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!--BOTONES CSS-->
<link href="../assets/css/table2.css" rel="stylesheet"/>
<!--EDIT DATATABLE CODE-->
<link href="../assets/css/table4.css" rel="stylesheet"/>
<!--NUESTRO CSS-->
<link href="../assets/css/micss.css" rel="stylesheet" />
<!--CSS DEL CHECKBOX ACTIVAR/DESACTIVAR-->
<link href="../assets/css/csscheckbox.css" rel="stylesheet" />

<!--SCRIPTS-->
<script src="../assets/js/scripts.js"></script>

</head>

<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="../"><img src="../assets/img/ctw_logo.gif" alt="CTW Logo"></a>
            </div>
            <!--MENU-->
            <ul class="nav">
                <li>
                    <a href="../index.php">
                        <i class="pe-7s-pen"></i>
                        <p>PÁGINA INICIO</p>
                    </a>
                </li>
                <li class="active">
                    <a href="buscador_clientes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_sedes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Sedes</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_contactos.php">
                        <i class="pe-7s-pen"></i>
                        <p>Contactos</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_mayoristas.php">
                        <i class="pe-7s-pen"></i>
                        <p>Mayoristas</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_usuarios.php">
                        <i class="pe-7s-pen"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_servicios.php">
                        <i class="pe-7s-pen"></i>
                        <p>Servicios</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_articulos.php">
                        <i class="pe-7s-pen"></i>
                        <p>Artículos</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_stock.php">
                        <i class="pe-7s-pen"></i>
                        <p>Stock</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_minutaje.php">
                        <i class="pe-7s-pen"></i>
                        <p>Minutaje</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--BARRA SUPERIOR, PONE 2 POR QUE ES UNA VARIACION DE LA QUE VIENE POR DEFECTO-->
    <div class="main-panel">
        <nav class="navbar2 navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"></a>
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
        <!--ZONA DE CONTENIDO DE ESTA PAGINA, PONE 2 POR QUE ES UNA VARIACION DE LA QUE VIENE POR DEFECTO-->
        <div class="content2">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div>

                            <script>
                                function result(activo){
                                if (activo==0){//imprime un input activado o desactivado
                                    document.write("<td><label style='margin-top: 10px; margin-left:12px;' class='switcha'><a>&nbsp;0</a><input  type='checkbox' disabled ><div  class='slider rounda'></div></label></td>");
                                }else{
                                    document.write("<td><label style='margin-top: 10px; margin-left:12px;' class='switcha'><a>&nbsp;1</a><input  type='checkbox' checked disabled ><div  class='slider rounda'></div></label></td>");
                                }
                            }
                            </script>

                            <table id="buscador_cliente" class="table table-striped table-bordered">
                                    <!--HEAD DE LA TABLA-->
                                    <thead>
                                        <tr>
                                            <th style="background-color: #39AF33; width: 3px;">Activos</th>
                                            <!--<th style="background-color: #F26842; width: 3px;">Borrar</th>-->
                                            <th>Nombre completo</th>
                                            <th>NIF empresa</th>
                                            <th>Nombre comercial</th>
                                            <th>País</th>
                                            <th>Telefono</th>
                                            <th>Prefijo</th>
                                            <th>Email</th>
                                            <th>Ciudad facturacion</th>
                                            <th>Codigo postal facturación</th>
                                            <th>Calle facturación</th>
                                            <th>Número facturación</th>
                                            <th>Ciudad envio</th>
                                            <th>Codigo envio</th>
                                            <th>Calle envio</th>
                                            <th>Número envio</th>
                                            <th>IBAN</th>
                                            <th>SEPA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--OBTENEMOS LOS DATOS PARA RELLENAR LA TABLA-->    
                                        <?php
                                            $data = select_all_cliente(); 
                                            if ($data->num_rows > 0) {
                                                 // output data of each row
                                                 while($row = $data->fetch_assoc()) {
                                                    $pk = $row['NIF_EMPRESA'];
                                        ?>
                                                    <!--INTRODUCIOMOS LOS DATOS AQUÍ-->
                                                    <tr>
                                                        <script>result(<?php echo $row['activo']?>)</script> 
                                                        <!--<td><button style="margin-top: 3px; margin-left:14px;" class="btn btn-danger" onclick="preguntar('<?php   
                                                                $nombre_fichero = '../assets/php/delete/delete_cliente.php';
                                                                if (file_exists($nombre_fichero)) {
                                                                    echo $row['NIF_EMPRESA'];
                                                                } else {
                                                                    echo "0 results";
                                                                }
                                                        ?>')"><i class="glyphicon glyphicon-trash"></i></button></td>-->
                                                        <td><label ><a class="nombre_completo" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['nombre_completo']?> </a></label></td>
                                                        <td><label ><a class="NIF_EMPRESA" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['NIF_EMPRESA'] ?></a></label></td>
                                                        <td><label ><a class="nombre_comercial" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['nombre_comercial']?> </a></label></td>
                                                        <td><label ><a class="pais" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['pais']?> </a></label></td>
                                                        <td><label ><a class="telefono" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['telefono']?> </a></label></td>
                                                        <td><label ><a class="prefijo" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['prefijo']?> </a></label></td>
                                                        <td><label ><a class="email" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['email']?> </a></label></td>
                                                        <td><label ><a class="ciudad_facturacion" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['ciudad_facturacion']?> </a></label></td>
                                                        <td><label ><a class="codigo_postal_facturacion" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['codigo_postal_facturacion']?> </a></label></td>
                                                        <td><label ><a class="calle_facturacion" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['calle_facturacion']?> </a></label></td>
                                                        <td><label ><a class="numero_facturacion" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['numero_facturacion']?> </a></label></td>
                                                        <td><label ><a class="ciudad_envio" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['ciudad_envio']?> </a></label></td>
                                                        <td><label ><a class="codigo_postal_envio" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['codigo_postal_envio']?> </a></label></td>
                                                        <td><label ><a class="calle_envio" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['calle_envio']?> </a></label></td>
                                                        <td><label ><a class="numero_envio" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['numero_envio']?> </a></label></td>
                                                        <td><label ><a class="IBAN" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['IBAN']?> </a></label></td>
                                                        <td><label ><a class="SEPA" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['SEPA']?> </a></label></td>
                                                    </tr>
                                        <!--MENSAJE POR SI NO OBTIENE DATOS-->            
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
<!--SI NO HA PASSADO POR EL LOGIN LO MANDAMOS PARA QUE SE AUTENTIFIQUE-->
<?php 
}else{
    header("location:../index.php");
}
?>