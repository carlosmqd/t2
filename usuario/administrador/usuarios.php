<?php
  session_start();
  
  $User = $_SESSION['Usertimer'] ;
  $idUser = $_SESSION['idUsertimer'] ;
 if($User == null){
 header("Location: /timer2/index.php");
 }
 
 include('../conexion.php');
 
 $sqlestado= " SELECT * FROM usuarios WHERE idusuario= $idUser  ";
  $resultestado = mysqli_query($con,$sqlestado)or die(mysqli_error());
  while($row1=mysqli_fetch_array($resultestado)) {
     
    
	$estado = $row1['idestado'];
	
  }
    $_SESSION['idestadotimer'] = $estado;
   $orden =813512391;
   $x=0;
   $activatiempo = 0;
   /* $sqlactivos ="SELECT COUNT(*) activo FROM `actividad` WHERE activo = 1 and idusuario=0  ";
	     $resultadoact = mysqli_query($con,$sqlactivos)or die(mysqli_error());
          $i=0;
          while($rowact=mysqli_fetch_array($resultadoact )) {
	            
	        $activos = $rowact['activo'];
		  }
		  
		  if ($activos == 0){
			   $activatiempo = 0;
			  $sqlactivar = "UPDATE actividad SET activo = 1 ";
           mysqli_query($con,$sqlactivar)or die(mysqli_error());
		   
		  
			  
		  } else   if ($activos > 1){
			  $activatiempo = 0;
		  }else {
			  $activatiempo = 1;
		  }*/
   
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		
	</head>
	


<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="css/tabla.css" rel="stylesheet">
	 <link href="css/popup.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->

    <!-- Custom styles for this template -->
    <link href="css/landing-page.css" rel="stylesheet">

  </head>

  <body>
  

    <!-- Navigation -->
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


   <br></br>
  <br></br> 
<br></br>   
<center><h1>Usuarios </h1><center>
<select name="area" class="col-lg-2 form-control" required> 
			<option value="" selected="selected">---</option>
		   <?php $enlace = mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
   
			$result = mysqli_query( $enlace,"SELECT * FROM area") or die("Error: ".mysqli_error($enlace));
		
		   while($row = mysqli_fetch_array($result)){?>

      
				  <option value="<?php echo $row['idarea'];?>"><?php echo $row['nombre'];?></option>
				 
           <?php } ?>
            
			 </select> 
<br></br>

<input type ="button" value="modificar usuario">
<br></br>
<a><h3>asignar ODT : </h3></a>   <select name="area" class="col-lg-2 form-control" required> 
			<option value="" selected="selected">---</option>
		   <?php $enlace = mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
   
			$result = mysqli_query( $enlace,"SELECT * FROM area") or die("Error: ".mysqli_error($enlace));
		
		   while($row = mysqli_fetch_array($result)){?>

      
				  <option value="<?php echo $row['idarea'];?>"><?php echo $row['nombre'];?></option>
				 
           <?php } ?>
            
			 </select> 
<br></br>
<a><h3>asignar maquina</h3></a>  <select name="area" class="col-lg-2 form-control" required> 
			<option value="" selected="selected">---</option>
		   <?php $enlace = mysqli_connect("127.0.0.1","root","", "capacitacion_en_linea");
   
			$result = mysqli_query( $enlace,"SELECT * FROM area") or die("Error: ".mysqli_error($enlace));
		
		   while($row = mysqli_fetch_array($result)){?>

      
				  <option value="<?php echo $row['idarea'];?>"><?php echo $row['nombre'];?></option>
				 
           <?php } ?>
            
			 </select> 

<br></br>




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
<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

			</body>
</html>
