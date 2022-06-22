<?php
	session_start();
	include("conexion.php");
	if(isset($_SESSION['carrito'])){
		$carrito_mio=$_SESSION['carrito'];
		
		for($i=0;$i<=count($carrito_mio)-1;$i++){
			$id = (int)$carrito_mio[$i]['id'];
			mysqli_query($conexion,"UPDATE inventario SET stock= stock-1 WHERE id='$id'");
		}
		include("borrar_carrito.php");
	}
?>