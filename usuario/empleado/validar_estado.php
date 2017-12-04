
<?php  
include('../conexion.php');
session_start();
 $idUser = $_SESSION['idUsertimer'] ;
 $estado = $_GET['estado'];

$sql="UPDATE `usuarios` SET `idestado` = '$estado' WHERE `usuarios`.`idusuario` = $idUser ; ";
 mysqli_query($con,$sql)or die(mysqli_error());
echo"<script type=\"text/javascript\"> window.location='index.php';</script>";
 
?>
