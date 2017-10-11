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
					$nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $email = $_POST['email'];
                    $telefono = $_POST['telefono'];
					$user = $_POST['user'];
					$password = $_POST['password'];
                    $activo = $_POST['activo'];
                    $rol = $_POST['select_box_rol'];

                    if($activo==''){
                        $activo2 = 0;
                    }else{
                        $activo2 = 1;
                    }

					//Añadimos comillas a los varchars
					$apellido="\"$apellido\"";
                    $email="\"$email\"";
                    $telefono="\"$telefono\"";
                    $nombre="\"$nombre\"";
					$user="\"$user\"";
					$password="\"$password\"";


					//Conectamos con la base de datos, hacemos los inserts y cerramos conexion.
					$conn = connect();

					$sql = "INSERT INTO USUARIO (nombre, apellido, correo, telefono, user, password, rol, activo)
					VALUES ($nombre, $apellido, $email, $telefono, $user, MD5($password), $rol, $activo2)";


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
							  progressnum.innerHTML = "Añadiendo usuario...";
							  if (actualprogress==300){
								window.location="../../../insert/insert_usuarios.php";
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