<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro</title>
</head>

<body>

<?php
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$contraseña = md5($_POST['contraseña']);


	include("conexion.php");

	$_SESSION['nombre'] = $nombre;

	$consulta = mysqli_query($conexion, "INSERT INTO usuarios (nombre, apellido, email, usuario, contraseña) VALUES('$nombre','$apellido','$email', '$usuario', '$contraseña')");


	header("Location:../html/login_form.html");

?>	
    

</body>
</html>