<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="http://localhost/Proyecto/css/estilos.css">
	<title>MCR</title>
</head>
<body>
	<header>
		<a href="index_administrador.php" class="logo"><img class="logo" src="../imagenes/Logo.jpg"></a>
		<input type="checkbox" id="menu">
		<label for="menu">Menu</label>
		<nav class="NavBar">
			<ul>
				<li class="buscador"> 
					<form method="post" action="" class="form_buscar">
						<input type="text" class="infoBuscador" name="dato" placeholder="Nombre de articulo">
							<input type="submit" name="boton" id="btn">
					</form>
				</li>
				<li> <a href="">About</a></li>
				<li> <a href="shop.php">Shop</a></li>
				<li> <a href="">Contact</a></li>
				<li> <a href="admin.php">Manage</a></li>
				<li class="nom"><?php echo "<p>Hola ".$_SESSION['nombre']." ".$_SESSION['apellido']."</p>";?></li>
			</ul>
		</nav>
	</header>
	<div id="contenedorPrimal">
				<?php 
			include('conexion.php');
			$consulta = mysqli_query($conexion, "SELECT * FROM inventario");
		?>
		
		<?php if(isset($_POST['dato'])){ ?>
			<?php 
				$dato = $_POST["dato"];
				$query = mysqli_query($conexion, "SELECT * FROM inventario WHERE nombre LIKE '%$dato%' OR
																				 id 	LIKE '%$dato%' OR
																				 precio LIKE '%$dato%'");
				$resultado=mysqli_num_rows($query);
			?>
					<?php if($resultado == 0){ ?>
						<! -- SI EL DATO NO EXISTE MUESTRO TODO -->
							<h1>EL DATO NO EXISTE</h1>
							<div class="contenedortienda">
								<?php while($row=mysqli_fetch_array($consulta)){ ?>
									<div class="contenedorART">
										<div id="<?=$row['id']?>">
											<div class="Contenedorimagen">
												<img class="imagen" src="<?=$row['foto']?>" alt="Foto de <?=$row['nombre']?>">
											</div>
					                        <p><?php echo $row['nombre']?></p>
					                        <p><?php echo $row['descripcion']?></p>
					                        <p><?php echo $row['precio']?></p>
					                        <p><?php echo $row['stock']?></p>
					                    </div>
					                </div>
								<?php } ?>	
							</div>
					<?php }else{ ?>
							<! -- DATOS SOLICITADOS -->
							<div class="contenedortienda">
								<?php while($row=mysqli_fetch_array($query)){ ?>
									<div class="contenedorART">
										<div id="<?=$row['id']?>">
											<div class="Contenedorimagen">
												<img class="imagen" src="<?=$row['foto']?>" alt="Foto de <?=$row['nombre']?>">
											</div>
					                        <p><?php echo $row['nombre']?></p>
					                        <p><?php echo $row['descripcion']?></p>
					                        <p><?php echo $row['precio']?></p>
					                        <p><?php echo $row['stock']?></p>
					                    </div>
					                </div>
								<?php } ?>	
							</div>
					<?php } ?>
				<?php }else{ ?>
					<! -- FORMULARIO DATO COMPLETO -->
		             <div class="contenedortienda">
						<?php while($row=mysqli_fetch_array($consulta)){ ?>
							<div class="contenedorART">
								<img class="imagen" src="<?=$row['foto']?>" alt="Foto de <?=$row['nombre']?>">
		                        <p><?php echo $row['nombre']?></p>
		                        <p><?php echo $row['descripcion']?></p>
		                        <p><?php echo $row['precio']?></p>
		                        <p><?php echo $row['stock']?></p>
			                </div>
			               <?php } ?>	
					<?php } ?>
				</div>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>
				<p>A</p>

	</div>
	<footer>
        <img class="logo" src="../imagenes/Logo.jpg" alt="LogoMCR">
        <div class="contenedorRedes">
        	<a href="" class="iconoRedSocial"><img class="logored" src="../imagenes/instagram.png" alt="logoInstagram"></a>
        	<a href="" class="iconoRedSocial"><img class="logored" src="../imagenes/facebook.png" alt="logofacebook"></a>
        	<a href="" class="iconoRedSocial"><img class="logored" src="../imagenes/github.png" alt="logoGithub"></a>
        	<a href="" class="iconoRedSocial"><img class="logored" src="../imagenes/linkedin.png" alt="logolinkedin"></a>
        	
        </div>
        <ul class="contenedorMenu">
    		<li class="MenuItem"> <a href="index_administrador.php">Home</a></li>
			<li class="MenuItem"> <a href="">About</a></li>
			<li class="MenuItem"> <a href="shop.php">Shop</a></li>
			<li class="MenuItem"> <a href="">Contact</a></li>
        </ul>
    </footer>
</body>
</html>