<!DOCTYPE html>
<html>
<title>Actividad</title>
<br></br>
<body>
<?php 
include('../conexion.php');
 $btn = $_GET['btn'];
 $id = $_GET['id'];
//$comentario=null;
if (ISSET($_POST['comentario'])== null){
	$comentario=null;
}else {
	$comentario =$_POST['comentario'];
	
}

 //echo $comentario;

	  
	  //    Acciones Timer
 if($btn=="iniciar"){
	$estado = "Actividad iniciada";
	
	$activo=null;
	$sqlactivo="select idactividad from actividad where idestatus = 1;";
	     $resultact = mysqli_query($con,$sqlactivo)or die(mysqli_error());
          $i=0;
          while($rowact=mysqli_fetch_array($resultact )) {
	            
	        $activo = $rowact['idactividad'];
		  }
	
	if ($activo != 0){
		
	
	$sql3 = "
       update actividad set idestatus = 2 WHERE idactividad='$activo'";
    mysqli_query($con,$sql3)or die(mysqli_error());
	
	$sql2 = "INSERT INTO `pausa` (`idpausa`, `hora_pausa`, `idactividad`, `hora_reinicio`) VALUES (NULL,now(), '$activo', ''); ";
	 mysqli_query($con,$sql2)or die(mysqli_error());
	}
	
	$sql = "
       UPDATE actividad SET idestatus = 1,hora_ini= now() WHERE idactividad='$id'";
    mysqli_query($con,$sql)or die(mysqli_error());
	
	
	
  
 }else if($btn=="pausar"){
	$estado = "Actividad en pausa";
	
	$sql = "UPDATE actividad SET idestatus = 2 WHERE idactividad='$id'";
    mysqli_query($con,$sql)or die(mysqli_error());
	
	
	
	$sql2 = "INSERT INTO `pausa` (`idpausa`, `hora_pausa`, `idactividad`, `hora_reinicio`) VALUES (NULL,now(), '$id', ''); ";
	 mysqli_query($con,$sql2)or die(mysqli_error());
	
	
 }else if($btn=="finalizar")
  { 
	$estado =  "Actividad Finalizada";
	
		   
	$sql = "UPDATE actividad SET idestatus = 3 WHERE idactividad='$id'";
    mysqli_query($con,$sql)or die(mysqli_error());
	
	
	
	$sql2 = "UPDATE actividad SET hora_fin = now() Where idactividad='$id' ";
    mysqli_query($con,$sql2)or die(mysqli_error());
	
       $tiempot = tiempo_total($id,$con);
	  
	   $sql3 = "UPDATE actividad SET tiempo = '$tiempot',descripcion = '$comentario' Where idactividad='$id' ";
      mysqli_query($con,$sql3)or die(mysqli_error());
	  
	  
	  $sqlinter="SELECT SUM(tiempo)as total FROM `interrupciones`,interrupcion WHERE interrupciones.idinterrup = interrupcion.idinterrup and idactividad ='$id' ";
	     $resultinter = mysqli_query($con,$sqlinter)or die(mysqli_error());
        
          while($rowint=mysqli_fetch_array( $resultinter )) {
	            
	        $int = $rowint['total'];
		  }

  
	  $sql4 = "UPDATE actividad set tiempo = (tiempo-INTERVAL '$int' MINUTE)  WHERE idactividad='$id' ";
      mysqli_query($con,$sql4)or die(mysqli_error());
        // (Select COUNT(idinterupcion) WHERE idactividad = '$id' ) * (SELECT tiempo FROM actividad WHERE idactividad ='$id')
	//UPDATE actividad set hora_fin = (hora_fin-INTERVAL 10 SECOND)  WHERE idactividad='$id'

// ->pro SELECT SUM(tiempo)as total FROM `interrupciones`,interrupcion WHERE interrupciones.idinterrup = interrupcion.idinterrup and idactividad = 129  
  } else if($btn=="reanudar")
  { 
	$estado =  "Actividad Reanudada";
	$activo=null;
	$sqlactivo="select idactividad from actividad where idestatus = 1;";
	     $resultact = mysqli_query($con,$sqlactivo)or die(mysqli_error());
          $i=0;
          while($rowact=mysqli_fetch_array($resultact )) {
	            
	        $activo = $rowact['idactividad'];
		  }
	
	if ($activo != 0){
		
	
	$sql3 = "
       update actividad set idestatus = 2 WHERE idactividad='$activo'";
    mysqli_query($con,$sql3)or die(mysqli_error());
	
	
	$sql2 = "INSERT INTO `pausa` (`idpausa`, `hora_pausa`, `idactividad`, `hora_reinicio`) VALUES (NULL,now(), '$activo', ''); ";
	 mysqli_query($con,$sql2)or die(mysqli_error());
	}
	
	
	
	
	$sql = "UPDATE actividad SET idestatus = 1 WHERE idactividad='$id'";
    mysqli_query($con,$sql)or die(mysqli_error());
	
	
	$ultimo = null;
	$sqlultimo="select  idpausa  FROM `pausa` WHERE idactividad='$id'  order by idpausa  desc
    limit 1  ";
	     $resultu = mysqli_query($con,$sqlultimo)or die(mysqli_error());
          $i=0;
          while($rowult=mysqli_fetch_array($resultu )) {
	            
	        $ultimo = $rowult['idpausa'];
		  }
		  
	$sql3 = "UPDATE `pausa` SET  `hora_reinicio`= now() WHERE idactividad='$id' and idpausa='$ultimo'";
	 mysqli_query($con,$sql3)or die(mysqli_error());
  } 
  function tiempo_total($t,$c)
{
	$id =$t;
	$con =$c;
		 //Verificar tiempo pausa
		 $queryv="SELECT COUNT(idpausa)as pausa FROM `pausa` WHERE idactividad='$id'";
       $resultv= mysqli_query($con,$queryv)or die(mysqli_error());
      while($rowv=mysqli_fetch_array($resultv)) {
     
   
         $pausav= $rowv['pausa'];
	     
	  
   }
		 $total = null;
		 if($pausav==0){
			$querysp="SELECT timediff(now(),hora_ini)as tiempo FROM actividad WHERE idactividad='$id'";
       $resultsp= mysqli_query($con,$querysp)or die(mysqli_error());
      while($rowsp=mysqli_fetch_array($resultsp)) {
     
   
         $total= $rowsp['tiempo'];
	  
	  
   }
			 
			 return  $total ;
		 }else{
		 
		 
		 
  
    //primer valor
       $e = new DateTime('00:00');
	   $f = clone $e;
       $query1="SELECT timediff(MIN(hora_pausa),hora_ini)as hora_pausa FROM actividad,pausa WHERE pausa.idactividad='$id' and actividad.idactividad='$id'";
       $result1= mysqli_query($con,$query1)or die(mysqli_error());
      while($row1=mysqli_fetch_array($result1)) {
     
   
         $hora_pausa1= $row1['hora_pausa'];
	     $pausa1 = new DateTime($hora_pausa1);
	     $auxpausa1 = new DateTime("00:00");
		 
		   $dteDiff1   = $pausa1->diff($auxpausa1);
	     $dteDiff1  ->format("%H:%I:%S");
	     $e->add($dteDiff1);
	     $f->diff($e);
	  
   }
	
	 
	  
  //segundo  valor
      $i=0;
      $hora_pausa[]="";
	  $hora_reinicio[]="";
      $query2="SELECT * FROM `pausa` WHERE idactividad='$id'";
      $result= mysqli_query($con,$query2)or die(mysqli_error());
   while($row=mysqli_fetch_array($result)) {
     
   
      $hora_pausa[$i]= $row['hora_pausa'];
	  $hora_reinicio[$i] = $row['hora_reinicio']; 
	
	 $i=$i+1;
	  }
	  
	  $t=sizeof($hora_pausa);
	 //  $t;
	 
	  for($j=1;$j<$t;$j++)
	  {
		   $datetime1 = new DateTime( $hora_pausa[$j]);
	       $datetime2 = new DateTime($hora_reinicio[$j-1]);
		  
		 
		  $dteDiff   = $datetime1->diff($datetime2);
		 $dteDiff->format("%H:%I:%S");
		
         $e->add($dteDiff);
		
       //
	  }
	  
	//tercer valor  
	$query2="SELECT timediff(hora_fin,MAX(hora_reinicio))as hora_pausa FROM actividad,pausa WHERE pausa.idactividad='$id' and actividad.idactividad='$id'";
    $result2= mysqli_query($con,$query2)or die(mysqli_error());
   while($row1=mysqli_fetch_array($result2)) {
     
   
     $hora_pausa2= $row1['hora_pausa'];
	 $pausa2 = new DateTime($hora_pausa2);
	 $auxpausa2 = new DateTime("00:00");
		 
		$dteDiff2   = $pausa2->diff($auxpausa2);
	  $dteDiff2  ->format("%H:%I:%S");
	 $e->add($dteDiff2);
	 $f->diff($e);
	 
   }
  
	 $total = $f->diff($e)->format("%H:%I:%S");//suma de valores intermedios	
	
    return  $total ;
		 }
}


 echo"<script type=\"text/javascript\"> window.location='index.php#one';</script>";
   

?>

</body>
</html>
