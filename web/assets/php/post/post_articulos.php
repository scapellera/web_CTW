<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
#Declaramos las variables del formulario

$nif_empresa = $_POST['nif_mayorista'];
$nombre_empresa = $_POST['nombre_empresa'];
$nombre_comercial = $_POST['nombre_comercial'];
$telefono_empresa = $_POST['telefono_empresa'];
$telefono_comercial = $_POST['telefono_comercial'];
$extension_telefono_comercial = $_POST['extension_telefono_comercial'];
$email_empresa = $_POST['email_empresa'];
$email_comercial = $_POST['email_comercial'];
$pais = $_POST['select_box_pais'];



$prefijo = select_prefijo_pais($pais);


//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
$conn = connect();

$sql = "INSERT INTO MAYORISTA (NIF_MAYORISTA, nombre_empresa, nombre_comercial, telefono_empresa, telefono_comercial, extension_telefono_comercial, email_empresa, email_comercial, pais, prefijo)
VALUES ('$nif_mayorista', '$nombre_empresa', '$nombre_comercial', $telefono_empresa, $telefono_comercial, $extension_telefono_comercial, '$email_empresa', '$email_comercial', '$pais', $prefijo)";
    


if ($conn->query($sql) === TRUE) {
    echo "Nuevo mayorista añadido correctamente! En 5 segudos será redireccionado...";
?>
    <script>
	function redireccionar(){window.location="../../../insert/insert_mayoristas.php";} 
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