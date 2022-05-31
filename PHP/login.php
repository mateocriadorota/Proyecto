<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login de Usuarios</title>
</head>

<body>

<?php
$us=$_POST['usuario'];
$password=md5($_POST['contraseña']);

include("conexion.php");

$consulta=mysqli_query($conexion, "SELECT id, nombre, apellido, email, administrador FROM usuarios WHERE usuario='$us' AND contraseña='$password'");

$resultado=mysqli_num_rows($consulta);

if($resultado!=0){
	$respuesta=mysqli_fetch_array($consulta);
	
	if($respuesta['administrador']==1){
		$_SESSION['nombre']=$respuesta['nombre'];
		$_SESSION['apellido']=$respuesta['apellido'];
		header("Location:index_administrador.php");
	}else{
		$_SESSION['nombre']=$respuesta['nombre'];
		$_SESSION['apellido']=$respuesta['apellido'];
		header("Location:index_usuario.php");
	}
	
}else{
	echo "No es un usuario registrado";
	include ("../html/registro_form.html");
}
?>

</body>
</html>