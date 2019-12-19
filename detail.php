<?php
    include 'koneksi.php';
 
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = "SELECT * FROM tabel_data WHERE id_sungai = $id";
        $result = $koneksi->query($sql);
        foreach ($result as $baris) { ?>
        <font color="black" face="Comic Sans MS">

        <h4><center><b>Detail <?php echo $baris['nama_sungai']; ?></b></center></h4>
        <center><img src="foto/<?php echo $baris['gambar']; ?>" alt="" width="260px" height="180px" ></center><br>
            <table class="table">
                <tr>
                    <td>Lokasi</td>
                    <td>:</td>
                    <td><?php echo $baris['lokasi_sungai']; ?></td>
                </tr>
                <tr>
                    <td>Panjang</td>
                    <td>:</td>
                    <td><?php echo $baris['panjang']; ?> km</td>
                </tr>
                <tr>
                    <td>Luas</td>
                    <td>:</td>
                    <td><?php echo $baris['luas']; ?> km&sup2;</td>
                </tr>
                 <tr>
                    <td>Hilir</td>
                    <td>:</td>
                    <td><?php echo $baris['hilir']; ?> m&sup2;/dt</td>
                </tr>
                 <tr>
                    <td>Kemiringan</td>
                    <td>:</td>
                    <td><?php echo $baris['kemiringan']; ?>.10<sup>-4</sup> hilir</td>
                </tr>
                 <tr>
                    <td>Pengelola</td>
                    <td>:</td>
                    <td><?php echo $baris['pengelola']; ?></td>
                </tr>

            </table>
        <?php 
 
        }
    }
    $koneksi->close();
?>