
<?php include '../layout/header.php';

//$branch_id = $_GET['id'];
?>

    <!-- Font Awesome -->

    <link rel="stylesheet" href="../layout/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../layout/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../layout/plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../layout/dist/css/skins/_all-skins.min.css">
  <body class="nav-md">
                                         <?php 
//    if ($usuario=="si") {
      # code...
    
?>
    <div class="container body">
      <div class="main_container">
        <?php include '../layout/main_sidebar.php';?>

        <!-- top navigation -->
       <?php include '../layout/top_nav.php';?>      <!-- /top navigation -->
       <style>
label{

color: black;
}
p{
  font-size: 18px;
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
  <?php
     if(isset($_REQUEST['cid']))
            {
              $cid=$_REQUEST['cid'];
            }
            else
            {
            $cid=$_POST['cid'];
          }


?>

                           <?php
                         
             //         if ($guardar=="si") {
                    
                      ?>

                  <?php
               //       }
                      ?>

                  <!-- Date range -->
               

      
 <!--end of modal-->











                  <div class="box-header">
                  <h3 class="box-title" style="font-size: 25px">MODIFICAR MEDICO</h3>
                </div><!-- /.box-header -->
                <br>
              
              <a class="btn btn-warning btn-print" href="medico.php"    style="height:25%; width:15%; font-size: 18px " role="button">REGRESAR</a>

                <div class="box-body">

                <div style="text-align:left;">
<select name="listaDeDispositivos" id="listaDeDispositivos"></select>
		<button id="boton">Tomar foto</button>
		<p id="estado"></p>					
				<video muted="muted" id="video" style="height: 200px;"></video>
					<canvas id="canvas" style="display: none;"></canvas>
          </div>
                

<?php
   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from usuario where id='$cid' ")or die(mysqli_error());
    $i=1;
    while($row=mysqli_fetch_array($query)){
    $cid=$row['id'];

       $tipo=$row['tipo'];
        
?>
      
        <form class="form-horizontal" method="post" action="medico_actualizar.php" enctype='multipart/form-data'>
            <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $row['id'];?>" required>
    




     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>IMAGEN ANTIGUA</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 <IMG src="img/<?php echo $row['imagen'];?>" style="height:150PX" />
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>IMAGEN NUEVA</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                  <input type="file" class="form-control" style="font-size: 18px" id="imagen" name="imagen"  >
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>NOMBRE</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="text" class="form-control" style="font-size: 18px" id="name" name="nombre" value="<?php echo $row['nombre'];?>" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>APELLIDO</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

        <input type="text" class="form-control" style="font-size: 18px" id="apellido" name="apellido" value="<?php echo $row['apellido'];?>"   required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


          
               <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>USUARIO</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="text" class="form-control" style="font-size: 18px" id="usuario"  name="usuario"  value="<?php echo $row['usuario'];?>"   required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>




               <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>TELEFONO</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="text" class="form-control" style="font-size: 18px" id="telefono"  name="telefono"  value="<?php echo $row['telefono'];?>" >
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>




       <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>CORREO</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

            <input type="text" class="form-control" style="font-size: 18px" id="correo"  name="correo" value="<?php echo $row['correo'];?>" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>



        
          
 








  


     
                
          
    <button type="submit" style="font-size: 18px" class="btn btn-primary">GUARDAR</button>          
  
                   
            <br><br><br><hr>
              <div class="modal-footer">


              </div>
        </form>
            
 <!--end of modal-->

<?php }?>

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
    <script src="script.js"></script>
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

                  "info": false,
                  "lengthChange": false,
                  "searching": false,


  "searching": true,
                }

              );
              } );
    </script>
                                         <?php 
 // }    
?>



    <!-- /gauge.js -->
  </body>
</html>
