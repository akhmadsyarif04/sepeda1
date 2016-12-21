<div class="modal" id="view<?= $no; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-header">
            <a href="#" class="btn-close" aria-hidden="true">x</a>
            <h2>View Data <?= $hasil['nama_sepeda']; ?></h2>
        </div>
        <div class="modal-body">
            <form method="post" action=" " enctype="multipart/form-data">
                <?php
                $uang = $hasil['harga_sepeda'];
                $jlh_desimal = '2';
                $pemisah_ribuan = ',';
                $pemisah_desimal = '.';
                ?>
                <table border="0">
                    <tr><td>Nama</td>   <td>:</td> <td><?= $hasil['nama_sepeda']; ?></td></tr>
                    <tr><td>Size</td>   <td>:</td> <td><?= $hasil['size_sepeda']; ?></td></tr>
                    <tr><td>Harga</td>  <td>:</td> <td>Rp.<?= number_format($uang, $jlh_desimal, $pemisah_desimal, $pemisah_ribuan); ?></td></tr>
                    <tr><td>Jumlah</td> <td>:</td> <td><?= $hasil['jumlah_barang']; ?></td></tr>
                </table>
        </div>
    </div>
</div>
