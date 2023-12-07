
<?php include '../layout/header.php';


?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include '../layout/main_sidebar.php';?>

        <!-- top navigation -->
       <?php include '../layout/top_nav.php';?>      <!-- /top navigation -->
       <style>
label{

color: black;
}
li {
  color: white;
}
ul {
  color: white;
}
#buscar{
  text-align: right;
}
P{
  font-size: 20px
}
.box-header {
    background-color: #004B9B; /* Cambia este valor al color que desees */
    padding: 20px; /* Solo para agregar espacio al contenido interno del div */
    text-align: center; /* Para centrar el contenido del div horizontalmente */
  
    
  }
  .box-title {
    font-size: 24px; /* Ajusta el tamaño de fuente como desees */
    font-family: Arial, sans-serif; /* Cambia el tipo de letra según tus preferencias */
    font-weight: bold; /* Hace el texto en negrita */
    color: white; /* Cambia el color del texto a blanco */
  }
  
       </style>

        <!-- page content -->
        <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class = "x-panel">

            </div>

        </div><!--end of modal-dialog-->
 </div>
 

                 <div class="panel-heading">


        </div>
 
 <!--end of modal-->


                 <!-- /.box-header -->
                 <!--<a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Impresión</a>-->
                <a class="btn btn-warning btn-print" href="cita_agregar.php"    style="height:25%; width:15%; font-size: 17px " role="button">REGISTRAR CITA</a>


                









                <div class="box-body">
            
 <!--end of modal-->

                  <div class="box-header">
                  <h3 class="box-title" style="font-size: 25px">LISTA CITAS</h3>
                </div><!-- /.box-header -->
              


                <div class="box-body">
                
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class=" btn-success">

                
               
                        <th><P>PACIENTE</P></th>
                    <th><P>MEDICO</P></th>
                       
         
                           

    <th><P>FECHA</P></th>
      <th><P>OBSERVACIONES</P></th>
           <th><P>ESTADO</P></th>
 <th class="btn-print"><p> OPCIONES </th>
                      </tr>
                    </thead>
                    <tbody>
<?php

    $fecha = date('Y-m-d');


   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select m.nombre as  medico,p.nombre as  paciente,c.fecha,c.observaciones,c.estado_cita,c.id_cita from cita c inner join usuario m on c.id_medico = m.id inner join usuario p on p.id = c.id_paciente and c.fecha='$fecha' ")or die(mysqli_error());
    $i=0;
    
    while($row=mysqli_fetch_array($query)){

$id_cita=$row['id_cita'];


    $i++;
?>
                      <tr >

        <td><P><?php echo $row['paciente'];?></P></td>              
         <td><P><?php echo $row['medico'];?></P></td>     
           <td><P><?php echo $row['fecha'];?></P></td>    
            <td><P><?php echo $row['observaciones'];?></P></td>  
              <td><P><?php echo $row['estado_cita'];?></P></td>                                      

                          <td>
                             
<?php
                      if($row['estado_cita']=="Finalizada"){?>
                        <a class="btn btn-warning  btn-print" href="<?php  echo "../cita/editar_cita.php?id_cita=$id_cita";?>"    role="button">Ver Receta</a>
                        <a class="btn btn-danger btn-print" href="<?php  echo "../cita/eliminar_cita.php?id_cita=$id_cita";?>"  onClick="return confirm('¿Está seguro de que quieres eliminar??');"  role="button">Eliminar</a>
                      <?php 
                      }else{?>

<a class="btn btn-primary btn-print" href="<?php  echo "../cita/atender_cita_2.php?id_cita=$id_cita";?>"    role="button">Atender</a>
<a class="btn btn-warning  btn-print" href="<?php  echo "../cita/editar_cita.php?id_cita=$id_cita";?>"    role="button">Editar</a>
<a class="btn btn-danger btn-print" href="<?php  echo "../cita/eliminar_cita.php?id_cita=$id_cita";?>"  onClick="return confirm('¿Está seguro de que quieres eliminar??');"  role="button">Eliminar</a>
      
      <?php
                      }                
                      ?>


            </td>
                      </tr>

 <!--end of modal-->

<?php }?>
                    </tbody>

                  </table>
                </div><!-- /.box-body -->

            </div><!-- /.col -->


          </div><!-- /.row -->

                </div><!-- /.box-body -->

            </div>
        </div>
      </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
                                <a href="https://www.networkgroup.com.mx">TuClinica.net</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  <?php include '../layout/datatable_script.php';?>

        <script>
        $(document).ready( function() {
                $('#example2').dataTable( {
                 "language": {
                   "paginate": {
                      "previous": "anterior",
                      "next": "posterior"
                    },
                    "search": "Buscar:",


                  },
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],


  "searching": true,
                }

              );
              } );
    </script>




    <!-- /gauge.js -->
  </body>
</html>
