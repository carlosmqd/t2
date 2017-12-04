<?php
  session_start();
  
  $User = $_SESSION['Usertimer'] ;
  $idUser = $_SESSION['idUsertimer'] ;
 if($User == null){
 header("Location: /timer2/index.php");
 }
 
 include('../conexion.php');
 
 $sqlestado= " SELECT * FROM usuarios WHERE idusuario= $idUser  ";
  $resultestado = mysqli_query($con,$sqlestado)or die(mysqli_error());
  while($row1=mysqli_fetch_array($resultestado)) {
     
    
	$estado = $row1['idestado'];
	
  }
    $_SESSION['idestadotimer'] = $estado;
   $orden =813512391;
   $x=0;
   $activatiempo = 1;
   /*
    $sqlactivos ="SELECT COUNT(*) activo FROM `actividad` WHERE activo = 1 and idusuario='$idUser'   ";
	     $resultadoact = mysqli_query($con,$sqlactivos)or die(mysqli_error());
          $i=0;
          while($rowact=mysqli_fetch_array($resultadoact )) {
	            
	        $activos = $rowact['activo'];
		  }
		  
		  if ($activos == 0){
			   $activatiempo = 0;
			  $sqlactivar = "UPDATE actividad SET activo = 1 ";
           mysqli_query($con,$sqlactivar)or die(mysqli_error());
		   
		  
			  
		  } else   if ($activos > 1){
			  $activatiempo = 0;
		  }else {
			  $activatiempo = 1;
		  }*/
   
	  
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Timer</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="css/tabla.css" rel="stylesheet">
	 <link href="css/popup.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->

    <!-- Custom styles for this template -->
    <link href="css/landing-page.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/github.min.css">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><i class="fa fa-arrow-up  fa-fw"></i>Timer</a>
		<?php if($activatiempo == 0){?>
			<center><a style ="color:#f00">sin actividad</a> </center>
			
		<?php }else{?>
		<center><a style ="color:#f00 "id='CuentaAtras'></a> </center>
		<?php }?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Actividades</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="alta_odt.php">ODT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="historico.php">Historico</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="estadisticas.php">Estadisticas</a>
            </li >
			<li class="nav-item">
			<a class="nav-link" href="../cerrarsesion.php"><i class="fa fa-user-times fa-fw"></i>Cerrar sesion</a>
            </li>
		  </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="intro-header">
      <div class="container">
        <div class="intro-message">
		
           <h3>Bienvenido </h3>
		   
		   <?php if ($_SESSION['idestadotimer']== "1"){?>
		   <span style =" color: #18D118;"class="fa fa-check-circle fa-2x"></span>
		   <?php } if ($_SESSION['idestadotimer']== "2"){?>
		   <span style =" color: #F00;" class="fa fa-times fa-2x"></span>
		   <?php } if ($_SESSION['idestadotimer']== "3"){?>
		   <span style =" color: #F5FC32;"class="fa fa-cutlery fa-2x"></span>
		   <?php }?>
		   <?php echo " ".$User."  "; ?>
          <br></br>
					
					<p>¿ Que actividad deseas agregar ?<br />
          <hr class="intro-divider">
          <ul class="list-inline intro-social-buttons">
            <li class="list-inline-item">
              <a href="#popup1" class="btn btn-secondary btn-lg">
                <i class="fa fa-file-text fa-fw"></i>
                <span class="network-name">Actividad planeada</span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#popup2" class="btn btn-secondary btn-lg">
                <i class="fa fa-file-excel-o fa-fw"></i>
                <span class="network-name">Actividad Emergente</span>
              </a>
            </li>
          <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    
                                    <li>
                                        <a href="validar_estado.php?estado=1">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="validar_estado.php?estado=2">
                                            <i class="fa fa-times  fa-fw"></i> Out TlP
                                        </a>
                                    </li>
                                    <li>
                                        <a href="validar_estado.php?estado=3">
                                            <i class="fa fa-cutlery fa-fw"></i> Lunch 
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                   
                               
                           
                                    </ul>
			
          </ul>
		
     
 </div>
      </div>
	  <div class="modal-wrapper" id="popup2">
   <div class="popup2-contenedor">
    <form action="crear_actividad.php?act=2&usr=<?php echo $idUser?>" method ="post">
     <center> <h2>Actividad Emergente</h2></center>
	 
	  <center><select name="tarea">
	  <option value ="1">Actualizar Servidor</option>
      <option value ="2">Actualizar Base de datos</option>
      <option value ="3">Verificar bancos de pruebas</option>	  </select></center>
