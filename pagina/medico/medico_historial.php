
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
  font-size: 23PX;
  text-align: center;
  
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


                  
                 <!--<a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Impresión</a>-->
             


                









                <div class="box-body">
                
         

 
                        
            

          
      






      
 <!--end of modal-->











                  <div class="box-header">
                  <h3 class="box-title"> <p>LISTA MEDICOS</h3>
                </div><!-- /.box-header -->
              


                <div class="box-body">
                
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class=" btn-success">

                        <th><p>#</p></th>
                        <th><p>FOTO</p></th>
                        <th><p>NOMBRE Y APELLIDOS</p></th>
                        <th><p>TELEFONO</p></th>
                        <th><p>USUARIO</p></th>
                       
                             <th><p>CORREO</th>
     

 <th class="btn-print"> ACCION </th>
                      </tr>
                    </thead>
                    <tbody>
<?php
   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from usuario where tipo='medico' ")or die(mysqli_error());
    $i=0;
    while($row=mysqli_fetch_array($query)){
    $cid=$row['id'];
    $i++;
?>
                      <tr >

<td ><p><?php echo $i;?></p></td>
 <td><p><IMG src="../usuario/subir_us/<?php echo $row['imagen'];?>" style="height:110PX" /></p></td>
  <td><p><?php echo $row['nombre'].'  '.$row['apellido'];?></p></td>
<td><p><?php echo $row['telefono'];?></p></td>
<td><p><?php echo $row['usuario'];?></p></td>
  
    <td><p><?php echo $row['correo'];?></p></td>                                      

                          <td>
                                 <?php
                   
                    
                      ?>

<a class="btn btn-primary btn-print" href="../medico/<?php  echo "historial_cita.php?cid=$cid";?>" style=" font-size: 19px" role="button">CITAS ATENDIDAS</a>

             <?php
            //          }
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
