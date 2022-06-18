<?php
include("conexion.php");

$id =$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio=(int)$_POST['precio'];
$foto=$_POST['foto'];
$stock=(int)$_POST['stock'];




$query= mysqli_query($conexion,"INSERT INTO inventario (nombre, descripcion, precio, foto, stock)VALUES('$nombre','$descripcion',
                                                                                                        '$precio','$foto','$stock')");

if($query){
    Header("Location:admin.php");
} else {
    Header("Location:../html/buscar.html");
}
?>