<?php

include_once('../connect.php');
include_once('../sumber.php');

$aksesoris = new aksesoris();

if (isset($_GET['id_aksesoris'])) {
    if ($aksesoris->hapus($_GET['id_aksesoris'])) {
        header('location: aksesoris.php');
    } else {
        echo '<script>alert("tidak berhasil dihapus");</script>';
    }
} else {
    echo "kode sepeda tidak ada";
}
?>
