
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
		@media only screen and (max-width: 500px) {
			video {
				max-width: 100%;
			}
		}
P{
  font-size:16px
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


                  <div class="box-header">
                  <div class="box-title"> REGISTRAR PACIENTE 
</div>

                </div><!-- /.box-header -->
                <div><br></div>
                <a class="btn btn-warning btn-print" href="paciente.php"    style="height:25%; width:15%; font-size: 18px " role="button">REGRESAR</a>
                









                <div class="box-body">
                
         
                <div style="text-align:left;">
<select name="listaDeDispositivos" id="listaDeDispositivos"></select>
		<button id="boton">TOMAR FOTO</button>
		<p id="estado"></p>					
				<video muted="muted" id="video" style="height: 200px;"></video>
					<canvas id="canvas" style="display: none;"></canvas>
          </div>
             

        <form class="form-horizontal" method="post" action="paciente_add.php" enctype='multipart/form-data'>

       <input type="hidden" class="form-control" id="tipo" name="tipo" value="paciente" required>

                   <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><P>FOTO</P></label>
                 
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
                        <label for="date" ><P>NOMBRE</P></label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
<P>
                          <input type="text" class="form-control pull-right" id="nombre" name="nombre" required >
</P></div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>
       
                          <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><p>APELLIDO</P></label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                          <input type="text" class="form-control pull-right" id="apellido" name="apellido" required >
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

        <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><P>CURP</P></label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

        <input type="text" class="form-control" id="CURP" name="CURP" placeholder="CURP" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

 <div class="row">
  
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><P>USUARIO</P></label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                          <input type="text" class="form-control pull-right" id="usuario" name="usuario"  placeholder="usuario" required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

 <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><P>CONTRASEÑA</P></label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                          <input type="password" class="form-control pull-right" id="date" name="password" placeholder="password " required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

 <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><P>CONFORMAR CONTRASEÑA</P></label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
<input type="password" class="form-control pull-right" id="password2" name="password2" placeholder="password " required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>



 <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><P>TELEFONO</P></label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono"  required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>



     
                     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" ><P>CORREO</P></label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
            <input type="text" class="form-control" id="correo" name="correo" placeholder="correo"  required>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

             
                 
    <button type="submit" class="btn btn-primary" style=" font-size: 21px" >GUARDAR</button>
              










              <div class="modal-footer">


              </div>
        </form>

 



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

<script src="script.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#id_clase").change(function(){
      $.get("get_tipo.php","id_clase="+$("#id_clase").val(), function(data){
        $("#id_tipo").html(data);
        console.log(data);
      });
    });


  });
</script>

    <!-- /gauge.js -->
  </body>
</html>
