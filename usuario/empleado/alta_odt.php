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
   
   
	   $sqltiempo= " SELECT `idactividad`, tarea.nombre, `descripcion`, `hora_ini`, `hora_fin`, `tiempo`, `idtipoactividad`,  estatus.nombre as nombre_estatus, actividad.idestatus,TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_act FROM `actividad` ,estatus,tarea where estatus.idestatus = actividad.idestatus and idusuario = '3' ORDER BY `actividad`.`idactividad` DESC";
  $resultiempo = mysqli_query($con,$sqltiempo)or die(mysqli_error());
  $j=0;
  while($rowt=mysqli_fetch_array($resultiempo)) {
     
  
      $id[$j]= $rowt['idactividad'];
	$tiempo_actual[$j] = $rowt['hora_act'];
	
	 $j=$j+1;
  }
   $actual = $_SESSION['tiempoactual']; 
   
   if($actual!=null){
    $t=tiempo_total($id[ $actual],$con,1);
	$tt = segundos_a_hora($t);
   }
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

    <!-- Custom styles for this template -->
    <link href="css/landing-page.css" rel="stylesheet">

  </head>

  <body>

     <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><i class="fa fa-arrow-up  fa-fw"></i>Timer</a>
		<?php if($activatiempo == 0){?>
			<center><a style ="color:#f00">sin actividad</a> </center>
			
		<?php }else{?>
		<center><a style ="color:#f00 "id='CuentaAtras'></a> </center>
		<?php }?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Actividades</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="alta_odt.php">ODT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="historico.php">Historico</a>
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
  

    <section id="one" class="content-section-b">

      <div class="container">

       
    <br></br>      
<center><h4>Alta ODT </h4></center>
<br>
<?php 
if ($_SESSION['check'] == null){
$_SESSION['check']=0;
}

$check = $_SESSION['check'];
if ($_SESSION['check'] == 1) { ?>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" checked="" name="check" id="check_id_1" type="checkbox"  onClick="window.location='onClick="href=alta_odt.php"/> Sin MA
    </label>
  </div>

<form class="form-inline" action="" method="get">

<div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="C.C">
  </div>
<br></br>
 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Tiempo (hrs)">
  </div>

  <label class="sr-only" for="inlineFormInputGroup">Username</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Productos">
  </div> <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="MSE">
  </div>
 
  
</form>	
<a href="http://google.com" class="btn btn-primary" >Crear</a>
<?php $_SESSION['check']=0;}
else { ?>
 <div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox"  onClick="window.location=alta_odt.php"/> Sin MA
    </label>
  </div> 

<form class="form-inline" action="" method="get">
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="MA">
  </div>
  <label class="sr-only" for="inlineFormInputGroup">Username</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Descripcion">
  </div>
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="C.C">
  </div>
<br></br>
 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Tiempo (hrs)">
  </div>

   <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
  <label class="sr-only" for="inlineFormInputGroup">Username</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Productos">
  </div> <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="MSE">
  </div>
 

</form>	
  

<a href="http://google.com" class="btn btn-primary" >Crear</a>
<?php $_SESSION['check']=1; } ?> 

<br>

                 
        
        </div>

        <br></br>
	<br></br>
	<br></br>
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
	  
	  <div class="modal-wrapper" id="popup3">
   <div class="popup3-contenedor">
    <form action="interrupcion.php?id=<?php echo $idf?>" method ="post">
	  <center><h3>¿Que actividad provocó la interrupcion?</h3> </center>
	  <center><select name="intr">
	  <option value ="1">Llamada telefonica</option>
      <option value ="2">Consulta presencial</option>
      <option value ="3">Mantenimiento</option></select></center>
	   
	  <br></br>
      <center><input type="submit" value="registrar"></center>
	  <a class="popup3-cerrar" href="#one">X</a>
	  </form>
   </div>
   </div>
<div class="modal-wrapper" id="popup4">
     
   <div class="popup4-contenedor">
   <form action="validaractividad.php?id=<?php echo $idf?>&btn=finalizar" method ="post">
    
	  <center><h3>Comentarios</h3> </center>
	  <center>
	  <input  type="text" name="comentario">
	  </center><br></br>
      <center><input  type="submit" value="registrar"></center>
	  <a class="popup4-cerrar" href="#one">X</a>
	  </form>
   </div>
   </div>
    </aside>
    <!-- /.banner -->
     
    <!-- Footer -->
    

   
    
	
	
  
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script language="JavaScript">
	/* Determinamos el tiempo total en segundos */
    <?php if($x==0){?>
	var totalTiempo= <?php echo $tt; ?>;
<?php } else{?>

 totalTiempo=totalTiempo;//tiempo en segundos
<?php }?>

var timestampStart = new Date().getTime();

var endTime=timestampStart+(totalTiempo*1000);

var timestampEnd=endTime-new Date().getTime();


/* Variable que contiene el tiempo restante */

var tiempRestante=totalTiempo;


