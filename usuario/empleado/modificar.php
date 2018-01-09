<?php
  session_start();
  
  $User = $_SESSION['Usertimer'] ;
  $idUser = $_SESSION['idUsertimer'] ;
 if($User == null){
 header("Location: /timer2/index.php");
 }
 
 include('../conexion.php');
 
 
 $idact = $_GET['idact'];
 
 $sql ="SELECT actividad.idactividad  ,TIME(actividad.hora_ini)as ini,TIME(actividad.hora_fin) as fin, odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma and actividad.idactividad = '$idact' ";
$resultado = mysqli_query($con,$sql)or die(mysqli_error());
 
 		$i =0;
		   while($row = mysqli_fetch_array($resultado)){
 $idodt[$i]= $row['idodt'];
   $cc[$i]= $row['cc'];
     $ma[$i]= $row['ma'];
   
	$tarea[$i] = $row['tarea']; 
		$fecha[$i] = $row['fecha']; 
	$tiempo[$i] = $row['tiempo']; 
	  $descripcion[$i] = $row['descripcion']; 

	
	$hoy = $row['hoy']; 
	
	$idact[$i] = $row['idactividad'];
	
	$ini =$row['ini']; ;
	$fin = $row['fin'];;
		 $i =$i+1;  }
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Timer</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="css/tablah.css" rel="stylesheet">
	 <link href="css/popup.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->
<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
    <!-- Custom styles for this template -->
    <link href="css/landing-page.css" rel="stylesheet">
     <link rel="stylesheet" href="vendor/dist/datepicker.css">
	 <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
  </head>

  <body>

     < <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Timer</a>
		
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actividades.php">Actividades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vista_reporte.php">Reportes</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="estadisticas.php">Estadisticas</a>
            </li >
			<li class="nav-item">
			<a class="nav-link" href="../cerrarsesion.php"><i class="fa fa-user-times fa-fw"></i>Cerrar sesion</a>
            </li>
		  </ul>
        </div>
      </div>
    </nav>

 
   
    
    
	<!-- Page Content -->
<br>


    <section id="one" class="content-section-b">

      <div class="container">

       
    <br></br>


<center><h4>Modificar reporte  </h4></center>
<br>






<form  action="actualizar.php?idact=<?php echo $idact ?>" method="post">
  
  <center>
  
<center> <select style="width:200px" class="col-lg-2 form-control"  id="myselect" name="odt"  required> 
			<option value="">odt</option>
		   <?php 
                      
			$result = mysqli_query($con,"SELECT * FROM odt ") or die("Error: ".mysqli_error($con));
		
		   while($row = mysqli_fetch_array($result)){?>

      
				 <?php if( $row['idodt'] == $idodt[0]){ ?>
				 <option selected value="<?php echo $row['idodt'];?>"><?php echo $row['idodt'];?></option>   
					 
				 <?php    }else { ?>
				 
           

                              <option value=" <?php echo $row['idodt']; ?> "> <?php echo $row['idodt'];?></option>
                             
                             
                                  
           <?php  }
		   }
		   ?>
            
            
			 </select></center>
			<br>
	  <center><select style=" width: 500px" class="col-lg-2 form-control"  id="myselect" name="tarea" required> 
			<option value="">actividad</option>
		   <?php 
                      
			$result = mysqli_query($con,"SELECT * FROM tarea") or die("Error: ".mysqli_error($con));
		
		   while($row = mysqli_fetch_array($result)){?>

       <?php if( $row['nombre'] == $tarea[0]){ ?>
				<option selected value="<?php echo $row['idtarea'];?>"><?php echo $row['nombre'];?></option>   
					 
				 <?php    }else { ?>

                              <option value="<?php echo $row['idtarea'];?>"><?php echo $row['nombre'];?></option>
                             
                             
                                  
				 <?php } } ?>
            
            
			 </select></center><br>
  <h6>Dia </h6>
  <div style="width: 200px" class="input-group mb-2 mr-sm-2 mb-sm-0">
