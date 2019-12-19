<?php 
 //Koneksi
  session_start();
  include 'koneksi.php';
  include 'header.php';
  $tanggal = date("Y-m-d H:i:s");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale1.0;">
    <title>Laporan</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- menyisipkan bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
</head>
<body>
<!-- Judul-->
<div class="col-md-12" <div style="margin-top: 20px;"></div>>
    <font color="black" face="arial">
      <h1><b><center>LAPOR PENGADUAN</center></b></h1>
    </font>
    <center>
    <?php
        include 'realtime.php';
    ?>
    </center>
</div>

<div class="container" div style="margin-top: 30px;"  align="right">
      <div class="col-md-12">
            <a data-toggle="modal" data-target="#tambahlaporan" >
            <button type="submit" class="btn btn-primary" name="tambah">Tambah pengaduan</button>
            </a><br>  
      </div>
      </div>

<!--Data Laporan-->
  <div class="container-fluid">
    <div class="panel" style="margin-top: 20px;">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <?php $ambil = $koneksi->query("SELECT * FROM laporan"); ?>
          <?php while($perdata = $ambil->fetch_assoc()) { ?>
          <div class="row" style="background: #20B2AA; color: black">
            <div class="col-md-12">
              <div class="col-md-6">
                <br><center><img src="bukti/<?php echo $perdata['bukti']; ?>" width="100px" img class="img-responsive" style="width:340px; height: 240px;" alt="">
                </center>
                  <font color="#20B2AA">1<br>2</font>
              </div>
              <div class="col-md-6">
                  <p style="text-align: justify;"><br>
                    <h3><?php echo $perdata["nama_sungai"]; ?></h3>
                    <h3><?php echo $perdata["lokasi_sungai"]; ?></h3>
                    <b>Waktu lapor : <?php echo $perdata["waktu"]; ?></b><br>
                    <b>Keterangan : </b><br><?php echo $perdata["deskripsi"]; ?><br>
                  </p><br>
                  <p style="text-align: right;" style="margin-bottom:10px;">
                    <b>Pelapor : <?php echo $perdata["nama_pelapor"]; ?></b>
                  </p>
              </div>
            </div> 
          </div><br> 
          <?php } ?>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </div>

<div id="tambahlaporan" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah Lapor Pengaduan</h4>
          </div>

          <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                  <label>Nama Pelapor</label>
                  <div class="input-group col-md-12">
                  <input type="text" name="nama_pelapor" class="form-control" placeholder="Masukkan Nama Anda">
                  </div>
                  <!-- /.input group -->
              </div>

              <div class="form-group">
                  <label>No. Handphone</label>
                  <div class="input-group col-md-12">
                  <!--<input type="tel" pattern="\(\d\d\d\d\)-\d\d\d\d\d\d\d" name="no_hp" placeholder="(999)-99999999" required />-->
                  <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No Handphone Anda">
                  </div>
                  <!-- /.input group -->
              </div>

              <!-- Luas Sungai -->
              <div class="form-group">
                <label>Nama Sungai</label>
                <div class="input-group col-md-12">
                <input type="text" name="nama_sungai" class="form-control" placeholder="Masukkan Nama Sungai">
                </div>
                <!-- /.input group -->
              </div>

              <!-- Hilir Sungai -->
              <div class="form-group">
                <label>Lokasi Sungai</label>
                <div class="input-group col-md-12">
                   <select name="lokasi_sungai" style="width:200px; height:35px" position="relative">
                       <option value="">--Pilih Lokasi--</option>
                       <option value="Kab. Batang">Kab Batang</option>
                       <option value="Kota Batang">Kota Batang</option>
                       <option value="Kab. Brebes">Kab. Brebes</option>
                       <option value="Kota Brebes">Kota Brebes</option>
                       <option value="Kab. Kendal">Kab. Kendal</option>
                       <option value="Kota Kendal">Kota Kendal</option>
                       <option value="Kab. Tegal">Kab. Tegal</option>
                       <option value="Kota Tegal">Kota Tegal</option>
                       <option value="Kab. Semarang">Kab. Semarang</option>
                       <option value="Kota Semarang">Kota Semarang</option>
                       <option value="Kab. Wonosobo">Kab. Wonosobo</option>
                       <option value="Kota Wonosobo">Kota Wonosobo</option>
                    </select>
                </div>
                <!-- /.input group -->
              </div>

              <!-- Deskripsi Sungai -->
              <div class="form-group">
                <label>Deskripsi Pengaduan</label>
                <div class="input-group col-md-12">
                <textarea class="form-control" name="deskripsi" placeholder="Masukkan Keterangan"></textarea>
                </div>
                <!-- /.input group -->
              </div>

               <!-- Gambar Sungai -->
              <div class="form-group">
                <label>Ambil Gambar Sungai</label>
                <div class="input-group col-md-12">
                <input type="file" class="form-control" name="bukti" accept="image/*">
                </div>
                <!-- /.input group -->
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="tambah">Kirim</button>
            </div>
                </form>

<?php
if (isset($_POST['tambah'])) 
{
  $ekstensi = explode(".",$_FILES['bukti']['name']);
  $nama = round(microtime(true)).".".end($ekstensi);
  $lokasi = $_FILES['bukti']['tmp_name'];
  move_uploaded_file($lokasi, "bukti/".$nama);


  $koneksi->query("INSERT INTO laporan(nama_pelapor,no_hp, waktu,nama_sungai,lokasi_sungai,deskripsi,bukti)

  VALUES('$_POST[nama_pelapor]','$_POST[no_hp]',now(),'$_POST[nama_sungai]','$_POST[lokasi_sungai]','$_POST[deskripsi]','$nama')");

  echo "<div class='alert alert-info'>Data Berhasil Disimpan</div>";
  echo "<script>window.location='laporan.php';</script>";
}
?>

</div>
</div>
</div>
</body>
</html>  
<div style="margin-bottom: 50px;"></div>
<?php 
    include 'footer.php';
?>