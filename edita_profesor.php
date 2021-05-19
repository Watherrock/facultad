<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Formulario de edición de datos de profesores</title>
</head>
<body>
<?php
	//Recibir el valor que viaja en la URL
	$id = $_GET['id'];
	//echo "el id del alumno es: ".$id;
	//	Consulta de los datos de alumno con ese ID, para mostrarlos en el formulario
	$con = pg_connect("host=127.0.0.1 port=5432 dbname=prueba1 user=alumno1 password=hola123.,") or die (pg_last_error());
	if ($con) {
		$query = "select nombre_profesor, apaterno_profesor, amaterno_profesor, correoe_profesor, tel_profesor from profesores where id_profesor='".$id."'";
		$query = pg_query($con, $query);		
		$resultado = pg_fetch_assoc($query);
		print_r($resultado);
	
?>
	<h1>Formulario de edita de profesores</h1>
	<p>Favor ingresar los siguientes datos para editar a los profesores</p>
	<form name="editar" action="./actualiza_profesor.php" method="post">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" value="<?php echo $resultado['nombre_profesor']; ?>"><br />
		<label for="apaterno">Apellido paterno</label>
		<input type="text" name="apaterno" value="<?php echo $resultado['apaterno_profesor']; ?>"><br />
		<label for="amaterno">Apellido materno</label>
		<input type="text" name="amaterno" value="<?php echo $resultado['amaterno_profesor']; ?>"><br />
		<label for="telefono">Teléfono</label>
		<input type="text" name="tel" value="<?php echo $resultado['tel_profesor']; ?>"><br />
		<label for="correoe">Correo electrónico</label>
		<input type="email" name="correoe" value="<?=$resultado['correoe_profesor']; ?>"><br />
		<input type="hidden" name="id" value="<?php echo $id; ?>"><br />
		<input type="submit" value="Enviar">
	</form>
<?php
	}
?>
</body>
</html>
