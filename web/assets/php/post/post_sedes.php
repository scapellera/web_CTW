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

					$NIF_cliente = $_POST['select_box_nif_empresa'];
					$nombre = $_POST['nombre'];
					$ciudad = $_POST['ciudad'];
					$codigo_postal = $_POST['codigo_postal'];
					$calle = $_POST['calle'];
					$numero = $_POST['numero'];
					$ubicacion = $_POST['ubicacion'];
					$telefono = $_POST['telefono'];
					$pais = $_POST['select_box_pais'];
                    $activo = $_POST['activo'];
                    
                    

                    if($activo==''){
                        $activo2 = 0;
                    }else{
                        $activo2 = 1;
                    }


					$prefijo = select_prefijo_pais($pais);


					//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
					$conn = connect();

					$sql = "INSERT INTO SEDE (NIF_cliente, nombre, ubicacion, ciudad, codigo_postal, calle, numero, telefono, pais, prefijo, activo)
					VALUES ('$NIF_cliente', '$nombre', '$ubicacion', '$ciudad', '$codigo_postal', '$calle', '$numero', $telefono, '$pais', $prefijo, $activo2)";
					    


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
							  progressnum.innerHTML = "Añadiendo sede...";
							  if (actualprogress==300){
								window.location="../../../insert/insert_sedes.php";
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