<?php
include('../conexion.php');



 $id =$_GET['id'];
 $inter =$_POST['intr'];

$sql ="INSERT INTO `interrupciones` (`idinterrupcion`, `idactividad`, `idinterrup`) VALUES (NULL, '$id', '$inter');";


   mysqli_query($con,$sql)or die(mysqli_error());
	
	
echo"<script type=\"text/javascript\"> window.location='index.php#one';</script>";



?>
