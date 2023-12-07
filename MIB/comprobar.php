<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Comprobar datos</title>

</head>
<body>
<h1>Tus datos de Formulario: </h1>
<p>Estos son los datos que nos has enviado:</p>
<?php
echo "Nombre: "; echo $_POST['nombre']; echo "<br/>";
echo "Apellido Paterno: "; echo $_POST['AP']; echo "<br/>";
echo "Apellido Materno: "; echo $_POST['AM']; echo "<br/>";
echo "Dirección: "; echo $_POST['direccion']; echo "<br/>";
echo "Teléfono: "; echo $_POST['telefono']; echo "<br/>";
echo "Edad: "; echo $_POST['edad']; echo "<br/>";
echo "Sexo: "; echo $_POST['sexo']; echo "<br/>";
echo "Observacion: "; echo $_POST['observacion']; echo "<br/>";
echo "Diagnostico: "; echo $_POST['diagnostico']; echo "<br/>";

?>
<p>Comprueba tus datos antes de enviarlos, si no están bien vuelve a intentarlo.</p>
<p>Los datos son correctos: <a href="enviar.php">Enviar</a>
<p>Los datos no son correctos: <a href="Frames.html">Volver a escribir</a>

</body>
</html>
