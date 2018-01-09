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
   
    <link rel="stylesheet" href="vendor/bootstrap/css/buttons.bootstrap.min.css">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="css/tablar.css" rel="stylesheet">
	 <link href="css/popup.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->

    <!-- Custom styles for this template -->
    <link href="css/landing-page.css" rel="stylesheet">

	
 <link rel="stylesheet" href="vendor/dist/datepicker.css">

<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/github.min.css">
  </head>

  <body>

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
   
    <div class="container">
 <table>
<tr>
 <th><center><a class="btn btn-success" href="historico.php?f=1"><b>Todos</b></a></center> </th>
    
      <th><center><a class="btn btn-success" href="historico.php?f=2"><b>Planedas</b></a></center> </th>
    
     <th> <center><a class="btn btn-success" href="historico.php?f=3"><b>Emergentes</b></a></center> </th>
    
     <th> <center><a class="btn btn-success" href="historico.php?f=4"><b>Fuera de planta</b></a></center> </th>
 </tr>
 </tr>
</table>
<br>
<?php 

$checkg=0;

if (ISSET($_GET['idcheck'] )== null ){}else {$checkg = $_GET['idcheck']; }
if (ISSET($_GET['f'] )== null ){$f=0;}else {$f= $_GET['f']; }
?>
<form  action="historico.php?idcheck=<?php echo $checkg ?>" method="post">
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
$idusuariof=$_POST['empleado'];
$ccf=$_POST['cc'];

