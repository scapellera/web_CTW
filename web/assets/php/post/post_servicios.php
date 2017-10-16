    <!doctype html>

<?php
session_start();
include('../../php/db.php');
include('../../php/selects.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>
    <meta charset="UTF-8">

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
                        header('Location: ../../../insert.php?ok=altaServicio');
					} else {
                        header('Location: ../../../insert.php?ok=altaServicio');
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