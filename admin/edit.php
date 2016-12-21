<div class="modal" id="edit<?= $no; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-header">
            <h2>Edit Data</h2>
            <a href="#" class="btn-close" aria-hidden="true">x</a>
        </div>
        <div class="modal-body">
            <form method="post" action=" " enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $hasil['kode_sepeda']; ?>">
                Nama : <input type="text" name="nama_sepeda" value="<?= $hasil['nama_sepeda']; ?>">
                <br>
                <br>
                Ukuran :  <select name="size_sepeda">
                    <option value="<?= $hasil['size_sepeda']; ?>"><?= $hasil['size_sepeda']; ?></option>
                    <option value="12">12</option>
                    <option value="16">16</option>
                    <option value="18">18</option>
                    <option value="20">20</option>
                    <option value="24">24</option>
                    <option value="26">26</option>
                </select>
                <br>
                <br>
                Harga : <input type="text" name="harga_sepeda" value="<?= $hasil['harga_sepeda']; ?>">
                <br>
                <br>
                Jumlah : <input type="text" name="jumlah_barang" value="<?= $hasil['jumlah_barang']; ?>">
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
    if (isset($_POST['simpan'])) {
        $data = array(
            'gambar' => $_FILES['gambar']['name'],
            'nama_sepeda' => $_POST['nama_sepeda'],
            'size_sepeda' => $_POST['size_sepeda'],
            'harga_sepeda' => $_POST['harga_sepeda'],
            'jumlah_barang' => $_POST['jumlah_barang'],
        );
        $kode_sepeda = $_POST['id'];

        $sepeda = new sepeda();

        if ($sepeda->edit($data, $kode_sepeda)) {
            header('location: sepeda.php');
        } else {
            echo "<script>alert('data tidak teredit');</script>";
        }
    }//end if submit
    ?>
