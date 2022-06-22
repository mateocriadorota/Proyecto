<?php 
    include("conexion.php");
    session_start();
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
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <title>Actualizar</title>
    </head>
    <body>
        <header>
        <a href="index_administrador.php" class="logo"><img class="logo" src="../imagenes/logo.jpg"></a>
        <input type="checkbox" id="menu">
        <label for="menu">Menu</label>  
        <nav class="NavBar">
            <ul>
                
                <li> <a href="about.php">About</a></li>
                <li> <a href="shop.php">Shop</a></li>
                <li> <a href="contacto.php">Contact</a></li>
                <?php if($_SESSION['administrador']==1){?>
                    <li> <a href="admin.php">Manage</a></li>
                <?php } ?>
                <li class="nom"><?php echo "<p>Hola ".$_SESSION['nombre']." ".$_SESSION['apellido']."</p>";?></li>
            </ul>
        </nav>
        </header>
        <div class="contenedorPrimal">
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <input type="text" class="info" name="nombre" placeholder="Nombre" value="<?= $row['nombre'] ?>">
                <input type="text" class="info" name="descripcion" placeholder="Descripcion" value="<?= $row['descripcion'] ?>">
                <input type="text" class="info" name="precio" placeholder="Precio" value="<?= $row['precio'] ?>">
                <input type="text" class="info" name="foto" placeholder="URL foto" value="<?= $row['foto'] ?>">
                <input type="text" class="info" name="stock" placeholder="Numero de articulos" pattern="[0-9]+" value="<?= $row['stock'] ?>">
                <input type="submit" class="btn_update" value="Actualizar">
            </form>
        </div>

        <div class="contenedorFooter">
            <footer id="pieDePag">
            <img class="logo" src="../imagenes/logo - copia.jpg" alt="LogoMCR">
            <div class="contenedorRedes">
                <a href="https://www.instagram.com/mateo.criado_rota/" class="iconoRedSocial">
                    <img class="logored" src="../imagenes/instagram.png" alt="logoInstagram">
                </a>
                <a href="https://www.facebook.com/mateo.criadorota.9" class="iconoRedSocial">
                    <img class="logored" src="../imagenes/facebook.png" alt="logofacebook">
                </a>
                <a href="https://github.com/mateocriadorota?tab=repositories" class="iconoRedSocial">
                    <img class="logored" src="../imagenes/github.png" alt="logoGithub">
                </a>
                <a href="https://www.linkedin.com/in/mateo-criado-rota-848465234/" class="iconoRedSocial">
                    <img class="logored" src="../imagenes/linkedin.png" alt="logolinkedin">
                </a>
            </div>
            <ul class="contenedorMenu">
                <?php if($_SESSION['administrador']==1){?>
                        <li class="MenuItem"> <a href="index_administrador.php">Home</a></li>
                <?php }else{ ?>
                    <li class="MenuItem"> <a href="index_usuario.php">Home</a></li>
                <?php } ?>
                <li class="MenuItem"> <a href="about.php">About</a></li>
                <li class="MenuItem"> <a href="shop.php">Shop</a></li>
                <li class="MenuItem"> <a href="contacto.php">Contact</a></li>
            </ul>
        </footer>
    </div>


    </body>
</html>