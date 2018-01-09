<?php 
include('../conexion.php');
$id = $_GET['id'];


$sql = "DELETE FROM `actividad` WHERE idactividad = '$id' ";
 mysqli_query($con,$sql)or die(mysqli_error());
 
 echo"<script type=\"text/javascript\"> window.location='index.php#one';</script>";
  
 
 ?>
