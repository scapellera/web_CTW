<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
//Declaramos las variables del formulario
$nombre = $_POST['nombre'];
$user = $_POST['user'];
$password = $_POST['password'];

//Añadimos comillas a los varchars
$nombre="\"$nombre\"";
$user="\"$user\"";
$password="\"$password\"";


//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
$conn = connect();

$sql = "INSERT INTO USUARIO (nombre, user, password)
VALUES ($nombre, $user, MD5($password))";
/*
//Encriptar clave MD5
$sql ="UPDATE USUARIO
SET password = MD5($password)
WHERE user = $user";
*/ 

if ($conn->query($sql) === TRUE) {
    echo "Nuevo usuario añadido correctamente! En 5 segudos será redireccionado...";
?>
    <script>
	function redireccionar(){window.location="../../../insert/insert_usuarios.php";} 
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