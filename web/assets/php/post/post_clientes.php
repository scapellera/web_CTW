<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
#Declaramos las variables del formulario

$nif_empresa = $_POST['nif_empresa'];
$nombre_comercial = $_POST['nombre_comercial'];
$nombre_completo = $_POST['nombre_completo'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$ciudad_facturacion = $_POST['ciudad_facturacion'];
$codigo_postal_facturacion = $_POST['codigo_postal_facturacion'];
$calle_facturacion = $_POST['calle_facturacion'];
$numero_facturacion = $_POST['numero_facturacion'];
$ciudad_envio = $_POST['ciudad_envio'];
$codigo_postal_envio = $_POST['codigo_postal_envio'];
$calle_envio = $_POST['calle_envio'];
$numero_envio = $_POST['numero_envio'];
$iban = $_POST['iban'];
$sepa = $_POST['sepa'];
$pais = $_POST['select_box_pais'];



$prefijo = select_prefijo_pais($pais);


//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
$conn = connect();

$sql = "INSERT INTO CLIENTE (NIF_EMPRESA, nombre_comercial, nombre_completo, telefono, email, ciudad_facturacion, codigo_postal_facturacion, calle_facturacion, numero_facturacion, ciudad_envio, codigo_postal_envio, calle_envio, numero_envio, IBAN, SEPA, pais, prefijo)
VALUES ('$nif_empresa', '$nombre_comercial', '$nombre_completo', $telefono, '$email', '$ciudad_facturacion', '$codigo_postal_facturacion', '$calle_facturacion', '$numero_facturacion', '$ciudad_envio', '$codigo_postal_envio', '$calle_envio', '$numero_envio', '$iban', $sepa, '$pais', $prefijo)";
    


if ($conn->query($sql) === TRUE) {
    echo "Nuevo cliente añadido correctamente! En 5 segudos será redireccionado...";
?>
    <script>
	function redireccionar(){window.location="../../../insert/insert_clientes.php";} 
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