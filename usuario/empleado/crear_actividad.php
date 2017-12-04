<?php

include('../conexion.php');
 echo $id_tarea = $_POST['tarea'];
 echo $id_actividad =$_GET['act'];
 echo $id_usuario =$_GET['usr'];
 echo $inicio = $_POST['inicio'];
 echo $fin = $_POST['fin'];
		 
			  
			  
			  $sql ="INSERT INTO `actividad`(`idactividad`, `idtarea`, `descripcion`, `hora_ini`, `hora_fin`, `tiempo`, `idtipoactividad`, `idestatus`,  `idusuario`,hinicio,hfin) VALUES ('','$id_tarea','','','','','$id_actividad',4,'$id_usuario','$inicio','$fin') ";
 $resultado = mysqli_query($con,$sql);
    if(!$resultado) {
      die('Invalid query: ' . mysqli_error());
    }else{
echo"<script type=\"text/javascript\"> window.location='index.php#one';</script>";
     }
       
 ?>




<!DOCTYPE html >
<html>
<body>



<h1>actividad creada</h1>


</body>
</html>
