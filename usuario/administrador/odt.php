<?php
  session_start();
  
  $User = $_SESSION['Usertimer'] ;
  $idUser = $_SESSION['idUsertimer'] ;
 if($User == null){
 header("Location: /timer2/index.php");
 }
 
 include('../conexion.php');

if (isset($_GET['f'])== null){
$filtro = 0;
}else{ $filtro = $_GET['f'];
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
<div class ="container">
 <table>
<tr>
 <th><center><a class="btn btn-success" href="odt.php?f=0"><b>Todos</b></a></center> </th>
    
      <th><center><a class="btn btn-success" href="odt.php?f=2"><b>Sin ODT REAL</b></a></center> </th>
    
     <th> <center><a class="btn btn-success" href="odt.php?f=3"><b>Proximas ODT's a cerrar</b></a></center> </th>
    
     <th> <center><a class="btn btn-success" href="odt.php?f=4"><b>ODT's cerradas</b></a></center> </th>
 </tr>
 </tr>
</table>
<br>
<?php 

$checkg=0;

if (ISSET($_GET['idcheck'] )== null ){}else {$checkg = $_GET['idcheck']; }

?>
<form  action="odt.php?idcheck=<?php echo $checkg ?>" method="post">
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

echo $yearf=$_POST['year'];
$idusuariof=$_POST['empleado'];
$ccf=$_POST['cc'];
echo "<br>";
$filtro = 26;
echo  $_POST['empleado']."-".$_POST['cc'];
} else if( $_POST['cc']==null && $_POST['empleado']== null){
echo"<script type=\"text/javascript\"> alert('solo filtro con fecha');</script>";
echo $yearf=$_POST['year'];

$filtro = 27;
} else if($_POST['empleado'] != null){
echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";

echo "<br>";
echo  $_POST['empleado'];

$idusuariof=$_POST['empleado'];
echo $yearf=$_POST['year'];
$filtro = 28;
}else if( $_POST['cc'] != null){
echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";

echo "<br>";
echo  $_POST['cc'];
echo $yearf=$_POST['year'];
$ccf=$_POST['cc'];
$filtro = 29;
}
}










?>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"   for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=4'"/> periodo anual
    </label>
  </div>

</th></tr>
<tr>
 <th style="width:400px"><center><select  style="width:800px" class="col-lg-2 form-control"  id="myselect" name="empleado"  >  
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
            
			 </select> </th>
    
      </tr><th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc"  >  
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
echo $_POST['inicio']."-".$_POST['fin'];
$fechaif=$_POST['inicio'];
$fechaff=$_POST['fin'];
$idusuariof=$_POST['empleado'];
$ccf=$_POST['cc'];
echo "<br>";
$filtro = 6;
echo  $_POST['empleado']."-".$_POST['cc'];
} else if( $_POST['cc']==null && $_POST['empleado']== null){
echo"<script type=\"text/javascript\"> alert('solo filtro con fecha');</script>";
echo $_POST['inicio']."-".$_POST['fin'];
$fechaif=$_POST['inicio'];
$fechaff=$_POST['fin'];
$filtro = 7;
} else if($_POST['empleado'] != null){
echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";
echo $_POST['inicio']."-".$_POST['fin'];
echo "<br>";
echo  $_POST['empleado'];
$fechaif=$_POST['inicio'];
$fechaff=$_POST['fin'];
$idusuariof=$_POST['empleado'];
$filtro = 8;
}else if( $_POST['cc'] != null){
echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";
echo $_POST['inicio']."-".$_POST['fin'];
echo "<br>";
echo  $_POST['cc'];
$fechaif=$_POST['inicio'];
$fechaff=$_POST['fin'];
$ccf=$_POST['cc'];
$filtro = 9;
}
}
?>



<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=4'"/> periodo anual
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
<tr>
 <th style="width:400px"><center><select  style="width:800px" class="col-lg-2 form-control"  id="myselect" name="empleado"  >  
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
            
			 </select> </th>
    
      </tr><th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc"  >  
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
echo $_POST['mes1'];
$mes1f=$_POST['mes1'];
$yearf=$_POST['year'];

