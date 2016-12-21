<div class="modal" id="edit<?= $no; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-header">
            <h2>Edit Data</h2>
            <a href="#" class="btn-close" aria-hidden="true">x</a>
        </div>
        <div class="modal-body">
            <form method="post" action=" " enctype="multipart/form-data">
                <input type="hidden" name="id_sperpart" value="<?= $hasil['id_sperpart']; ?>">
                Jenis : <input type="text" name="jenis" value="<?= $hasil['jenis']; ?>">
                <br>
                <br>
                Nama : <input type="text" name="nama_sperpart" value="<?= $hasil['nama_sperpart']; ?>">
                <br>
                <br>
                Harga : <input type="text" name="harga_sperpart" value="<?= $hasil['harga_sperpart']; ?>">
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
    $sperpart = new sperpart();

    if (isset($_POST['simpan'])) {
        $data = array(
            'gambar' => $_FILES['gambar']['name'],
            'jenis' => $_POST['jenis'],
            'keterangan' => $_POST['Keterangan'],
            'nama_sperpart' => $_POST['nama_sperpart'],
            'harga_sperpart' => $_POST['harga_sperpart'],
            'jumlah_barang' => $_POST['jumlah_barang'],
        );
        $id_sperpart = $_POST['id_sperpart'];

        if ($sperpart->edit($data, $id_sperpart)) {
            header('location: sperpart.php');
        } else {
            echo "<script>alert('data tidak teredit');</script>";
        }
    }//end if submit
    ?>
