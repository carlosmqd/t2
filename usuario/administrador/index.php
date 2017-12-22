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

    <!-- Header -->
    <header class="intro-header">
      <div class="container">
        <div class="intro-message">
           <h3>Bienvenido </h3>
		   
		   <?php if ($_SESSION['idestadotimer']== "1"){?>
		   <span style =" color: #18D118;"class="fa fa-check-circle fa-2x"></span>
		   <?php } if ($_SESSION['idestadotimer']== "2"){?>
		   <span style =" color: #F5FC32;" class="fa fa-clock-o fa-2x"></span>
		   <?php } if ($_SESSION['idestadotimer']== "3"){?>
		   <span style =" color: #f00;"class="fa fa-times fa-2x"></span>
		   <?php }?>
		   <?php echo " ".$User."  "; ?>
          <br></br>

        </div>
      </div>
	  
      <div class="container">

        <div class="row">
          
				<div class="table-users">
        <div class="header">Actividad   <a href="#popup2" class="btn btn-secondary btn-lg">
                <i class="fa fa-plus fa-fw"></i>
          
              </a></div>
		
		<table cellspacing="0">
            <tr>
			  <th>Nombre</th>
			   <th>Apellido</th>
                <th>Estatus</th>
               
				
				 <th>Actividades</th>
                
            </tr>
			
			
     <?php //SELECT `idactividad`, actividad.nombre, `descripcion`, TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_ini, `hora_fin`, `tiempo`, `idtipoactividad`, `dia`, estatus.nombre as nombre_estatus, actividad.idestatus FROM `actividad` ,estatus where estatus.idestatus = actividad.idestatus   
	 
	    
		 
	 $miselect= " SELECT  idusuario,`nombre`, `apellido`, `usuario`, `idestado` FROM usuarios WHERE idtipousuario=1";
  $resultado = mysqli_query($con,$miselect)or die(mysqli_error());
  $i=0;
  while($row=mysqli_fetch_array($resultado)) {
     
   $iduser[$i] = $row['idusuario']; 
    $nombre[$i]= $row['nombre'];
    $apellido[$i]= $row['apellido'];
   

	$estado[$i] = $row['idestado']; 
	
	
  

   ?>
                
                 <tr>
		<td><?php echo $nombre[$i] ?></td>
		<td><?php echo $apellido[$i] ?></td>
                <td> <?php if ($estado[$i]== "1"){?>
		   <span style =" color: #18D118;"class="fa fa-check-circle fa-2x"></span>
		   Available<?php } if ($estado[$i]== "2"){?>
		   <span style =" color: #F5FC32;" class="fa fa-clock-o fa-2x"></span>
		    Away<?php } if ($estado[$i]== "3"){?>
		   <span style =" color: #f00;"class="fa fa-times fa-2x"></span>
		   Busy<?php }?></td>
                
                
				 <td> <center><a class="btn btn-info" type="button" href="ver_dia.php?id=<?php echo $iduser[$i] ?>">ver dia</a></center></td>
					   
			      </tr>  
				
				 <?php  $i=$i+1;} ?>
           
                
               
 
           
                    </table>
	               </div>
                 </div>
			
        
        </div>
	  <div class="modal-wrapper" id="popup2">
   <div class="popup2-contenedor">
    <form action="crear_actividad.php?act=2" method ="post">
     <center> <h2>Agregar Empleado</h2></center>
          <br></br>
          <center><h4>No.empeado:</h4> </center>
	  <center><input type="text"> </center>
	  <center><h4>Nombre:</h4> </center>
	  <center><input type="text"> </center>
           <center><h4>Apellido:</h4> </center>
	  <center><input type="text"> </center>
	  <br></br>
      <center><input type="submit" value="agregar"></center>
	  <a class="popup2-cerrar" href="#">X</a>
	  </form>
   </div>
   </div>
<center><h3>&copy; 2017 - TIP/TEF7  </h3></center>
    </header>
   
    
	<!-- Page Content -->
  

   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</script>
  </body>

</html>
