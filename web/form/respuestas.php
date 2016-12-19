<html>
<head> <title>RESPUESTAS</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="activitat8_1">
<h2> Respuestas formulario</h2>

  <p class="enunciado"</p>
<?php
#Declaramos las variables del formulario
	$v_lloc_incidencia = $_POST['v_lloc_incidencia'];
  $v_breu_descripcio = $_POST['v_breu_descripcio'];
  $v_importancia = $_POST['v_importancia'];
  

				$$servername = "localhost";
                $username = "s2aw08_ctw";
                $password = "25011996s";
                $dbname = "s2aw08_form_ctw";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO formulari (lloc_incidencia, breu_descripcio, importancia)
VALUES ('$v_lloc_incidencia', '$v_breu_descripcio', '$v_importancia')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>
  <div id="botton_right">       
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
  </div>       
      
<div id="link">
<p><a href="form.php">Envia otro formulario</a></p>
</div>
</div>
</body>
</html>
