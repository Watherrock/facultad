<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Formulario de alta de alumnos</title>
</head>
<body>
	<h1>Formulario de alta de alumnos</h1>
	<p>Favor ingresar los siguientes datos para regsitrar a los alumnos</p>
	<form action="./alta_alumno.php" method="post">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre"><br />
		<label for="apaterno">Apellido paterno</label>
		<input type="text" name="apaterno"><br />
		<label for="amaterno">Apellido materno</label>
		<input type="text" name="amaterno"><br />
		<label for="telefono">Teléfono</label>
		<input type="text" name="telefono"><br />
		<label for="correoe">Correo electrónico</label>
		<input type="email" name="correoe"><br />
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
