<?php
  session_start();
  
  $User = $_SESSION['Usertimer'] ;
  $idUser = 3 ;
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
   $activatiempo = 1;
   
   
	
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

 
   
    
    
	<!-- Page Content -->
  <header class="intro-header">

    <section id="one" class="content-section-b">

      <div class="container">
    <center><h1>Team Board</h1></center>
<?php
    if(isset($_GET['pos']))
    {
        $location=$_GET['pos'];
       
    ?>
    <script>
        var myselect = document.getElementById("myselect");
        myselect.options.selectedIndex = <?php echo $_GET["pos"]; ?>
    </script>
    <?php
    }
    ?>
<?php
    if(isset($_GET['id']))
    {
        $idusert=$_GET['id'];
        }else{$idusert=0;}
    ?>
    
    
  <br></br> 
   <br></br>
  <center><select  class="col-lg-2 form-control"  id="myselect" name="usuario" onchange="window.location='actividades.php?id='+this.value+'&pos='+this.selectedIndex;" required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT * FROM usuarios where idtipousuario=1 ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['idusuario'];?>"selected="selected"><?php echo $row['nombre']." ".$row['apellido'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['idusuario'];?>"><?php echo $row['nombre']." ".$row['apellido'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center>
<br></br>   

<br></br> 
        <div class="row">
          
				<div class="table-users">
        <div class="header">Actividades</div>
		
		<table cellspacing="0">
            <tr>
			  
			   <th>No.de Orden</th>
                
                <th>Hora de Inicio</th>
				<th>Hora de Termino</th>
				<th>Descripcion</th>
               
				 <th>Tiempo de Actividad</th>
                 
            </tr>
			
			
     <?php //SELECT `idactividad`, actividad.nombre, `descripcion`, TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_ini, `hora_fin`, `tiempo`, `idtipoactividad`, `dia`, estatus.nombre as nombre_estatus, actividad.idestatus FROM `actividad` ,estatus where estatus.idestatus = actividad.idestatus   
	 
	    
		 
	 $miselect= " SELECT `idactividad`, tarea.nombre, `descripcion`, `hora_ini`, `hora_fin`, `tiempo`, `idtipoactividad`, estatus.nombre as nombre_estatus, actividad.idestatus,TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_act FROM `actividad` ,estatus,tarea where tarea.idtarea = actividad.idtarea and estatus.idestatus = actividad.idestatus and idusuario = '$idusert' and ( DATE(hora_ini)=DATE(now()) or TIME(hora_ini) = '00:00:00') ORDER BY `actividad`.`idactividad` DESC   ";
  $resultado = mysqli_query($con,$miselect)or die(mysqli_error());
  $i=0;
  while($row=mysqli_fetch_array($resultado)) {
     
    $id[$i]= $row['idactividad'];
    $tipo[$i]= $row['idtipoactividad'];
   
	$nombre[$i] = $row['nombre']; 
	
	$descripcion[$i] = $row['descripcion']; 
	
	$estatus[$i] = $row['idestatus']; 
	
	$nombreestatus[$i] = $row['nombre_estatus'];
	
	$tiempo[$i] = $row['hora_ini'];
	$tiempof[$i] = $row['hora_fin'];

	$tiempo_actual[$i] = $row['hora_act'];
	
	$tiempofinal[$i] = $row['tiempo'];
	
	
  

   ?>
                 <?php 
	?>
                 <tr>
				<td><?php echo $orden = $orden+1; ?></td>
				<td><?php echo $tiempo[$i]  ?></td>
				<td><?php echo $tiempof[$i]?></td>
				<td><?php echo $nombre[$i] ?></td>
				<td><?php echo $nombre[$i] ?></td>
                
                
               
				
					   
			      </tr>  
				   
				 <?php  $i=$i+1;} ?>
            
                
               
 
           
                    </table>
	               </div>
                 </div>
			
        
        </div>

      
      <!-- /.container -->

    </section>
	</header>
    <!-- /.content-section-b -->

    
    <!-- /.content-section-a -->

    <aside class="banner">

        <div class="container">

       <div class="row">
         <div class="col-lg-6 my-auto">
         <center> <h3>&copy; 2017 - TIP/TEF7  </h3></center>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	
  </body>

</html>
