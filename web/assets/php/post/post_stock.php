<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
#Declaramos las variables del formulario

$codigo_de_barras = $_POST['codigo_de_barras'];
$cantidad_total = $_POST['cantidad_total'];



$prefijo = select_prefijo_pais($pais);


//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
$conn = connect();

$sql = "INSERT INTO STOCK (CODIGO_DE_BARRAS, cantidad_total)
VALUES ('$codigo_de_barras',$cantidad_total)";
    


if ($conn->query($sql) === TRUE) {
    echo "Nuevo mayorista añadido correctamente! En 5 segudos será redireccionado...";
?>
    <script>
	function redireccionar(){window.location="../../../insert/insert_stock.php";} 
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