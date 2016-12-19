    <!doctype html>

<?php
session_start();
include('assets/php/db.php');
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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5847f0b6fccdfa3ec8524c16/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

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
                <img src="assets/img/ctw_logo.gif" alt="CTW Logo">
                 
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>Llista de tasques</p>
                    </a>
                </li>
                <li>
                    <a href="buscador.php">
                        <i class="pe-7s-search"></i>
                        <p>Buscador</p>
                    </a>
                </li>
                <li>
                    <a href="./insert/insert.php">
                        <i class="pe-7s-pen"></i>
                        <p>Insert</p>
                    </a>
                </li>
                <!--<li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>-->
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
                    <a class="navbar-brand">Llista de tasques</a>
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




                                <!-- TABLA DATATABLE -->
                                <?php $data = selectFormulari(); ?>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Lloc incidéncia</th>
                                            <th>Breu descripció</th>
                                            <th>Importancia</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $data = selectFormulari(); ?>
                                        <?php
                                        if ($data->num_rows > 0) {
                                                 // output data of each row
                                                 while($row = $data->fetch_assoc()) {
                                                    $pk = $row['ID']; 
                                        ?>
                                        
                                                        <tr>
                                                            <td><a href="#" class="ID" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['ID'] ?></a></td>
                                                            <td><a href="#" class="lloc_incidencia" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['lloc_incidencia']?> </a></td>
                                                            <td><a href="#" class="breu_descripcio" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['breu_descripcio']?> </a></td>
                                                            <td><a> <?php echo $row['importancia']?> </a></td>
                                                            
                                                        </tr>
                                        <?php
                                                     /*echo "<br> id: ". $row["ID"]. " - Lloc incidencia: ". $row["lloc_incidencia"]. " " . $row["breu_descripcio"] . "<br>";*/
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


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <!--Menu footer-->
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

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <!--<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>-->
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