$idusuariof=$_POST['empleado'];
$ccf=$_POST['cc'];
echo "<br>";
$filtro = 11;
echo  $_POST['empleado']."-".$_POST['cc'];
} else if( $_POST['cc']==null && $_POST['empleado']== null){
echo"<script type=\"text/javascript\"> alert('solo filtro con fecha');</script>";
echo $_POST['mes1'];
$mes1f=$_POST['mes1'];
$yearf=$_POST['year'];

$filtro = 12;
} else if($_POST['empleado'] != null){
echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";
echo $_POST['mes1'];
echo "<br>";
echo  $_POST['empleado'];
$mes1f=$_POST['mes1'];
$yearf=$_POST['year'];

$idusuariof=$_POST['empleado'];
$filtro = 13;
}else if( $_POST['cc'] != null){
echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";
echo $_POST['mes1'];
echo "<br>";
echo  $_POST['cc'];
$mes1f=$_POST['mes1'];
$yearf=$_POST['year'];

$ccf=$_POST['cc'];
$filtro = 14;
}
}
?>





<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input checked="on" class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=4'"/> periodo anual
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
<tr>
 <th style="width:400px"><center><select   class="col-lg-2 form-control"  id="myselect" name="empleado" >  
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
            
			 </select> </th>
    
      </tr><th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc"  >  
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
echo $_POST['mes1']."-".$_POST['mes2'];
echo">".$_POST['year'];
$mes1f=$_POST['mes1'];
$mes2f=$_POST['mes2'];
$idusuariof=$_POST['empleado'];
$ccf=$_POST['cc'];
$yearf=$_POST['year'];
echo "<br>";
$filtro = 16;
echo  $_POST['empleado']."-".$_POST['cc'];
} else if( $_POST['cc']==null && $_POST['empleado']== null){
echo"<script type=\"text/javascript\"> alert('solo filtro con meses');</script>";
echo $_POST['mes1']."-".$_POST['mes2'];
echo">".$_POST['year'];
$mes1f=$_POST['mes1'];
$mes2f=$_POST['mes2'];
$yearf=$_POST['year'];
$filtro = 17;
} else if($_POST['empleado'] != null){
echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";
echo $_POST['mes1']."-".$_POST['mes2'];
echo">".$_POST['year'];
echo "<br>";
echo  $_POST['empleado'];
$mes1f=$_POST['mes1'];
$mes2f=$_POST['mes2'];
$yearf=$_POST['year'];
$idusuariof=$_POST['empleado'];
$filtro = 18;
}else if( $_POST['cc'] != null){
echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";
echo $_POST['mes1']."-".$_POST['mes2'];
echo">".$_POST['year'];
echo "<br>";
echo  $_POST['cc'];
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
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=4'"/> periodo anual
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
<tr>
 <th style="width:400px"><center><select  style="width:800px" class="col-lg-2 form-control"  id="myselect" name="empleado"  >  
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
            
			 </select> </th>
    
      </tr><th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc"  >  
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
		echo"<script type=\"text/javascript\"> alert('filtro empleado y cc');</script>";
		echo $_POST['year1']."-".$_POST['year2'];
		

		$idusuariof=$_POST['empleado'];
		$ccf=$_POST['cc'];
		$year1f=$_POST['year1'];
		$year2f=$_POST['year2'];
		echo "<br>";
		$filtro = 21;
		echo  $_POST['empleado']."-".$_POST['cc'];
	} else if( $_POST['cc']==null && $_POST['empleado']== null){
		echo"<script type=\"text/javascript\"> alert('solo filtro con años');</script>";


		$year1f=$_POST['year1'];
		$year2f=$_POST['year2'];
		$filtro = 22;
} else if($_POST['empleado'] != null){
		echo"<script type=\"text/javascript\"> alert('filtro con empleado');</script>";

		echo "<br>";
		echo  $_POST['empleado'];

$year1f=$_POST['year1'];
$year2f=$_POST['year2'];
$idusuariof=$_POST['empleado'];
$filtro = 23;
}else if( $_POST['cc'] != null){
echo"<script type=\"text/javascript\"> alert('filtro con cc');</script>";

echo "<br>";
echo  $_POST['cc'];

$year1f=$_POST['year1'];
$year2f=$_POST['year2'];
$ccf=$_POST['cc'];
$filtro = 24;
}
}





