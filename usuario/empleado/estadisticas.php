<?php
  session_start();
  
  $User = $_SESSION['Usertimer'] ;
  $idUser = $_SESSION['idUsertimer'] ;
 if($User == null){
 header("Location: /timer2/index.php");
 }
 
 include('../conexion.php');
 

   
?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Estadisticas</title>

		
	</head>
	


<link rel="stylesheet" href="vendor/bootstrap/css/buttons.bootstrap.min.css">

 <link rel="stylesheet" href="vendor/dist/datepicker.css">

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
  
<script src="Highcharts-5.0.14/code/highcharts.js"></script>
<script src="Highcharts-5.0.14/code/modules/exporting.js"></script>
   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><i class="fa fa-arrow-up  fa-fw"></i>Timer</a>
		
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
              <a class="nav-link" href="alta_fp.php">Fuera de Planta</a>
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
   <div class ="container">
<table>
<tr>
 <th><center><a class="btn btn-success" href="estadisticas.php?f=0"><b>KPI</b></a></center> </th>
    
    <th><center><a class="btn btn-success" href="estadisticas.php?f=1"><b>Interrupciones</b></a></center> </th>
    
    
    
 </tr>
</table>
<br>
<?php 

$checkg=0;

if (ISSET($_GET['idcheck'] )== null ){}else {$checkg = $_GET['idcheck']; }
if (ISSET($_GET['f'] )== null ){$f=0;}else {$f= $_GET['f']; }
?>
<form  action="estadisticas.php?idcheck=<?php echo $checkg ?>&f=<?php echo $f ?>" method="post">
<table>
<tr>
<center><h4>Filtro </h4></center>
</tr><tr>
<th>
<?php if ($checkg == 0) { 


if(isset($_POST['cc']) != null){ }else{$_POST['cc']= null ;}
if(isset($_POST['empleado']) != null){ }else{$_POST['empleado']=null ;}
if(isset($_POST['year']) != null){ }else{$_POST['year']= null ;}

if( $_POST['year']== null ){
//echo"<script type=\"text/javascript\"> alert('inicio');</script>";
$filtro = 25;
}else {
if( $_POST['empleado'] != null && $_POST['cc'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro empleado y cc');</script>";

 $yearf=$_POST['year'];
$idUser=$_POST['empleado'];
$ccf=$_POST['cc'];

$filtro = 26;

} else if( $_POST['cc']==null && $_POST['empleado']== null){
//echo"<script type=\"text/javascript\"> alert('solo filtro con fecha');</script>";
 $yearf=$_POST['year'];

$filtro = 27;
} else if($_POST['empleado'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";




$idUser=$_POST['empleado'];
 $yearf=$_POST['year'];
$filtro = 28;
}else if( $_POST['cc'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";



 $yearf=$_POST['year'];
$ccf=$_POST['cc'];
$filtro = 29;
}
}










?>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=0&f=<?php   echo $f  ?>'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"   for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=1&f=<?php   echo $f  ?>'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=2&f=<?php   echo $f  ?>'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=3&f=<?php   echo $f  ?>'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=4&f=<?php   echo $f  ?>'"/> periodo anual
    </label>
  </div>

</th></tr>
<tr><th style="width:400px"> <center><select  style="width:400px" class="col-lg-2 form-control"  id="myselect" name="year"  required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(hora_ini)as fecha FROM actividad where YEAR(hora_ini) ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['fecha'];?>"selected="selected"><?php echo $row['fecha'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['fecha'];?>"><?php echo $row['fecha'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center> </tr>
 








<?php } else if($checkg == 1){ 

if(isset($_POST['inicio']) != null){ }else{$_POST['inicio']=null ;}
if(isset($_POST['fin']) != null){ }else{$_POST['fin']=null ;}
if(isset($_POST['cc']) != null){ }else{$_POST['cc']= null ;}
if(isset($_POST['empleado']) != null){ }else{$_POST['empleado']=null ;}


if( $_POST['inicio']== null && $_POST['fin'] == null){
//echo"<script type=\"text/javascript\"> alert('inicio');</script>";
$filtro = 5;
}else {
if( $_POST['empleado'] != null && $_POST['cc'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro empleado y cc');</script>";

$fechaif=$_POST['inicio'];
$fechaff=$_POST['fin'];
$idUser=$_POST['empleado'];
$ccf=$_POST['cc'];

$filtro = 6;

} else if( $_POST['cc']==null && $_POST['empleado']== null){
//echo"<script type=\"text/javascript\"> alert('solo filtro con fecha');</script>";

$fechaif=$_POST['inicio'];
$fechaff=$_POST['fin'];
$filtro = 7;
} else if($_POST['empleado'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";


$fechaif=$_POST['inicio'];
$fechaff=$_POST['fin'];
$idUser=$_POST['empleado'];
$filtro = 8;
}else if( $_POST['cc'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";

$fechaif=$_POST['inicio'];
$fechaff=$_POST['fin'];
$ccf=$_POST['cc'];
$filtro = 9;
}
}
?>



<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=0&f=<?php   echo $f  ?>'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=1&f=<?php   echo $f  ?>'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=2&f=<?php   echo $f  ?>'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=3&f=<?php   echo $f  ?>'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=4&f=<?php   echo $f  ?>'"/> periodo anual
    </label>
  </div>


<tr>
 <th>
 

<center><div style="width:300px" class="input-group input-daterange">
                  
   <input type="text" class="form-control" data-toggle="datepicker" name="inicio" required>
           
        <div class="input-group-addon">to</div>
                  
  <input type="text" class="form-control" data-toggle="datepicker" name="fin" required>
        
      </div></center>






</th></tr>







<?php } else if($checkg == 2){ 

if(isset($_POST['mes1']) != null){ }else{$_POST['mes1']=null ;}
if(isset($_POST['cc']) != null){ }else{$_POST['cc']= null ;}
if(isset($_POST['empleado']) != null){ }else{$_POST['empleado']=null ;}
if(isset($_POST['year']) != null){ }else{$_POST['year']= null ;}

if( $_POST['mes1']== null ){
//echo"<script type=\"text/javascript\"> alert('inicio');</script>";
$filtro = 10;
}else {
if( $_POST['empleado'] != null && $_POST['cc'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro empleado y cc');</script>";

$mes1f=$_POST['mes1'];
$yearf=$_POST['year'];

$idUser=$_POST['empleado'];
$ccf=$_POST['cc'];

$filtro = 11;

} else if( $_POST['cc']==null && $_POST['empleado']== null){
//echo"<script type=\"text/javascript\"> alert('solo filtro con fecha');</script>";

$mes1f=$_POST['mes1'];
$yearf=$_POST['year'];

$filtro = 12;
} else if($_POST['empleado'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";

$mes1f=$_POST['mes1'];
$yearf=$_POST['year'];

$idUser=$_POST['empleado'];
$filtro = 13;
}else if( $_POST['cc'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";

$mes1f=$_POST['mes1'];
$yearf=$_POST['year'];

$ccf=$_POST['cc'];
$filtro = 14;
}
}
?>





<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=0&f=<?php   echo $f  ?>'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=1&f=<?php   echo $f  ?>'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input checked="on" class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=2&f=<?php   echo $f  ?>'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=3&f=<?php   echo $f  ?>'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=4&f=<?php   echo $f  ?>'"/> periodo anual
    </label>
  </div>





<tr>
 <th style="width:400px">
<center><div style="width:800px" class="input-group input-daterange">
    
<select class="col-lg-2 form-control" name="mes1" id='$nombre'>";

	<?php 
 $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio', 'Agosto','Septiembre','Octubre','Noviembre','Diciembre');
for ($i=0; $i<sizeof($meses); $i++){ ?>
	<option value=<?php echo $i+1 ?> ><?php echo $meses[$i] ?> </option>';
	<?php } ?>
	</select>
</div></center>
</th>
</tr>

 <tr><th style="width:400px"> <center><select  style="width:400px" class="col-lg-2 form-control"  id="myselect" name="year"  required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(hora_ini)as fecha FROM actividad where YEAR(hora_ini) >0 ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['fecha'];?>"selected="selected"><?php echo $row['fecha'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['fecha'];?>"><?php echo $row['fecha'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center> </tr>




<?php } else if($checkg == 3){ 

if(isset($_POST['mes1']) != null){ }else{$_POST['mes1']=null ;}
if(isset($_POST['mes2']) != null){ }else{$_POST['mes2']=null ;}
if(isset($_POST['cc']) != null){ }else{$_POST['cc']= null ;}
if(isset($_POST['empleado']) != null){ }else{$_POST['empleado']=null ;}
if(isset($_POST['year']) != null){ }else{$_POST['year']= null ;}

if( $_POST['mes1']== null && $_POST['mes2'] == null){
//echo"<script type=\"text/javascript\"> alert('inicio');</script>";
$filtro = 15;
$yearf=$_POST['year'];
}else {
if( $_POST['empleado'] != null && $_POST['cc'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro empleado y cc');</script>";

$mes1f=$_POST['mes1'];
$mes2f=$_POST['mes2'];
$idUser=$_POST['empleado'];
$ccf=$_POST['cc'];
$yearf=$_POST['year'];

$filtro = 16;

} else if( $_POST['cc']==null && $_POST['empleado']== null){
//echo"<script type=\"text/javascript\"> alert('solo filtro con meses');</script>";

$mes1f=$_POST['mes1'];
$mes2f=$_POST['mes2'];
$yearf=$_POST['year'];
$filtro = 17;
} else if($_POST['empleado'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";

$mes1f=$_POST['mes1'];
$mes2f=$_POST['mes2'];
$yearf=$_POST['year'];
$idUser=$_POST['empleado'];
$filtro = 18;
}else if( $_POST['cc'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";

$mes1f=$_POST['mes1'];
$mes2f=$_POST['mes2'];
$yearf=$_POST['year'];
$ccf=$_POST['cc'];
$filtro = 19;
}
}

?>


<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=0&f=<?php   echo $f  ?>'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=1&f=<?php   echo $f  ?>'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=2&f=<?php   echo $f  ?>'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=3&f=<?php   echo $f  ?>'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=4&f=<?php   echo $f  ?>'"/> periodo anual
    </label>
  </div>









<tr>
<center> <th>
<center><div style="width:800px" class="input-group input-daterange">
    
<select class="col-lg-2 form-control" name="mes1" id='$nombre'>";

	<?php 
 $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio', 'Agosto','Septiembre','Octubre','Noviembre','Diciembre');
for ($i=0; $i<sizeof($meses); $i++){ ?>
	<option value=<?php echo $i+1 ?> ><?php echo $meses[$i] ?> </option>';
	<?php } ?>
	</select>
<div class="input-group-addon">to</div>
 
<select class="col-lg-2 form-control" name="mes2" id='$nombre'>";

	<?php 
 $meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio', 'Agosto','Septiembre','Octubre','Noviembre','Diciembre');
for ($i=0; $i<sizeof($meses); $i++){ ?>
	<option value=<?php echo $i+1 ?> ><?php echo $meses[$i] ?> </option>';
	<?php } ?>
	</select>
</div></center>
  </th></center>
</tr>

<tr><th style="width:400px"> <center><select  style="width:400px" class="col-lg-2 form-control"  id="myselect" name="year"  required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(hora_ini)as fecha FROM actividad where YEAR(hora_ini) >0 ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['fecha'];?>"selected="selected"><?php echo $row['fecha'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['fecha'];?>"><?php echo $row['fecha'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center> </tr>








<?php } else if($checkg == 4){ 



if(isset($_POST['cc']) != null){ }else{$_POST['cc']= null ;}
if(isset($_POST['empleado']) != null){ }else{$_POST['empleado']=null ;}
if(isset($_POST['year1']) != null){ }else{$_POST['year1']= null ;}
if(isset($_POST['year2']) != null){ }else{$_POST['year2']= null ;}

if( $_POST['year1']== null && $_POST['year2'] == null){
		//echo"<script type=\"text/javascript\"> alert('inicio');</script>";
		$filtro = 20;
		$year1f=$_POST['year1'];
		$year2f=$_POST['year2'];
	}else {
if( $_POST['empleado'] != null && $_POST['cc'] != null){
		//echo"<script type=\"text/javascript\"> alert('filtro empleado y cc');</script>";
		
		

		$idUser=$_POST['empleado'];
		$ccf=$_POST['cc'];
		$year1f=$_POST['year1'];
		$year2f=$_POST['year2'];
		
		$filtro = 21;
		
	} else if( $_POST['cc']==null && $_POST['empleado']== null){
		//echo"<script type=\"text/javascript\"> alert('solo filtro con años');</script>";


		$year1f=$_POST['year1'];
		$year2f=$_POST['year2'];
		$filtro = 22;
} else if($_POST['empleado'] != null){
		//echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";

		

$year1f=$_POST['year1'];
$year2f=$_POST['year2'];
$idUser=$_POST['empleado'];
$filtro = 23;
}else if( $_POST['cc'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";



$year1f=$_POST['year1'];
$year2f=$_POST['year2'];
$ccf=$_POST['cc'];
$filtro = 24;
}
}





?>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=0&f=<?php   echo $f  ?>'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=1&f=<?php   echo $f  ?>'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=2&f=<?php   echo $f  ?>'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=3&f=<?php   echo $f  ?>'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'estadisticas.php?idcheck=4&f=<?php   echo $f  ?>'"/> periodo anual
    </label>
  </div>

 </th></tr>

<tr><th > <center><div style="width:700px" class="input-group input-daterange"> <select  style="width:400px" class="col-lg-2 form-control"  id="myselect" name="year1"  required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(hora_ini)as fecha FROM actividad where YEAR(hora_ini) >0 ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['fecha'];?>"selected="selected"><?php echo $row['fecha'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['fecha'];?>"><?php echo $row['fecha'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select>
<div class="input-group-addon">to</div>
 
<select  style="width:400px" class="col-lg-2 form-control"  id="myselect" name="year2"  required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(hora_ini)as fecha FROM actividad where YEAR(hora_ini) >0 ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['fecha'];?>"selected="selected"><?php echo $row['fecha'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['fecha'];?>"><?php echo $row['fecha'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select>
</div>
</center>
</th>
 </tr>

 

    <?php } ?>
    </th><th> <center><input  type="submit" value ="filtrar" class="btn btn-success"></center> </th> 
 </tr>
 </tr>
</table>
</form>

<?php 
 if($f != null){}
if($f ==0){


 if( $filtro == 1 )  { 	 
	 $sqlactivos = " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario  " ;
         $titulo ="Todos";
} else if ($filtro == 2) { 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.odtreal IS NULL ";
   $titulo ="Sin ODT real";
} else if ($filtro == 3){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.fecha <= DATE(date_sub(NOW(), INTERVAL 21 DAY)) ";
 $titulo ="Proximos cierres";
 }  else if ($filtro == 4){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 1";
 $titulo ="Cerradas";
 } 
//////filtro especial fecha ////
else if ($filtro == 5){ 
$sqlactivos ="SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario is null  ";
 $titulo ="Cerradas";
 }else if ($filtro == 6){ 
$sqlactivos ="SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario='$idUser'  ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 7){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and DATE(actividad.hora_ini)BETWEEN '$fechaif' AND '$fechaff' and idusuario='$idUser'";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 8){ 
$sqlactivos ="SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and DATE(actividad.hora_ini)BETWEEN '$fechaif' AND '$fechaff' and idusuario='$idUser'";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 9){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf' and odt.fecha BETWEEN '$fechaif' AND '$fechaff'";
 $titulo ="Filtro por fecha  y cc";
 
//////filtro  mes

}else if ($filtro == 10){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario is null   ";
 $titulo ="Cerradas";
 }else if ($filtro == 11){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idUser' and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) = '$mes1f' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 12){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and YEAR(actividad.hora_ini)= '$yearf' and MONTH(actividad.hora_ini) = '$mes1f' and idusuario='$idUser'";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 13){ 
$sqlactivos= "  SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and YEAR(actividad.hora_ini)= '$yearf' and MONTH(actividad.hora_ini) = '$mes1f' and idusuario='$idUser'";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 14){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) = '$mes1f' ";
 $titulo ="Filtro por fecha  y cc";



//////filtro rango meses 

}else if ($filtro == 15){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario is null  ";
 $titulo ="Cerradas";
 }else if ($filtro == 16){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idUser' and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) BETWEEN '$mes1f' AND '$mes2f'";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 17){ 
$sqlactivos= "SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and YEAR(actividad.hora_ini)= '$yearf' and MONTH(actividad.hora_ini) BETWEEN '$mes1f' AND '$mes2f' and idusuario='$idUser'";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 18){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and YEAR(actividad.hora_ini)= '$yearf' and MONTH(actividad.hora_ini) BETWEEN '$mes1f' AND '$mes2f' and idusuario='$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 19){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) BETWEEN '$mes1f' AND '$mes2f'";
 $titulo ="Filtro por fecha  y cc";


//////filtro rango años

}else if ($filtro == 20){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario is null  ";
 $titulo ="Cerradas";
 }else if ($filtro == 21){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idUser' and odt.idcostos='$ccf'  and YEAR(odt.fecha) BETWEEN '$year1f' and '$year2f' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 22){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea  and YEAR(actividad.hora_ini)   BETWEEN '$year1f' and '$year2f' and idusuario='$idUser' ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 23){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea  and YEAR(actividad.hora_ini) BETWEEN '$year1f' and '$year2f' and idusuario='$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 24){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'   and YEAR(odt.fecha) BETWEEN '$year1f' and '$year2f'";
 $titulo ="Filtro por fecha  y cc";

//////filtro 0

}else if ($filtro == 25){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario is null   ";
 $titulo ="Cerradas";
 }else if ($filtro == 26){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idUser' and odt.idcostos='$ccf'  and YEAR(odt.fecha) = '$yearf'  ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 27){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea    and YEAR(actividad.hora_ini) ='$yearf' and idusuario='$idUser'";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 28){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea    and YEAR(actividad.hora_ini) ='$yearf' and idusuario='$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 29){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'   and YEAR(odt.fecha) = '$yearf' ";
 $titulo ="Filtro por fecha  y cc";


}
}else if($f==1){ 

if( $filtro == 1 )  { 	 
	 $sqlactivos1 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion=0  ";
$sqlactivos2 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion=0  ";
    $titulo ="Todos";
} else if ($filtro == 2) { 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.odtreal IS NULL ";
   $titulo ="Sin ODT real";
} else if ($filtro == 3){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.fecha <= DATE(date_sub(NOW(), INTERVAL 21 DAY)) ";
 $titulo ="Proximos cierres";
 }  else if ($filtro == 4){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 1";
 $titulo ="Cerradas";
 } 
//////filtro especial fecha ////
else if ($filtro == 5){ 
$sqlactivos1 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos2 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos3 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos4 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";


 $titulo ="Cerradas";
 }else if ($filtro == 6){ 
$sqlactivos1 ="SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario is null  ";
$sqlactivos2 ="SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario is null  ";
$sqlactivos3 ="SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario is null  ";
$titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 7){ 
$sqlactivos1 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 1 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and DATE(actividad.hora_ini)BETWEEN '$fechaif' AND '$fechaff'  ";
$sqlactivos2 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 2 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and DATE(actividad.hora_ini)BETWEEN '$fechaif' AND '$fechaff' ";
$sqlactivos3 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 3 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and DATE(actividad.hora_ini)BETWEEN '$fechaif' AND '$fechaff'  ";
$sqlactivos4 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 4 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and DATE(actividad.hora_ini)BETWEEN '$fechaif' AND '$fechaff'  ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 8){ 
$sqlactivos ="SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and DATE(actividad.hora_ini)BETWEEN '$fechaif' AND '$fechaff' and idusuario='$idUser'";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 9){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf' and odt.fecha BETWEEN '$fechaif' AND '$fechaff'";
 $titulo ="Filtro por fecha  y cc";
 
//////filtro  mes

}else if ($filtro == 10){ 
$sqlactivos1 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos2 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos3 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos4 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
 $titulo ="Cerradas";
 }else if ($filtro == 11){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idUser' and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) = '$mes1f' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 12){ 
$sqlactivos1 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 1 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and MONTH(actividad.hora_ini) = '$mes1f' and YEAR(actividad.hora_ini) = '$yearf' ";
$sqlactivos2 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 2 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and MONTH(actividad.hora_ini) = '$mes1f'and YEAR(actividad.hora_ini) = '$yearf' ";
$sqlactivos3 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 3 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and MONTH(actividad.hora_ini) = '$mes1f' and YEAR(actividad.hora_ini) = '$yearf' ";
$sqlactivos4 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 4 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and MONTH(actividad.hora_ini) = '$mes1f' and YEAR(actividad.hora_ini) = '$yearf' ";
$titulo ="Filtro por fecha ";
 }else if ($filtro == 13){ 
$sqlactivos= "  SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and YEAR(actividad.hora_ini)= '$yearf' and MONTH(actividad.hora_ini) = '$mes1f' and idusuario='$idUser'";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 14){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) = '$mes1f' ";
 $titulo ="Filtro por fecha  y cc";



//////filtro rango meses 

}else if ($filtro == 15){ 
$sqlactivos1 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos2 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos3 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos4 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
 $titulo ="Cerradas";
 }else if ($filtro == 16){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idUser' and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) BETWEEN '$mes1f' AND '$mes2f'";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 17){ 
$sqlactivos1 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 1 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and MONTH(actividad.hora_ini) BETWEEN '$mes1f' AND '$mes2f' and YEAR(actividad.hora_ini) = '$yearf'  ";
$sqlactivos2 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 2 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and MONTH(actividad.hora_ini) BETWEEN '$mes1f' AND '$mes2f' and YEAR(actividad.hora_ini) = '$yearf'  ";
$sqlactivos3 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 3 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and MONTH(actividad.hora_ini) BETWEEN '$mes1f' AND '$mes2f' and YEAR(actividad.hora_ini) = '$yearf'  ";
$sqlactivos4 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 4 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and MONTH(actividad.hora_ini) BETWEEN '$mes1f' AND '$mes2f' and YEAR(actividad.hora_ini) = '$yearf' ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 18){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and YEAR(actividad.hora_ini)= '$yearf' and MONTH(actividad.hora_ini) BETWEEN '$mes1f' AND '$mes2f' and idusuario='$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 19){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) BETWEEN '$mes1f' AND '$mes2f'";
 $titulo ="Filtro por fecha  y cc";


//////filtro rango años

}else if ($filtro == 20){ 
$sqlactivos1 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos2 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos3 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos4 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
 $titulo ="Cerradas";
 }else if ($filtro == 21){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idUser' and odt.idcostos='$ccf'  and YEAR(odt.fecha) BETWEEN '$year1f' and '$year2f' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 22){ 
$sqlactivos1 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 1 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and YEAR(actividad.hora_ini) BETWEEN '$year1f' and '$year2f'   ";
$sqlactivos2 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 2 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and YEAR(actividad.hora_ini) BETWEEN '$year1f' and '$year2f'    ";
$sqlactivos3 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 3 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and YEAR(actividad.hora_ini) BETWEEN '$year1f' and '$year2f'    ";
$sqlactivos4 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 4 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and YEAR(actividad.hora_ini) BETWEEN '$year1f' and '$year2f'    ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 23){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea  and YEAR(actividad.hora_ini) BETWEEN '$year1f' and '$year2f' and idusuario='$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 24){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'   and YEAR(odt.fecha) BETWEEN '$year1f' and '$year2f'";
 $titulo ="Filtro por fecha  y cc";

//////filtro 0

}else if ($filtro == 25){ 
$sqlactivos1 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos2 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos3 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
$sqlactivos4 ="SELECT interrupcion.nombre, sum(interrupcion.tiempo) as tiempo FROM actividad,`interrupciones`, interrupcion WHERE interrupcion.idinterrup = interrupciones.idinterrup and interrupcion.idinterrup=0  ";
 $titulo ="Cerradas";
 }else if ($filtro == 26){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idUser' and odt.idcostos='$ccf'  and YEAR(odt.fecha) = '$yearf'  ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 27){ 
$sqlactivos1 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 1 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and YEAR(actividad.hora_ini) = '$yearf'   ";
$sqlactivos2 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 2 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and YEAR(actividad.hora_ini) = '$yearf'   ";
$sqlactivos3 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 3 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and YEAR(actividad.hora_ini) = '$yearf'  ";
$sqlactivos4 ="SELECT idinterrupcion,actividad.idactividad,Sum(interrupcion.tiempo) as tiempo,nombre FROM `interrupciones`,interrupcion,actividad WHERE interrupciones.idinterrup = interrupcion.idinterrup and interrupcion.idinterrup = 4 and actividad.idactividad=interrupciones.idactividad and actividad.idusuario = '$idUser' and YEAR(actividad.hora_ini) = '$yearf'   ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 28){ 
$sqlactivos= " SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea    and YEAR(actividad.hora_ini) ='$yearf' and idusuario='$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 29){ 
$sqlactivos= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido,odt.tiempo as tiem  FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'   and YEAR(odt.fecha) = '$yearf' ";
 $titulo ="Filtro por fecha  y cc";
  } 
 
 }?>
</div>
<br></br>   
<?php 


 if($f ==0){
	     $resultadoact = mysqli_query($con,$sqlactivos)or die(mysqli_error());
          $i=0;
          while($rowact=mysqli_fetch_array($resultadoact )) {
	            
	        $v = $rowact['v'];
               $w = $rowact['w'];
                $s = $rowact['s'];
		  }

        if ($v==null && $w==null && $s==null)
{  $v=0; $w=0; $s=0;    }
 
 }else if($f==1){
	 
	 
	  $resultadoact = mysqli_query($con,$sqlactivos1)or die(mysqli_error());
          $i=0;
          while($rowact=mysqli_fetch_array($resultadoact )) {
	          
             
	        $t1 = $rowact['tiempo'];
                
		  }
		  $resultadoact = mysqli_query($con,$sqlactivos2)or die(mysqli_error());
          $i=0;
          while($rowact=mysqli_fetch_array($resultadoact )) {
	          
             
	        $t2 = $rowact['tiempo'];
                
		  }
		  $resultadoact = mysqli_query($con,$sqlactivos3)or die(mysqli_error());
          $i=0;
          while($rowact=mysqli_fetch_array($resultadoact )) {
	          
             
	        $t3 = $rowact['tiempo'];
                
		  }
 $resultadoact = mysqli_query($con,$sqlactivos4)or die(mysqli_error());
          $n=0;
          while($rowact=mysqli_fetch_array($resultadoact )) {
	          
             
	        $t4 = $rowact['tiempo'];
                
		  }
		  
		
		 
		  
		    if ($t1==null ){
     
	 	  
	 $t1=0;    }
	  if ( $t2==null ){ 
	  
	   
	  $t2=0;}  
       if ( $t3==null ){ 
	   
	    
	  $t3=0;}  	  
	  
	  if ($t4==null){ 
    
           
		$t4=0;    }
		    
		    $total = $t1 +$t2 + $t3 + $t4;
		  
	  if ($t1!= 0 ){
     $t1 =  $t1 *100 /$total;
	  }else{	  
	 $t1=0;    }
	  if ( $t2!=0 ){ 
	  $t2 =  $t2 *100 /$total;
	   }else{
	  $t2=0;}  
       if ( $t3!=0 ){ 
	   $t3 =  $t3 *100 /$total ;
	    }else{
	  $t3=0;}  	  
	  
	  if ($t4!=0){ 
    $t4 =  $t4 *100 /$total;
             }else{
		$t4=0;    }
 }	 

 ?>



<?php 


 if($f ==0){ ?>
 <center><h2>KPI</h2></center>
<div id="container1"></div>
 <?php }else if($f==1){ ?>
 <center><h2>Interrupciones</h2></center>
<div id="container2"></div>
<center><h3>Horas de interrupcion: <?php echo round($total/60, 2)?></h3></center>
<center><h3>No. de interrupciones: <?php echo $total/10 ?></h3></center>
 <?php } ?>
<br></br>
<!-- <div id="container"></div> -->


<!-- /.content-section-a -->

    <aside class="banner">

      <div class="container">

        <div class="row">
          <div class="col-lg-6 my-auto">
           <center><h3>&copy; 2017 - TIP/TEF7  </h3></center>
          </div>
                
        </div>
      
      </div>
      <!-- /.container -->

    </aside>
<!-- Bootstrap core JavaScript -->
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
	
	<script>Highcharts.chart('container1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Actividades',
        colorByPoint: true,
        data: [{
            name: 'Soporte',
            y: <?php echo $s ?>
        }, {
            
            name: 'Desperdicio',
            y: <?php echo $w?>,
            sliced: true,
            selected: true
        }, {
            name: 'Valor Agregado',
            y: <?php echo $v?>
            
        }]
    }]
});</script>


<script>Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Interrupciones',
        colorByPoint: true,
        data: [{
            name: 'Llamada telefonica',
            y: <?php echo $t1 ?>
        }, {
            
            name: 'Asesoria ',
            y: <?php echo $t2?>,
            sliced: true,
            selected: true
        }, {
            
            name: 'Personal ',
            y: <?php echo $t3?>,
            sliced: true,
            selected: true
        }, {
            name: 'Tarea interna',
            y: <?php echo $t4?>
            
        }]
    }]
});</script>











		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Actividades de la semana'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'datetime',
        dateTimeLabelFormats: { // don't display the dummy year
            month: '%e. %b',
            year: '%b'
        },
        title: {
            text: 'Date'
        }
    },
    yAxis: {
        title: {
            text: 'horas (h)'
        },
        min: 0
    },
    tooltip: {
        headerFormat: '<b>{series.name}</b><br>',
        pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
    },

    plotOptions: {
        spline: {
            marker: {
                enabled: true
            }
        }
    },

    series: [{
        name: 'Desperdicio',
        // Define the data points. All series have a dummy year
        // of 1970/71 in order to be compared on the same x axis. Note
        // that in JavaScript, months start at 0 for January, 1 for February etc.
        data: [
            [Date.UTC(1970, 9, 21), 0],
            [Date.UTC(1970, 10, 4), 0.28],
            [Date.UTC(1970, 10, 9), 0.25],
            [Date.UTC(1970, 10, 27), 0.2],
            [Date.UTC(1970, 11, 2), 0.28],
            [Date.UTC(1970, 11, 26), 0.28],
            [Date.UTC(1970, 11, 29), 0.47],
            [Date.UTC(1971, 0, 11), 0.79],
            [Date.UTC(1971, 0, 26), 0.72],
            [Date.UTC(1971, 1, 3), 1.02],
            [Date.UTC(1971, 1, 11), 1.12],
            [Date.UTC(1971, 1, 25), 1.2],
            [Date.UTC(1971, 2, 11), 1.18],
            [Date.UTC(1971, 3, 11), 1.19],
            [Date.UTC(1971, 4, 1), 1.85],
            [Date.UTC(1971, 4, 5), 2.22],
            [Date.UTC(1971, 4, 19), 1.15],
            [Date.UTC(1971, 5, 3), 0]
        ]
    }, {
        name: 'Valor Agregado',
        data: [
            [Date.UTC(1970, 9, 29), 0],
            [Date.UTC(1970, 10, 9), 0.4],
            [Date.UTC(1970, 11, 1), 0.25],
            [Date.UTC(1971, 0, 1), 1.66],
            [Date.UTC(1971, 0, 10), 1.8],
            [Date.UTC(1971, 1, 19), 1.76],
            [Date.UTC(1971, 2, 25), 2.62],
            [Date.UTC(1971, 3, 19), 2.41],
            [Date.UTC(1971, 3, 30), 2.05],
            [Date.UTC(1971, 4, 14), 1.7],
            [Date.UTC(1971, 4, 24), 1.1],
            [Date.UTC(1971, 5, 10), 0]
        ]
    }, {
        name: 'Soporte',
        data: [
            [Date.UTC(1970, 10, 25), 0],
            [Date.UTC(1970, 11, 6), 0.25],
            [Date.UTC(1970, 11, 20), 1.41],
            [Date.UTC(1970, 11, 25), 1.64],
            [Date.UTC(1971, 0, 4), 1.6],
            [Date.UTC(1971, 0, 17), 2.55],
            [Date.UTC(1971, 0, 24), 2.62],
            [Date.UTC(1971, 1, 4), 2.5],
            [Date.UTC(1971, 1, 14), 2.42],
            [Date.UTC(1971, 2, 6), 2.74],
            [Date.UTC(1971, 2, 14), 2.62],
            [Date.UTC(1971, 2, 24), 2.6],
            [Date.UTC(1971, 3, 2), 2.81],
            [Date.UTC(1971, 3, 12), 2.63],
            [Date.UTC(1971, 3, 28), 2.77],
            [Date.UTC(1971, 4, 5), 2.68],
            [Date.UTC(1971, 4, 10), 2.56],
            [Date.UTC(1971, 4, 15), 2.39],
            [Date.UTC(1971, 4, 20), 2.3],
            [Date.UTC(1971, 5, 5), 2],
            [Date.UTC(1971, 5, 10), 1.85],
            [Date.UTC(1971, 5, 15), 1.49],
            [Date.UTC(1971, 5, 23), 1.08]
        ]
    }]
});
		</script>
	</body>
</html>
