<div class="modal" id="tambah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-header">
            <h2>Tambahkan Data</h2>
            <a href="#" class="btn-close" aria-hidden="true">x</a>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                Nama Sepeda :<input type="text" name="nama_sepeda">
                <br>
                <br>
                Size Sepeda : <select name="size_sepeda">
                            <option value="12">12</option>
                            <option value="16">16</option>
                            <option value="18">18</option>
                            <option value="20">20</option>
                            <option value="24">24</option>
                            <option value="26">26</option>
                </select>
                <br>
                <br>
                Harga Sepeda:<input type="text" name="harga_sepeda">
                <br>
                <br>
                Jumlah Sepeda:<input type="text" name="jumlah_sepeda" style="width:50px">
                <br>
                <br>
                <input type="file" name="gambar">
                </div>
                <div class="modal-footer">
                    <input class="btn" type="submit" name="tambah" value="Tambahkan">
                    </form>
                </div>
        </div>
    </div>
    <?php
    if (isset($_POST['tambah'])) {
        $data = array(
            'nama_sepeda' => $_POST['nama_sepeda'],
            'size_sepeda' => $_POST['size_sepeda'],
            'harga_sepeda' => $_POST['harga_sepeda'],
            'jumlah_barang' => $_POST['jumlah_sepeda'],
            'gambar' => $_FILES['gambar']['name'],
        );

        $sepeda = new sepeda();

        if ($sepeda->tambah($data)) {
            echo "<script>window.alert('Data Berhasil Tersimpan')</script>";
            header('location: sepeda.php');
        } else {
            echo "<script>window.alert('Data Gagal Tersimpan')</script>";
        }
    }//end if
