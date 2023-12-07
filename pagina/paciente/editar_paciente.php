
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
  label{

color: black;

}
p{
  font-size: 19px;
}
       </style>

        <!-- page content -->
        <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class = "x-panel">

            </div>

        <!--end of modal-dialog-->

 
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


                          

                 

                  <!-- Date range -->
               

      
 <!--end of modal-->







<div class="panel-heading">


</div>



                  <div class="box-header">
                  <h3 class="box-title"> MODIFICAR PACIENTE</h3>
                </div><!-- /.box-header -->
              <div><br></div>
              <a class="btn btn-warning btn-print" href="paciente.php"    style="height:25%; width:15%; font-size: 19px " role="button">REGRESAR</a>

                <div class="box-body">
                

<?php
   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from usuario where id= '$cid' ")or die(mysqli_error());
    $i=1;
    while($row=mysqli_fetch_array($query)){
    $cid=$row['id'];

       $tipo=$row['tipo'];
        
?>
<div style="text-align:left;">
<select name="listaDeDispositivos" id="listaDeDispositivos"></select>
		<button id="boton">TOMAR FOTO</button>
		<p id="estado"></p>					
				<video muted="muted" id="video" style="height: 200px;"></video>
					<canvas id="canvas" style="display: none;"></canvas>
          </div>

	  <!--<a href="../Foto/index.html?id=<?php //echo $id ?>">Tomar Foto</a>-->
    <form class="form-horizontal" method="post" action="paciente_actualizar.php" enctype='multipart/form-data'>
            <input type="hidden" class="form-control" id="id_usuario"  name="id_usuario" value="<?php echo $row['id'];?>" required>

     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>IMAGEN ANTIGUA</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 <IMG src="../usuario/subir_us/<?php echo $row['imagen'];?>" style="height:200PX" />
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
                  <input type="file" class="form-control" id="imagen" name="imagen"  >
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

            <input type="text" class="form-control" id="name" style= "font-size: 19px" name="nombre" value="<?php echo $row['nombre'];?>" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>APELLIDO</p></label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

        <input type="text" class="form-control" id="apellido" style= "font-size: 19px" name="apellido" value="<?php echo $row['apellido'];?>"   required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>CURP</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

        <input type="text" class="form-control" id="CURP" name="CURP" style= "font-size: 19px" value="<?php echo $row['CURP'];?>"   required>
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

            <input type="text" class="form-control" id="usuario" style= "font-size: 19px" name="usuario"  value="<?php echo $row['usuario'];?>"   required>
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

            <input type="text" class="form-control" id="telefono" style= "font-size: 19px" name="telefono"  value="<?php echo $row['telefono'];?>" >
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

            <input type="text" class="form-control" id="correo" style= "font-size: 19px" name="correo" value="<?php echo $row['correo'];?>" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>



        
          
 








  


     
                
          
    <button type="submit" class="btn btn-primary" style=" font-size: 20px">GUARDAR</button>         
   
  
                   
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
                         <a href="https://Tuclinica.net/">TuClinica.net</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  <?php include '../layout/datatable_script.php';?>
  

 <script src="script.js"></script>
 
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
