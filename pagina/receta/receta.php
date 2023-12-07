<?php
ob_start();
?>

<?php


include('../layout/dbcon.php');
include('../../dist/includes/dbcon.php');
require_once ('../../libreria/dompdf/autoload.inc.php');

if(isset($_REQUEST['id_cita']))
            {
              $cita=$_REQUEST['id_cita'];
            }
            else
            {
            $cita=$_POST['id_cita'];
          }

//sacar datos de la tabla consulta y asignar a variables
$query= "SELECT * FROM consulta where ID_FOLIO = '$cita'";
$result = mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
//sacar datos de la tabla cita y asignarlos a variables 
$query2= "SELECT * FROM cita where id_cita = '$cita'";
$result2 = mysqli_query($con, $query2);
$row2=mysqli_fetch_array($result2);

$User=$row2['id_paciente'];
$Medico=$row2['id_medico'];

$query3= "SELECT * FROM usuario where id = '$User'";
$result3 = mysqli_query($con, $query3);
$row3=mysqli_fetch_array($result3);


$query4= "SELECT * FROM usuario where id = '$Medico'";
$result4 = mysqli_query($con, $query4);
$row4=mysqli_fetch_array($result4);

$query5= "SELECT * FROM empresa";
$result5 = mysqli_query($con, $query5);
$row5=mysqli_fetch_array($result5);


use Dompdf\Dompdf;

/*En esta linea de código mandamos a llamar las opciones de dpmpdf para 
usarlas al momento de usar imágenes */
use Dompdf\Options;

ob_start();
$imgMedico=$row3['imagen'];
$imagenM= "../usuario/subir_us/$imgMedico";
$imagenM64="data:image/png;base64," . base64_encode(file_get_contents($imagenM));

$imgPac=$row4['imagen'];
$imagenP= "../usuario/subir_us/$imgPac";
$imagenP64="data:image/png;base64," . base64_encode(file_get_contents($imagenP));

$imgL=$row5['imagen'];
$imagenL= "../configuracion/images/$imgL";
$imagenL64="data:image/png;base64," . base64_encode(file_get_contents($imagenL));


?>


<!DOCTYPE html>
<html lang="en">
    <body>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #001f3f; /* Color azul marino */
            }
            .container {
                max-width: 620px;
                margin: 50 auto;
                padding: 5px;
                border: 10px solid #ccc;
                background-color: #FFF; /* Color blanco */  
            }
            .header {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 20px;
            }
            .logo {
                width: 50px;
                height: 50px;
                align: right
            }
            .clinic-title {
                text-align: center;
                color: #001f3f; /* Color azul marino */
                font-size: 2em
            
            }
            .clinic-subtitle {
                text-align: left;
                color: #001f3f; /* Color azul marino */
                font-size: 1.5em
            
            }
            .date {
                text-align: right;
                color: #f0f8ea; /* Color verde claro */
            }
            .informacion-medico {
                text-align:left;
                background-color: #86DFAC;
                color: #001f3f;
                margin-bottom: 20px;
                font-size: 1.1em
            }
            .informacion-paciente {
                text-align:left;
                background-color: #86DFAC;
                color: #001f3f;
                margin-bottom: 20px;
                font-size: 1.1em
                
            }
            .signos-vitales {
                margin-bottom: 20px;
                background-color: #86DFAC;
            }
            .observaciones {
                text-align: center;
                margin-bottom: 1px;
                background-color: #86DFAC;
                color: #001f3f;
                margin-bottom: 20px;
                font-size: 1.1em
            }
            .diagnostico {
                text-align:center;
                margin-bottom: 20px;
                background-color: #86DFAC;
                color: #001f3f;
                margin-bottom: 20px;
                font-size: 1.1em
            }
            .pie-pagina {
                text-align: center;
            }
            p{
                text-align: right;
            }
            img{

            }
        </style>
    </body>
    <body>
        <div class="container">
            <div>
                <table>
                    <tr>
                    <td><IMG src="<?php echo $imagenL64?>" style="height:80PX"/>
                    <td><h1 class = "clinic-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diagnostico Medico</h1></td>
                    </tr>
                </talbe>    
            </div>

            
                <div>
                    <p>
                    Fecha: <?php echo $row2['fecha'] ?>
                    </p>
                </div>
            <hr/>
                
            <div class="section">
                <div>
                    <table>
                        <tr>
                        <td width="50%" align="center"><h2 class="clinic-subtitle">Datos del Médico &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></td>
                        
                        <td width="50%" align="center"><IMG src="<?php echo $imagenP64?>" style="height:80PX"/></td>
                        
                    </tr>
                    </table>
                </div>
            </div>
            
            <div class="informacion-medico">
                    Nombre: <?php echo $row['ID_MEDICO'] . " ". $row4['apellido']; ?><br>
                    Folio Cita: <?php echo $cita ?><br>    
            </div>

            <div class="section">
            <table>
                        <tr>
                        <td><h2 class="clinic-subtitle">Datos del Paciente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></td>
                        
                        <td><IMG src="<?php echo $imagenM64?>" style="height:80PX"/></td>
                        
                    </tr>
                    </table>    
                
            </div>     

            <div class="informacion-paciente">
                    Nombre: <?php echo $row['ID_Paciente'] . " " . $row3['apellido'] ?><br>
                    Estatura: <?php echo $row['Estatura']?><br>
                    Peso:  <?php echo $row['Peso']?>
           </div>

                
            <div class="section">
                <h2 class="clinic-subtitle">Signos Vitales</h2>
            </div>

            <div class= "signos-vitales">
                <table>
                    <thead>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
                            <th>Temp</th><th>
                            <th>&nbsp;&nbsp;&nbsp;Oxigenacion</th><th>
                            <th>&nbsp;&nbsp;&nbsp;Presion</th><th>
                            <th>&nbsp;&nbsp;&nbsp;Glucosa</th><th>
                            <th>&nbsp;&nbsp;&nbsp;PPM</th>
                    
                        </tr>
                    </thead>
    
                    <tbody>
                        <tr>
                            <?php foreach ($result as $registro) { ?>        
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>       
                                <td>&nbsp;<?php echo $registro['Temp']; ?></td><th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $registro['Oxig']; ?></td><th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $registro['Presion']; ?></td><th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $registro['Glucosa']; ?></td><th>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $registro['PPM']; ?></td>
                                
                        </tr>
                            <?php } //}?>
                    </tbody>
                </table>
        
            </div>
    <hr/>

           <!-- <div class="section">
                <h2 class="clinic-subtitle">Observaciones</h2>
            </div>

            <div class="observaciones">-->
                    
               <?php //echo $row['Observaciones']; ?>
            <!--</div>
            -->
            <div class="section">
                <h2 class="clinic-subtitle">Diagnóstico</h2>
            </div>
                            
            <div class="diagnostico">
                <?php echo $row['Diagnostico']; ?>
            </div>
    </body>
</html>


<?php

$html=ob_get_clean();

//Aquí se crea el objeto a utilizar
$options = new Options();

//Y debes activar esta opción "TRUE"
$options->set('isRemoteEnabled', TRUE);

$dompdf = new DOMPDF($options);
$dompdf->setPaper ('A4');
$dompdf->load_html($html);

$dompdf->render();
$dompdf->stream("receta_.pdf", array("Attachment"=>false));


?>