<br>

<center>Inicio<div style="width: 120px"  class="input-group clockpicker" data-placement="top" data-align="center" data-donetext="Done">

	<input name="inicio" type="text" class="form-control" value="00:00">
			
	<span class="input-group-addon">
				
    	<span class="fa fa-clock-o">
	</span>
			
	</span>
	
 
		
	</div>  

Fin<div style="width: 120px "  class="input-group clockpicker" data-placement="top" data-align="center" data-donetext="Done">

	 <input name="fin" type="text" class="form-control" value="00:00">
			
	<span class="input-group-addon">
				
    	<span class="fa fa-clock-o">
	</span>
			
	</span>
	
 
		
	</div> </center>
 

	  <br></br>
      <center><input type="submit" value="crear"></center>
	  <a class="popup2-cerrar" href="#">X</a>
	  </form>
   </div>
   </div>
   	  <!-- popup -->
   
<div class="modal-wrapper" id="popup1">
   <div class="popup1-contenedor">
   <form action="crear_actividad.php?act=1&usr=<?php echo $idUser?>" method ="post">
     <center> <h2>Actividad Planeada</h2></center>
	  
	  <center><select name="tarea">
	  <option value ="1">Actualizar Servidor</option>
      <option value ="2">Actualizar Base de datos</option>
      <option value ="3">Verificar bancos de pruebas</option>	  </select></center>
	   <br>
	  
<center>Inicio<div style="width: 120px"  class="input-group clockpicker" data-placement="top" data-align="center" data-donetext="Done">

	<input name="inicio" type="text" class="form-control" value="00:00">
			
	<span class="input-group-addon">
				
    	<span class="fa fa-clock-o">
	</span>
			
	</span>
	
 
		
	</div>  

Fin<div style="width: 120px"  class="input-group clockpicker" data-placement="top" data-align="center" data-donetext="Done">

	 <input  name="fin" type="text" class="form-control" value="00:00">
			
	<span class="input-group-addon">
				
    	<span class="fa fa-clock-o">
	</span>
			
	</span>
	
 
		
	</div> </center>
