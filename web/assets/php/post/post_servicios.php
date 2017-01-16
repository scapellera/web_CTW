<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



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
    echo "Nuevo servicio añadido correctamente! En 5 segudos será redireccionado...";
?>
    <script>
	function redireccionar(){window.location="../../../insert/insert_servicios.php";} 
	setTimeout ("redireccionar()", 5000);
	</script>

<?php
} else {
    echo "Error: <br><br>" . $sql . "<br><br><br>" . $conn->error;
}

close($conn); 
 
?>


</body>
</html>

<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>