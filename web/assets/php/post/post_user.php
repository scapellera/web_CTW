    <!doctype html>

<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>
    <meta charset="UTF-8">

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

<div class="wrapper">
    <div class="sidebar">

    

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="../../../index.php"><img src="../../img/ctw_logo.gif" alt="CTW Logo"></a>
                 
            </div>

            <ul class="nav">
                <li>
                    <a href="../../../index.php">
                        <i class="pe-7s-pen"></i>
                        <p>PÁGINA INICIO</p>
                    </a>
                </li>
                <li >
                    <a href="../../../insert/insert_clientes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li>
                    <a href="../../../insert/insert_sedes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Sedes</p>
                    </a>
                </li>
                <li>
                    <a href="../../../insert/insert_contactos.php">
                        <i class="pe-7s-pen"></i>
                        <p>Contactos</p>
                    </a>
                </li>
                <li>
                    <a href="../../../insert/insert_mayoristas.php">
                        <i class="pe-7s-pen"></i>
                        <p>Mayoristas</p>
                    </a>
                </li>
                <li  class="active">
                    <a href="../../../insert/insert_usuarios.php">
                        <i class="pe-7s-pen"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li>
                    <a href="../../../insert/insert_servicios.php">
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
                            <a href="../perfil.php"> <?php echo $_SESSION["username"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                        </li>
                        <li>
                            <a href="/../../../../logout.php">Log out
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
					//Declaramos las variables del formulario
                    $password = $_POST['password'];
					$password1 = $_POST['password1'];
                    $password2 = $_POST['password2'];
                    $password_anterior = $_POST['password_anterior'];
                    $password_length = strlen($password1);
                    $md5password = md5($password1);

                    $passwordantiguo=select_password_user($_SESSION['id_usuario']);

                    if($passwordantiguo==md5($password)) {
                        if ($password1 == $password2) {

                            if ($password_length >= 3) {

                                $conn = connect();
                                $sql = "UPDATE USUARIO SET password = md5('$password1') WHERE  ID_USUARIO = $_SESSION[id_usuario]";

                            } else {

                                echo "Mínimo 8 carácteres";
                            }

                        } else {

                            echo "Las contraseñas no coinciden";
                        }
                    }else{
                        echo "La contraseña antigua no es la correcta";
                    }

					if ($conn->query($sql) === TRUE) {
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
							  progressnum.innerHTML = "Cambiando contraseña...";
							  if (actualprogress==300){
								window.location="../../../user.php";
							  }
							}
						</script>

					<?php
					} else {
					    echo "Error: <br><br>" . $sql . "<br><br><br>" . $conn->error;
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