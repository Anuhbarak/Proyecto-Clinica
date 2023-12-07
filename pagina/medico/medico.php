
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
button {
  --color: #0077ff;
  font-family: inherit;
  display: inline-block;
  width: 6em;
  height: 2.6em;
  line-height: 2.5em;
  overflow: hidden;
  margin: 0px;
  font-size: 12px;
  z-index: 1;
  color: var(--color);
  border: 2px solid var(--color);
  border-radius: 6px;
  position: relative;
}

button::before {
  position: absolute;
  content: "";
  background: var(--color);
  width: 150px;
  height: 200px;
  z-index: -1;
  border-radius: 50%;
}

button:hover {
  color: white;
}

button:before {
  top: 100%;
  left: 100%;
  transition: .3s all;
}

button:hover::before {
  top: -30px;
  left: -30px;
}
p{
  font-size: 21PX;
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


                  
                <!-- <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Impresión</a>-->
                <a class="btn btn-warning btn-print" href="medico_agregar.php"    style="height:25%; width:15%; font-size: 12px " role="button"><p>REGISTRAR</p></a>


                









                <div class="box-body">
                
         

 
                        
            

          
      






      
 <!--end of modal-->











                  <div class="box-header">
                  <h2 class="box-title" style="font-size: 25px"> LISTA MEDICOS</h2>
                </div><!-- /.box-header -->
              


                <div class="box-body">
                
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class=" btn-success">

                    <th><P>#</th>
                        <th><P>FOTO</P></th>
                        <th><P>NOMBRE Y APELLIDOS</p></th>
                        <th><P>TELEFONO</th>
                        <th><P>USUARIO</th>
                       
                             <th><P>CORREO</th>
     

 <th class="btn-print"> <P>ACCION </th>
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

<td ><P><?php echo $i;?></P></td>
 <td><center><P><IMG src="../usuario/subir_us/<?php echo $row['imagen'];?>" style="height:110PX" /></P></center></td>
              <td><P><?php echo $row['nombre'].'  '.$row['apellido'];?></P></td>
<td><P><center><p><?php echo $row['telefono'];?></p>
    <a href="skype:live:70ac993644d0eaf2?call">
    <button style=" font-size: 19px"> 
    LLAMAR
</button>
    </a></center> </P></td>
<td><P><?php echo $row['usuario'];?></P></td>
  
    <td><P><?php echo $row['correo'];?></P></td>                                      

                          <td>
                                 <?php
                   
                    
                      ?>
  <a class="small-box-footer btn-print"  href="<?php  echo "eliminar_medico.php?cid=$cid";?>" onClick="return confirm('¿Está seguro de que quieres eliminar medico??');"><i class="glyphicon glyphicon-remove" ></i></a>

<a class="btn btn-success btn-print" href="../horario_medico/<?php  echo "horario_medico.php?cid=$cid";?>" style=" font-size: 19px" role="button">HORARIO</a>
<!--<a class="btn btn-primary btn-print" href="../vacaciones/<?php  //echo "vacaciones.php?cid=$cid";?>"  role="button">Vacaciones</a>-->
<a class="btn btn-warning btn-print" href="<?php  echo "editar_medico.php?cid=$cid";?>" style=" font-size: 19px" role="button">ACTUALIZAR DATOS</a>
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
