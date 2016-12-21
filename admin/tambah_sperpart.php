<div class="modal" id="tambah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-header">
            <h2>Tambahkan Data</h2>
            <a href="#" class="btn-close" aria-hidden="true">x</a>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                Nama Sperpart :<input type="text" name="Nama_sperpart">
                <br>
                <br>
                Jenis Sperpart : <input type="text" name="Jenis_sperpart"
                                        <br>
                <br>
                Harga Sperpart :<input type="text" name="Harga_sperpart">
                <br>
                <br>
                Jumlah Sperpart :<input type="text" name="Jumlah_sperpart" style="width:50px">
                <br>
                <br>
                Gambar : <input type="file" name="gambar">
                <br>
                <br>
                Keterangan Sperpart : <textarea name="Keterangan"></textarea>
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
        'Nama_sperpart' => $_POST['Nama_sperpart'],
        'Jenis' => $_POST['Jenis_sperpart'],
        'harga_sperpart' => $_POST['Harga_sperpart'],
        'jumlah_barang' => $_POST['Jumlah_sperpart'],
        'gambar' => $_FILES['gambar']['name'],
        'Keterangan' => $_POST['Keterangan']
    );

    $sperpart = new sperpart();

    if ($sperpart->tambah($data)) {
        echo "<script>window.alert('Data Berhasil Tersimpan')</script>";
        header('location: sperpart.php');
    } else {
        echo "<script>window.alert('Data Gagal Tersimpan')</script>";
    }
}//end if
