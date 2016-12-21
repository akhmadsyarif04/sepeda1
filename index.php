<?php
include_once('connect.php');
include_once('sumber.php');
?>
<link type="text/css" rel="stylesheet" href="modif.css">

<?php
include('header_judul.html');
?>

<div id="header">
    <a href="index.php"><input class="header" type="button" value="Sepeda"></a>
    <a href="sperpart.php"><input class="header" type="button" value="Sperpart"></a>
    <a href="aksesoris.php"><input class="header" type="button" value="Aksesoris"></a>
    <a href="info_pembelian.php"><input class="header" type="button" value="Cara Pembelian"></a>
    <p>
    <form method="post" action=" ">
        Pilih Daftar SEPEDA yang ingin Dilihat :
        <select class="header" name="nama_sepeda">
            <option>---pilih daftar sepeda---</option>
            <?php
            $query = $db->query("SELECT DISTINCT (merek) FROM sepeda");
            while ($data = $query->fetch_assoc()) {
                ?>
                <option value="<?= $data['merek']; ?>"><?= $data['merek']; ?></option>
                <?php
            }
            ?>
        </select>
        <input class="header" type="submit" name="tampil" value="Tampilkan">
        <a href="index.php"><input class="header" type="submit" name="kembali" value="Back Menu Utama"></a>
    </form>
</div>
<?php
if (isset($_POST['tampil'])) {

    $pilihanmenu = $_POST['nama_sepeda'];

    $perpage = 12;
    $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
    $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

    $isi = "SELECT * FROM sepeda WHERE merek LIKE '%$pilihanmenu%' ORDER BY nama_sepeda ASC LIMIT $start, $perpage";
    $result2 = $db->query($isi);

    $result = $db->query("SELECT *FROM sepeda");
    $total = $result->num_rows;

    $pages = ceil($total / $perpage);

    if ($total > 0) {
        ?>
        <h1>[ DAFTAR SEPEDA <?= $_POST['nama_sepeda'] ?> ]</h1>
        <?php
        $no = 1;
        while ($hasil = $result2->fetch_assoc()) {
            $uang = $hasil['harga_sepeda'];
            $jlh_desimal = '2';
            $pemisah_desimal = '.';
            $pemisah_ribuan = ',';
            ?>

            <div class="daftar-menu">
                <a href="#gambar<?= $no; ?>"><img src="gambar_sepeda/<?= $hasil['gambar']; ?>" width="100%px" height="120px"></a>
                <?php include('view_gambar_sepeda.php'); ?>
                <p>
                    <?php echo $hasil['nama_sepeda']; ?>
                    <br>
                    <a href="#view<?= $no; ?>"><input class="header" type="button" name="view" value="View"></a>
                    <?php include("view.php"); ?>
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

        echo "* Barang Kosong atau Tidak Ada *";
    }//end if
} else {
    ?>
    <div id="list">
    <?php
    $perpage = 12;
    $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
    $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

    $isi = "SELECT * FROM sepeda LIMIT $start, $perpage";
    $result2 = $db->query($isi);

    $result = $db->query("SELECT *FROM sepeda");
    $total = $result->num_rows;

    $pages = ceil($total / $perpage);
    $no = 1;
    while ($hasil = $result2->fetch_assoc()) {
        $uang = $hasil['harga_sepeda'];
        $jlh_desimal = '2';
        $pemisah_desimal = '.';
        $pemisah_ribuan = ',';
        ?>
            <div class="daftar-menu">
                <a href="#gambar<?= $no; ?>"><img src="gambar_sepeda/<?= $hasil['gambar']; ?>" width="100%px" height="120px"></a>
            <?php include('view_gambar_sepeda.php'); ?>
                <p>
                <?php echo $hasil['nama_sepeda']; ?>
                    <br>
                    <a href="#view<?= $no; ?>"><input class="header" type="button" name="view" value="View"></a>
                    <?php include("view.php"); ?>
            </div>
                    <?php
                    $no++;
                }//end while
                ?>
    </div>
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
