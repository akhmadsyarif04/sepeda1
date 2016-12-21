<?php

include_once('../connect.php');
include_once('../sumber.php');

$sperpart = new sperpart();

if (isset($_GET['id_sperpart'])) {
    if ($sperpart->hapus($_GET['id_sperpart'])) {
        header('location: sperpart.php');
    } else {
        echo '<script>alert("tidak berhasil dihapus");</script>';
    }
} else {
    echo "kode sperpart tidak ada";
}
?>
