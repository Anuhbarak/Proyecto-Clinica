
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
p{
  font-size: 22PX;
  
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


                  
                 <!--<a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i>IMPRESION</a>-->
                <a class="btn btn-warning btn-print" href="cita_agregar.php"    style="height:25%; width:15%; font-size: 17px " role="button">REGISTRAR CITA</a>


                









                <div class="box-body">
                
         

 
                        
            

          
      






      
 <!--end of modal-->











                  <div class="box-header">
                  <h2 class="box-title" style= "font-size: 22px"> LISTA CITAS</h2>
                </div><!-- /.box-header -->
              


                <div class="box-body">
                
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class=" btn-success">

                
               
                        <th><p>PACIENTE</p></th>
                    <th><p>MEDICO</p></th>
                       
         
                           

    <th><p>FECHA</p></th>
      <th><p>OBSERVACIONES</p></th>
           <th><p>ESTADO</p></th>
 <th class="btn-print" ><p> OPCION </th>
                      </tr>
                    </thead>
                    <tbody>
<?php

$auto="";

   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select m.nombre as  medico,p.nombre as  paciente,c.fecha,c.observaciones,c.estado_cita,c.id_cita from cita c inner join usuario m on c.id_medico = m.id inner join usuario p on p.id = c.id_paciente ")or die(mysqli_error());
    $i=0;
    
    while($row=mysqli_fetch_array($query)){

$id_cita=$row['id_cita'];


    $i++;
?>
                      <tr >





    

        <td><p><?php echo $row['paciente'];?></p></td>              
         <td><p><?php echo $row['medico'];?></p></td>     
           <td><p><?php echo $row['fecha'];?></p></td>    
            <td><p><?php echo $row['observaciones'];?></p></td>  
              <td><p><?php echo $row['estado_cita'];?></p></td>                                      

                          <td>
                                 <?php
                      if($row['estado_cita']=="FINALIZADA"){?>
                        <a class="btn btn-warning  btn-print" href="<?php  echo "../receta/receta.php?id_cita=$id_cita";?>"    role="button">VER RECETA</a>
                        <?php 
                      }else{?>

<a class="btn btn-primary btn-print" href="<?php  echo "../cita/atender_cita_2.php?id_cita=$id_cita";?>"    role="button">ATENDER</a>
<a class="btn btn-warning  btn-print" href="<?php  echo "../cita/editar_cita.php?id_cita=$id_cita";?>"    role="button">EDITAR</a>
<a class="btn btn-danger btn-print" href="<?php  echo "../cita/eliminar_cita.php?id_cita=$id_cita";?>"  onClick="return confirm('¿Está seguro de que quieres eliminar??');"  role="button">ELIMINAR</a>
      
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
                                <a href="https://ventadecodigofuente.com/">hospital tusulutionweb Sys</a>
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
