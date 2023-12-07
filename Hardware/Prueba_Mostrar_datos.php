<?php
include '../pagina/layout/dbcon.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tabla</title>
</head>
<style type="text/css">
p {text-align:center;
	font-size: 40px;
	}
h2 {text-align:center;
	color: #0099FF;
	font-size: 120px;
	}
h3 {text-align:center;
	color: #0099FF;
	font-size: 30px;
	}
</style>
<body>
<p>TU TEMPERATURA ES:</p>
<BR><BR><BR><BR><BR>


<?php
$query ="SELECT * FROM tabla_sensor order by id desc limit 1";
$stmt = mysqli_query($con,$query);
while($row=mysqli_fetch_array($stmt)){
?>
<h2><?=$row[1]?> &#176C</h2>
<?php
}//*/
header("Refresh:1")
?>
<p>
<!--<a href="Mostrar_datos_2.php"><h3> Siguiente</h3></a> -->
</body>
</html>
