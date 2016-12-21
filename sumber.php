<?php

include_once('connect.php');

class aksesoris {

    function hapus($id_aksesoris) {
        global $db;

        $query = "DELETE FROM aksesoris WHERE id_aksesoris = $id_aksesoris";
        $hapus = $db->query($query);

        return($hapus);
    }

    function edit($data, $id_aksesoris) {
        global $db;
        $i = 0;
        foreach ($data as $key => $value) {
            if (!is_int($value)) {
                $nilaidata[$i] = $key . "= '" . $value . "'";
            } else {
                $nilaidata[$i] = $key . "= " . $value;
            }
            $i++;
        }
        $hasildata = implode(",", $nilaidata);

        $namagambar = $_FILES['gambar']['name'];
        $tempatgambar = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tempatgambar, "../gambar_sepeda/" . $namagambar);

        $query = "UPDATE aksesoris SET $hasildata WHERE id_aksesoris = $id_aksesoris";
        $edit = $db->query($query);

        return($edit);
    }

    function tambah($data) {
        global $db;
        $kunci = implode(", ", array_keys($data));
        $i = 0;
        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $nilaidata[$i] = $value;
            } else {
                $nilaidata[$i] = "'" . $value . "'";
            }
            $i++;
        }
        $nilai = implode(",", $nilaidata);
        $tempatgambar = $_FILES['gambar']['tmp_name'];
        $namagambar = $_FILES['gambar']['name'];
        move_uploaded_file($tempatgambar, "../gambar_sepeda/" . $namagambar);

        $query = "INSERT INTO aksesoris ($kunci) VALUES ($nilai)";
        $tambah = $db->query($query);

        return($tambah);
    }

}

class sperpart {

    function hapus($id_sperpart) {
        global $db;

        $query = "DELETE FROM sperpart WHERE id_sperpart = $id_sperpart";
        $hapus = $db->query($query);

        return($hapus);
    }

    function edit($data, $id_sperpart) {
        global $db;
        $i = 0;
        foreach ($data as $key => $value) {
            if (!is_int($value)) {
                $nilaidata[$i] = $key . "= '" . $value . "'";
            } else {
                $nilaidata[$i] = $key . "= " . $value;
            }
            $i++;
        }
        $hasildata = implode(",", $nilaidata);

        $namagambar = $_FILES['gambar']['name'];
        $tempatgambar = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tempatgambar, "../gambar_sepeda/" . $namagambar);

        $query = "UPDATE sperpart SET $hasildata WHERE id_sperpart = $id_sperpart";
        $edit = $db->query($query);

        return($edit);
    }

    function tambah($data) {
        global $db;
        $kunci = implode(", ", array_keys($data));
        $i = 0;
        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $nilaidata[$i] = $value;
            } else {
                $nilaidata[$i] = "'" . $value . "'";
            }
            $i++;
        }
        $nilai = implode(",", $nilaidata);
        $tempatgambar = $_FILES['gambar']['tmp_name'];
        $namagambar = $_FILES['gambar']['name'];
        move_uploaded_file($tempatgambar, "../gambar_sepeda/" . $namagambar);

        $query = "INSERT INTO sperpart ($kunci) VALUES ($nilai)";
        $tambah = $db->query($query);

        return($tambah);
    }

}

class sepeda {

    function tampil_per_kode($kode_sepeda) {
        global $db;
        $query = "SELECT * FROM sepeda WHERE kode_sepeda = $kode_sepeda";
        $data = $db->query($query);
        return($data);
    }

    function hapus($kode_sepeda) {
        global $db;

        $query = "DELETE FROM sepeda WHERE kode_sepeda = $kode_sepeda";
        $hapus = $db->query($query);

        return($hapus);
    }

    function edit($data, $kode_sepeda) {
        global $db;
        $i = 0;
        foreach ($data as $key => $value) {
            if (!is_int($value)) {
                $nilaidata[$i] = $key . "= '" . $value . "'";
            } else {
                $nilaidata[$i] = $key . "= " . $value;
            }
            $i++;
        }
        $hasildata = implode(",", $nilaidata);

        $namagambar = $_FILES['gambar']['name'];
        $tempatgambar = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tempatgambar, "../gambar_sepeda/" . $namagambar);

        $query = "UPDATE sepeda SET $hasildata WHERE kode_sepeda = $kode_sepeda";
        $edit = $db->query($query);

        return($edit);
    }

    function tambah($data) {
        global $db;
        $kunci = implode(", ", array_keys($data));
        $i = 0;
        foreach ($data as $key => $value) {
            if (is_int($value)) {
                $nilaidata[$i] = $value;
            } else {
                $nilaidata[$i] = "'" . $value . "'";
            }
            $i++;
        }
        $nilai = implode(",", $nilaidata);
        $tempatgambar = $_FILES['gambar']['tmp_name'];
        $namagambar = $_FILES['gambar']['name'];
        move_uploaded_file($tempatgambar, "../gambar_sepeda/" . $namagambar);
        $query = "INSERT INTO sepeda ($kunci) VALUES ($nilai)";
        $tambah = $db->query($query);

        return($tambah);
    }

}

?>
