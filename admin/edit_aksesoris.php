<div class="modal" id="edit<?= $no; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-header">
            <h2>Edit Data</h2>
            <a href="#" class="btn-close" aria-hidden="true">x</a>
        </div>
        <div class="modal-body">
            <form method="post" action=" " enctype="multipart/form-data">
                <input type="hidden" name="id_aksesoris" value="<?= $hasil['id_aksesoris']; ?>">
                    Jenis : <input type="text" name="jenis" value="<?= $hasil['jenis']; ?>">
                    <br>
                    <br>
                    Nama : <input type="text" name="nama_aksesoris" value="<?= $hasil['nama_aksesoris']; ?>">
                    <br>
                    <br>
                    Harga : <input type="text" name="harga_aksesoris" value="<?= $hasil['harga_aksesoris']; ?>">
                    <br>
                    <br>
                    Jumlah : <input type="text" name="jumlah_barang" value="<?= $hasil['jumlah_barang']; ?>">
                    <br>
                    <br>
                    Keterangan : <input name="Keterangan" value="<?= $hasil['keterangan']; ?>">
                    <br>
                    <br>
                    <input type="file" name="gambar"> <?= $hasil['gambar']; ?>
                </div>
                <div class="modal-footer">
                    <input class="btn" type="submit" name="simpan" value="Edit">
                    </form>
                </div>
        </div>
    </div>
    <?php
    $aksesoris = new aksesoris();

    if (isset($_POST['simpan'])) {
        $data = array(
            'gambar' => $_FILES['gambar']['name'],
            'jenis' => $_POST['jenis'],
            'keterangan' => $_POST['Keterangan'],
            'nama_aksesoris' => $_POST['nama_aksesoris'],
            'harga_aksesoris' => $_POST['harga_aksesoris'],
            'jumlah_barang' => $_POST['jumlah_barang'],
        );
        $id_aksesoris = $_POST['id_aksesoris'];

        if ($aksesoris->edit($data, $id_aksesoris)) {
            header('location: aksesoris.php');
        } else {
            echo "<script>alert('data tidak teredit');</script>";
        }
    }//end if submit
    ?>
