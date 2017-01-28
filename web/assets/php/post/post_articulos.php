<?php
session_start();
include('../db.php');
include('../selects.php');
if($_SESSION["login_done"]==true){
?>



<?php
#Declaramos las variables del formulario
$cont=0;
$suma_cantidad=0;
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$codigo_de_barras = $_POST['codigo_de_barras'];
$codigo_de_barras_update = $codigo_de_barras;
$nif_mayorista = $_POST['select_box_nif_mayorista'];
$codigo_producto_mayorista = $_POST['codigo_producto_mayorista'];
$numero_de_serie = $_POST['numero_de_serie'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$numero_factura = $_POST['numero_factura'];
$ubicacion = $_POST['ubicacion'];

//Añadimos comillas a los varchars
$nombre="\"$nombre\"";
$precio="\"$precio\"";
$descripcion="\"$descripcion\"";
$codigo_de_barras="\"$codigo_de_barras\"";
$nif_mayorista="\"$nif_mayorista\"";
$codigo_producto_mayorista="\"$codigo_producto_mayorista\"";
$numero_de_serie="\"$numero_de_serie\"";
$numero_factura="\"$numero_factura\"";
$ubicacion="\"$ubicacion\"";

//Si hay algun campo opcional no rellenado lo transforma en null
if($descripcion == "\"\""){
	$descripcion = 'null';
}if($codigo_producto_mayorista == "\"\""){
	$codigo_producto_mayorista = 'null';
}if($ubicacion == "\"\""){
	$ubicacion = 'null';
}


//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
$conn = connect();

$sql = "INSERT INTO ARTICULO (nombre, descripcion, codigo_de_barras, NIF_mayorista, codigo_producto_mayorista, numero_de_serie, precio, cantidad, numero_factura, ubicacion)
VALUES ($nombre, $descripcion, $codigo_de_barras, $nif_mayorista, $codigo_producto_mayorista, $numero_de_serie, $precio, $cantidad, $numero_factura, $ubicacion)";
    


if ($conn->query($sql) === TRUE) {

	echo "Nuevo artíulo añadido correctamente! En 5 segudos será redireccionado... <br>";
	

	$data = select_all_stock();

		if ($data->num_rows > 0) {
            // output data of each row
            while($row = $data->fetch_assoc()) {
            	
            	if($row['CODIGO_DE_BARRAS']==$codigo_de_barras_update){
            		
            		$cont=$cont+1;
            		$suma_cantidad= $row['cantidad_total'] + $cantidad;
            	}
      
            
     
           }       
        }

        if($cont==0){

        	$sql2 = "INSERT INTO STOCK (CODIGO_DE_BARRAS, cantidad_total)
			VALUES ($codigo_de_barras, $cantidad)";

        }else{

        	$sql2 = "UPDATE STOCK SET cantidad_total = $suma_cantidad  WHERE  CODIGO_DE_BARRAS = $codigo_de_barras";

        }
        	if ($conn->query($sql2) === TRUE) {
        		echo "Stock modificado";

            }else{
        	echo "Error en Stock: <br><br>" . $sql . "<br><br><br>" . $conn->error;

    		}

?>
    <script>
	function redireccionar(){window.location="../../../entrada_stock.php";} 
	setTimeout ("redireccionar()", 5000);
	</script>

<?php
} else {
    echo "Error en artíulo: <br><br>" . $sql . "<br><br><br>" . $conn->error;
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