<?php

include_once('../connect.php');
include_once('../sumber.php');

$sepeda = new sepeda();

if (isset($_GET['kode_sepeda'])) {
    if ($sepeda->hapus($_GET['kode_sepeda'])) {
        header('location: sepeda.php');
    } else {
        echo '<script>alert("tidak berhasil dihapus");</script>';
    }
} else {
    echo "kode sepeda tidak ada";
}
?>
