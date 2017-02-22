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

    <!--COLUMNAS QUE PUEDEN SER MODIFICADAS-->
    <script type="text/javascript" src="../assets/js/editor.js"></script>


    <!-- DATATABLES TABLAS -->
    <script src="../table/tables.js"></script>
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
                <li class="active">
                    <a href="insert_clientes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li>
                    <a href="insert_sedes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Sedes</p>
                    </a>
                </li>
                <li>
                    <a href="insert_contactos.php">
                        <i class="pe-7s-pen"></i>
                        <p>Contactos</p>
                    </a>
                </li>
                <li>
                    <a href="insert_mayoristas.php">
                        <i class="pe-7s-pen"></i>
                        <p>Mayoristas</p>
                    </a>
                </li>
                <li>
                    <a href="insert_usuarios.php">
                        <i class="pe-7s-pen"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li>
                    <a href="insert_servicios.php">
                        <i class="pe-7s-pen"></i>
                        <p>Servicios</p>
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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card2">

                        <div class="container">  
                          <form id="contact" action="../assets/php/post/post_clientes.php" method="post">
                            <h3>Insertar cliente</h3>
                            <h4>Rellene el formulario para añadir un nuevo cliente</h4>
                            <fieldset>
                            &nbsp;NIF de la empresa:  <input placeholder="NIF de la empresa*" name="nif_empresa" type="text" autofocus>
                            </fieldset>
                            <fieldset>
                            &nbsp;Nombre del comercial:  <input placeholder="Nombre del comercial*" name="nombre_comercial" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Nombre de la empresa:  <input placeholder="Nombre de la empresa*" name="nombre_completo" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Teléfono:  <input placeholder="Teléfono*" name="telefono" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Correo electrónico:  <input placeholder="Correo electrónico*" name="email" type="email"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Ciudad para la facturacion:  <input placeholder="Ciudad para la facturacion*" name="ciudad_facturacion" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Código postal para la facturación:  <input placeholder="Código postal para la facturación*" name="codigo_postal_facturacion" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Calle para la facturación:  <input placeholder="Calle para la facturación*" name="calle_facturacion" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Número para la facturación:  <input placeholder="Número para la facturación*" name="numero_facturacion" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Ciudad para el envio:  <input placeholder="Ciudad para el envio*" name="ciudad_envio" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Código postal para el envio:  <input placeholder="Código postal para el envio*" name="codigo_postal_envio" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Calle para el envio:  <input placeholder="Calle para el envio*" name="calle_envio" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Número para el envio:  <input placeholder="Número para el envio*" name="numero_envio" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;IBAN:  <input placeholder="IBAN*" name="iban" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;SEPA:  <input placeholder="SEPA*" name="sepa" type="text" required>
                            </fieldset>
                            <fieldset>&nbsp;Selecciona el país:
                            <?php $data = select_all_pais(); ?>
                            <select name="select_box_pais" class="select_box">
                              <option value="" disabled selected>Selecciona País*</option>
                              <?php
                                if ($data->num_rows > 0) {
                                    // output data of each row
                                    while($row = $data->fetch_assoc()) {
                              ?>
                                    <option value="<?php echo $row['PAIS']?>"><?php echo $row['PAIS']?></option>
                            <?php   
                                    }       
                                }
                             ?>       
                            </select>
                            </fieldset>
                            <fieldset>
                            <input style="visibility:hidden" name="activo" type="checkbox" checked>
                            </fieldset>
                            <fieldset>
                              <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
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


</html>

<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>