<?php 
session_start();
if(empty($_SESSION['id'])):
endif;
//include('guardar_foto.php');


include('../../dist/includes/dbcon.php');


	$cid = $_POST['id_usuario'];
	$nombre = $_POST['nombre'];

	$apellido = $_POST['apellido'];
	$CURP = $_POST['CURP'];
	$usuario = $_POST['usuario'];


	$correo = $_POST['correo'];


	$telefono = $_POST['telefono'];
		
	//include('../../dist/includes/dbcon.php');
	
		//$validator = array('success' => false, 'messages' => array());
		
		//$foto = base64_decode($_POST["foto"]);
	
	if (!empty($_FILES['imagen']['name'])){
		# code...
	
	
	$target_dir = "../usuario/subir_us/";
		$target_file = $target_dir.basename($_FILES["imagen"]["name"]);
		$uploadok = 1;
		$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
		//check if image file is a actual image or fake image
		$check=getimagesize($_FILES["imagen"]["tmp_name"]);
		if($check!==false) {
			echo "archivo es una imagen - ". $check["mime"]. ".";
			$uploadok = 1;
		}else{
			echo "el archivo no es una imagen.";
			$uploadok=0;
		}
		
		
		//check if file already exists
		if(file_exists($target_file)){
			echo "lo siento, el archivo ya existe.";
			$uploadok=0;
		}
		
		//check file size
		if($_FILES["imagen"]["size"]>500000){
			echo "lo siento, tu archivo es demasiado grande.";
			$uploadok=0;
		}
		
		
	
			if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)){
				
		$img=basename($_FILES["imagen"]["name"]);
		
	
	
		mysqli_query($con,"update usuario set usuario='$usuario',nombre='$nombre',imagen='$img',apellido='$apellido',telefono='$telefono',correo='$correo', CURP='$CURP' where id='$cid'")or die(mysqli_error());
	
		echo "<script type='text/javascript'>alert(' actualizado correctamente!');</script>";
	echo "<script>document.location='../paciente/paciente.php'</script>";	
		//	header('Location:../usuario.php');	
		
			} else{
				echo "No se pudo subir.";
			}
	
	}
	else
	{
	
		mysqli_query($con,"UPDATE usuario SET usuario='$usuario', imagen='',nombre='$nombre',apellido='$apellido',telefono='$telefono',correo='$correo', CURP='$CURP' where id='$cid'")or die(mysqli_error());
		//mysqli_query($con,"UPDATE usuario SET imagen='fotos.imagen' WHERE id='$cid'")or die(mysqli_error());
		echo "<script type='text/javascript'>alert(' actualizado correctamente!');</script>";
	echo "<script>document.location='../paciente/paciente.php'</script>";
		//	header('Location:../usuario.php');
			
	
	}
	
	
	?>
