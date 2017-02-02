<!doctype html>

<?php
session_start();
include('../../php/db.php');
include('../../php/selects.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/png" href="../../img/favicon.ico">
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

    <!--COLUMNAS QUE PUEDEN SER MODIFICADAS-->
    <!--<script type="text/javascript" src="assets/js/editor.js"></script>-->


    <script type="text/javascript" src="../../js/editor.js"></script>


    <!-- DATATABLES TABLAS -->
    <script src="../../table/tables.js"></script>
    <!-- Bootstrap core CSS     -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../../css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../../css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../../css/pe-icon-7-stroke.css" rel="stylesheet" />

    
    <!--<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>-->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!--EDIT DATATABLE CODE TYPE TABLE-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    
    <!--TABLE_EDITOR.CSS-->
    <link href="../../css/table_editor.css" rel="stylesheet"/>
    <link href="../../css/table.css" rel="stylesheet"/>
    <!--BOTONES EXCEL-->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!--BOTONES EXCEL CSS-->
    <link href="../../css/table2.css" rel="stylesheet"/>
    <!--EDIT DATATABLE CODE-->
    <link href="../../css/table4.css" rel="stylesheet"/>
    <!--INSERTS-->
    <link href="../../css/insert.css" rel="stylesheet" />
    <!--CARGAR BARRA INSERT-->
    <link href="../../css/cargarinsert.css" rel="stylesheet" />

</head>
<body onload="itv = setInterval(prog, 10)">
<!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
<div class="wrapper">
    <div class="sidebar">

    

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="../../../index.php"><img src="../../img/ctw_logo.gif" alt="CTW Logo"></a>
                 
            </div>

            <ul class="nav">
                <li>
                    <a href="../../../index.php">
                        <i class="pe-7s-note2"></i>
                        <p>INICIO</p>
                    </a>
                </li> 
                <li>
                    <a href="../../../buscador/buscador.php">
                        <i class="pe-7s-search"></i>
                        <p>Buscador</p>
                    </a>
                </li>
                <li class="active">
                    <a href="../../../entrada_stock.php">
                        <i class="pe-7s-box2"></i>
                        <p>Entrada de stock</p>
                    </a>
                </li>
                <li>
                    <a href="../../../insert/insert.php">
                        <i class="pe-7s-pen"></i>
                        <p>Insert</p>
                    </a>
                </li>
                <li>
                    <a href="../../../minutaje.php">
                        <i class="pe-7s-pen"></i>
                        <p>Minutaje</p>
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
                    <a class="navbar-brand">Insertar artículo</a>
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
                            <a href="./perfil.php"> <?php echo $_SESSION["username"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
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
                            
                        <?php
                        #Declaramos las variables del formulario
                        $cont=0;
                        $suma_cantidad=0;
                        $nombre = $_POST['nombre'];
                        $descripcion = $_POST['descripcion'];
                        $codigo_de_barras = $_POST['codigo_de_barras'];
                        $codigo_de_barras_update = $codigo_de_barras;
                        $nif_mayorista = $_POST['select_box_nif_mayorista'];
                        $codigo_producto_mayorista = $_POST['codigo_producto_mayorista'];
                        $numero_de_serie = $_POST['numero_de_serie'];
                        $precio = $_POST['precio'];
                        $cantidad = $_POST['cantidad'];
                        $numero_factura = $_POST['numero_factura'];
                        $ubicacion = $_POST['ubicacion'];

                        //Añadimos comillas a los varchars
                        $nombre="\"$nombre\"";
                        $precio="\"$precio\"";
                        $descripcion="\"$descripcion\"";
                        $codigo_de_barras="\"$codigo_de_barras\"";
                        $nif_mayorista="\"$nif_mayorista\"";
                        $codigo_producto_mayorista="\"$codigo_producto_mayorista\"";
                        $numero_de_serie="\"$numero_de_serie\"";
                        $numero_factura="\"$numero_factura\"";
                        $ubicacion="\"$ubicacion\"";

                        //Si hay algun campo opcional no rellenado lo transforma en null
                        if($descripcion == "\"\""){
                            $descripcion = 'null';
                        }if($codigo_producto_mayorista == "\"\""){
                            $codigo_producto_mayorista = 'null';
                        }if($ubicacion == "\"\""){
                            $ubicacion = 'null';
                        }


                        //Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
                        $conn = connect();

                        $sql = "INSERT INTO ARTICULO (nombre, descripcion, codigo_de_barras, NIF_mayorista, codigo_producto_mayorista, numero_de_serie, precio, cantidad, numero_factura, ubicacion)
                        VALUES ($nombre, $descripcion, $codigo_de_barras, $nif_mayorista, $codigo_producto_mayorista, $numero_de_serie, $precio, $cantidad, $numero_factura, $ubicacion)";
                            


                        if ($conn->query($sql) === TRUE) {

                            $data = select_all_stock();

                                if ($data->num_rows > 0) {
                                    // output data of each row
                                    while($row = $data->fetch_assoc()) {
                                        
                                        if($row['CODIGO_DE_BARRAS']==$codigo_de_barras_update){
                                            
                                            $cont=$cont+1;
                                            $suma_cantidad= $row['cantidad_total'] + $cantidad;
                                        }
                              
                                    
                             
                                   }       
                                }

                                if($cont==0){

                                    $sql2 = "INSERT INTO STOCK (CODIGO_DE_BARRAS, cantidad_total)
                                    VALUES ($codigo_de_barras, $cantidad)";

                                }else{

                                    $sql2 = "UPDATE STOCK SET cantidad_total = $suma_cantidad  WHERE  CODIGO_DE_BARRAS = $codigo_de_barras";

                                }
                                    if ($conn->query($sql2) === TRUE) {
                                        echo "Stock modificado";

                                    }else{
                                    echo "Error en Stock: <br><br>" . $sql . "<br><br><br>" . $conn->error;

                                    }

                        ?>
                            
                            <div id="precargador">
                                  <p id="progressnum"></p> 
                                  <div id="progressbar">
                                     <div id="indicador"></div>
                                  </div>
                            </div>
                                
                                <script>
                                //document.body.style.background = "#ea7f33";
                                var maxprogress = 300;
                                    var actualprogress = 0;
                                    var itv = 0;
                                    function prog()
                                    {
                                      if(actualprogress >= maxprogress) 
                                      {
                                        clearInterval(itv);     
                                        return;
                                      } 
                                      var progressnum = document.getElementById("progressnum");
                                      var indicador = document.getElementById("indicador");
                                      actualprogress +=2;  
                                      indicador.style.width=actualprogress + "px";
                                      progressnum.innerHTML = "Añadiendo artículo...";
                                      if (actualprogress==300){
                                        window.location="../../../entrada_stock.php";
                                      }
                                    }
                                </script>

                        <?php
                        } else {
                            echo "Error en artículo: <br><br>" . $sql . "<br><br><br>" . $conn->error;
                        }

                        close($conn); 
                         
                        ?>
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