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

  /* $sqltiempo= " SELECT `idactividad`, actividad.nombre, `descripcion`, `hora_ini`, `hora_fin`, `tiempo`, `idtipoactividad`, `dia`, estatus.nombre as nombre_estatus, actividad.idestatus,TIME_TO_SEC(timediff(now(),`hora_ini`)) as hora_act,activo FROM `actividad` ,estatus where estatus.idestatus = actividad.idestatus and idusuario = '$idUser' ORDER BY `actividad`.`idactividad` DESC  ";
  $resultiempo = mysqli_query($con,$sqltiempo)or die(mysqli_error());
  $j=0;
  while($rowt=mysqli_fetch_array($resultiempo)) {
     
  

	$tiempo_actual[$j] = $rowt['hora_act'];
	
	 $j=$j+1;
  }*/
   $actual = $_SESSION['tiempoactual'];
  
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
		</style>
	</head>
	


<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <link href="css/tabla.css" rel="stylesheet">
	 <link href="css/popup.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
    <!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->

    <!-- Custom styles for this template -->
    <link href="css/landing-page.css" rel="stylesheet">
      <link rel="stylesheet" src="assets/jquery-ui-1.12.1/jquery-ui.css">
     <script src="assets/jquery-ui-1.12.1/jquery-ui.js"></script>
 <script src="assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
     <script src="assets/jquery-ui-1.12.1/datepicker.js"></script>
<script src="assets/jquery-ui-1.12.1/jquery.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
  } );
  </script>
  </head>

  <body>
  
<script src="Highcharts-5.0.14/code/highcharts.js"></script>
<script src="Highcharts-5.0.14/code/modules/exporting.js"></script>
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
   <br></br>
  <br></br> 
<br></br>   
<p>Date: <input type="text" id="datepicker"></p>
<br></br>
<br></br>
<div id="container"></div>

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

    </aside>
<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php  // ->>>> SELECT `idactividad`,`hora_ini`, `tiempo`,`idusuario` , tarea.valueadd ,tarea.waste,tarea.support FROM `actividad`,tarea WHERE actividad.idtarea=tarea.idtarea and YEAR(hora_ini) = 2017 and MONTH(hora_ini) = 11 and DAY(hora_ini)=27 and idusuario=3 ?>
  
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Actividades de la semana'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'datetime',
        dateTimeLabelFormats: { // don't display the dummy year
            month: '%e. %b',
            year: '%b'
        },
        title: {
            text: 'Date'
        }
    },
    yAxis: {
        title: {
            text: 'horas (h)'
        },
        min: 0
    },
    tooltip: {
        headerFormat: '<b>{series.name}</b><br>',
        pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
    },

    plotOptions: {
        spline: {
            marker: {
                enabled: true
            }
        }
    },

    series: [{
        name: 'Desperdicio',
        // Define the data points. All series have a dummy year
        // of 1970/71 in order to be compared on the same x axis. Note
        // that in JavaScript, months start at 0 for January, 1 for February etc.
        data: [
            [2017-11-27 , 0],
            [2017-11-28 , 0.28],
            [Date.UTC(1970, 10, 9), 0.25],
            [Date.UTC(1970, 10, 27), 0.2],
            [Date.UTC(1970, 11, 2), 0.28],
            [Date.UTC(1970, 11, 26), 0.28],
            [Date.UTC(1970, 11, 29), 0.47],
            [Date.UTC(1971, 0, 11), 0.79],
            [Date.UTC(1971, 0, 26), 0.72],
            [Date.UTC(1971, 1, 3), 1.02],
            [Date.UTC(1971, 1, 11), 1.12],
            [Date.UTC(1971, 1, 25), 1.2],
            [Date.UTC(1971, 2, 11), 1.18],
            [Date.UTC(1971, 3, 11), 1.19],
            [Date.UTC(1971, 4, 1), 1.85],
            [Date.UTC(1971, 4, 5), 2.22],
            [Date.UTC(1971, 4, 19), 1.15],
            [Date.UTC(1971, 5, 3), 0]
        ]
    }, {
        name: 'Valor Agregado',
        data: [
            [Date.UTC(1970, 9, 29), 0],
            [Date.UTC(1970, 10, 9), 0.4],
            [Date.UTC(1970, 11, 1), 0.25],
            [Date.UTC(1971, 0, 1), 1.66],
            [Date.UTC(1971, 0, 10), 1.8],
            [Date.UTC(1971, 1, 19), 1.76],
            [Date.UTC(1971, 2, 25), 2.62],
            [Date.UTC(1971, 3, 19), 2.41],
            [Date.UTC(1971, 3, 30), 2.05],
            [Date.UTC(1971, 4, 14), 1.7],
            [Date.UTC(1971, 4, 24), 1.1],
            [Date.UTC(1971, 5, 10), 0]
        ]
    }, {
        name: 'Soporte',
        data: [
            [Date.UTC(1970, 10, 25), 0],
            [Date.UTC(1970, 11, 6), 1.70],
            [Date.UTC(1970, 11, 20), 1.41],
            [Date.UTC(1970, 11, 25), 1.64],
            [Date.UTC(1971, 0, 4), 1.6],
            [Date.UTC(1971, 0, 17), 2.55],
            [Date.UTC(1971, 0, 24), 2.62],
            [Date.UTC(1971, 1, 4), 2.5],
            [Date.UTC(1971, 1, 14), 2.42],
            [Date.UTC(1971, 2, 6), 2.74],
            [Date.UTC(1971, 2, 14), 2.62],
            [Date.UTC(1971, 2, 24), 2.6],
            [Date.UTC(1971, 3, 2), 2.81],
            [Date.UTC(1971, 3, 12), 2.63],
            [Date.UTC(1971, 3, 28), 2.77],
            [Date.UTC(1971, 4, 5), 2.68],
            [Date.UTC(1971, 4, 10), 2.56],
            [Date.UTC(1971, 4, 15), 2.39],
            [Date.UTC(1971, 4, 20), 2.3],
            [Date.UTC(1971, 5, 5), 2],
            [Date.UTC(1971, 5, 10), 1.85],
            [Date.UTC(1971, 5, 15), 1.49],
            [Date.UTC(1971, 5, 23), 1.08]
        ]
    }]
});
		</script>
	<script language="JavaScript">
	/* Determinamos el tiempo total en segundos */
    <?php if($x==0){?>
	var totalTiempo= <?php echo $tiempo_actual[$actual]; $_SESSION['tiempoactual']=$actual;$x=1;?>;
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
	</body>
</html>
