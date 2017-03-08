    <!doctype html>

<?php
session_start();
include('../../php/db.php');
include('../../php/selects.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>

    <!--INSERTS-->
    <link href="../../css/insert.css" rel="stylesheet" />
    <!--CARGAR BARRA INSERT-->
    <link href="../../css/cargarinsert.css" rel="stylesheet" />

</head>
<body onload="itv = setInterval(prog, 10)">

<div>

					<?php
					//Declaramos las variables del formulario
					$nombre = $_POST['nombre'];
					$descripcion = $_POST['descripcion'];
					$precio = $_POST['precio'];
					$nif_empresa = $_POST['select_box_nif_empresa'];

					//Añadimos comillas a los varchars
					$nombre="\"$nombre\"";
					$descripcion="\"$descripcion\"";
					$nif_empresa="\"$nif_empresa\"";

					//Si hay algun campo opcional no rellenado lo transforma en null
					if($descripcion == "\"\""){
						$descripcion = 'null';
					}if($nif_empresa == "\"\""){
						$nif_empresa = 'null';
					}


					//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
					$conn = connect();

					$sql = "INSERT INTO SERVICIO (nombre, descripcion, precio, NIF_empresa)
					VALUES ($nombre, $descripcion, $precio, $nif_empresa)";
					    


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
							  progressnum.innerHTML = "Añadiendo servicio...";
							  if (actualprogress==300){
								window.location="../../../insert/insert_servicios.php";
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
</body>
</html>

<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>