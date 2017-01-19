<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
#Declaramos las variables del formulario

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$codigo_de_barras = $_POST['codigo_de_barras'];
$nif_mayorista = $_POST['select_box_nif_mayorista'];
$codigo_producto_mayorista = $_POST['codigo_producto_mayorista'];
$numero_de_serie = $_POST['numero_de_serie'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$numero_factura = $_POST['numero_factura'];
$ubicacion = $_POST['ubicacion'];

//Añadimos comillas a los varchars
$nombre="\"$nombre\"";
$descripcion="\"$descripcion\"";
$codigo_de_barras="\"$codigo_de_barras\"";
$nif_mayorista="\"$nif_mayorista\"";
$codigo_producto_mayorista="\"$codigo_producto_mayorista\"";
$numero_de_serie="\"$numero_de_serie\"";
$numero_factura="\"$numero_factura\"";
$ubicacion="\"$ubicacion\"";

//Si hay algun campo opcional no rellenado lo transforma en null
if($nombre == "\"\""){
	$nombre = 'null';
}if($descripcion == "\"\""){
	$descripcion = 'null';
}if($codigo_de_barras == "\"\""){
	$codigo_de_barras = 'null';
}if($nif_mayorista == "\"\""){
	$nif_mayorista = 'null';
}if($codigo_producto_mayorista == "\"\""){
	$codigo_producto_mayorista = 'null';
}if($numero_de_serie == "\"\""){
	$numero_de_serie = 'null';
}if($numero_factura == "\"\""){
	$numero_factura = 'null';
}if($ubicacion == "\"\""){
	$ubicacion = 'null';
}


//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
$conn = connect();

$sql = "INSERT INTO ARTICULO (nombre, descripcion, codigo_de_barras, NIF_mayorista, codigo_producto_mayorista, numero_de_serie, precio, cantidad, numero_factura, ubicacion)
VALUES ($nombre, $descripcion, $codigo_de_barras, $nif_mayorista, $codigo_producto_mayorista, $numero_de_serie, precio, cantidad, $numero_factura, $ubicacion)";
    


if ($conn->query($sql) === TRUE) {
    echo "Nuevo mayorista añadido correctamente! En 5 segudos será redireccionado...";
?>
    <script>
	function redireccionar(){window.location="../../../entrada_stock.php";} 
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