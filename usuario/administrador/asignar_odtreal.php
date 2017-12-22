<?php 

include('../conexion.php');

 $idodtreal = $_POST['odtreal'];
$idodt = $_POST['idodt'];



$sql = "
       UPDATE `odt` SET `odtreal` = '$idodtreal' WHERE `odt`.`idodt` = '$idodt';";
    mysqli_query($con,$sql)or die(mysqli_error());
echo"<script type=\"text/javascript\"> window.location='odt.php';</script>";


?>
