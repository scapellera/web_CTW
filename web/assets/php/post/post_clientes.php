    <!doctype html>

<?php
session_start();
include('../../php/db.php');
include('../../php/selects.php');
if($_SESSION["login_done"]==true){
?>
<html lang="en">
<head>

    <!--INSERTS-->
    <link href="../../css/insert.css" rel="stylesheet" />
    <!--CARGAR BARRA INSERT-->
    <link href="../../css/cargarinsert.css" rel="stylesheet" />

</head>
<body onload="itv = setInterval(prog, 10)">

<div>

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
					$sepa = $_POST['select_box_sepa'];
					$pais = $_POST['select_box_pais'];
                    $activo = 1;



					$prefijo = select_prefijo_pais($pais);


					//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
					$conn = connect();

					$sql = "INSERT INTO CLIENTE (NIF_EMPRESA, nombre_comercial, nombre_completo, telefono, email, ciudad_facturacion, codigo_postal_facturacion, calle_facturacion, numero_facturacion, ciudad_envio, codigo_postal_envio, calle_envio, numero_envio, IBAN, SEPA, pais, prefijo, activo)
					VALUES ('$nif_empresa', '$nombre_comercial', '$nombre_completo', $telefono, '$email', '$ciudad_facturacion', '$codigo_postal_facturacion', '$calle_facturacion', '$numero_facturacion', '$ciudad_envio', '$codigo_postal_envio', '$calle_envio', '$numero_envio', '$iban', '$sepa', '$pais', $prefijo, $activo)";
					    


					if ($conn->query($sql) === TRUE) {
					?>
						
						<div id="precargador">
						  <p id="progressnum"></p> 
						  <div id="progressbar">
						     <div id="indicador"></div>
						  </div>
					</div>
						
					    <script>
					    //document.body.style.background = "#ea7f33";
					    var maxprogress = 300;
							var actualprogress = 0;
							var itv = 0;
							function prog()
							{
							  if(actualprogress >= maxprogress) 
							  {
							    clearInterval(itv);     
							    return;
							  } 
							  var progressnum = document.getElementById("progressnum");
							  var indicador = document.getElementById("indicador");
							  actualprogress +=2;  
							  indicador.style.width=actualprogress + "px";
							  progressnum.innerHTML = "Añadiendo cliente...";
							  if (actualprogress==300){
								window.location="../../../insert/insert_clientes.php";
							  }
							}
						</script>

					<?php
					} else {
					    echo "Error: <br><br>" . $sql . "<br><br><br>" . $conn->error;
					}

					close($conn); 
					 
					?>

</div>

</body>
</html>

<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>