<br>
      <center><input type="submit" value="crear"></center>
	  <a class="popup1-cerrar" href="#">X</a>
	  </form>
   </div>
   </div>
    
    </header>
   
    
    
	<!-- Page Content -->
  

    <section id="one" class="content-section-b">

      <div class="container">

        <div class="row">
          
				<div class="table-users">
        <div class="header">Actividades</div>
		
		<table cellspacing="0">
            <tr>
			  <th>Nombre</th>
			   <th>No.de Orden</th>
                <th>Estatus</th>
                <th>Hora de Inicio</th>
               
				<th></th>
				 <th>Actividades</th>
                 <th></th>
            </tr>
			
			
     <?php //SELECT `idactividad`, actividad.nombre, `descripcion`, TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_ini, `hora_fin`, `tiempo`, `idtipoactividad`, `dia`, estatus.nombre as nombre_estatus, actividad.idestatus FROM `actividad` ,estatus where estatus.idestatus = actividad.idestatus   
	 
	    
		 
	 $miselect= " SELECT `idactividad`, tarea.nombre, `descripcion`, `hora_ini`, `hora_fin`, `tiempo`, `idtipoactividad`, estatus.nombre as nombre_estatus, actividad.idestatus,TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_act FROM `actividad` ,estatus,tarea where tarea.idtarea = actividad.idtarea and estatus.idestatus = actividad.idestatus and idusuario = '3' and ( DATE(hora_ini)=DATE(now()) or TIME(hora_ini) = '00:00:00') ORDER BY `actividad`.`idactividad` DESC ";
  $resultado = mysqli_query($con,$miselect)or die(mysqli_error());
  $i=0;
  while($row=mysqli_fetch_array($resultado)) {
     
    $id[$i]= $row['idactividad'];
    $tipo[$i]= $row['idtipoactividad'];
   
	$nombre[$i] = $row['nombre']; 
	
	$descripcion[$i] = $row['descripcion']; 
	
	$estatus[$i] = $row['idestatus']; 
	
	$nombreestatus[$i] = $row['nombre_estatus'];
	
	$tiempo[$i] = $row['hora_ini'];

	$tiempo_actual[$i] = $row['hora_act'];
	
	$tiempofinal[$i] = $row['tiempo'];
	
	
  

   ?>
                 <?php 
	?>
                 <tr>
				<td><?php echo $nombre[$i] ?></td>
				<td><?php echo $orden = $orden+1; ?></td>
                <td><?php echo $nombreestatus[$i] ?></td>
                <td><?php echo $tiempo[$i]?></td>
                
                <?php 				 
					 if($estatus[$i]==4){?>
				        <td></td>
						<td><a href ="validaractividad.php?id=<?php echo $id[$i]?>&btn=iniciar"><img class="top"src="img/start.jpg" alt="" /></a></td>	
		                <td></td>
					<?php }if($estatus[$i]==1){?>
						<td><a href ="validaractividad.php?id=<?php echo $id[$i]?>&btn=pausar"><img class="top" src="img/pause.jpg" alt="" /></a></td>
				<td><a href="#popup3" ><img class="top" src="img/interupcion.jpg" alt="" /></a></td>
				<?php $actual =$i;$idf =$id[$i];   $_SESSION['tiempoactual']=$actual; $t=tiempo_total($id[$i],$con,1);
				 $tt = segundos_a_hora($t);?>
				<td><a href ="#popup4"><img class="top" src="img/stop.jpg" alt="" /></a></td>
					    
					<?php }if($estatus[$i]==2){?>
					 <td> <?php echo $tiempot = tiempo_total($id[$i],$con,0); ?></td>
						<td><a href ="validaractividad.php?id=<?php echo $id[$i]?>&btn=reanudar"><img class="top"src="img/continue.jpg" alt="" /></a></td>	
		                <td></td>
					<?php  }if($estatus[$i]==3){?>
					   <td></td>
                         <td><?php echo $tiempofinal[$i]?> horas</td>
						
					   <td></td>
						 <?php }?>
				
					   
			      </tr>  
				   
				 <?php  $i=$i+1;} ?>
            
                
               
 
           
                    </table>
	               </div>
                 </div>
			
        
        </div>

      
      <!-- /.container -->

    </section>
    <!-- /.content-section-b -->

    
    <!-- /.content-section-a -->

    <aside class="banner">

      <div class="container">

        <div class="row">
          <div class="col-lg-6 my-auto">
           <center><h3>&copy; 2017 - TIP/TEF7  </h3></center>
          </div>
          <div class="col-lg-6 my-auto">
                             
			
          </div>
		     
                  
        </div>
      
      </div>
      <!-- /.container -->
	  
	  <div class="modal-wrapper" id="popup3">
   <div class="popup3-contenedor">
    <form action="interrupcion.php?id=<?php echo $idf?>" method ="post">
	  <center><h3>¿Que actividad provocó la interrupcion?</h3> </center>
	  <center><select name="intr">
	  <?php 
   
			$result = mysqli_query( $con,"SELECT * FROM interrupcion") or die("Error: ".mysqli_error($con));
		
		   while($row = mysqli_fetch_array($result)){?>

      
				  <option value="<?php echo $row['idinterrup'];?>"><?php echo $row['nombre'];?></option>
				 
           <?php } ?></select></center>
	   
	  <br></br>
      <center><input type="submit" value="registrar"></center>
	  <a class="popup3-cerrar" href="#one">X</a>
	  </form>
   </div>
   </div>
<div class="modal-wrapper" id="popup4">
     
   <div class="popup4-contenedor">
   <form action="validaractividad.php?id=<?php echo $idf?>&btn=finalizar" method ="post">
    
	  <center><h3>Comentarios</h3> </center>
	  <center>
	  <input  type="text" name="comentario">
	  </center><br></br>
      <center><input  type="submit" value="registrar"></center>
	  <a class="popup4-cerrar" href="#one">X</a>
	  </form>
   </div>
   </div>
    </aside>
    <!-- /.banner -->
     
    <!-- Footer -->
    

   
    
	
	<?php  

?>
  
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script language="JavaScript">
	/* Determinamos el tiempo total en segundos */
    <?php if($x==0){?>
	var totalTiempo= <?php  echo $tt ;?>;
<?php } else{?>

 totalTiempo=totalTiempo;//tiempo en segundos
<?php }?>

var timestampStart = new Date().getTime();

var endTime=timestampStart+(totalTiempo*1000);

var timestampEnd=endTime-new Date().getTime();


/* Variable que contiene el tiempo restante */

var tiempRestante=totalTiempo;


/* Ejecutamos la funcion updateReloj() al cargar la pagina */

updateReloj();


