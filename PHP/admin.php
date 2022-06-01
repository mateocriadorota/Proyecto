<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Buscar</title>
</head>
<body>
	<?php 
		include('conexion.php');
		$consulta = mysqli_query($conexion, "SELECT * FROM inventario");
	?>
	<?php if(isset($_POST['dato'])){ ?>
		<?php if(strlen($_POST['dato'])){ ?>
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
		                        <th><a href="actualizar.php?id=<?= $row['id'] ?>" class="btn_update">Editar</a></th>
								<th><a href="delete.php?id=<?= $row['id'] ?>" class="btn-drop">Eliminar</a></th>
							</tr>
							<?php } ?>
						</tbody>
					</table>
	              </div>
			<?php } ?>
		
		<?php }else{ Header("Location:admin.php"); }?>


</body>
</html>
