<?php
	session_start();
	include 'koneksi.php';
  
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


<body 
<?php
    $ambil=$koneksi->query("SELECT * FROM monitoring JOIN tabel_data ON monitoring.id_sungai=tabel_data.id_sungai ORDER BY tgl ASC LIMIT 1");
    $detail = $ambil->fetch_assoc();
?>

onload="setTimeout(myFunction,6000);"
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

<div style="margin-top: 70px;">
    <font size="6" color="black" face="arial black">
        <h4 style="text-align: center;"><b>Monitoring <?php echo $detail['nama_sungai']; ?></b></h4>
    </font>
    <center><?php include 'realtime.php' ?></center>
        <div style="margin-top: 30px;">
            <div align="right">
            <form method="GET" action="riwayatmonitoring.php" class="navbar-form"> 
            <b>Grafik Berdasarkan Tanggal</b>
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
            </div>
            <input class="form-control" id="tanggal" type="date" placeholder="" name="id">
            <label>
                <input type="submit" class="btn btn-primary" value="Cari">
            </label>
            </form>
            </div>
        </div>
</div>   

<?php include 'chart.php'; ?>


          <section class="konten">
    <div class="container">
        <section class="content-header">
            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border"></div>
                            <!-- /.box-header -->
                            <div class="col-md-12">
                                <div class="box-body">
                                    <p size="8" style="text-align: center;">
                                        <b>DETAIL DATA SUNGAI <?php echo $detail['nama_sungai']; ?></b><br>
                                    </p>
                                    <table class="table">
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><?php echo $detail['status']; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Lokasi Sungai</td>
                                            <td>:</td>
                                            <td><?php echo $detail['lokasi_sungai']; ?></td>
                                            </tr>
                                        <tr>
                                            <td>Panjang Sungai</td>
                                            <td>:</td>
                                            <td><?php echo $detail['panjang']; ?> km</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Luas</td>
                                            <td>:</td>
                                            <td><?php echo $detail['luas']; ?> km&sup2; </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Hilir</td>
                                            <td>:</td>
                                            <td><?php echo $detail['hilir']; ?> m&sup3;/dt</td>
                                        </tr>
                                
                                        <tr>
                                            <td>Kemiringan</td>
                                            <td>:</td>
                                            <td><?php echo $detail['kemiringan']; ?> Hilir</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Pengelola Sungai</td>
                                            <td>:</td>
                                            <td><?php echo $detail['pengelola']; ?></td>
                                        </tr>
                                    </table>
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
    
                <div style="margin-bottom: 50px;"></div>

<?php 
    include 'footer.php';
?>
<script type="text/javascript">
            $(document).ready(function () {
                $('#tanggal').datepicker({
                 //merubah format tanggal datepicker ke dd-mm-yyyy
                    format: "dd-mm-yyyy",
                    //aktifkan kode dibawah untuk melihat perbedaanya, disable baris perintah diatasa
                    //format: "dd-mm-yyyy",
                    autoclose: true
                });
            });
</script>

<script type="text/javascript">
function loading()
{
    var waktu = new Date();
    var detik = waktu.getSeconds();
}
</script>

<script>
function myFunction() 
{
    location.reload();
}
</script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>