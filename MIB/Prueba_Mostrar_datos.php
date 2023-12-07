<?php
$host='localhost';
			$ConInfo = array("Database"=>"CENTROMEDICO","UID"=>"MIB", "PWD"=>"MIB12345", "CharacterSet"=>"UTF-8");
		$conn = sqlsrv_connect($host, $ConInfo);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tabla</title>
</head>
<style type="text/css">
h1 {text-align:center;
	font-size: 50px;
	}
h2 {text-align:center;
	color: #0099FF;
	font-size: 180px;
	}
	
</style>
<body>
<h1>Tu temperatura es:</h1>
<?php
$query ="SELECT TOP 1 * FROM tabla_sensor ORDER BY id DESC";
$stmt = sqlsrv_query($conn,$query);
while($row=sqlsrv_fetch_array($stmt)){
?>
<h2><?=$row[1]?> &#176C</h2>
<?php
}//*/
header("Refresh:1")
?>
<a href="Mostrar_datos_2.php">Siguiente</a>
</body>
</html>
