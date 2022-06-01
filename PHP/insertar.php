<?php
include("conexion.php");

$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio=(int)$_POST['precio'];



$query= mysqli_query($conexion,"INSERT INTO inventario (nombre, descripcion, precio)VALUES('$nombre','$descripcion','$precio')");

if($query){
    Header("Location:../html/buscar.html");
} else {
    Header("Location:../html/buscar.html");
}
?>