<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
#Declaramos las variables del formulario
$NIF_cliente = $_POST['select_box_nif_empresa'];
$sede = $_POST['select_box_sede_cliente'];
$servicio = $_POST['select_box_servicio'];
$usuario = $_POST['select_box_usuario'];
$fecha = $_POST['fecha'];
$horas = $_POST['horas'];
$facturado = $_POST['facturado'];

if($facturado==''){
	$facturado2 = false;
}else{
	$facturado2 = true;
}
$conn = connect();
$data = select_id_sede($sede);

//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.


$sql = "INSERT INTO MINUTAJE (fecha, horas, ID_servicio, ID_usuario, ID_sede, NIF_cliente, facturado)
VALUES ('$fecha','$horas','$servicio','$usuario','$data','$NIF_cliente',$facturado2)";	


if ($conn->query($sql) === TRUE) {
    echo "Nuevo minutaje añadido correctamente! En 5 segudos será redireccionado...";
?>
    <script>
	function redireccionar(){window.location="../../../minutaje.php";} 
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