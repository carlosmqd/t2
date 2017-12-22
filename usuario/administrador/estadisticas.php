<?php
  session_start();
  
  $User = $_SESSION['Usertimer'] ;
  $idUser = $_SESSION['idUsertimer'] ;
 if($User == null){
 header("Location: /timer2/index.php");
 }
 
 include('../conexion.php');
 

   
?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Estadisticas</title>

		<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
#container1 {
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

  </head>

  <body>
  
<script src="Highcharts-5.0.14/code/highcharts.js"></script>
<script src="Highcharts-5.0.14/code/modules/exporting.js"></script>
   <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Timer</a>
		
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actividades.php">Actividades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vista_reporte.php">Reportes</a>
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
<?php
    if(isset($_GET['pos']))
    {
        $location=$_GET['pos'];
       
    ?>
    <script>
        var myselect = document.getElementById("myselect");
        myselect.options.selectedIndex = <?php echo $_GET["pos"]; ?>
    </script>
    <?php
    }
    ?>
<?php
    if(isset($_GET['id']))
    {
        $idusert=$_GET['id'];
        }else{$idusert=0;}
    ?>
    
    
  <br></br> 
<center><h1>KPI</h1></center>
   <br></br>
  <center><select  class="col-lg-2 form-control"  id="myselect" name="usuario" onchange="window.location='estadisticas.php?id='+this.value+'&pos='+this.selectedIndex;" required>  
			<option value="" >---</option>
		   <?php 
			$result = mysqli_query( $con,"SELECT * FROM usuarios where idtipousuario=1 ") or die("Error: ".mysqli_error($con));
		 $i=0;
		   while($row = mysqli_fetch_array($result)){?>

          <?php if($i+1 ==  $location){  ?>   
  				<option value="<?php echo $row['idusuario'];?>"selected="selected"><?php echo $row['nombre']." ".$row['apellido'];?></option>  
                              <?php } else {  ?>


				  <option value="<?php echo $row['idusuario'];?>"><?php echo $row['nombre']." ".$row['apellido'];?></option>
				 
           <?php } $i=$i+1;}?>
            
			 </select></center>
<br></br>   
<?php 


 $sqlactivos ="SELECT SUM(valueadd) / 2 as v , SUM(waste)/ 2 as w, SUM(support)/ 2 as s FROM tarea,actividad WHERE tarea.idtarea = actividad.idtarea and idusuario='$idusert'  ";
	     $resultadoact = mysqli_query($con,$sqlactivos)or die(mysqli_error());
          $i=0;
          while($rowact=mysqli_fetch_array($resultadoact )) {
	            
	        $v = $rowact['v'];
               $w = $rowact['w'];
                $s = $rowact['s'];
		  }

        if ($v==null && $w==null && $s==null)
{  $v=0; $w=0; $s=0;    }
		  
?>


<div id="container1"></div>
<br></br>
<!-- <div id="container"></div> -->


<!-- /.content-section-a -->

    <aside class="banner">

      <div class="container">

        <div class="row">
          <div class="col-lg-6 my-auto">
           <center><h3>&copy; 2017 - TIP/TEF7  </h3></center>
          </div>
                
        </div>
      
      </div>
      <!-- /.container -->

    </aside>
<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>Highcharts.chart('container1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Actividades',
        colorByPoint: true,
        data: [{
            name: 'Soporte',
            y: <?php echo $s ?>
        }, {
            
            name: 'Desperdicio',
            y: <?php echo $w?>,
            sliced: true,
            selected: true
        }, {
            name: 'Valor Agregado',
            y: <?php echo $v?>
            
        }]
    }]
});</script>
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
            [Date.UTC(1970, 9, 21), 0],
            [Date.UTC(1970, 10, 4), 0.28],
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
            [Date.UTC(1970, 11, 6), 0.25],
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
	</body>
</html>
