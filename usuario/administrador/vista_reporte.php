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
    <!-- Header -->

    <header class="intro-header">

      <div class="container">
        <div class="intro-message">
		
           <h3>Reportes </h3>
		   
		   
          <br></br>
<ul class="list-inline intro-social-buttons">
            <li class="list-inline-item">
              <a href="odt.php" class="btn btn-secondary btn-lg">
                <i class="fa fa-file-text fa-fw"></i>
                <span class="network-name">Ver ODt's </span>
              </a>
            </li>
            
		
		<br></br>			
          <hr class="intro-divider">
<br></br><br></br>
          <ul class="list-inline intro-social-buttons">
            <li class="list-inline-item">
              <a href="modificar.html" class="btn btn-secondary btn-lg">
                <i class="fa fa-file-text fa-fw"></i>
                <span class="network-name">Modificar Reporte</span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="consultaSAP.php" class="btn btn-secondary btn-lg">
                <i class="fa fa-file-text fa-fw"></i>
                <span class="network-name">Reporte de actividades</span>
              </a>
            </li>
          
		
     
 </div>
      </div>
	 <br></br><br></br><br>
   	  <!-- popup -->
   

    
    </header>
   
    
    
	

    
    
    

   
    
	
	<?php  

?>
  
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </body>

</html>
