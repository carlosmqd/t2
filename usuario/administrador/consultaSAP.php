<?php
  session_start();
  
  $User = $_SESSION['Usertimer'] ;
  $idUser = $_SESSION['idUsertimer'] ;
 if($User == null){
 header("Location: /timer2/index.php");
 }
 
 include('../conexion.php');
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
     <link href="css/tablar.css" rel="stylesheet">
	 <link href="css/popup.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->

    <!-- Custom styles for this template -->
    <link href="css/landing-page.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/github.min.css">
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
<br></br><br></br><br></br>
      <div class="container">

        <div class="row">
          
				<div class="table-users">
        <div class="header"><img src="../../media/imagenes/logo.jpg">&nbsp&nbsp&nbsp Reporte de Tiempo &nbsp&nbsp&nbsp&nbsp&nbsp TEF7 
          <h6>Nombre:  &nbsp&nbsp&nbsp&nbspno.empleado: &nbsp&nbsp&nbspfecha:</h6></div>
		
		<table cellspacing="0">
            <tr>
			  <center><th>ODT</th></center>
			   
                <th>C.C</th>
		<th>MA</th>
                <th>Descripcion</th>
               
				<th>fecha</th>
				 <th>tiempo(horas)</th>
                 <th>Observaciones</th>
            </tr>
			
			
     <?php //SELECT `idactividad`, actividad.nombre, `descripcion`, TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_ini, `hora_fin`, `tiempo`, `idtipoactividad`, `dia`, estatus.nombre as nombre_estatus, actividad.idestatus FROM `actividad` ,estatus where estatus.idestatus = actividad.idestatus   
	 
	    
		 
	 $miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  ";
  $resultado = mysqli_query($con,$miselect)or die(mysqli_error());
  $i=0;
  while($row=mysqli_fetch_array($resultado)) {
     
    $idodt[$i]= $row['idodt'];
    $cc[$i]= $row['cc'];
     $ma[$i]= $row['ma'];
   
	$tarea[$i] = $row['tarea']; 
	
	$descripcion[$i] = $row['descripcion']; 
	$fecha[$i] = $row['fecha']; 
	$tiempo[$i] = $row['tiempo']; 
	$hoy = $row['hoy']; 
	

	
	
	
  

   ?>
                 <?php 
	?>
                 <tr>
				<td><?php echo $idodt[$i] ?></td>
				<td><?php echo $cc[$i]; ?></td>
                                 <td><?php echo $ma[$i]; ?></td>
                <td><?php echo $tarea[$i] ?></td>
                <td><?php echo $fecha[$i]?></td>
                <td><?php echo $tiempo[$i]?></td>
                 <td><?php echo $descripcion[$i]?></td>
                
                
					   
			      </tr>  
				   
				 <?php  $i=$i+1;} ?>
            
                
               
 
           
                    </table>
	               </div>
                 </div>
			
        
        </div>

      <div>

       <center><a type="button" href="reporte.php" class="btn btn-success" >Reporte excel</a></center>
      </div>
     <br></br>
<section></section>
      <!-- /.container -->

    </section>
   <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </body>

</html>
