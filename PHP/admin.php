<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<title>Buscar</title>
</head>
<body>
	<header>
		<a href="index_administrador.php" class="logo"><img class="logo" src="../imagenes/Logo.jpg"></a>
		<input type="checkbox" id="menu">
		<label for="menu">Menu</label>
		<nav class="NavBar">
			<ul>
				<li> <a href="">About</a></li>
				<li> <a href="shop.php">Shop</a></li>
				<li> <a href="">Contact</a></li>
				<li> <a href="admin.php">Manage</a></li>
				<li class="nom"><?php echo "<p>Hola ".$_SESSION['nombre']." ".$_SESSION['apellido']."</p>";?></li>
			</ul>
		</nav>
	</header>

	<div id="contenedorPrimal">
		<h1>Buscar</h1>
		<form method="post" action="" class="form_TODO">
				<h2 class="titulo">Ingresa</h2>
				<div class="contenedor-imput">
					<input type="text" class="info" name="dato" placeholder="Nombre de articulo">
					<div class="btn">
						<input type="submit" name="boton">
					</div>
				</div>
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

						<div class="contenedorInsert">
			            	<h2>Insertar datos nuevos</h2>
			                <form action="insertar.php" method="POST">
			                    <input type="text" class="info" name="nombre" placeholder="Nombre">
			                    <input type="text" class="info" name="descripcion" placeholder="Descripcion">
			                    <input type="text" class="info" name="precio" placeholder="Precio">
			                    <input type="text" class="info" name="foto" placeholder="URL foto">
			                    <input type="text" class="info" name="stock" placeholder="Numero de articulos" pattern="[0-9]+">
			                    <input type="submit" class="btn_Insert">
			                </form>
						</div>

						<div class="contenedorTabla">
							<table class="DATOS">
								<thead class="Title">
									<th>ID</th>
									<th>Producto</th>
									<th>Descripcion</th>
									<th>Precio</th>
									<th>Stock</th>
									<th></th>
									<th></th>
								</thead>

								<tbody class="Datos">
									<?php while($row=mysqli_fetch_array($consulta)){ ?>
									<tr>
										<th><?php echo $row['id']?></th>
				                        <th><?php echo $row['nombre']?></th>
				                        <th><?php echo $row['descripcion']?></th>
				                        <th><?php echo $row['precio']?></th>
				                        <th><?php echo $row['stock']?></th>
				                        <th><a href="actualizar.php?id=<?= $row['id'] ?>" class="btn_update">Editar</a></th>
										<th><a href="delete.php?id=<?= $row['id'] ?>" class="btn-drop">Eliminar</a></th>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
				<?php }else{ ?>
						<! -- DATOS SOLICITADOS -->
						<div class="contenedorInsert">
			            	<h2>Insertar datos nuevos</h2>
			                <form action="insertar.php" method="POST">
			                    <input type="text" class="info" name="nombre" placeholder="Nombre">
			                    <input type="text" class="info" name="descripcion" placeholder="Descripcion">
			                    <input type="text" class="info" name="precio" placeholder="Precio">
			                    <input type="text" class="info" name="foto" placeholder="URL foto">
			                    <input type="text" class="info" name="stock" placeholder="Numero de articulos" pattern="[0-9]+">
			                    <input type="submit" class="btn_Insert">
			                </form>
						</div>

						<div class="contenedorTabla">
							<table class="DATOS">
								<thead class="Title">
									<th>ID</th>
									<th>Producto</th>
									<th>Descripcion</th>
									<th>Precio</th>
									<th>Stock</th>
									<th></th>
									<th></th>
								</thead>

								<tbody class="Datos">
									<?php while($row=mysqli_fetch_array($query)){ ?>
									<tr>
										<th><?php echo $row['id']?></th>
				                        <th><?php echo $row['nombre']?></th>
				                        <th><?php echo $row['descripcion']?></th>
				                        <th><?php echo $row['precio']?></th>
				                        <th><?php echo $row['stock']?></th>
		                                <th><a href="actualizar.php?id=<?= $row['id'] ?>" class="btn_update">Editar</a></th>
										<th><a href="delete.php?id=<?= $row['id'] ?>" class="btn-drop">Eliminar</a></th>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
				<?php } ?>
			<?php }else{ ?>
				<! -- FORMULARIO DATO COMPLETO -->
					<div class="contenedorInsert">
			            <h2>Insertar datos nuevos</h2>
			                <form action="insertar.php" method="POST">
			                    <input type="text" class="info" name="nombre" placeholder="Nombre">
			                    <input type="text" class="info" name="descripcion" placeholder="Descripcion">
			                    <input type="text" class="info" name="precio" placeholder="Precio">
			                    <input type="text" class="info" name="foto" placeholder="URL foto">
			                    <input type="text" class="info" name="stock" placeholder="Numero de articulos" pattern="[0-9]+">
			                    <input type="submit" class="btn_Insert">
			                </form>
		              </div>
		              <div class="contenedorTabla">
		              	<table class="DATOS">
							<thead class="Title">
								<th>ID</th>
								<th>Producto</th>
								<th>Descripcion</th>
								<th>Precio</th>
								<th>Stock</th>
								<th></th>
								<th></th>
							</thead>

							<tbody class="Datos">
								<?php while($row=mysqli_fetch_array($consulta)){ ?>
								<tr>
									<th><?php echo $row['id'] ?></th>
			                        <th><?php echo $row['nombre'] ?></th>
			                        <th><?php echo $row['descripcion'] ?></th>
			                        <th><?php echo $row['precio'] ?></th>
			                        <th><?php echo $row['stock']?></th>
			                        <th><a href="actualizar.php?id=<?= $row['id'] ?>" class="btn_update">Editar</a></th>
									<th><a href="delete.php?id=<?= $row['id'] ?>" class="btn-drop">Eliminar</a></th>
								</tr>
								<?php } ?>
							</tbody>
						</table>
		              </div>
				<?php } ?>
	</div>
</body>
</html>
