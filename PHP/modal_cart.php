<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/f7449501b4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<title>Document</title>
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
	<?php 
		if(isset($_SESSION['carrito'])){
			$carrito_mio=$_SESSION['carrito'];
			$total = 0;
	?>
	<div id="contenedorPrimal">
		<div class="contenedorModal">
			<div class="contenedorTabla">
				<table class="table-fill">
					<thead class="Title">
						<tr>
							<th>foto</th>
							<th>nombre</th>
							<th>precio</th>
							<th>Total</th>
						</tr>
					</thead>
				<?php for($i=0;$i<=count($carrito_mio)-1;$i ++){ ?>
					<tbody class="DATOS">
						<tr>
							<td><img class="imgModal" src="<?=$carrito_mio[$i]['foto']?>" alt=""></td>
			              	<td><p><?=$carrito_mio[$i]['nombre']?></p></td>
			              	<td><p><?=$carrito_mio[$i]['precio']?></p></td>
			             	<?php $total = $total + $carrito_mio[$i]['precio'] ?>
			             	<td><?=$total?></td>
		             	</tr>
					</tbody>
				<?php } ?>
					</table>
				</div>
			<div class="contenedorBotones">
				<a href="confirmar_pedido.php">
					<p>Confirmar Pedido</p><i class="fa-solid fa-clipboard-check"></i>
				</a>
				<a href="borrar_carrito.php">
					<P>Borrar Carrito</P><i class="fa-regular fa-trash-can"></i>
				</a>
			</div>
		</div>
	</div>
	<?php 
		}else{
			header("Location: ".$_SERVER['HTTP_REFERER']."");
		} ?>
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