?>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=0'"/> ninguno
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label  class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=1'"/> fecha
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label" checked=""  for="check_id_1">
      <input class="form-check-input"  name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=2'"/> mes
    </label>
  </div></label>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input  class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=3'"/> periodo mensual
    </label>
  </div>
<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input checked="on" class="form-check-input" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'odt.php?idcheck=4'"/> periodo anual
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
<tr>
 <th style="width:400px"><center><select  style="width:800px" class="col-lg-2 form-control"  id="myselect" name="empleado"  >  
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
            
			 </select> </th>
    
      </tr><th style="width:400px"><center><select style="width:400px" class="col-lg-2 form-control"  id="myselect" name="cc" >  
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
 if( $filtro == 0 )  { 	 
	 $miselect = " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario  " ;
         $titulo ="Todos";
} else if ($filtro == 2) { 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.odtreal IS NULL ";
   $titulo ="Sin ODT real";
} else if ($filtro == 3){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.fecha <= DATE(date_sub(NOW(), INTERVAL 21 DAY)) ";
 $titulo ="Proximos cierres";
 }  else if ($filtro == 4){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 1";
 $titulo ="Cerradas";
 } 
//////filtro especial fecha ////
else if ($filtro == 5){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.fecha = '0000-00-00' ";
 $titulo ="Cerradas";
 }else if ($filtro == 6){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof' and odt.idcostos='$ccf' and odt.fecha BETWEEN '$fechaif' AND '$fechaff'";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 7){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.fecha BETWEEN '$fechaif' AND '$fechaff'";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 8){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof'  and odt.fecha BETWEEN '$fechaif' AND '$fechaff'";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 9){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf' and odt.fecha BETWEEN '$fechaif' AND '$fechaff'";
 $titulo ="Filtro por fecha  y cc";
 
//////filtro  mes

}else if ($filtro == 10){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.fecha = '0000-00-00' ";
 $titulo ="Cerradas";
 }else if ($filtro == 11){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof' and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) = '$mes1f' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 12){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) = '$mes1f' ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 13){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof'   and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) = '$mes1f' ";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 14){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) = '$mes1f' ";
 $titulo ="Filtro por fecha  y cc";



//////filtro rango meses 

}else if ($filtro == 15){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.fecha = '0000-00-00' ";
 $titulo ="Cerradas";
 }else if ($filtro == 16){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof' and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) BETWEEN '$mes1f' AND '$mes2f'";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 17){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) BETWEEN '$mes1f' AND '$mes2f'";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 18){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof'   and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) BETWEEN '$mes1f' AND '$mes2f'";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 19){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'  and YEAR(odt.fecha)= '$yearf' and MONTH(odt.fecha) BETWEEN '$mes1f' AND '$mes2f'";
 $titulo ="Filtro por fecha  y cc";


