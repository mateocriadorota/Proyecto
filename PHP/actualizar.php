<?php 
    include("conexion.php");

$id=$_GET['id'];

$query=mysqli_query($conexion,"SELECT * FROM inventario WHERE id='$id'");

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualizar</title>
    </head>
    <body>
        <div class="contenedor_update">
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <input type="text" class="info" name="nombre" placeholder="Nombre" value="<?= $row['nombre'] ?>">
                <input type="text" class="info" name="descripcion" placeholder="descripcion" value="<?= $row['descripcion'] ?>">
                <input type="text" class="info" name="precio" placeholder="precio" value="<?= $row['precio'] ?>">
                        
                <input type="submit" class="btn_update" value="Actualizar">
            </form>

        </div>
    </body>
</html>