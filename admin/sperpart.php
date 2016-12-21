<?php
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
    echo "<script>window.alert('Login Dulu Gan');
        location.assign('../login.php');</script>";
} else {
    include_once('../connect.php');
    include_once('../sumber.php');
    ?>

    <link rel="stylesheet" href="../modif.css" type="text/css" />
    <div id="header">
        <!-- logout -->
        <a href="../logout.php"><input class="header" type="button" value="LogOut"></a>

        <a href="sepeda.php"><input class="header" type="button" value="Sepeda"></a>
        <a href="sperpart.php"><input class="header" type="button" value="Sperpart"></a>
        <a href="aksesoris.php"><input class="header" type="button" value="Aksesoris"></a>

        <!-- menu tambah data -->
        <a href="#tambah"><input class="header" type="submit" name="tambah" value="Tambah Data Sperpart"></a>
        <?php include('tambah_sperpart.php'); ?>
        <br>
        <!--combo box menu-->
        <form method="post" action="sperpart.php">
            Pilih Daftar SPERPART yang ingin Dilihat : <select class="header" name="nama_sperpart">
                <option>---pilih daftar sperpart---</option>
                <?php
                $query = $db->query("SELECT DISTINCT (jenis) FROM sperpart");
                while ($data = $query->fetch_assoc()) {
                    ?>
                    <option value="<?= $data['jenis']; ?>"><?= $data['jenis']; ?></option>";
                    <?php
                }
                ?>
            </select>
            <input class="header" type="submit" name="tampil" value="Tampilkan">
            <a href="sperpart.php"><input class="header" type="submit" name="kembali" value="Back Menu Utama"></a>
        </form>
    </div>
    <?php
    //tampilkan daftar menu yang dipilih
    if (isset($_POST['tampil'])) {
        $pilihanmenu = $_POST['nama_sperpart'];
        $query = "SELECT * FROM sperpart WHERE jenis LIKE '%$pilihanmenu%' ORDER BY nama_sperpart ASC";
        $data = $db->query($query);

        if ($data->num_rows > 0) {
            $no = 1;
            while ($hasil = $data->fetch_assoc()) {
                $uang = $hasil['harga_sperpart'];
                $jlh_desimal = '2';
                $pemisah_ribuan = ',';
                $pemisah_desimal = '.';
                ?>
                <div class="daftar-menu1">
                    <img src="../gambar_sepeda/<?= $hasil['gambar']; ?>" width="100%" height="120px"><p>
                      <table border="0">
                        <?php
                        echo  '<tr><td>Nama</td>          <td>:</td> <td>' . $hasil['nama_sperpart'] . '</td></tr>' .
                              '<tr><td>Harga</td>         <td>:</td> <td>Rp.' . number_format($uang, $jlh_desimal, $pemisah_desimal, $pemisah_ribuan) . '</td></tr>' .
                              '<tr><td>Jumlah barang</td> <td>:</td> <td>' . $hasil['jumlah_barang'] . '</td></tr>' .
                              '<tr><td>Keterangan</td>    <td>:</td> <td>' . $hasil['keterangan'] . '</td></tr>';
                        ?>
                      </table>
                      <table border="0">
                        <tr>
                          <td><a href="#edit<?= $no; ?>"> <input id="tombol" type="submit" name="edit" value="Edit"></a></td>
                          <?php include('edit_sperpart.php');?>
                          <td><a href="hapus_sperpart.php?id_sperpart=<?= $hasil['id_sperpart']; ?>"><input id="tombol" type="submit" name="hapus" value="Hapus"></a></td>
                        </tr>
                      </table>
                </div>
                <?php
                $no++;
            }//end while
        } else {
            echo "Barang Kosong";
        }
    } else {

        //daftar menu utama
        $query = $db->query("SELECT * FROM sperpart");
        $no = 1;
        while ($hasil = $query->fetch_assoc()) {
            $uang = $hasil['harga_sperpart'];
            $jlh_desimal = '2';
            $pemisah_desimal = '.';
            $pemisah_ribuan = ',';
            ?>
              <div class="daftar-menu1">
                  <img src="../gambar_sepeda/<?= $hasil['gambar']; ?>" width="100%" height="120px"><p>
                    <table border="0">
                      <?php
                      echo  '<tr><td>Nama</td>          <td>:</td> <td>' . $hasil['nama_sperpart'] . '</td></tr>' .
                            '<tr><td>Harga</td>         <td>:</td> <td>Rp.' . number_format($uang, $jlh_desimal, $pemisah_desimal, $pemisah_ribuan) . '</td></tr>' .
                            '<tr><td>Jumlah barang</td> <td>:</td> <td>' . $hasil['jumlah_barang'] . '</td></tr>' .
                            '<tr><td>Keterangan</td>    <td>:</td> <td>' . $hasil['keterangan'] . '</td></tr>';
                      ?>
                    </table>
                    <table border="0">
                      <tr>
                        <td><a href="#edit<?= $no; ?>"> <input id="tombol" type="submit" name="edit" value="Edit"></a></td>
                        <?php include('edit_sperpart.php');?>
                        <td><a href="hapus_sperpart.php?id_sperpart=<?= $hasil['id_sperpart']; ?>"><input id="tombol" type="submit" name="hapus" value="Hapus"></a></td>
                      </tr>
                    </table>
              </div>
            <?php
            $no++;
        }//end while
    }//end if
}//end session
?>
