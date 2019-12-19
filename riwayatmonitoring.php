<?php
    $tgl=$_GET['id'];
	session_start();
	include 'koneksi.php';
	
	
	$ketinggian = array();
	$waktu = array();

	$query = "SELECT * FROM `monitoring` WHERE tgl='$tgl' ORDER BY waktu ASC LIMIT 100";
	$sql = mysqli_query($koneksi,$query);
	while($data = mysqli_fetch_array($sql)){
		$ketinggian[] = intval($data['ketinggian']);
		$waktu[] = $data['waktu'];
	}
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <link href="foto/logo.png" rel="shortcut icon">
    <title>SIMONIR</title>
  </head>

<body>
  <!-- navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
  <div class="row" style="background-color:#48D1CC; color:white;">
    <div class="navbar-header">
        <a class="navbar-brand" href="" style="margin-left: 60px;"><font color="black"> SIMONIR</font></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
    </div>
    
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav"> 
        <li><a href="index.php"><span class="glyphicon glyphicon-home" color="white" ></span><font size="4" color="black" face="arial"> Home</font></a></li>
        <li><a href="monitoring.php"><span class="glyphicon glyphicon-file"></span><font size="4" color="black" face="arial"> Monitoring</font></a></li>
        <li><a href="sungai.php"><span class="glyphicon glyphicon-stats"></span><font size="4" color="black" face="arial"> Data Sungai</font></a></li>
        <li><a href="laporan.php"><span class="glyphicon glyphicon-list-alt"></span><font size="4" color="black" face="arial"> Laporan</font></a></li>
      </ul>
    </div>

  </div>
  </nav>

<?php 
 $ambil=$koneksi->query("SELECT * FROM monitoring JOIN tabel_data ON monitoring.id_sungai=tabel_data.id_sungai");
 $detail = $ambil->fetch_assoc();
?>

<?php $ambil=$koneksi->query("SELECT * FROM monitoring LIMIT 1"); ?>
<?php while($pecah = $ambil->fetch_assoc()) { ?>
  <center><?php include 'realtime.php' ?></center>
    
    <div style="margin-top: 70px;">
    <font size="6" color="black" face="arial black">
        <h4 style="text-align: center;"><b>Monitoring <?php echo $detail['nama_sungai']; ?></b></h4>
    </font>
    </div>
    
    <div style="margin-top: 30px;">
        <div align="right">
        <form method="GET" action="monitoring.php" class="navbar-form"> 
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Kembali ke Halaman Monitoring ">
        </div>
        </form>
        </div>
    </div>

<div  id="monitoring" style="min-width: 100px; height: 500px; margin: 100px"></div>
        <?php } ?>
            </div>
            </div>
            
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
            <a href="#revenue-chart"></a>
              <li class="pull-left header"><i class="fa fa-inbox"></i></li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; "></div>
            </div>
          </div>
          </div>
          </section>
        </div>
      </div>
      <div style="margin-bottom: 50px;"></div>

<?php 
    include 'footer.php';
?>
<script type="text/javascript">

function loading(){

var waktu = new Date();

var detik = waktu.getSeconds();

}


</script>

<script>
function myFunction() {
    location.reload();
}
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
Highcharts.chart('monitoring', {
    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories:<?php print_r(json_encode($waktu));?>
    },
    yAxis: {
        title: {
            text: 'jarak antara sensor dan air ( cm )'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'waktu',
        data:<?php print_r(json_encode($ketinggian));?>
    }]
});

</script>

<script type="text/javascript">

function loading(){

var waktu = new Date();

var detik = waktu.getSeconds();

}


</script>

<script>
function myFunction() {
    location.reload();
}
</script>

</body>
</html>