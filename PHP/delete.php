<?php

include("conexion.php");

$id=$_GET['id'];

$query=mysqli_query($conexion,"DELETE FROM inventario WHERE id='$id'");

    if($query){
        Header("Location:../html/buscar.html");
    }
?>