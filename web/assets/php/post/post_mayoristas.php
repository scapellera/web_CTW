<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
//Declaramos las variables del formulario

$NIF_mayorista = $_POST['NIF_mayorista'];
$nombre_empresa = $_POST['nombre_empresa'];
$nombre_comercial = $_POST['nombre_comercial'];
$telefono_empresa = $_POST['telefono_empresa'];
$telefono_comercial = $_POST['telefono_comercial'];
$extension_telefono_comercial = $_POST['extension_telefono_comercial'];
$email_empresa = $_POST['email_empresa'];
$email_comercial = $_POST['email_comercial'];
$pais = $_POST['select_box_pais'];
$prefijo = select_prefijo_pais($pais);


//Añadimos comillas a los varchars
$NIF_mayorista="\"$NIF_mayorista\"";
$nombre_empresa="\"$nombre_empresa\"";
$nombre_comercial="\"$nombre_comercial\"";
$email_empresa="\"$email_empresa\"";
$email_comercial="\"$email_comercial\"";
$pais="\"$pais\"";

//Si hay algun campo opcional no rellenado lo transforma en null
if($nombre_comercial == "\"\""){
	$nombre_comercial = 'null';
}if($telefono_comercial == null){
	$telefono_comercial ='null';
}if($extension_telefono_comercial == null){
	$extension_telefono_comercial ='null';
}if($email_comercial == "\"\""){
	$email_comercial =null;
}


//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
$conn = connect();

$sql = "INSERT INTO MAYORISTA (NIF_MAYORISTA, nombre_empresa, nombre_comercial, telefono_empresa, telefono_comercial, extension_telefono_comercial, email_empresa, email_comercial, pais, prefijo)
VALUES ($NIF_mayorista, $nombre_empresa, $nombre_comercial, $telefono_empresa, $telefono_comercial, $extension_telefono_comercial, $email_empresa, $email_comercial, $pais, $prefijo)";
    


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