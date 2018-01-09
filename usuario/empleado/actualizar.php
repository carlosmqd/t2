<?php 
include('../conexion.php');
 $idact = $_GET['idact'];
 $tarea = $_POST['tarea'];
 $descripcion = $_POST['descripcion'];
 $fecha = $_POST['fecha'];
 "<br>";
 $ini = $_POST['ini'];
 $fin = $_POST['fin'];

 $inif= $fecha." ".$ini;
 $finf =$fecha." ".$fin;
 "<br>";

 $odt = $_POST['odt'];


 "<br>";
 $t = restar( $ini , $fin) ;
$sql = "UPDATE actividad SET idtarea='$tarea',descripcion='$descripcion',hora_ini='$inif',hora_fin='$finf',tiempo='$t',idodt='$odt' WHERE idactividad = '$idact' ";


    mysqli_query($con,$sql)or die(mysqli_error());


 echo"<script type=\"text/javascript\"> alert('datos actualizados correctamente'); window.history.back();;</script>";
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
