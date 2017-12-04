<?php
  include('conexion.php');

if (!isset($_SESSION)) {
  session_start();
}

   $User= $_POST['username'];
   $pass= $_POST['password'];
   $tipo="";
   $nombre="";
   $id="";
  
  
  $miselect= " SELECT * FROM usuarios WHERE usuario= '$User' and password= '$pass'  ";
  $resultado = mysqli_query($con,$miselect)or die(mysqli_error());
  while($row=mysqli_fetch_array($resultado)) {
     
    $id = $row['idusuario'];
    $tipo= $row['idtipousuario'];
	$nombre= $row['nombre']." ".$row['apellido'];
	$estado = $row['idestado'];
	
  }
  
     $_SESSION['Usertimer'] = $nombre;
	 $_SESSION['idUsertimer'] = $id;
	 $_SESSION['idestadotimer'] = $estado;
    if($tipo == '1') {
      #Ingreso de un empleado
	    echo"<script type=\"text/javascript\">alert('Sesión iniciada correctamente'); window.location='empleado/index.php';</script>";
     
	}else if($tipo == '2') {
		#Ingreso de Administrador
        echo"<script type=\"text/javascript\">alert('Sesión iniciada correctamente'); window.location='administrador/index.php';</script>";
     }else  {
	  echo"<script type=\"text/javascript\">alert('Usuario no válido'); window.location='../index.php';</script>";
    }
  

?>
