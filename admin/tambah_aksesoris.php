<div class="modal" id="tambah" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-header">
            <h2>Tambahkan Data</h2>
            <a href="#" class="btn-close" aria-hidden="true">x</a>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                Nama Aksesoris :<input type="text" name="Nama_aksesoris">
                <br>
                <br>
                Jenis Aksesoris : <input type="text" name="Jenis_aksesoris"
                                         <br>
                <br>
                Harga Aksesoris :<input type="text" name="Harga_aksesoris">
                <br>
                <br>
                Jumlah Aksesoris :<input type="text" name="Jumlah_aksesoris" style="width:50px">
                <br>
                <br>
                Gambar : <input type="file" name="gambar">
                <br>
                <br>
                Keterangan Aksesoris : <textarea name="Keterangan"></textarea>
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
        'nama_aksesoris' => $_POST['Nama_aksesoris'],
        'jenis' => $_POST['Jenis_aksesoris'],
        'harga_aksesoris' => $_POST['Harga_aksesoris'],
        'jumlah_barang' => $_POST['Jumlah_aksesoris'],
        'gambar' => $_FILES['gambar']['name'],
        'keterangan' => $_POST['Keterangan']
    );

    $aksesoris = new aksesoris();

    if ($aksesoris->tambah($data)) {
        echo "<script>window.alert('Data Berhasil Tersimpan')</script>";
        header('location: aksesoris.php');
    } else {
        echo "<script>window.alert('Data Gagal Tersimpan')</script>";
    }
}//end if
