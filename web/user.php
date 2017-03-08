 <!doctype html>

<?php
session_start();
include('assets/php/db.php');
include('assets/php/selects.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
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
    <script type="text/javascript" src="assets/js/editor.js"></script>


    <!-- DATATABLES TABLAS -->
    <script src="table/tables.js"></script>
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    
    <!--<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>-->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!--EDIT DATATABLE CODE TYPE TABLE-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    
    <!--TABLE_EDITOR.CSS-->
    <link href="assets/css/table_editor.css" rel="stylesheet"/>
    <link href="assets/css/table.css" rel="stylesheet"/>
    <!--BOTONES EXCEL-->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!--BOTONES EXCEL CSS-->
    <link href="assets/css/table2.css" rel="stylesheet"/>
    <!--EDIT DATATABLE CODE-->
    <link href="assets/css/table4.css" rel="stylesheet"/>



</head>
<body>
<!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
<div class="wrapper">
    <div class="sidebar">

    

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="./"><img src="./assets/img/ctw_logo.gif" alt="CTW Logo"></a>
                 
            </div>

            <ul class="nav">
                <li>
                    <a href="./index.php">
                        <i class="pe-7s-note2"></i>
                        <p>INICIO</p>
                    </a>
                </li>                
                <li>
                    <a href="./buscador/buscador.php">
                        <i class="pe-7s-search"></i>
                        <p>Buscador</p>
                    </a>
                </li>
                <li>
                    <a href="entrada_stock.php">
                        <i class="pe-7s-box2"></i>
                        <p>Entrada de stock</p>
                    </a>
                </li>
                <li>
                    <a href="./insert/insert.php">
                        <i class="pe-7s-pen"></i>
                        <p>Insert</p>
                    </a>
                </li>
                <li>
                    <a href="./eliminar/eliminar.php">
                        <i class="pe-7s-pen"></i>
                        <p>Eliminar</p>
                    </a>
                </li>
                <li>
                    <a href="./minutaje_manual.php">
                        <i class="pe-7s-pen"></i>
                        <p>Minutaje (manual)</p>
                    </a>
                </li>
                <li>
                    <a href="./minutaje_automatico.php">
                        <i class="pe-7s-pen"></i>
                        <p>Minutaje (automatico)</p>
                    </a>
                </li>
                <li>
                    <a href="./calendario.php">
                        <i class="pe-7s-pen"></i>
                        <p>Calendario</p>
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
                    <a class="navbar-brand" href="#"></a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li>
                            <a href="./user.php"> <?php echo $_SESSION["username"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                        </li>
                        <li>
                            <a href="../logout.php">Desconectarse</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

            


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar perfil</h4>
                            </div>
                            <div class="content">

                                <?php
               
                                    $data = select_all_user($_SESSION["id_usuario"]); 

                                    if ($data->num_rows > 0) {
                                         // output data of each row
                                         while($row = $data->fetch_assoc()) {
                                ?>

                                <form id="contact" action="assets/php/post/post_user.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre (disabled)</label>
                                                <input type="text" name="nombre" class="form-control" disabled placeholder="<?php echo $row['nombre']?>" value="<?php echo $row['nombre']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Apellido (disabled)</label>
                                                <input type="text" name="apellido" class="form-control" disabled placeholder="<?php echo $row['apellido']?>" value="<?php echo $row['apellido']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Usuario (disabled)</label>
                                                <input type="text" name="usuario" class="form-control" disabled placeholder="<?php echo $row['user']?>" value="<?php echo $row['user']?>">
                                            </div>
                                        </div>
                                     </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Correo electrónico (disabled)</label>
                                                <input type="text" name="email" class="form-control" disabled placeholder="<?php echo $row['correo']?>" value="<?php echo $row['correo']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Teléfono (disabled)</label>
                                                <input type="text" name="telefon" class="form-control" disabled placeholder="<?php echo $row['telefono']?>" value="<?php echo $row['telefono']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contraseña antigua</label>
                                                <input type="password" name="password" class="form-control" placeholder="********" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Contraseña</label>
                                                <input type="password" name="password1" class="form-control" placeholder="********" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Repetir contraseña</label>
                                                <input type="password" name="password2" class="form-control" placeholder="********" >
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="password_anterior" value="<?php echo $row['password']?>">

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>

                                <?php           
                                     }
                                } else {
                                     echo "0 results";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="./assets/img/ctw_logo.gif"/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a>
                                        <img class="avatar border-gray" src="assets/img/user_logo/<?php echo $_SESSION["imagen"]; ?>" />

                                        <h4 class="title"><?php echo $_SESSION["username"]; ?><br />
                                        </h4>
                                    </a>
                                </div>
                                <form action="assets/php/post/uploadImageProfile.php" method="post" enctype="multipart/form-data">
                                    Select image to upload:
                                    <input type="file" name="fileToUpload">
                                    <input type="submit" value="Upload Image" name="submit">
                                </form>
                                <p class="description text-center"></p>
                            </div>
                            
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>