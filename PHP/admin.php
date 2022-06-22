<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<title>Buscar</title>
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
																				 id 	LIKE '%$dato%' OR
																				 precio LIKE '%$dato%'");
				$resultado=mysqli_num_rows($query);
			?>
				<?php if($resultado == 0){ ?>
					<! -- SI EL DATO NO EXISTE MUESTRO TODO -->
						<h1>EL DATO NO EXISTE</h1>
						<div class="contenedorTabla">
							<table class="table-fill">
								<thead class="Title">
									<tr>
										<th>ID</th>
										<th>Producto</th>
										<th>Descripcion</th>
										<th>Precio</th>
										<th>Stock</th>
										<th></th>
										<th></th>
									</tr>
								</thead>

								<tbody class="Datos">
									<?php while($row=mysqli_fetch_array($consulta)){ ?>
									<tr>
										<td><?php echo $row['id']?></td>
				                        <td><?php echo $row['nombre']?></td>
				                        <td><?php echo $row['descripcion']?></td>
				                        <td><?php echo $row['precio']?></td>
				                        <td><?php echo $row['stock']?></td>
				                        <td><a href="actualizar.php?id=<?= $row['id'] ?>" class="btn_update">Editar</a></td>
										<td><a href="delete.php?id=<?= $row['id'] ?>" class="btn-drop">Eliminar</a></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
				<?php }else{ ?>
						<! -- DATOS SOLICITADOS -->
						

						<div class="contenedorTabla">
							<table class="table-fill">
								<thead class="Title">
									<tr>
										<th>ID</th>
										<th>Producto</th>
										<th>Descripcion</th>
										<th>Precio</th>
										<th>Stock</th>
										<th></th>
										<th></th>
									</tr>
								</thead>

								<tbody class="Datos">
									<?php while($row=mysqli_fetch_array($query)){ ?>
									<tr>
										<td><?php echo $row['id']?></td>
				                        <td><?php echo $row['nombre']?></td>
				                        <td><?php echo $row['descripcion']?></td>
				                        <td><?php echo $row['precio']?></td>
				                        <td><?php echo $row['stock']?></td>
		                                <td><a href="actualizar.php?id=<?= $row['id'] ?>" class="btn_update">Editar</a></td>
										<td><a href="delete.php?id=<?= $row['id'] ?>" class="btn-drop">Eliminar</a></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
				<?php } ?>
			<?php }else{ ?>
				<! -- FORMULARIO DATO COMPLETO -->
		              <div class="contenedorTabla">
		              	<table class="table-fill">
							<thead class="Title">
								<tr>
									<th>ID</th>
									<th>Producto</th>
									<th>Descripcion</th>
									<th>Precio</th>
									<th>Stock</th>
									<th></th>
									<th></th>
								</tr>
							</thead>

							<tbody class="Datos">
								<?php while($row=mysqli_fetch_array($consulta)){ ?>
								<tr> 
									<td><?php echo $row['id'] ?></td>
			                        <td><?php echo $row['nombre'] ?></td>
			                        <td><?php echo $row['descripcion'] ?></td>
			                        <td><?php echo $row['precio'] ?></td>
			                        <td><?php echo $row['stock']?></td>
			                        <td><a href="actualizar.php?id=<?= $row['id'] ?>" class="btn_update">Editar</a></td>
									<td><a href="delete.php?id=<?= $row['id'] ?>" class="btn-drop">Eliminar</a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
		              </div>
				<?php } ?>
			<form action="insertar.php" method="POST" class="form_Insert">
            	<h2 class="titulo">Insertar datos nuevos</h2>
            	<div class="contenedor-imput">
                    <input type="text" class="info" name="nombre" placeholder="Nombre">
                    <input type="text" class="info" name="descripcion" placeholder="Descripcion">
                    <input type="text" class="info" name="precio" placeholder="Precio">
                    <input type="text" class="info" name="foto" placeholder="URL foto">
                    <input type="text" class="info" name="stock" placeholder="Numero de articulos" pattern="[0-9]+">
                    <input type="submit" class="btn" value="insertar" >
                </div>
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