/* Ejecutamos la funcion updateReloj() al cargar la pagina */

updateReloj();


function updateReloj() {

    var Seconds=tiempRestante;

    

    var Days = Math.floor(Seconds / 86400);

    Seconds -= Days * 86400;


    var Hours = Math.floor(Seconds / 3600);

    Seconds -= Hours * (3600);


    var Minutes = Math.floor(Seconds / 60);

    Seconds -= Minutes * (60);


    var TimeStr = ((Days > 0) ? Days + " dias " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds);

    /* Este muestra el total de hora, aunque sea superior a 24 horas */

    //var TimeStr = LeadingZero(Hours+(Days*24)) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds);


    document.getElementById('CuentaAtras').innerHTML = TimeStr;


    

        /* Restamos un segundo al tiempo restante */

        tiempRestante+=1;

        /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */

        setTimeout("updateReloj()",1000);

    

}


/* Funcion que pone un 0 delante de un valor si es necesario */

function LeadingZero(Time) {

    return (Time < 10) ? "0" + Time : + Time;

}



</script>
<?php function tiempo_total($t,$c,$x)
{
	$id =$t;
	$con =$c;
		 //Verificar tiempo pausa
		 $queryv="SELECT COUNT(idpausa)as pausa FROM `pausa` WHERE idactividad='$id'";
       $resultv= mysqli_query($con,$queryv)or die(mysqli_error());
      while($rowv=mysqli_fetch_array($resultv)) {
     
   
         $pausav= $rowv['pausa'];
	     
	  
   }
		 $total = null;
		 if($pausav==0){
			$querysp="SELECT timediff(now(),hora_ini)as tiempo FROM actividad WHERE idactividad='$id'";
       $resultsp= mysqli_query($con,$querysp)or die(mysqli_error());
      while($rowsp=mysqli_fetch_array($resultsp)) {
     
   
         $total= $rowsp['tiempo'];
	  
	  
   }
			 
			 return  $total ;
		 }else{
		 
		 
		 
  
    //primer valor
       $e = new DateTime('00:00');
	   $f = clone $e;
       $query1="SELECT timediff(MIN(hora_pausa),hora_ini)as hora_pausa FROM actividad,pausa WHERE pausa.idactividad='$id' and actividad.idactividad='$id'";
       $result1= mysqli_query($con,$query1)or die(mysqli_error());
      while($row1=mysqli_fetch_array($result1)) {
     
   
         $hora_pausa1= $row1['hora_pausa'];
	     $pausa1 = new DateTime($hora_pausa1);
	     $auxpausa1 = new DateTime("00:00");
		 
		   $dteDiff1   = $pausa1->diff($auxpausa1);
	     $dteDiff1  ->format("%H:%I:%S");
	     $e->add($dteDiff1);
	     $f->diff($e);
	  
   }
	
	 
	  
  //segundo  valor
      $i=0;
      $hora_pausa[]="";
	  $hora_reinicio[]="";
      $query2="SELECT * FROM `pausa` WHERE idactividad='$id'";
      $result= mysqli_query($con,$query2)or die(mysqli_error());
   while($row=mysqli_fetch_array($result)) {
     
   
      $hora_pausa[$i]= $row['hora_pausa'];
	  $hora_reinicio[$i] = $row['hora_reinicio']; 
	
	 $i=$i+1;
	  }
	  
	  $t=sizeof($hora_pausa);
	 //  $t;
	 
	  for($j=1;$j<$t;$j++)
	  {
		   $datetime1 = new DateTime( $hora_pausa[$j]);
	       $datetime2 = new DateTime($hora_reinicio[$j-1]);
		  
		 
		  $dteDiff   = $datetime1->diff($datetime2);
		 $dteDiff->format("%H:%I:%S");
		
         $e->add($dteDiff);
		
       //
	  }
	  
	  if($x==1){
	 $query3="Select timediff(TIME(NOW()),(SELECT TIME(hora_reinicio) FROM `pausa` where idactividad='$id' and hora_reinicio = (SELECT MAX( hora_reinicio ) FROM pausa)))as tiempo";
       $result3= mysqli_query($con,$query3)or die(mysqli_error());
      while($row3=mysqli_fetch_array($result3)) {
     
   
         $hora_pausa3= $row3['tiempo'];
	     $pausa3 = new DateTime($hora_pausa3);
	     $auxpausa3 = new DateTime("00:00");
		 
		   $dteDiff3   = $pausa3->diff($auxpausa3);
	     $dteDiff3  ->format("%H:%I:%S");
	     $e->add($dteDiff3);
	     $f->diff($e);
	  }
   }
  
	 $total = $f->diff($e)->format("%H:%I:%S");//suma de valores intermedios	
	
    return  $total ;
		 }
}
function segundos_a_hora($hora) { 
    list($h, $m, $s) = explode(':', $hora); 
    return ($h * 3600) + ($m * 60) + $s; 
} ?>
  </body>

</html>
