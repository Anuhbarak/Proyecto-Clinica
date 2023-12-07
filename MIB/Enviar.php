<?php
			class Cconexion{
				public static function ConexionBD(){
					$host='localhost';
					$dbname='CENTROMEDICO';
					$username='SA';
					$pass='Ngt12345';
					$puerto=1433;
					$ConInfo = array("Database"=>"CENTROMEDICO","UID"=>"SA", "PWD"=>"Ngt12345", "CharacterSet"=>"UTF-8");
				$conn = sqlsrv_connect($host, $ConInfo);
				
				if($conn){
					echo "Conexion Exitosa";
					return $conn;
				}
				else echo "Fallo algo";
				}
			}
		
	$tsql= "INSERT into Paciente(Nombre, ApellidoPaterno, ApellidoMaterno, CURP, NSS, Domicilio, Estado, Telefono, Edad, IdRegion, Sexo, Observacion, Diagnostico) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
	
	$nombre=$_POST['nombre'];
	$AP=$_POST['AP'];
	$AM=$_POST['AM'];
	$curp=$_POST['curp'];
	$NSS=$_POST['NSS'];
	$direccion=$_POST['direccion'];
	$estado=$_POST['estado'];
	$region=$_POST['region'];
	$telefono=$_POST['telefono'];
	$edad=$_POST['edad'];
	$sexo=$_POST['sexo'];
	$observacion=$_POST['observacion'];
	$diagnostico=$_POST['diagnostico'];
	//$comments = fopen('data:text/plain,'.urlencode($data), 'r');
	$params = array($nombre,$AP,$AM,$curp,$NSS,$direccion,$estado,$telefono,$edad,$region,$sexo,$observacion,$diagnostico);
	$stmt = sqlsrv_query($conn, $tsql, $params);  
if ($stmt === false) {
     echo "Error al enviar la informaci�n.\n";  
     die( print_r( sqlsrv_errors(), true));  
} else {
     echo "El query se ejecut� correctamente.";  
}  
  
/* Free statement and connection resources. */  
sqlsrv_free_stmt( $stmt);  
sqlsrv_close( $conn);  

header('Location: CENTRO.php');
?>  
