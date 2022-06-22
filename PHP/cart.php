<?php 
	session_start();
	// aqui empieza el carrito
	if(isset($_SESSION['carrito']) || isset($_POST['nombre'])){
	  if(isset($_SESSION['carrito'])){
	      $carrito_mio=$_SESSION['carrito'];
	      if(isset($_POST['nombre'])){
		      	$foto=$_POST['foto'];	
			    $nombre=$_POST['nombre'];
			    $precio=$_POST['precio'];
			    $cantidad=$_POST['cantidad'];
			    $id=$_POST['id'];
			    $donde=-1;
			    if($donde!=-1){
			        $cuanto=$carrito_mio[$donde]['cantidad']+$cantidad;
			        $carrito_mio[$donde] = array("id"=>$id,"foto"=>$foto,"nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cuanto);
			    }else{
			        $carrito_mio[]=array("id"=>$id,"foto"=>$foto,"nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
			    }
			}
		}else{
			$foto=$_POST['foto'];	
		    $nombre=$_POST['nombre'];
		    $precio=$_POST['precio'];
		    $cantidad=$_POST['cantidad'];
		    $id=$_POST['id'];
		    $carrito_mio[]=array("id"=>$id,"foto"=>$foto,"nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad);
		}
		$_SESSION['carrito']=$carrito_mio;
	}
	header("Location: ".$_SERVER['HTTP_REFERER']."");
?>