<div class="input-group-addon"></div>
    
            <input name="fecha"type="text" value =" <?php  echo $fecha[0]?> " class="form-control" data-toggle="datepicker" placeholder="dia">
          
		   </div>
  <br>
  <table><tr>
  <th><h6>Hora de inicio</h6></th>
  <th></th>
  <th><h6>Hora de Termino</h6></th>
	   </tr><tr>
	   
        <th>  <div style="width: 130px"  class="input-group clockpicker" data-placement="top" data-align="center" data-donetext="Done">

	<input name="ini" type="text" class="form-control" value="<?php echo $ini ?>" required>
			
	<span class="input-group-addon">
				
    	<span class="fa fa-clock-o">
	</span>
			
	</span>
	
 
		
	</div> 
		   
		 </th> <th></th> <th>  
		   
       <center> <div style="width: 130px"  class="input-group clockpicker" data-placement="top" data-align="center" data-donetext="Done">

	<input name="fin" type="text" class="form-control" value="<?php echo $fin ?>" required>
			
	<span class="input-group-addon">
				
    	<span class="fa fa-clock-o">
	</span>
			
	</span></div> <center>
	</th>
 
		 
	</tr>  
	</table>
	<br>
	 <h6>Comentario </h6>
	 <textarea name ="descripcion"class="form-control"  rows="2"> <?php echo $descripcion[0] ?>  </textarea>
<br></br>
<input type="submit" class="btn btn-primary" value="Modificar">
</form>

    <a class="btn btn-primary" href="javascript:window.history.back();">&laquo; Regresar</a>
   
   
</center>

</form>	
  
                 
        
        </div>

   
      <!-- /.container -->

    </section>
    <!-- /.content-section-b -->

    
    <!-- /.content-section-a -->

    <aside class="banner">

      <div class="container">

        <div class="row">
          <div class="col-lg-6 my-auto">
           <center><h3>&copy; 2017 - TIP/TEF7  </h3></center>
          </div>
          <div class="col-lg-6 my-auto">
                             
			
          </div>
		     
                  
        </div>
      
      </div>
      <!-- /.container -->
	  
	  
    </aside>
    <!-- /.banner -->
     
    <!-- Footer -->
    

   
    
	
	
  
    <!-- Bootstrap core JavaScript -->
    <script src="assets/js/validator.js"></script>
    <script src="assets/js/validator.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="vendor/dist/datepicker.js"></script>
  <script>
    $(function() {
      $('[data-toggle="datepicker"]').datepicker({
        autoHide: true,
        zIndex: 2048,
		format: 'yyyy-mm-dd' 
      });
    });
  </script>
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
$('.clockpicker').clockpicker()
	.find('input').change(function(){
		console.log(this.value);
	});
var input = $('#single-input').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});

$('.clockpicker-with-callbacks').clockpicker({
		donetext: 'Done',
		init: function() { 
			console.log("colorpicker initiated");
		},
		beforeShow: function() {
			console.log("before show");
		},
		afterShow: function() {
			console.log("after show");
		},
		beforeHide: function() {
			console.log("before hide");
		},
		afterHide: function() {
			console.log("after hide");
		},
		beforeHourSelect: function() {
			console.log("before hour selected");
		},
		afterHourSelect: function() {
			console.log("after hour selected");
		},
		beforeDone: function() {
			console.log("before done");
		},
		afterDone: function() {
			console.log("after done");
		}
	})
	.find('input').change(function(){
		console.log(this.value);
	});

// Manually toggle to the minutes view
$('#check-minutes').click(function(e){
	// Have to stop propagation here
	e.stopPropagation();
	input.clockpicker('show')
			.clockpicker('toggleView', 'minutes');
});
if (/mobile/i.test(navigator.userAgent)) {
	$('input').prop('readOnly', true);
}
</script>
<script>
function change(){
    document.getElementById("myform").submit();
}
</script>


  </body>

</html>
