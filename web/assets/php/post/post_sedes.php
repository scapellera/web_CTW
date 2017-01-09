<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
#Declaramos las variables del formulario

$NIF_cliente = $_POST['select_box_nif_empresa'];
$nombre = $_POST['nombre'];
$ciudad = $_POST['ciudad'];
$codigo_postal = $_POST['codigo_postal'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$ubicacion = $_POST['ubicacion'];
$telefono = $_POST['telefono'];
$pais = $_POST['select_box_pais'];



$prefijo = select_prefijo_paises($pais);


//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
$conn = connect();

$sql = "INSERT INTO SEDES (NIF_cliente, nombre, ubicacion, ciudad, codigo_postal, calle, numero, telefono, pais, prefijo)
VALUES ('$NIF_cliente', '$nombre', '$ubicacion', '$ciudad', '$codigo_postal', '$calle', '$numero', $telefono, '$pais', $prefijo)";
    


if ($conn->query($sql) === TRUE) {
    echo "Nuevo cliente añadido correctamente! En 5 segudos será redireccionado...";
?>
    <script>
	function redireccionar(){window.location="../../../insert/insert_sedes.php";} 
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