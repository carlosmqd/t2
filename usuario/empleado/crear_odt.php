<?php 

include('../conexion.php');
 session_start();
  
  $User = $_SESSION['Usertimer'] ;
  $idUser = $_SESSION['idUsertimer'] ;
 if($User == null){
 header("Location: /timer2/index.php");
 }
if ($_GET['odt']== 1){

$tiempoa = $_POST['tiempo'];
 $tiempo = $tiempoa *60*60;
 $cc = $_GET['cc'];

 $sql ="INSERT INTO `odt` (`idodt`, `tiempo`, `idma`, `idcostos`, `idusuario`,tiempoa,fecha) VALUES (NULL, '$tiempo', '0','$cc', '$idUser',$tiempoa,now()); ";
 $resultado = mysqli_query($con,$sql);
    if(!$resultado) {
      die('Invalid query: ' . mysqli_error());
    }else{
echo"<script type=\"text/javascript\"> window.location='alta_odt.php?idcheck=1';</script>";
     }
       
 

}else {

 $tiempoa = $_POST['tiempo'];
 $tiempo = $tiempoa *60*60;
 $ma = $_GET['ma'];
 $cc = $_GET['cc'];

 $sql ="INSERT INTO `odt` (`idodt`, `tiempo`, `idma`, `idcostos`, `idusuario`,tiempoa,fecha) VALUES (NULL, '$tiempo', '$ma', '$cc', '$idUser',$tiempoa,now()); ";
 $resultado = mysqli_query($con,$sql);
    if(!$resultado) {
      die('Invalid query: ' . mysqli_error());
    }else{
echo"<script type=\"text/javascript\"> window.location='alta_odt.php';</script>";
     }
       
 

}
 ?>
