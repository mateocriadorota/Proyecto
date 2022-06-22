    <?php
include("conexion.php");

$id =$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$foto=$_POST['foto'];
$stock=(int)$_POST['stock'];

$query=mysqli_query($conexion,"UPDATE inventario SET    nombre='$nombre',
                                                        descripcion='$descripcion', 
                                                        precio='$precio',
                                                        foto = '$foto',
                                                        stock ='$stock' WHERE id='$id'");

    if($query){
        Header("Location:admin.php");
    }
?>