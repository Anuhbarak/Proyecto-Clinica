<?php
date_default_timezone_set('America/Mexico_City');
$hora=date('h_i_s A');
$fecha= date('d,m,Y');
$imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
if(strlen($imagenCodificada) <= 0)
{
    exit("No se ha recibido ninguna imagen");
}
//La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
$imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));
 
//Venía en base64 pero s&oaccute;lo la codificamos así para que viaje por la red, ahora la decodificamos y
//todo el contenido lo guardamos en un archivo
$imagenDecodificada = base64_decode($imagenCodificadaLimpia);
 
//Calcular un nombre único
$nuevoNombre = "fotoPaciente _ $fecha _ $hora.png";
$nombreImagenGuardada  = "img/$nuevoNombre";
 
//Escribir el archivo
file_put_contents($nombreImagenGuardada, $imagenDecodificada);
 
//Terminar y devolver el nombre de la foto
exit($nombreImagenGuardada);
?>