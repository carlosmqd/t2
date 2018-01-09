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
 
   
    
    
	<!-- Page Content -->
<br>
<section id="a" class="content-section-a">
  <center><a class="btn btn-success" href="ver_odt.php" role="button">ver mis ODT's</a></center>
<br></section>
      

    <section id="one" class="content-section-b">

      <div class="container">

       
    <br></br>


<center><h4>Alta ODT </h4></center>
<br>
<?php 

$checkg=0;

if (ISSET($_GET['idcheck'] )== null ){}else {$checkg = $_GET['idcheck']; }

if (ISSET($_GET['s'] )== null ){$s=0;}else{echo $s = $_GET['s'];}



if ($checkg == 1) { ?>

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
        $idcc=$_GET['id'];
        
    ?>
    <script>
        var myselect = document.getElementById("myselect");
        myselect.options.selectedIndex = <?php echo $_GET["pos"]; ?>
    </script>
    <?php
    }
    ?>

<div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" checked="" name="check" id="check_id_1" type="checkbox" onclick="window.location = 'alta_odt.php?idcheck=0'"/> Sin MA
    </label>
  </div>
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    
<select  class="col-lg-2 form-control"  id="myselect" name="cc" onchange="window.location='alta_odt.php?idcheck=1&id='+this.value+'&pos='+this.selectedIndex;" required> 
			<option value="">C.C</option>
		   <?php 
                       $i=0;

			$result = mysqli_query($con,"SELECT * FROM centro_costos") or die("Error: ".mysqli_error($con));
		
		   while($row = mysqli_fetch_array($result)){?>
                            
                              
				 <?php if($i+1 ==  $location){  ?>  
                          <option value="<?php echo $row['idcostos'];?>" selected="selected"  ><?php echo $row['nombre'];?></option>   
                              <?php } else {  ?>
                                  <option value="<?php echo $row['idcostos'];?>"  ><?php echo $row['nombre'];?></option>
				
                                  
           <?php } $i=$i+1; } ?>
            
			 </select>
<?php 

 if ( isset($idcc) != null  && $idcc != 0  ){
$sqlma = "SELECT nombre,productos,mse FROM ma,centro_costos,mse WHERE centro_costos.idcostos = '$idcc'  and centro_costos.idmse =mse.idmse"; 
$resultma = mysqli_query($con,$sqlma) or die("Error: ".mysqli_error($con));
		

              
		   while($rowma = mysqli_fetch_array($resultma)){

                       
			$nombrecc=$rowma['nombre'];
			$productocc=$rowma['productos'];
			$msecc=$rowma['mse'];
                      }



	}else  { 
			
			$nombrecc="C.C";
			$productocc="Producto";
			$msecc="MSE";
		}

?>

</div>
<br>
<form class="form-inline" action="crear_odt.php?odt=1&cc=<?php echo $idcc ?>" method="post">


<br></br>
 <br></br>
