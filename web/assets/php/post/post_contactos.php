<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
#Declaramos las variables del formulario
$nombre = $_POST['nombre'];
$ID_sede = $_POST['select_box_id_sede'];
$cargo = $_POST['cargo'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$pais = $_POST['select_box_pais'];
$extension = $_POST['extension'];



$prefijo = select_prefijo_paises($pais);


//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
$conn = connect();

$sql = "INSERT INTO CONTACTOS (nombre, ID_sede, cargo, email, telefono, pais, prefijo, extension)
VALUES ('$nombre', '$ID_sede', '$cargo', '$email', '$telefono', '$pais', $prefijo, $extension)";
    


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