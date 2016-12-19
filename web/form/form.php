
<html>
<head> <title>FORM</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
 <h2> Formulari</h2>
<div id="tot">
	
	<div id="form">
			<p class="enunciado">Rellena todos los campos</p>
			<form action="respuestas.php" method="post">
			<table class="tabla">

				  <tr>
					<td>Lloc de la incidencia: </td>
					<td><input type="text" name="v_lloc_incidencia"></td>
				  </tr>
				  <br>
				  <tr>
					<td>Breu descripcio de la incidencia: </td>
					<td><input type="text" name="v_breu_descripcio"></td>
				  </tr>
				  <tr>
					<td>Importancia de la incidencia: </td>
					<td><input type="text" name="v_importancia"></td>
				  </tr>
				</table>
	<div id="botton_right">			 
		<input  type="submit" value="Enviar">
		<input  type="reset" value="Borrar">
	</div>			 
			</form>
	</div>		
</div>
</body>
</html>