<?php if ( isset($idcc) != null  && $idcc != 0  ){ ?>
 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" name="tiempo" placeholder="Tiempo (hrs)" required>
  </div>

<?php }else { ?>
<fieldset disabled>
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" name="tiempo" placeholder="Tiempo (hrs)" required>
  </div>
</fieldset >
<?php } ?> 


  <fieldset disabled>
    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="<?php echo $productocc; ?>">
  </div> 

   </fieldset ><fieldset disabled> 
      <div class="input-group mb-2 mr-sm-2 mb-sm-0">
       <div class="input-group-addon"></div>
  
    
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="<?php echo $msecc; ?> ">
  </div></fieldset>
 
  <?php if ( isset($idcc) != null  && $idcc != 0  ){ ?>
   <input type="submit" class="btn btn-primary" value="Crear">
<?php }else{ ?>

<fieldset disabled><input type="submit" class="btn btn-primary" value="Crear"></fieldset>
<?php } ?> 
</form>	
<?php }
else { ?>
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
        $idma=$_GET['id'];
       
    ?>
    <script>
        var myselect = document.getElementById("myselect");
        myselect.options.selectedIndex = <?php echo $_GET["pos"]; ?>
    </script>
    <?php
    }
    ?>
 <div class="form-check mb-2 mr-sm-2 mb-sm-0">
    <label class="form-check-label"  for="check_id_1">
      <input class="form-check-input" name="check" id="check_id_1" type="checkbox"  onclick="window.location = 'alta_odt.php?idcheck=1'"/> Sin MA
    </label>

  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
  <select  class="col-lg-2 form-control"  id="myselect" name="ma" onchange="window.location='alta_odt.php?idcheck=0&id='+this.value+'&pos='+this.selectedIndex;" required> 
			<option value="">MA</option>
		   <?php 
                       $i=0;
			$result = mysqli_query($con,"SELECT * FROM ma") or die("Error: ".mysqli_error($con));
		
		   while($row = mysqli_fetch_array($result)){?>

      
				 
				 
            <?php   if($i+1 ==  $location){  ?>  

                              <option value="<?php echo $row['idma'];?>"selected="selected"><?php echo $row['ma'];?></option>
                             
                              <?php } else {  ?>
                                 <option value="<?php echo $row['idma'];?>"><?php echo $row['ma'];?></option>
				
                                  
           <?php } $i=$i+1; } ?>
            
            
			 </select>
  </div> 

  
 <?php 

  if ( isset($idma) != null  && $idma != 0  ){
		$sqlma = "SELECT descripcion,nombre,productos,mse,centro_costos.idcostos as cc FROM ma,centro_costos,mse WHERE idma = '$idma' and ma.idcostos=centro_costos.idcostos and centro_costos.idmse =mse.idmse"; 
		$resultma = mysqli_query($con,$sqlma) or die("Error: ".mysqli_error($con));
		
		   while($rowma = mysqli_fetch_array($resultma)){

                        $descrip=$rowma['descripcion'];
			$nombrecc=$rowma['nombre'];
			$productocc=$rowma['productos'];
			$mse=$rowma['mse'];
                        $idcc=$rowma['cc'];
                      }

	}else  { 
			$descrip="Descripcion";
			$nombrecc="C.C";
			$productocc="Producto";
			$mse="MSE";
		}

?>


 

<br>


<form class="form-inline" action="crear_odt.php?odt=2&ma=<?php echo $idma ?>&cc=<?php echo $idcc ?>"  method="post">
   
  <fieldset disabled>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input style="width:400px" type="text" class="form-control" id="inlineFormInputGroup" placeholder="<?php echo $descrip; ?>">
  </div></fieldset >
<fieldset disabled>
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" name="cc" placeholder="<?php echo $nombrecc; ?>">
  </div></fieldset >

<br></br>
<?php if ( isset($idma) != null  && $idma != 0  ){ ?>
 <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" name="tiempo" placeholder="Tiempo (hrs)" required>
  </div>

<?php }else { ?>
<fieldset disabled>
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" name="tiempo" placeholder="Tiempo (hrs)" required>
  </div>
</fieldset >
<?php } ?> 

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
  <fieldset disabled>
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="<?php echo $productocc; ?>">
  </div> </fieldset >
<fieldset disabled>
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon"></div>
    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="<?php echo $mse; ?>">
  </div></fieldset >
 
<?php if ( isset($idma) != null  && $idma != 0  ){ ?>
   <input type="submit" class="btn btn-primary" value="Crear">
<?php }else{ ?>

<fieldset disabled><input type="submit" class="btn btn-primary" value="Crear"></fieldset>
<?php } ?>

</form>	
  



<?php  } ?> 

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
	  
	  
    </aside>
    <!-- /.banner -->
     
    <!-- Footer -->
    

   
    
	
	
  
    <!-- Bootstrap core JavaScript -->
    <script src="assets/js/validator.js"></script>
    <script src="assets/js/validator.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script>
function change(){
    document.getElementById("myform").submit();
}
</script>


  </body>

</html>
