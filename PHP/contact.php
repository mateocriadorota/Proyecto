<?php 
	//se arma el array POST
	$nombre=$_POST['name'];
	$email=$_POST['email'];
	$tema=$_POST['tema'];
	$message=$_POST["message"];

	$header="From: noreply@gmail.com"."\r\n";
	$header.="Reply-to: noreply@gmail.com"."\r\n";
	$header.= "X-Mailer: PHP/".phpversion();

	$enviado = mail($email,$tema,$message,$header);

	if($enviado == true){
		echo "Su correo ha sido enviado.";
	}else{
		echo "Hubo un error en el envio del mail.";
}
?>