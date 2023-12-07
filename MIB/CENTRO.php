<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Menu</title>
<link rel="stylesheet" href="Diseño.css">
<style type="text/css">
h1 {text-align:center;}
</style>
</head>
<body>
<h1>ALTA USUARIOS</h1>
<form action="Enviar.php" method="post"/>
<p>Nombre: <input type="text" name="nombre"/></p>
<p>Apellido Paterno: <input type="text" name="AP"/></p>
<p>Apellido Materno: <input type="text" name="AM"/></p>
<p>CURP: <input type="text" name="curp"/></p>
<p>N° DE SEGURO SOCIAL: <input type="text" name="NSS"/></p>
<p>Dirección: <input type="text" name="direccion"/></p>
<p>Estado: <input type="text" name="estado"/></p>
<p>Región: <input type="number" name="region"/></p>
<p>Teléfono: <input type="text" name="telefono"/></p>
<p>Edad: <input type="text" name="edad"/></p>


<table>
	<tr>
	<td>
	Sexo<br/>
	<input type="radio" name="sexo" value="V" />Varón<br />
	<input type="radio" name="sexo" value="M" />Mujer</p>
	</td>
	</tr>
</table>
<p>OBSERVACIONES: <br />
<textarea name="observacion" rows="5" cols="50"> </textarea>
<p>DIAGNÓSTICO: <br />
<textarea name="diagnostico" rows="5" cols="50"> </textarea>
<p><input type="submit" value="Enviar"/>
<input type="reset" value="Borrar Todo" /></p>
   </form>
</body>
</html>