function updateReloj() {

    var Seconds=tiempRestante;

    

    var Days = Math.floor(Seconds / 86400);

    Seconds -= Days * 86400;


    var Hours = Math.floor(Seconds / 3600);

    Seconds -= Hours * (3600);


    var Minutes = Math.floor(Seconds / 60);

    Seconds -= Minutes * (60);


    var TimeStr = ((Days > 0) ? Days + " dias " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds);

    /* Este muestra el total de hora, aunque sea superior a 24 horas */

    //var TimeStr = LeadingZero(Hours+(Days*24)) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds);


    document.getElementById('CuentaAtras').innerHTML = TimeStr;


    

        /* Restamos un segundo al tiempo restante */

        tiempRestante+=1;

        /* Ejecutamos nuevamente la función al pasar 1000 milisegundos (1 segundo) */

        setTimeout("updateReloj()",1000);

    

}


/* Funcion que pone un 0 delante de un valor si es necesario */

function LeadingZero(Time) {

    return (Time < 10) ? "0" + Time : + Time;

}



</script>
<script type="text/javascript">
                var input = $('.clockpicker-with-callbacks').clockpicker({
                    donetext: 'Done',
                        init: function() { 
                            console.log("colorpicker initiated");
                        },
                        beforeShow: function() {
                            console.log("before show");
                        },
                        afterShow: function() {
                            console.log("after show");
                        },
                        beforeHide: function() {
                            console.log("before hide");
                        },
                        afterHide: function() {
                            console.log("after hide");
                        },
                        beforeHourSelect: function() {
                            console.log("before hour selected");
                        },
                        afterHourSelect: function() {
                            console.log("after hour selected");
                        },
                        beforeDone: function() {
                            console.log("before done");
                        },
                        afterDone: function() {
                            console.log("after done");
                        }
                });

                // Manually toggle to the minutes view
                $('#check-minutes').click(function(e){
                    // Have to stop propagation here
                    e.stopPropagation();
                    input.clockpicker('show')
                            .clockpicker('toggleView', 'minutes');
                });
                </script>
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
$('.clockpicker').clockpicker()
	.find('input').change(function(){
		console.log(this.value);
	});
var input = $('#single-input').clockpicker({
	placement: 'bottom',
	align: 'left',
	autoclose: true,
	'default': 'now'
});

$('.clockpicker-with-callbacks').clockpicker({
		donetext: 'Done',
		init: function() { 
			console.log("colorpicker initiated");
		},
		beforeShow: function() {
			console.log("before show");
		},
		afterShow: function() {
			console.log("after show");
		},
		beforeHide: function() {
			console.log("before hide");
		},
		afterHide: function() {
			console.log("after hide");
		},
		beforeHourSelect: function() {
			console.log("before hour selected");
		},
		afterHourSelect: function() {
			console.log("after hour selected");
		},
		beforeDone: function() {
			console.log("before done");
		},
		afterDone: function() {
			console.log("after done");
		}
	})
	.find('input').change(function(){
		console.log(this.value);
	});

// Manually toggle to the minutes view
$('#check-minutes').click(function(e){
	// Have to stop propagation here
	e.stopPropagation();
	input.clockpicker('show')
			.clockpicker('toggleView', 'minutes');
});
if (/mobile/i.test(navigator.userAgent)) {
	$('input').prop('readOnly', true);
}
</script>
<?php function tiempo_total($t,$c,$x)
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
	  if($x==1){
	 $query3="Select timediff(TIME(NOW()),(SELECT TIME(hora_reinicio) FROM `pausa` where idactividad='$id' and hora_reinicio = (SELECT MAX( hora_reinicio ) FROM pausa)))as tiempo";
       $result3= mysqli_query($con,$query3)or die(mysqli_error());
      while($row3=mysqli_fetch_array($result3)) {
     
   
         $hora_pausa3= $row3['tiempo'];
	     $pausa3 = new DateTime($hora_pausa3);
	     $auxpausa3 = new DateTime("00:00");
		 
		   $dteDiff3   = $pausa3->diff($auxpausa3);
	     $dteDiff3  ->format("%H:%I:%S");
	     $e->add($dteDiff3);
	     $f->diff($e);
	  }
   }
  
	 $total = $f->diff($e)->format("%H:%I:%S");//suma de valores intermedios	
	
    return  $total ;
	
		 }
}
function segundos_a_hora($hora) { 
    list($h, $m, $s) = explode(':', $hora); 
    return ($h * 3600) + ($m * 60) + $s; 
} ?>
  </body>

</html>
