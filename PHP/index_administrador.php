<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/Nav.css">
	<title>MCR</title>
</head>
<body>
	<header>
		<a href="" class="logo"><img class="logo" src="../imagenes/LogoMCR.jpg"></a>
		<input type="checkbox" id="menu">
		<label for="menu">Menu</label>
		<nav class="NavBar">
			<ul>
				<li> <a href="">Home</a></li>
				<li> <a href="">About</a></li>
				<li> <a href="shop.php">Shop</a></li>
				<li> <a href="">Contact</a></li>
				<li> <a href="admin.php">Manage</a></li>
				<li class="nom"><?php echo "<p>Hola ".$_SESSION['nombre']." ".$_SESSION['apellido']."</p>";?></li>
			</ul>
		</nav>
	</header>
	
</body>
</html>