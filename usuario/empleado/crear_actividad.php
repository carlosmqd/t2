<?php

include('../conexion.php');
  $id_tarea = $_POST['tarea'];
 $odt = $_POST['odt'];
  $id_actividad =$_GET['act'];
  $id_usuario =$_GET['usr'];
  $inicio = $_POST['inicio'];
  $fin = $_POST['fin'];
		 
		 if($id_actividad == 3){
			 $fin = $_POST['fin'];
			 $fecha = $_POST['fecha'];
			 $descripcion = $_POST['descripcion'];
			$inif= $fecha." ".$inicio;
            $finf =$fecha." ".$fin;
			 
			 $t = restar( $inicio , $fin) ;
			  $sql ="INSERT INTO `actividad`(`idactividad`, `idtarea`, `descripcion`, `hora_ini`, `hora_fin`, `tiempo`, `idtipoactividad`, `idestatus`,  `idusuario`,idodt) VALUES ('','$id_tarea','$descripcion','$inif','$finf','$t','$id_actividad',3,'$id_usuario','$odt') ";
		 }else{
						$sql ="INSERT INTO `actividad`(`idactividad`, `idtarea`, `descripcion`, `hora_ini`, `hora_fin`, `tiempo`, `idtipoactividad`, `idestatus`,  `idusuario`,hinicio,hfin,idodt) VALUES ('','$id_tarea','','','','','$id_actividad',4,'$id_usuario','$inicio','$fin','$odt') ";
		 }
 
 
 $resultado = mysqli_query($con,$sql);
    if(!$resultado) {
      die('Invalid query: ' . mysqli_error());
    }else{
echo"<script type=\"text/javascript\"> window.location='index.php#one';</script>";
     }
      
	  
function restar($horaini,$horafin)

{

	$horai=substr($horaini,0,2);

	$mini=substr($horaini,3,2);

	$segi=substr($horaini,6,2);

 

	$horaf=substr($horafin,0,2);

	$minf=substr($horafin,3,2);

	$segf=substr($horafin,6,2);

 

	$ini=((($horai*60)*60)+($mini*60)+$segi);

	$fin=((($horaf*60)*60)+($minf*60)+$segf);

 

	$dif=$fin-$ini;

 

	$difh=floor($dif/3600);

	$difm=floor(($dif-($difh*3600))/60);

	$difs=$dif-($difm*60)-($difh*3600);

	return date("H:i:s",mktime($difh,$difm,$difs));

} 
 ?>




