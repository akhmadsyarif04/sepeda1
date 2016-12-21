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
        <a href="#tambah"><input class="header" type="submit" name="tambah" value="Tambah Data Sepeda"></a>
        <?php include('tambah.php'); ?>
        <br>
        <!--combo box menu-->
        <form method="post" action="sepeda.php">
            Pilih Daftar Sepeda yang ingin Dilihat : <select class="header" name="nama_sepeda">
                <option>---pilih daftar sepeda---</option>
                <?php
                $query = $db->query('SELECT DISTINCT (merek) FROM sepeda');
                while ($data = $query->fetch_assoc()) {
                    ?>
                    <option value="<?= $data['merek']; ?>"><?= $data['merek']; ?></option>
                    <?php
                }
                ?>
            </select>
            <input class="header" type="submit" name="tampil" value="Tampilkan">
            <a href="sepeda.php"><input class="header" type="submit" name="kembali" value="Back Menu Utama"></a>
        </form>
    </div>
    <?php
    //tampilkan daftar menu yang dipilih
    if (isset($_POST['tampil'])) {
        $pilihanmenu = $_POST['nama_sepeda'];
        $query = "SELECT * FROM sepeda WHERE merek LIKE '%$pilihanmenu%' ORDER BY nama_sepeda ASC";
        $data = $db->query($query);

        if ($data->num_rows > 0) {
            $no = 1;
            while ($hasil = $data->fetch_assoc()) {
                $uang = $hasil['harga_sepeda'];
                $jlh_desimal = '2';
                $pemisah_ribuan = ',';
                $pemisah_desimal = '.';
                ?>
                <div class="daftar-menu1">
                    <img src="../gambar_sepeda/<?= $hasil['gambar']; ?>" width="100%" height="120px"><p>
                      <table border="0">
                        <?php
                        echo  '<tr><td>Nama</td>    <td>:</td> <td>'. $hasil['nama_sepeda'] . '</td></tr>'.
                              '<tr><td>Ukuran</td>  <td>:</td> <td>'. $hasil['size_sepeda'] . '</td></tr>' .
                              '<tr><td>Harga</td>   <td>:</td> <td>Rp.' . number_format($uang, $jlh_desimal, $pemisah_desimal, $pemisah_ribuan) . '</td></tr>';
                        ?>
                      </table>
                      <table border="0">
                        <tr>
                          <td><a href="#edit<?= $no; ?>"> <input id="tombol" type="submit" name="edit" value="Edit"></a></td>
                          <?php include('edit.php'); ?>
                          <td><a href="hapus.php?kode_sepeda=<?= $hasil['kode_sepeda']; ?>"><input id="tombol" type="submit" name="hapus" value="Hapus"></a></td>
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
        $query = $db->query("SELECT * FROM sepeda");
        $no = 1;
        while ($hasil = $query->fetch_assoc()) {
            $uang = $hasil['harga_sepeda'];
            $jlh_desimal = '2';
            $pemisah_desimal = '.';
            $pemisah_ribuan = ',';
            ?>
            <div class="daftar-menu1">
                <img src="../gambar_sepeda/<?= $hasil['gambar']; ?>" width="100%" height="120px">
                  <table border="0">
                    <?php
                    echo  '<tr><td>Nama</td>    <td>:</td> <td>'. $hasil['nama_sepeda'] . '</td></tr>' .
                          '<tr><td>Ukuran</td>  <td>:</td> <td>'. $hasil['size_sepeda'] . '</td></tr>'.
                          '<tr><td>Harga</td>   <td>:</td> <td>Rp.' . number_format($uang, $jlh_desimal, $pemisah_desimal, $pemisah_ribuan) . '</td</tr>';
                    ?>
                  </table>
                  <table border="0">
                    <tr>
                      <td><a href="#edit<?= $no; ?>"> <input id="tombol" type="submit" name="edit" value="Edit"></a></td>
                      <?php include('edit.php') ?>
                      <td><a href="hapus.php?kode_sepeda=<?= $hasil['kode_sepeda']; ?>"><input id="tombol" type="submit" name="hapus" value="Hapus"></a></td>
                    </tr>
                  </table>
            </div>
            <?php
            $no++;
        }//end while
    }//end if
}//end session
?>
