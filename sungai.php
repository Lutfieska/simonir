<?php 
 //Koneksi
  session_start();
  include 'koneksi.php';
  include 'header.php';
?>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
   <script type="text/javascript">

    $(document).on("click", "#edit_data", function(){
      var id_sungai = $(this).data('id_sungai'); 
      var nama_sungai = $(this).data('nama'); 
      var lokasi_sungai = $(this).data('lokasi'); 
      var panjang = $(this).data('panjang');
      var luas = $(this).data('luas');
      var hilir = $(this).data('hilir');
      var kemiringan = $(this).data('kemiringan');
      var pengelola = $(this).data('pengelola');
      var gambar = $(this).data('gambar');   
     

      //menggunakan id (bukan name) pada setiap form
      $("#modal-edit #id_sungai").val(id_sungai);
      $("#modal-edit #nama_sungai").val(nama_sungai);
      $("#modal-edit #lokasi_sungai").val(lokasi_sungai);
      $("#modal-edit #panjang").val(panjang);
      $("#modal-edit #luas").val(luas);
      $("#modal-edit #hilir").val(hilir);
      $("#modal-edit #kemiringan").val(kemiringan);
      $("#modal-edit #pengelola").val(pengelola);
      $("#modal-edit #gambar").val(gambar);
     
    })
    
</script>
<!--Konten-->
<section class="konten" style="margin-top: 70px;">
  <div class="container">
   <div class="row row-table">
  <font color="black" face="arial">
    <h1><b><center>DATA ALIRAN SUNGAI DI PROVINSI JAWA TENGAH</center></b></h1>
  </font>
    <br>
      <?php $ambil = $koneksi->query("SELECT * FROM tabel_data "); ?>
      <?php while($perdata = $ambil->fetch_assoc()) { ?>
      <div class="col-md-4 col-table" >
        <div class="thumbnail">
        <div class="col-content bg">
          <center><img src="foto/<?php echo $perdata['gambar']; ?>"  width="180px" height="200px"></center>
          <div class="caption">
            <h4><b><center><?php echo $perdata['nama_sungai']; ?></center></b></h4><br>
            <h4><center><?php echo $perdata['lokasi_sungai']; ?></center></h4>

             <?php echo "<td><center><a href='#myModal' class='btn btn-primary btn-small' id='custId' data-toggle='modal' data-id=".$perdata['id_sungai'].">Detail</a></center></td>"; ?>
          </div>
        </div>
      </div>
      </div>

      <?php } ?>
      
    </div>
  </div>
</section>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"></h4>

          </div>
          <div class="modal-body">
              <div class="fetched-data"></div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
  <div style="margin-bottom: 50px;"></div>
</body>
</html>

<?php 
    include 'footer.php';
?>