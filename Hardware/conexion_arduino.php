<?php
include '../pagina/layout/dbcon.php';
/*
$host='localhost';
			$ConInfo = array("Database"=>"CENTROMEDICO","UID"=>"MIB", "PWD"=>"MIB12345", "CharacterSet"=>"UTF-8");
		$conn = sqlsrv_connect($host, $ConInfo);
		
	$tsql= "INSERT into tabla_sensor(presion) VALUES(?)";
	
	$nombre=htmlspecialchars($_GET["valor"]);
	$params = array($nombre);
	$stmt = sqlsrv_query($conn, $tsql, $params); 

sqlsrv_free_stmt( $stmt);  
sqlsrv_close( $conn);  
*/
$nombre=htmlspecialchars($_GET["valor"]);
mysqli_query($con,"INSERT INTO tabla_sensor(presion)
VALUES('$nombre')")or die(mysqli_error($con));

?>

