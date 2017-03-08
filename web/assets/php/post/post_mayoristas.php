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
					//Declaramos las variables del formulario

					$NIF_mayorista = $_POST['NIF_mayorista'];
					$nombre_empresa = $_POST['nombre_empresa'];
					$nombre_comercial = $_POST['nombre_comercial'];
					$telefono_empresa = $_POST['telefono_empresa'];
					$telefono_comercial = $_POST['telefono_comercial'];
					$extension_telefono_comercial = $_POST['extension_telefono_comercial'];
					$email_empresa = $_POST['email_empresa'];
					$email_comercial = $_POST['email_comercial'];
                    $ubicacion = $_POST['ubicacion'];
					$pais = $_POST['select_box_pais'];
					$prefijo = select_prefijo_pais($pais);
                    $activo = $_POST['activo'];

                    if($activo==''){
                        $activo2 = 0;
                    }else{
                        $activo2 = 1;
                    }                    

					//Añadimos comillas a los varchars
					$NIF_mayorista="\"$NIF_mayorista\"";
					$nombre_empresa="\"$nombre_empresa\"";
					$nombre_comercial="\"$nombre_comercial\"";
					$email_empresa="\"$email_empresa\"";
					$email_comercial="\"$email_comercial\"";
                    $ubicacion="\"$ubicacion\"";
					$pais="\"$pais\"";

					//Si hay algun campo opcional no rellenado lo transforma en null
					if($nombre_comercial == "\"\""){
						$nombre_comercial = 'null';
					}if($telefono_comercial == null){
						$telefono_comercial ='null';
					}if($extension_telefono_comercial == null){
						$extension_telefono_comercial ='null';
					}if($email_comercial == "\"\""){
						$email_comercial ='null';
					}if($ubicacion == "\"\""){
                        $ubicacion ='null';
                    }


					//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
					$conn = connect();

					$sql = "INSERT INTO MAYORISTA (NIF_MAYORISTA, nombre_empresa, nombre_comercial, telefono_empresa, telefono_comercial, extension_telefono_comercial, email_empresa, email_comercial, ubicacion, pais, prefijo, activo)
					VALUES ($NIF_mayorista, $nombre_empresa, $nombre_comercial, $telefono_empresa, $telefono_comercial, $extension_telefono_comercial, $email_empresa, $email_comercial, $ubicacion, $pais, $prefijo, $activo2)";
					    


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
							  progressnum.innerHTML = "Añadiendo mayorista...";
							  if (actualprogress==300){
								window.location="../../../insert/insert_mayoristas.php";
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