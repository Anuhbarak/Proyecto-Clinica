
<?php include '../layout/dbcon.php';?>


<?php 
 @session_start();





?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../cita/css/styles.css">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            
  <script>
$(document).ready(function() {
    $('#key').on('keyup', function() {
        var key = $(this).val();        
        var dataString = 'key='+key;
    $.ajax({
            type: "POST",
            url: "ajax.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                     
                           var idlcliente      = $(this).attr('id').substring(7,10).match(/\d+/); 
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        alert('Has seleccionado a '+' '+$('#'+id).attr('data'));
 document.f1.paciente.value = idlcliente;
                 
 document.f1.clientenombre.value = $('#'+id).attr('data');
                        return false;
                });
            }
        });
    });
}); 



$(document).ready(function() {
    $('#keymedico').on('keyup', function() {
        var keymedico = $(this).val();        
        var dataString = 'keymedico='+keymedico;
    $.ajax({
            type: "POST",
            url: "ajaxmedico.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestionsingresos').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                     
                           var idmedico      = $(this).attr('id').substring(7,10).match(/\d+/); 
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#key').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestionsingresos').fadeOut(1000);
                        alert('Has seleccionado a '+' '+$('#'+id).attr('data'));
 document.f1.medico.value = idmedico;
                 

                        return false;
                });
            }
        });
    });
}); 
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atender Cita </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../cita/public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../cita/public/css/font-awesome.css">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="../cita/public/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../cita/public/css/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      #myInput {
  background-image: url('../cita/css/buscador.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myUL {
  /* Remove default list styling */
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd; /* Add a border to all links */
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6; /* Grey background color */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove default text underline */
  font-size: 18px; /* Increase the font-size */
  color: black; /* Add a black text color */
  display: block; /* Make it into a block element to fill the whole list */
}

#myUL li a:hover:not(.header) {
  background-color: #eee; /* Add a hover effect to all links, except for headers */
}
label{
  font-size: x-large;

}
    </style>
  </head>

  <body class="hold-transition login-page">
           <?php    
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
$impuTotal = 0;
?>
  <div class="col-xs-12">
    <h3>Atender Cita</h3>

  <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
           
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="frmAcceder" name="frmAcceder">
                  <div class="box-body">
                  <div class="row">
                    <div class="col-xs-12">
                   
              <?php

$acumulado=0;
       $id_usuario=$_SESSION['id'];

        


   // $caja_query=mysqli_query($con,"select * from usuario where id='$id_usuario'  ")or die(mysqli_error());
   // $i=0;
    //while($row_caja=mysqli_fetch_array($caja_query)){
   
    //  $nombre=$row_caja['nombre'].'  '.$row_caja['apellido'];
  
    //}




 

?>

<?php
     if(isset($_REQUEST['id_cita']))
            {
              $id_cita=$_REQUEST['id_cita'];
            }
            else
            {
            $id_cita=$_POST['id_cita'];
          }


?>




     <h3><?php echo "<h2> INGRESA TU CONSULTA</h2>"; ?></h3>
     <iframe src="http://192.168.0.200" width="500" height="720"></iframe>


                    </div>
                  </div> 
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                  <div style="text-align: right;width:500px">
                                    <a type="button" href="../layout/inicio.php" class="btn btn-danger">Salir </a>
                  </div></DIV>
                </form>
              </div><!-- /.box -->

            
              
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-8">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                <h3><?php echo "<h2>REGISTRAR PARAMETROS DE LA CITA</h2>"; ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                  <div class="box">
                
                <div class="box-body no-padding">
        <div class="row">
        <div id="content" class="col-lg-12">
<form class="form-inline" method="post" action="#">

</form>

<?php
   // $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select m.nombre as  medico,p.nombre as  paciente,c.fecha,c.observaciones,c.estado_cita,c.id_cita from cita c inner join usuario m on c.id_medico = m.id inner join usuario p on p.id = c.id_paciente
 where c.id_cita='$id_cita' ")or die(mysqli_error());
    $i=1;
    while($row=mysqli_fetch_array($query)){
$id_medico=$row['medico'];
$id_paciente=$row['paciente'];

      // $tipo=$row['tipo'];
       
?>

<div id="suggestions"></div>
        </div>
    </div>
    <form  class="form-inline" name="f1" action="<?php echo "../cita/cita_bd.php?id_cita=$id_cita&id_medico=$id_medico&id_paciente=$id_paciente";?>" method="POST">
    <input type="hidden" class="form-control" id="id_cita" name="id_cita" value="<?php echo $id_cita;?>" required>
      
    <h2>PACIENTE:</h2>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">


                   <h4  class="form-control" id="paciente" name="paciente"><?php echo $row['paciente'];?></h4>

                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
    
                        </div>
                        </div><!-- /.form group -->
                        <br>

     <div class="row">
     <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >MEDICO</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">


                   <h4  class="form-control" id="medico" name="medico"><?php echo $row['medico'];?></h4>

                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


                      <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >PESO</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="Peso" name="Peso"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>



                    <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >ESTATURA</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="Est" name="Est"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >TEMPERATURA</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="Temp" name="Temp"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >OXIGENACION</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="Oxi" name="Oxi"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>
                    
                    <!--
                    <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Presión Arterial</label>
                 
                      </div>--><!-- /.form group -->
                      <!--
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="PA" name="PA"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>
    -->
    <!--
                    <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >Glucosa</label>
    
                      </div>--><!-- /.form group --><!--
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="Glucosa" name="Glucosa"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>
    -->
                    <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >PPM</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="PPM" name="PPM"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >OBSERVACIONES</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="Obs" name="Obs"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3 btn-print">
                      <div class="form-group">
                        <label for="date" >DIAGNOSTICO</label>
                 
                      </div><!-- /.form group -->
                    </div>
                       <div class="col-md-4 btn-print">
                      <div class="form-group">
                 

                            <textarea class="form-control" id="Diagnostico" name="Diagnostico"></textarea>
                      </div>
                    </div>
                           <div class="col-md-4 btn-print">
                
                    </div>
                    </div>

        
      <div class="row">
                         


        

     <input name="paciente" id="paciente" type="hidden"  required>

<br>
<div style="text-align: right;width:700px">
      <button type="submit" class="btn btn-success">ENVIAR</button>
    </div>

    </form>

<?php }?>
<?php

  # code...

?>


                  <div class="row">
                        

                   <div class="box-body">
                
         

 
                        



          
      






      












             

                  
                          </div>
                    
                   
                        </div>
                      </div><!-- ./col -->








       

                   

                                        <?php
                      
                     
                      ?>

   


          








                  </div><!--row-->

                  <?php

 ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

                  
              </div><!-- /.box -->
              <!-- general form elements disabled -->
                          </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}




</script>


<script type="text/javascript">
  $(document).ready(function(){
    $("#id_ubicacion").change(function(){
      $.get("get_categoria_corte.php","id_ubicacion="+$("#id_ubicacion").val(), function(data){
        $("#id_categoria_corte").html(data);
        console.log(data);
      });
    });

    $("#id_categoria_corte").change(function(){
      $.get("get_corte.php","id_categoria_corte="+$("#id_categoria_corte").val(), function(data){
        $("#id_corte").html(data);
        console.log(data);
      });
    });


  });
</script>
    <!-- jQuery 2.1.4 -->
    <script src="../cita/public/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../cita/public/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../cita/public/js/icheck.min.js"></script>
    

  </body>
</html>
<?php


  
?>