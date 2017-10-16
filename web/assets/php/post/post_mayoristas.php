    <!doctype html>

<?php
session_start();
include('../../php/db.php');
include('../../php/selects.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>
    <meta charset="UTF-8">

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
					$IBAN = $_POST['IBAN'];


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
					$IBAN="\"$IBAN\"";


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
                    }if($IBAN == "\"\""){
						$IBAN ='null';
					}if($email_empresa == "\"\""){
                        $email_empresa ='null';
                    }


					//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
					$conn = connect();

					$sql = "INSERT INTO MAYORISTA (NIF_MAYORISTA, nombre_empresa, nombre_comercial, telefono_empresa, telefono_comercial, extension_telefono_comercial, email_empresa, email_comercial, ubicacion, pais, prefijo, IBAN,activo)
					VALUES ($NIF_mayorista, $nombre_empresa, $nombre_comercial, $telefono_empresa, $telefono_comercial, $extension_telefono_comercial, $email_empresa, $email_comercial, $ubicacion, $pais, $prefijo, $IBAN,$activo2)";
					    


					if ($conn->query($sql) === TRUE) {
                        header('Location: ../../../insert.php?ok=altaMayorista');
					} else {
                        header('Location: ../../../insert.php?ok=altaMayorista');
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