<?php 

include('../conexion.php');

 
$idodt = $_GET['idodt'];



$sql = "
       UPDATE `odt` SET `cerrada` = '1' WHERE `odt`.`idodt` = '$idodt'";

    mysqli_query($con,$sql)or die(mysqli_error());

echo"<script type=\"text/javascript\"> window.location='ver_odt.php';</script>";


?>
