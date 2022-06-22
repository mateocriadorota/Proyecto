<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<script src="https://kit.fontawesome.com/f7449501b4.js" crossorigin="anonymous"></script>
	<title>MCR</title>
</head>
<body>
	<?php 
	if(isset($_SESSION['carrito'])){
	$carrito_mio=$_SESSION['carrito'];
	// $_SESSION['carrito']=$carrito_mio;
	}
	// contamos nuestro carrito
	if(isset($_SESSION['carrito'])){
	    for($i=0;$i<=count($carrito_mio)-1;$i ++){
	        if(isset($carrito_mio[$i])){
	        if($carrito_mio[$i]!=NULL){ 
	        if(!isset($carrito_mio['cantidad'])){$carrito_mio['cantidad'] = '0';}else{ $carrito_mio['cantidad'] = $carrito_mio['cantidad'];}
	        $total_cantidad = $carrito_mio['cantidad'];
	    $total_cantidad ++ ;
	    if(!isset($totalcantidad)){$totalcantidad = '0';}else{ $totalcantidad = $totalcantidad;}
	    $totalcantidad += $total_cantidad;
	    }}}
	}

	    //declaramos variables
	     if(!isset($totalcantidad)){$totalcantidad = '';}else{ $totalcantidad = $totalcantidad;}
?>
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
				<li>
					<a href="modal_cart.php" class="cart">
						<i class="fa-solid fa-cart-shopping"></i><span class="cant"><?=$totalcantidad?></span>
					</a>
				</li>
			</ul>
		</nav>
	</header>
	<div id="contenedorPrimal">
		<form method="post" action="" class="form_buscar">
			
			<input type="text" class="infoBuscador" name="dato" placeholder="Nombre de articulo">
			<input type="submit" name="boton" id="btn">
		</form>
		<?php 
			include('conexion.php');
			$consulta = mysqli_query($conexion, "SELECT * FROM inventario");
		?>
		
		<?php if(isset($_POST['dato'])){ ?>
			<?php 
				$dato = $_POST["dato"];
				$query = mysqli_query($conexion, "SELECT * FROM inventario WHERE nombre LIKE '%$dato%' OR
																				 descripcion LIKE '%$dato%' OR
																				 precio LIKE '%$dato%'");
				$resultado=mysqli_num_rows($query);
			?>
					<?php if($resultado == 0){ ?>
						<! -- SI EL DATO NO EXISTE MUESTRO TODO -->
						<h1>EL DATO NO EXISTE</h1>
						<div class="contenedortienda">
							<?php while($row=mysqli_fetch_array($consulta)){ ?>
								<?php if($row['stock']>0){ ?>
									<div class="contenedorART">
										<form action="cart.php" method="post">
											<div class="Contenedorimagen">
												<img class="imagen" src="<?=$row['foto']?>" alt="Foto de <?=$row['nombre']?>">
											</div>
											<div class="contenedorDatos">
												<h4 class="infoTienda"><?php echo $row['nombre']?></h4>
						                        <p class="infoTienda"><?php echo $row['descripcion']?></p>
						                        <p class="infoTienda"><?php echo "$".$row['precio']?></p>
						                        <input type="hidden" value="<?=$row['foto']?>" 	 name="foto">
						                        <input type="hidden" value="<?=$row['nombre']?>" name="nombre">
						                        <input type="hidden" value="<?=$row['precio']?>" name="precio">
						                        <input type="hidden" value="1" name="cantidad">
						                        <input type="hidden" value="<?=$row['id']?>" name="id">
				                        		<input type="submit" name="EnviarCarrito" class="EnviarCarrito">
											</div>
					                    </form>
					                </div>
				               <?php } ?>
							<?php } ?>	
						</div>
					<?php }else{ ?>
						<! -- DATOS SOLICITADOS -->
						<div class="contenedortienda">
							<?php while($row=mysqli_fetch_array($consulta)){ ?>
								<?php if($row['stock']>0){ ?>
									<div class="contenedorART">
										<form action="cart.php" method="post">
											<div class="Contenedorimagen">
												<img class="imagen" src="<?=$row['foto']?>" alt="Foto de <?=$row['nombre']?>">
											</div>
											<div class="contenedorDatos">
												<h4 class="infoTienda"><?php echo $row['nombre']?></h4>
						                        <p class="infoTienda"><?php echo $row['descripcion']?></p>
						                        <p class="infoTienda"><?php echo "$".$row['precio']?></p>
						                        <input type="hidden" value="<?=$row['foto']?>" 	 name="foto">
						                        <input type="hidden" value="<?=$row['nombre']?>" name="nombre">
						                        <input type="hidden" value="<?=$row['precio']?>" name="precio">
						                        <input type="hidden" value="<?=$row['id']?>" name="id">
						                        <input type="hidden" value="1" name="cantidad">
				                        		<input type="submit" name="EnviarCarrito"class="EnviarCarrito">
											</div>
					                    </form>
					                </div>
				               <?php } ?>
							<?php } ?>	
						</div>
					<?php } ?>
				<?php }else{ ?>
					<! -- FORMULARIO DATO COMPLETO -->
		             <div class="contenedortienda">
							<?php while($row=mysqli_fetch_array($consulta)){ ?>
								<?php if($row['stock']>0){ ?>
									<div class="contenedorART">
										<form action="cart.php" method="post">
											<div class="Contenedorimagen">
												<img class="imagen" src="<?=$row['foto']?>" alt="Foto de <?=$row['nombre']?>">
											</div>
											<div class="contenedorDatos">
												<h4 class="infoTienda"><?php echo $row['nombre']?></h4>
						                        <p class="infoTienda"><?php echo $row['descripcion']?></p>
						                        <p class="infoTienda"><?php echo "$".$row['precio']?></p>
						                        <input type="hidden" value="<?=$row['foto']?>" 	 name="foto">
						                        <input type="hidden" value="<?=$row['nombre']?>" name="nombre">
						                        <input type="hidden" value="<?=$row['precio']?>" name="precio">
						                        <input type="hidden" value="1" name="cantidad">
						                        <input type="hidden" value="<?=$row['id']?>" name="id">
				                        		<input type="submit" name="EnviarCarrito"class="EnviarCarrito">
											</div>
					                    </form>
					                </div>
				               <?php } ?>
							<?php } ?>	
						</div>
					<?php } ?>
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