//////filtro rango años

}else if ($filtro == 20){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.fecha = '0000-00-00' ";
 $titulo ="Cerradas";
 }else if ($filtro == 21){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof' and odt.idcostos='$ccf'  and YEAR(odt.fecha) BETWEEN '$year1f' and '$year2f' ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 22){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0   and YEAR(odt.fecha) BETWEEN '$year1f' and '$year2f' ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 23){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof'    and YEAR(odt.fecha) BETWEEN '$year1f' and '$year2f'";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 24){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'   and YEAR(odt.fecha) BETWEEN '$year1f' and '$year2f'";
 $titulo ="Filtro por fecha  y cc";

//////filtro 0

}else if ($filtro == 25){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.fecha = '0000-00-00' ";
 $titulo ="Cerradas";
 }else if ($filtro == 26){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof' and odt.idcostos='$ccf'  and YEAR(odt.fecha) = '$yearf'  ";
 $titulo ="Filtro por fecha ,empleado y cc";
 }else if ($filtro == 27){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0   and YEAR(odt.fecha) ='$yearf' ";
 $titulo ="Filtro por fecha ";
 }else if ($filtro == 28){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0 and odt.idusuario = '$idusuariof'    and YEAR(odt.fecha) = '$yearf'";
 $titulo ="filtro por fecha y empleado";
}else if ($filtro == 29){ 
$miselect= " SELECT DISTINCT odt.idodt,odt.odtreal,centro_costos.nombre as cc,ma.ma ,odt.fecha,odt.tiempoa,usuarios.nombre ,usuarios.apellido FROM odt,centro_costos,ma,usuarios WHERE odt.idcostos=centro_costos.idcostos and ma.idma=odt.idma and odt.idusuario = usuarios.idusuario and odt.cerrada = 0  and odt.idcostos='$ccf'   and YEAR(odt.fecha) = '$yearf' ";
 $titulo ="Filtro por fecha  y cc";


} ?>
</div>
      <div class="container">

        <div class="row">
          
				<div class="table-users">
        <div class="header"><img src="../../media/imagenes/logo.jpg">&nbsp&nbsp&nbsp Reporte ODT's &nbsp&nbsp&nbsp&nbsp&nbsp TEF7 
          <h6><?php echo $titulo ?>&nbsp&nbsp&nbspfecha:</h6></div>
		
		<table cellspacing="0">
        
            <tr>
			  <center><th>ODT</th></center>
			   <center><th>ODT REAL</th></center>
         		 <center><th> Empleado </th></center>
                <th>C.C</th>
		<th>MA</th>
               
               
				<th>Fecha</th>
				 <th>Horas</th>
				<th>Asignar ODT Real </th>
                
            </tr>
			
			
     <?php //SELECT `idactividad`, actividad.nombre, `descripcion`, TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_ini, `hora_fin`, `tiempo`, `idtipoactividad`, `dia`, estatus.nombre as nombre_estatus, actividad.idestatus FROM `actividad` ,estatus where estatus.idestatus = actividad.idestatus   
	 
	    
	 



 $resultado = mysqli_query($con,$miselect)or die(mysqli_error());
  $i=0;
  while($row=mysqli_fetch_array($resultado)) {
     
   $r[$i][0] =$idodt[$i]= $row['idodt'];
   $r[$i][1] = $cc[$i]= $row['cc'];
   $r[$i][2] = $ma[$i]= $row['ma'];
   
	//$tarea[$i] = $row['tarea']; 
	
	//$descripcion[$i] = $row['descripcion']; 
	$r[$i][3]= $fecha[$i] = $row['fecha']; 
	$r[$i][4]= $tiempo[$i] = $row['tiempoa']; 
	    
       $r[$i][5] = $real[$i] =$row['odtreal'];
      $r[$i][6] = $nom[$i]  =$row['nombre']." ".$row['apellido'];
	

	
	



 $_SESSION["r"] = $r;

	
  

   ?>
                 <?php 
	?>
                 <tr>
				<td><?php echo "000061-".$idodt[$i] ?></td>
<?php if($real[$i] == null){?> <td><?php echo "no asignado" ?></td><?php                                
}else{ ?> <td><?php echo $real[$i]?></td><?php } ?>
<td><?php echo $nom[$i]; ?></td>
				<td><?php echo $cc[$i]; ?></td>
                                 <td><?php echo $ma[$i]; ?></td>
                  
                <td><?php echo $fecha[$i]?></td>
                <td><?php echo $tiempo[$i]?></td>
                <td><a class="btn btn-info" href="asignar_odt.php?idodt=<?php echo $idodt[$i] ?>"><b>Asignar</b></a></td>
                 
                
                
					   
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
      <!-- /.container -->
<div class="modal-wrapper" id="popup1">
   <div class="popup1-contenedor">
   <form action="crear_actividad.php?act=1&usr=<?php echo $idUser?>" method ="post">
     <center> <h6>Asignar ODT</h6></center>
	 

<center><div style="width: 120px" class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" name="fin" placeholder="ODT">
  </div>  </center>
<br>
      <center><input type="submit" value="crear"></center>
	  <a class="popup1-cerrar" href="#">X</a>
	  </form>
   </div>
   </div>
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
