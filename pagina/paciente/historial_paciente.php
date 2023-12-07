
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
li {
  color: white;
}
ul {
  color: white;
}
#buscar{
  text-align: right;
}
fecha{
  color: white;
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
    font-size: 28px; /* Ajusta el tamaño de fuente como desees */
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
                  <h2 class="box-title"> HISTORIAL DEL PACIENTE</h2>
                </div><!-- /.box-header -->
              <div><br></div>
              <a class="btn btn-warning btn-print" href="paciente.php"    style="height:25%; width:15%; font-size: 19px " role="button">REGRESAR</a>
                    <!--  <form class="form-horizontal" method="post" action="historial_paciente_add.php" enctype='multipart/form-data'>
            <input type="hidden" class="form-control" id="id_paciente" name="id_paciente" value="<?php //echo $cid;?>" required>
    





     <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Medico</label>
                 
                      </div><!-- /.form group 
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
             <select class="form-control select2" name="id_medico" required>
                            
                            <?php
/*
              $queryc=mysqli_query($con,"select * from usuario where tipo='medico'  ")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                            <option value="<?php echo $rowc['id'];?>"><?php echo $rowc['nombre'];?></option>
                            <?php }?>
                          </select>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>










   






         







                      <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Obsercaciones</label>
                 
                      </div><!-- /.form group 
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

        

                               <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Fecha cita</label>
                 
                      </div><!-- /.form group
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">

      <input type="date" class="form-control pull-right" id="fecha" name="fecha"  required>
                 
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

             



        
      <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Horario</label>
                 
                      </div><!-- /.form group 
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
             <select class="form-control select2" name="horario" required>
                            
                            <?php

              $queryc=mysqli_query($con,"select * from horario ")or die(mysqli_error());
                while($rowc=mysqli_fetch_array($queryc)){
                ?>
                            <option value="<?php echo $rowc['id_horario'];?>"><?php echo $rowc['nombre_horario'];?></option>
                            <?php }*/?>
                          </select>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

                
          
    <button type="submit" class="btn btn-primary">GUARDAR</button>     -->     
  
                   
          
              <div class="modal-footer">


              </div>
        </form>


                <div class="box-body">
                

                   <table id="example2" class="table table-bordered table-striped">
                    
<?php

$auto="";

   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select m.nombre as  medico,p.nombre as  paciente,c.fecha,c.observaciones,c.estado_cita,c.id_cita from cita c inner join usuario m on c.id_medico = m.id inner join usuario p on p.id = c.id_paciente where id_paciente='$cid'")or die(mysqli_error());
    $i=0;
    
    //$query=mysqli_query($con,"SELECT * FROM cita WHERE id_paciente=21;")or die(mysqli_error());
    
    while($row=mysqli_fetch_array($query)){
      $id_cita=$row['id_cita'];
      $query2=mysqli_query($con,"SELECT * FROM consulta where ID_FOLIO='$id_cita'")or die(mysqli_error());
      while($row2=mysqli_fetch_array($query2)){




    $i++;
?>
<thead>
                        <tr class=" btn-success">

                
               
            <th><P>FECHA</P></th>
                    <th><P>PACIENTE</P></th>
                       
         
                           

    <th><P>MEDICO</P></th>
      <th><P>OBSERVACIONES</P></th>
           <th><P>ESTADO</P></th>
 <th class="btn-print"><P> ACCION </P></th>
                           <th></th>



                      </tr>
                    </thead>
                    <tbody>
                      <tr>





    

     <td><P><?php echo $row['fecha'];?></P></td>              
         <td><P><?php echo $row['paciente'];?></P></td>     
           <td><P><?php echo $row['medico'];?></P></td>    
            <td><P><?php echo $row['observaciones'];?></P></td>  
              <td><P><?php echo $row['estado_cita'];?></P></td> 
                                        <td>
                                
<a class="btn btn-warning btn-print" href="<?php  echo "../receta/receta.php?id_cita=$id_cita";?>"  style=" font-size: 18px"  role="button">VER RECETA</a>
</tbody>


<thead>
                        <tr class=" btn-dark">

                
               
            <th><P>PESO</P></th>
                    <th><P>ESTATURA</P></th>
                       
         
                           

    <th><P>TEMPERATURA</P></th>
      <th><P>OXIGENACION</P></th>
           <th><P>PRESION ARTERIAL</P></th>
 <th><P>GLUCOSA</P></th>
 <th><P>PPM</P></th>          
                      </tr>
                    </thead>
                    
                    
                    
                    <tbody>
<?php

$auto="";

   // $branch=$_SESSION['branch'];
    
    $i=0;
    //$query=mysqli_query($con,"SELECT * FROM cita WHERE id_paciente=21;")or die(mysqli_error());
    
    //while($row=mysqli_fetch_array($query)){

//$ID_FOLIO=$row['ID_FOLIO'];


//    $i++;
?>
                      <tr >

     <td><P><?php echo $row2['Peso'];?></P></td>              
         <td><P><?php echo $row2['Estatura'];?></P></td>   
           <td><P><?php echo $row2['Temp'];?></P></td>    
            <td><P><?php echo $row2['Oxig'];?></P></td>  
              <td><P><?php echo $row2['Presion'];?></P></td>
                <td><P><?php echo $row2['Glucosa'];?></P></td>
                  <td><P><?php echo $row2['PPM'];?></P></td>
                                        
</tbody>
                     </tr>

                     <tr> 
                      <th><br><br></th>
      </tr>
                      
                      <!--end of modal-->

                      <?php }}?>
                    

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
                      <a href="https://tlclinica.net/">TuClinica.net</a>
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
                                         <?php 
 // }    
?>



    <!-- /gauge.js -->
  </body>
</html>