$filtro = 26;

} else if( $_POST['cc']==null && $_POST['empleado']== null){
//echo"<script type=\"text/javascript\"> alert('solo filtro con fecha');</script>";
 $yearf=$_POST['year'];

$filtro = 27;
} else if($_POST['empleado'] != null){
//echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";




$idusuariof=$_POST['empleado'];
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
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"   for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=4'"/> periodo anual
    </label>
  </div>

</th></tr>
<th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc"  >  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT * FROM centro_costos ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['idcostos'];?>"selected="selected"><?php echo $row['nombre'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['idcostos'];?>"><?php echo $row['nombre'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center> </th>
    
     </tr><tr><th style="width:400px"> <center><select  style="width:400px" class="col-lg-2 form-control"  id="myselect" name="year"  required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(fecha)as fecha FROM odt ") or die("Error: ".mysqli_error($con));
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
$idusuariof=$_POST['empleado'];
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
$idusuariof=$_POST['empleado'];
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
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=4'"/> periodo anual
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
<th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc"  >  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT * FROM centro_costos ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['idcostos'];?>"selected="selected"><?php echo $row['nombre'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['idcostos'];?>"><?php echo $row['nombre'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center> </th>
    
     </tr>
 






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

$idusuariof=$_POST['empleado'];
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

$idusuariof=$_POST['empleado'];
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
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input checked="on" class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=4'"/> periodo anual
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
<th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc"  >  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT * FROM centro_costos ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['idcostos'];?>"selected="selected"><?php echo $row['nombre'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['idcostos'];?>"><?php echo $row['nombre'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center> </th>
    
     </tr>
 <tr><th style="width:400px"> <center><select  style="width:400px" class="col-lg-2 form-control"  id="myselect" name="year"  required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(fecha)as fecha FROM odt ") or die("Error: ".mysqli_error($con));
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
$idusuariof=$_POST['empleado'];
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
$idusuariof=$_POST['empleado'];
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
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=4'"/> periodo anual
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
<th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc"  >  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT * FROM centro_costos ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['idcostos'];?>"selected="selected"><?php echo $row['nombre'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['idcostos'];?>"><?php echo $row['nombre'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center> </th>
    
     </tr>
 
<tr><th style="width:400px"> <center><select  style="width:400px" class="col-lg-2 form-control"  id="myselect" name="year"  required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(fecha)as fecha FROM odt ") or die("Error: ".mysqli_error($con));
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
		
		

		$idusuariof=$_POST['empleado'];
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
$idusuariof=$_POST['empleado'];
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
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'historico.php?idcheck=4'"/> periodo anual
    </label>
  </div>

 </th></tr>

<tr><th > <center><div style="width:700px" class="input-group input-daterange"> <select  style="width:400px" class="col-lg-2 form-control"  id="myselect" name="year1"  required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(fecha)as fecha FROM odt ") or die("Error: ".mysqli_error($con));
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
			$result = mysqli_query( $con,"SELECT DISTINCT YEAR(fecha)as fecha FROM odt ") or die("Error: ".mysqli_error($con));
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
<th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc" >  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT * FROM centro_costos ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['idcostos'];?>"selected="selected"><?php echo $row['nombre'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['idcostos'];?>"><?php echo $row['nombre'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center> </th>
    
     </tr>
 

    <?php } ?>
    </th><th> <center><input  type="submit" value ="filtrar" class="btn btn-success"></center> </th> 
 </tr>
 </tr>
</table>
</form>

<?php 
 if($f != null){
if($f ==1){
	 $miselect = " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma and actividad.idusuario = '$idUser'  " ;
         $titulo ="Todos";
}else if ($f==2){
	$miselect = " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma and actividad.idtipoactividad =1 and actividad.idusuario = '$idUser' " ;
         $titulo ="Planeadas";
}else if($f==3){
	$miselect = " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma and actividad.idtipoactividad =2 and actividad.idusuario = '$idUser' " ;
         $titulo ="Emergentes";
}else if($f == 4){
	$miselect = " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma and actividad.idtipoactividad =3 and actividad.idusuario = '$idUser' "  ;
         $titulo ="Fuera de Planta";
}
}else{ 
 if( $filtro == 1 )  { 	 
	 $miselect = " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario  and actividad.idusuario = '$idUser' " ;
         $titulo ="Todos";
} else if ($filtro == 2) { 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.odtreal IS NULL and actividad.idusuario = '$idUser'  ";
   $titulo ="Sin ODT real";
} else if ($filtro == 3){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.fecha <= DATE(date_sub(NOW(), INTERVAL 21 DAY)) and actividad.idusuario = '$idUser' ";
 $titulo ="Proximos cierres";
 }  else if ($filtro == 4){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.usuario,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 1 and actividad.idusuario = '$idUser'";
 $titulo ="Cerradas";
 } 
//////filtro especial fecha ////
else if ($filtro == 5){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE  actividad.idestatus=5 and actividad.idusuario = '$idUser' ";
 $titulo ="";
 }else if ($filtro == 6){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof' and odt.idcostos='$ccf' and actividad.hora_ini BETWEEN '$fechaif' AND '$fechaff' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 7){ 
$miselect= "SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.hora_ini BETWEEN '$fechaif' AND '$fechaff' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 8){ 
$miselect= "SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof'  and actividad.hora_ini BETWEEN '$fechaif' AND '$fechaff' and actividad.idusuario = '$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 9){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma   and odt.idcostos='$ccf' and actividad.hora_ini BETWEEN '$fechaif' AND '$fechaff' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha  y cc";
 
//////filtro  mes

}else if ($filtro == 10){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE  actividad.idestatus=5 ";
 $titulo ="Cerradas";
 }else if ($filtro == 11){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof' and odt.idcostos='$ccf' and Year(actividad.hora_ini)= '$yearf'   and MONTH(actividad.hora_ini) = '$mes1f' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 12){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma   and Year(actividad.hora_ini)= '$yearf'   and MONTH(actividad.hora_ini) = '$mes1f' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 13){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof'  and Year(actividad.hora_ini)= '$yearf'   and MONTH(actividad.hora_ini) = '$mes1f' and actividad.idusuario = '$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 14){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma   and odt.idcostos='$ccf' and Year(actividad.hora_ini)= '$yearf'   and MONTH(actividad.hora_ini) = '$mes1f' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha  y cc";



//////filtro rango meses 

}else if ($filtro == 15){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE  actividad.idestatus=5  ";
 $titulo ="Cerradas";
 }else if ($filtro == 16){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof' and odt.idcostos='$ccf' and Year(actividad.hora_ini)= '$yearf'   and MONTH(actividad.hora_ini)   BETWEEN '$mes1f' AND '$mes2f' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 17){ 
$miselect= "SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and  Year(actividad.hora_ini)= '$yearf'   and MONTH(actividad.hora_ini)  BETWEEN '$mes1f' AND '$mes2f' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 18){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof' and Year(actividad.hora_ini)= '$yearf'   and MONTH(actividad.hora_ini) BETWEEN '$mes1f' AND '$mes2f' and actividad.idusuario = '$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 19){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma   and odt.idcostos='$ccf' and Year(actividad.hora_ini)= '$yearf'   and MONTH(actividad.hora_ini) BETWEEN '$mes1f' AND '$mes2f' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha  y cc";


//////filtro rango años

}else if ($filtro == 20){ 
$miselect= "  SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE  actividad.idestatus=5  ";
 $titulo ="Cerradas";
 }else if ($filtro == 21){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof' and odt.idcostos='$ccf' and Year(actividad.hora_ini) BETWEEN '$year1f' and '$year2f' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 22){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and Year(actividad.hora_ini) BETWEEN '$year1f' and '$year2f' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 23){ 
$miselect= "SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof'  and Year(actividad.hora_ini) BETWEEN '$year1f' and '$year2f' and actividad.idusuario = '$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 24){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and odt.idcostos='$ccf' and Year(actividad.hora_ini) BETWEEN '$year1f' and '$year2f' and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha  y cc";

//////filtro 0

}else if ($filtro == 25){ 
$miselect= "  SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE  actividad.idestatus=5  ";
 $titulo ="Cerradas";
 }else if ($filtro == 26){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof' and odt.idcostos='$ccf' and Year(actividad.hora_ini)= '$yearf'   and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 27){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma   and Year(actividad.hora_ini)= '$yearf'  and actividad.idusuario = '$idUser'  ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 28){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and actividad.idusuario = '$idusuariof' and Year(actividad.hora_ini)= '$yearf'  and actividad.idusuario = '$idUser' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 29){ 
$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  and  odt.idcostos='$ccf' and Year(actividad.hora_ini)= '$yearf'  and actividad.idusuario = '$idUser' ";
 $titulo ="Filtro por fecha  y cc";


}
} ?>
</div>
        <div class="row">
          
				<div class="table-users">
        <div class="header"><img src="../../media/imagenes/logo.jpg">&nbsp&nbsp&nbsp Reporte de Tiempo &nbsp&nbsp&nbsp&nbsp&nbsp TEF7 
          <h6><?php echo $titulo ?></h6></div>
		
		<table cellspacing="0">
            <tr>
			  <center><th>ODT</th></center>
			   
                <th>C.C</th>
		<th>MA</th>
                <th>Descripcion</th>
               
				<th>Fecha</th>
				 <th>Horas</th>
                 <th>Observaciones</th>
            </tr>
			
			
     <?php //SELECT `idactividad`, actividad.nombre, `descripcion`, TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_ini, `hora_fin`, `tiempo`, `idtipoactividad`, `dia`, estatus.nombre as nombre_estatus, actividad.idestatus FROM `actividad` ,estatus where estatus.idestatus = actividad.idestatus   
	 
	    
		 $total = "00:00:00";
	 //$miselect= " SELECT actividad.idactividad , odt.idodt,centro_costos.nombre as cc,ma.ma ,tarea.nombre as tarea,DATE(actividad.hora_ini)as fecha, actividad.tiempo , actividad.descripcion,now() as hoy FROM odt,centro_costos,ma,actividad,tarea WHERE odt.idcostos=centro_costos.idcostos and actividad.idodt=odt.idodt and actividad.idtarea = tarea.idtarea and ma.idma=odt.idma  ";
  $resultado = mysqli_query($con,$miselect)or die(mysqli_error());
  $i=0;
  while($row=mysqli_fetch_array($resultado)) {
     
    
	$r[$i][0]=$idodt[$i]= $row['idodt'];
   $r[$i][1]= $cc[$i]= $row['cc'];
    $r[$i][2] =  $ma[$i]= $row['ma'];
   
	$r[$i][3] = $tarea[$i] = $row['tarea']; 
		$r[$i][4] =$fecha[$i] = $row['fecha']; 
		 $r[$i][5] =$tiempo[$i] = $row['tiempo']; 
		 $total = sum($total, $tiempo[$i]); 
	$r[$i][6]=  $descripcion[$i] = $row['descripcion']; 

	
	$hoy = $row['hoy']; 
	
	$idact[$i] = $row['idactividad'];
	

	$_SESSION["r"] = $r;
	
	
  

   ?>
                 <?php 
	?>
                 <tr>
				<td><?php echo "000061-".$idodt[$i] ?></td>
				<td><?php echo $cc[$i]; ?></td>
                                 <td><?php echo $ma[$i]; ?></td>
                <td><?php echo $tarea[$i] ?></td>
                <td><?php echo $fecha[$i]?></td>
                <td><?php echo $tiempo[$i]?></td>
                 <td><?php echo $descripcion[$i]?><a  href="modificar.php?idact=<?php echo $idact[$i] ?>"><b>.</b></a></td>
               
                
                
					   
			      </tr>  
				   
				 <?php  $i=$i+1;} ?>
            
                
               
 
           
                    </table>
	               </div>
                 </div>
			
        
        </div>

		
		<br>
		<center><h4>Total de horas: <?php echo $total?></h4></center>
		</br>

      <div>
<?php if($i == null){}else{ ?>
       <center><a type="button" href="reportea.php" class="btn btn-success" >Reporte excel</a></center>
<?php }?>
       
      </div>
     <br></br>
<section></section>
      <!-- /.container -->

    </section>
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

  </body>

</html>
<?php 


function sum($time1, $time2) {
      $times = array($time1, $time2);
      $seconds = 0;
      foreach ($times as $time)
      {
        list($hour,$minute,$second) = explode(':', $time);
        $seconds += $hour*3600;
        $seconds += $minute*60;
        $seconds += $second;
      }
      $hours = floor($seconds/3600);
      $seconds -= $hours*3600;
      $minutes  = floor($seconds/60);
      $seconds -= $minutes*60;
      if($seconds < 9)
      {
      $seconds = "0".$seconds;
      }
      if($minutes < 9)
      {
      $minutes = "0".$minutes;
      }
        if($hours < 9)
      {
      $hours = "0".$hours;
      }
      return "{$hours}:{$minutes}:{$seconds}";
    }

?>
