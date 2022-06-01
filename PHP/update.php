<?php
include("conexion.php");

$id =$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];

$query=mysqli_query($conexion,"UPDATE inventario SET    nombre='$nombre',
                                                        descripcion='$descripcion', 
                                                        precio='$precio' WHERE id='$id'");

    if($query){
        Header("Location:../html/buscar.html");
    }
?>