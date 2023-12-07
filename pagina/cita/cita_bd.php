<?php
session_start();
include('../../dist/includes/dbcon.php');
$id_usuario=$_SESSION['id'];

     if(isset($_REQUEST['id_cita']))
            {
              $id_cita=$_REQUEST['id_cita'];
            }
            else
            {
            $id_cita=$_POST['id_cita'];
          }
     if(isset($_REQUEST['id_medico']))
          {
            $id_medico=$_REQUEST['id_medico'];
          }
          else
          {
          $id_medico=$_POST['id_medico'];
        }
	if(isset($_REQUEST['id_paciente']))
          {
            $id_paciente=$_REQUEST['id_paciente'];
          }
          else
          {
          $id_paciente=$_POST['id_paciente'];
        }


//$id_paciente = $_POST['paciente'];
$peso = $_POST['Peso'];
$Estatura = $_POST['Est'];
$tem = $_POST['Temp'];
$oxi = $_POST['Oxi'];
$PA = $_POST['PA'];
$Glu = $_POST['Glucosa'];
$PPM = $_POST['PPM'];

$observaciones = $_POST['Obs'];
$diagnostico = $_POST['Diagnostico'];

$estado_cita = "FINALIZADA";
//$caja=0;


$id_usuario=$_SESSION['id'];
//		$update=mysqli_query($con,"update usuario set caja=caja+'$monto' where id='$id_usuario' ");

		mysqli_query($con,"INSERT INTO consulta(ID_FOLIO,ID_MEDICO,ID_Paciente,Temp,Oxig,Presion,Glucosa,Estatura,Peso,PPM,Observaciones,Diagnostico)
				VALUES('$id_cita','$id_medico','$id_paciente','$tem','$oxi','$PA','$Glu','$Estatura','$peso','$PPM','$observaciones','$diagnostico')")or die(mysqli_error($con));
        $sql="UPDATE cita set estado_cita='$estado_cita' where id_cita=$id_cita";
        mysqli_query($con,$sql)or die(mysqli_error($con));
			

	echo "<script>document.location='../cita/cita.php'</script>";	

?>
