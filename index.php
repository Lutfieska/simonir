<?php
  include 'header.php';
?>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js"/>
<link rel="stylesheet" href="bootstrap/jss/jquery.min.js"/>
<link rel="stylesheet" href="bootstrap/css/style.css">
<div id="headerfull" style="margin-top: 70px;" max-width="98% !important ">
    <img class="mySlides" src="foto/slider1.jpeg">
    <img class="mySlides" src="foto/slider3.jpeg">
    <img class="mySlides" src="foto/slider4.jpeg">
    <img class="mySlides" src="foto/slider5.jpeg">
    <img class="mySlides" src="foto/slider7.jpeg">
    <button class="btn" id ="btn1" onclick="plusDivs(-1)">&#10094;</button>
    <button class="btn" id ="btn2" onclick="plusDivs(+1)">&#10095;</button>
</div>

<script>
  var slideIndex = 1;
  showDivs(slideIndex);

  function plusDivs(n) {
      showDivs(slideIndex += n);
  }

  function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length} ;
      for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
      }
      x[slideIndex-1].style.display = "block";
  }

  var slideIndex = 0;
  carousel();

  function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > x.length) {slideIndex = 1}
      x[slideIndex-1].style.display = "block";
      setTimeout(carousel, 3000); // Change image every 3 seconds
  }
</script>
<!DOCTYPE html>
<html>
<head>

    <!-- menyisipkan bootstrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	
</head>
<body>
    <div class="container-fluid" style="margin-top: 50px;">
        <!-- row 1: Header -->
    <div class="panel">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <!-- <div class="col-md-12 col-md-offset-1 box"> -->
        <div class="row" style="background: #FFFFFF; color: black">
        <!-- row 2: Artikel -->
            <div class="col-md-12">
                <font color="black" face="CArial Rounded MT Bold">
                <h3 style="margin-top: 30px;"><center><b>Sistem Monitoring dan Peringatan Ketinggian Air (SIMONIR)</b></center></h3>
                </font><br>
                
                <font color="black" face="CArial Rounded MT Bold">
                <p style="text-align: justify;">
                Banjir adalah salah satu peristiwa yang tejadi karena naiknya level ketinggian air sampai melebihi batas normal, sehingga air meluap keluar dari media tampung air. Banjir sering mengakibatkan banyak kerugian, seperti rusaknya rumah, pertokoan maupun lingkungan sekitar. Hal itu disebabkan karena kurangnya persiapan warga dalam mengantisipasi terjadinya banjir, sehingga warga tidak sempat mengevakuasi diri dan barang-barang yang ada di rumah maupun di sekitar rumah sebelum terendam banjir. Sering terjadinya banjir, beberapa pihak baik penjaga palang pintu sungai maupun warga sekitar membutuhkan sebuah sistem manajemen informasi bencana banjir yang dapat menampung data mengenai luapan air yang melebihi batas ketinggian normal dan peringatan terjadinya kondisi tersebut. <br><br>
                Sistem Monitoring dan Peringatan Ketinggian Air (SIMONIR) merupakan sistem yang dapat digunakan untuk memonitoring ketinggian air sungai dan dapat memberikan peringatan berupa bunyi buzzer ketika ketinggian air melewati batas normal yang sudah ditentukan. Dengan adanya sistem monitoring dan peringatan ketinggian air ini, dapat memberikan informasi kepada warga mengenai data sungai, dan memberikan data aliran sungai yang normal ataupun aliran sungai yang berpotensi terjadi banjir<br><br>
                Sistem ini dapat diakses oleh dua aktor, yakni admin dan user. Admin dapat mengelola data yang diperlukan oleh sistem melalui web. User dapat melihat data yang diolah oleh admin melalui web dan aplikasi android simonir. <br><br>
                Sistem monitoring ketinggian air ini, dapat memberikan informasi kepada warga mengenai data sungai beserta riwayatnya, dan memberikan data aliran sungai yang normal ataupun aliran sungai yang berpotensi terjadi banjir. Sistem ini menggunakan NodeMCU sebagai mikrokontroler karena dapat mengirimkan data menggunakan koneksi wifi  yang ada tanpa memerlukan modul tambahan. Data yang diperoleh akan dikirim ke server, kemudian ditampilkan pada web dan aplikasi android. Web dan aplikasi android yang diakses dapat menampilkan informasi terkait data sungai , grafik ketinggian permukaan air yang dimonitoring dan  fitur untuk warga sekitar dalam memberikan pelaporan terkait keadaan sungai, serta terdapat fasilitas yang ditujukan kepada donatur dalam menyalurkan donasi kepada korban banjir.  Aplikasi android dalam sistem ini juga dapat memberikan peringatan kepada masyarakat berupa notifikasi<br><br>
                Dalam web simonir.com ini terdapat beberapa menu yang dapat dilihat oleh user, yaitu menu home yaitu menu pertama yang menampilkan informasi singkat mengenai SIMONIR. Menu kedua yaitu data sungai yang menampilkan data sungai meliputi nama sungai, lokasi sungai, luas sungai,dll di Provinsi Jawa Tengah (Bersumber dari <a href="http://pusdataru.jatengprov.go.id/">PUSDATARU JATENG)</a>. Menu ketiga yaitu menu monitoring yang didalamnya terdapat grafik real time monitoring ukuran ketinggian air yang diperoleh dari sensor. Menu terakhir yaitu menu laporan pengaduan yang dapat menampung laporan pengaduan yang diinputkan oleh user sesuai dengan kejadian/peristiwa nyata yang berhubungan dengan sungai di daerah Jawa Tengah.
                </p>
                </font>
                <div style="margin-bottom: 50px;"></div>
            </div>
        </div>
       </div>
	</div>
    <div class="col-md-2"></div>
</div>
</div><br>

    <?php include 'footer.php';?>
	
</body>
</html>