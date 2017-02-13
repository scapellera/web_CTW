    <!doctype html>

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

    <title>WEB TEST</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- ARCHIVOS NECESARIOS PARA DATATABLES-->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">-->

     <!-- ARCHIVOS NECESARIOS PARA DATATABLES-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <?php
    if($_SESSION["user_rol"]<=1){
        //<!--COLUMNAS QUE PUEDEN SER MODIFICADAS-->
    echo"<script type=\"text/javascript\" src=\"../assets/js/editor/edit_mayorista.js\"></script>";

    }
    
    ?>
    


    <!-- DATATABLES TABLAS -->
    <script src="../assets/table/tables.js"></script>
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    
    <!--<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>-->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!--EDIT DATATABLE CODE TYPE TABLE-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    
    <!--TABLE_EDITOR.CSS-->
    <link href="../assets/css/table_editor.css" rel="stylesheet"/>
    <link href="../assets/css/table.css" rel="stylesheet"/>
    <!--BOTONES EXCEL-->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!--BOTONES EXCEL CSS-->
    <link href="../assets/css/table2.css" rel="stylesheet"/>
    <!--EDIT DATATABLE CODE-->
    <link href="../assets/css/table4.css" rel="stylesheet"/>
    <!--INSERTS-->
    <link href="../assets/css/insert.css" rel="stylesheet" />
    <!--NUESTRO CSS-->
    <link href="../assets/css/micss.css" rel="stylesheet" />



</head>
<body>

<div class="wrapper">
    <div class="sidebar">

    

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="../"><img src="../assets/img/ctw_logo.gif" alt="CTW Logo"></a>
                 
            </div>

            <ul class="nav">
                <li>
                    <a href="../index.php">
                        <i class="pe-7s-pen"></i>
                        <p>PÁGINA INICIO</p>
                    </a>
                </li>
                <li>
                    <a href="eliminar_clientes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li>
                    <a href="eliminar_sedes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Sedes</p>
                    </a>
                </li>
                <li>
                    <a href="eliminar_contactos.php">
                        <i class="pe-7s-pen"></i>
                        <p>Contactos</p>
                    </a>
                </li>
                <li class="active">
                    <a href="eliminar_mayoristas.php">
                        <i class="pe-7s-pen"></i>
                        <p>Mayoristas</p>
                    </a>
                </li>
                <li>
                    <a href="eliminar_usuarios.php">
                        <i class="pe-7s-pen"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li>
                    <a href="eliminar_servicios.php">
                        <i class="pe-7s-pen"></i>
                        <p>Servicios</p>
                    </a>
                </li>
                <li>
                    <a href="eliminar_articulos.php">
                        <i class="pe-7s-pen"></i>
                        <p>Artículos</p>
                    </a>
                </li>
                <li>
                    <a href="eliminar_stock.php">
                        <i class="pe-7s-pen"></i>
                        <p>Stock</p>
                    </a>
                </li>
            </ul>
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
                    <a class="navbar-brand">Eliminar mayorista</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--ICONOS ESQUERRA-->
                    <!--<ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>-->

                    <ul class="nav navbar-nav navbar-right">
                        <!--Comentat account i dropdown-->
                        <!--<li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>-->
                        <li>
                            <a href="../perfil.php"> <?php echo $_SESSION["username"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
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
                    <div >
                        <div >

                        <script>
                            function preguntar(nif_mayorista){
                               eliminar=confirm("¿Deseas eliminar este mayorista?");
                               if (eliminar)
                               //Redireccionamos si das a aceptar
                                 window.location.href="../assets/php/delete/delete_mayorista.php?id="+nif_mayorista; //página web a la que te redirecciona si confirmas la eliminación
                            else
                              //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
                                alert('No se ha podido eliminar el mayorista...')
                            }
                            </script>

                                <table id="buscador_mayorista" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #F26842; ">Borrar</th>
                                            <th>Nif mayorista</th>
                                            <th>Nombre empresa</th>
                                            <th>Nombre del comercial</th>
                                            <th>Teléfono empresa</th>
                                            <th>Teléfono del comercial</th>
                                            <th>Extensión teléfono del comercial</th>
                                            <th>Email empresa</th>
                                            <th>Email del comercial</th>
                                            <th>Ubicación</th>
                                            <th>País</th>
                                            <th>Prefijo</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $conn = connect();

                                             $data = select_all_mayorista(); 

                                            if ($data->num_rows > 0) {
                                                 // output data of each row
                                                 while($row = $data->fetch_assoc()) {
                                                    $pk = $row['NIF_MAYORISTA'];

                                        ?>
                                                    <tr> 
                                                        <td><button onclick="preguntar(<?php echo $row['NIF_MAYORISTA']?>)">Borrar</button></td>
                                                        <td><a href="#" class="NIF_MAYORISTA" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['NIF_MAYORISTA']?> </a></td>
                                                        <td><a href="#" class="nombre_empresa" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['nombre_empresa']?> </a></td>
                                                        <td><a href="#" class="nombre_comercial" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['nombre_comercial']?> </a></td>
                                                        <td><a href="#" class="telefono_empresa" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['telefono_empresa']?> </a></td>
                                                        <td><a href="#" class="telefono_comercial" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['telefono_comercial']?> </a></td>
                                                        <td><a href="#" class="extension_telefono_comercial" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['extension_telefono_comercial']?> </a></td>
                                                        <td><a href="#" class="email_empresa" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['email_empresa']?> </a></td>
                                                        <td><a href="#" class="email_comercial" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['email_comercial']?> </a></td>
                                                        <td><a href="#" class="ubicacion" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['ubicacion']?> </a></td>
                                                        <td><a href="#" class="pais" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['pais']?> </a></td>
                                                        <td><a href="#" class="prefijo" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['prefijo']?> </a></td>   
                                                    </tr>

                                        <?php           /*echo"<tr>
                                                            <td><a".$row["nombre_completo"]."</td>
                                                            <td>".$row["NIF_EMPRESA"]."</td>
                                                            <td>".$row["nombre_comercial"]."</td>
                                                            <td>".$row["telefono"]."</td>
                                                            <td>".$row["email"]."</td>
                                                            <td>".$row["IBAN"]."</td>
                                                            <td>".$row["SEPA"]."</td>
                                                            <td>".$row["pais"]."</td>
                                                            <td>".$row["ciudad_facturacion"]."</td>
                                                            <td>".$row["codigo_postal_facturacion"]."</td>
                                                            <td>".$row["calle_facturacion"]."</td>
                                                            <td>".$row["numero_facturacion"]."</td>
                                                            <td>".$row["ciudad_envio"]."</td>
                                                            <td>".$row["codigo_postal_envio"]."</td>
                                                            <td>".$row["calle_envio"]."</td>
                                                            <td>".$row["numero_envio"]."</td>
                                                        </tr>";*/
                                                     /*echo "<br> id: ". $row["ID"]. " - Lloc incidencia: ". $row["lloc_incidencia"]. " " . $row["breu_descripcio"] . "<br>";*/
                                                 }
                                            } else {
                                                 echo "0 results";
                                            }

                                            $conn->close();
                                        ?>
                                        
                                     
                                    </tbody>
                                </table>


                                
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Menu footer
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        
                        <!--<li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>-->
                    </ul>
                </nav>
                <!--Copyright-->
                <!--<p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>-->
            </div>
        </footer>
        -->
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <!--<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>-->
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="../assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="../assets/js/demo.js"></script>
    <!--POPUP DE COLOR BLAU SUPERIOR DRET-->
    <!--<script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>-->

</html>

<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>