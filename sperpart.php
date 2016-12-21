<?php
include_once('connect.php');
include_once('sumber.php');
?>

<link rel="stylesheet" href="modif.css" type="text/css" />

<?php
include('header_judul.html');
?>

<div id="header">
    <a href="index.php">    <input class="header" type="button" value="Sepeda">   </a>
    <a href="sperpart.php"> <input class="header" type="button" value="Sperpart"> </a>
    <a href="aksesoris.php"><input class="header" type="button" value="Aksesoris"></a>
    <a href="info_pembelian.php"><input class="header" type="button" value="Cara Pembelian"></a>
    <p>

        <!--combo box menu-->
    <form method="post" action="sperpart.php">
        Pilih Daftar SPERPART yang ingin Dilihat : <select class="header" name="nama_sepeda">
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

    $pilihanmenu = $_POST['nama_sepeda'];

    $perpage = 12;
    $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
    $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

    $isi = "SELECT * FROM sperpart WHERE jenis LIKE '%$pilihanmenu%' ORDER BY nama_sperpart ASC LIMIT $start, $perpage";
    $result2 = $db->query($isi);

    $result = $db->query("SELECT *FROM sperpart");
    $total = $result->num_rows;

    $pages = ceil($total / $perpage);

    if ($total > 0) {
        $no = 1;
        while ($hasil = $result2->fetch_assoc()) {
            $uang = $hasil['harga_sperpart'];
            $jlh_desimal = '2';
            $pemisah_ribuan = ',';
            $pemisah_desimal = '.';
            ?>
            <div class="daftar-menu">
                <a href="#gambar<?= $no; ?>"><img src="gambar_sepeda/<?= $hasil['gambar']; ?>" width="100%" height="120px"></a>
                <?php include('view_gambar_sperpart.php'); ?>
                <p>
                    <?php echo $hasil['nama_sperpart']; ?>
                    </table>
                    <br>
                    <a href="#view<?= $no; ?>"><input class="header" type="button" name="view" value="View"></a>
                    <?php include("view2.php"); ?>
            </div>
            <?php
            $no++;
        }//end while
        ?>
        <div id="halaman">
            <h2>Halaman {
                <?php
                for ($i = 1; $i <= $pages; $i++) {
                    ?>
                    <a href="?halaman=<?= $i ?>"><?= $i ?></a>
                    <?php
                }//end for
                ?>
                }</h2>
        </div>
        <?php
    } else {
        echo "Barang Kosong";
    }
} else {

    $perpage = 12;
    $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
    $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

    $isi = "SELECT * FROM sperpart LIMIT $start, $perpage";
    $result2 = $db->query($isi);

    $result = $db->query("SELECT *FROM sperpart");
    $total = $result->num_rows;

    $pages = ceil($total / $perpage);

    //daftar menu utama
    $no = 1;
    while ($hasil = $result2->fetch_assoc()) {
        $uang = $hasil['harga_sperpart'];
        $jlh_desimal = '2';
        $pemisah_desimal = '.';
        $pemisah_ribuan = ',';
        ?>
        <div class="daftar-menu">
            <a href="#gambar<?= $no; ?>"><img src="gambar_sepeda/<?= $hasil['gambar']; ?>" width="100%" height="120px"></a>
        <?php include('view_gambar_sperpart.php'); ?>
            <p>
            <?php echo $hasil['nama_sperpart']; ?>
                <br>
                <a href="#view<?= $no; ?>"><input class="header" type="button" name="view" value="View"></a>
        <?php include("view2.php"); ?>
        </div>
                <?php
                $no++;
            }//end while
            ?>
    <div id="halaman">
        <h2>Halaman {
    <?php
    for ($i = 1; $i <= $pages; $i++) {
        ?>
                <a href="?halaman=<?= $i ?>"><?= $i ?></a>
                <?php
            }//end for
            ?>
            }</h2>
    </div>
            <?php
        }//end if
        ?>
