<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">

	<title>MCR</title>
</head>
<body id="bodyContacto">
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
	<div id="contenedorContacto">
		<section class="contact">
        <div class="contact__right-side">
            <h1 class="contact__title">Contact us</h1>
            <form action="contact.php" method="post" class="contact__form-wrapper">
                <div class="contact__input-line">
                    <label for="name" class="contact__label">Name</label>
                    <input type="text" name="name" id="name" class="contact__input" required>
                </div>
                <div class="contact__input-line">
                    <label for="email" class="contact__label">Email</label>
                    <input type="email" name="email" id="email" class="contact__input" required>
                </div>
                <div class="contact__input-line">
                    <label for="subject" class="contact__label">Subject</label>
                    <input type="text" name="tema" id="tema" class="contact__input" required>
                </div>
                <div class="contact__input-line">
                    <label for="message" class="contact__label">Message</label>
                    <textarea type="text" name="message" id="message" class="contact__input--textarea" required></textarea>
                </div>
                <input type="submit" value="Send message" class="contact__submit-button">
            </form>
        </div>
    </section>
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