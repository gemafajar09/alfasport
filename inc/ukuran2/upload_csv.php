<?php
include "../../config/koneksi.php";

if (isset($_POST['upload'])) {
    $file = fopen($_FILES['upload_barang']['tmp_name'], 'r');
    $no = 0;
    while (!feof($file)) {
        if ($no > 0) {
            $isi_baris = fgetcsv($file);
            if (!empty($isi_baris)) {
                $merek = $con->query("SELECT merk_id FROM `tb_merk` WHERE merk_nama = '$isi_baris[0]'")->fetch();
                if ($merek['merk_id'] != NULL) {
                    $mer = $merek['merk_id'];
                } else {
                    $ups = $con->insert('tb_merk', ['merk_nama' => $isi_baris[0]]);
                    $ambilsaja = $con->query("SELECT merk_id FROM `tb_merk` ORDER BY merk_id DESC LIMIT 1")->fetch();
                    $mer = $ambilsaja['merk_id'];
                }

                // pecah data gender
                $pecah = explode(',', $isi_baris[4]);
                // kemudian ubah jadi array
                $gen = implode("','", $pecah);
                // cari di tabel gender dengan nama yang jadi array 
                $e = $con->query("SELECT gender_id FROM `tb_gender` WHERE gender_nama IN('$gen')")->fetchAll();
                $d = [];
                foreach ($e as $no => $a) {
                    $d[] =  $a['gender_id'];
                }
                $gender = implode(",", $d);

                $kategori = $con->query("SELECT `kategori_id` FROM `tb_kategori` WHERE kategori_nama= '$isi_baris[1]'")->fetch();
                if ($kategori['kategori_id'] != NULL) {
                    $kate = $kategori['kategori_id'];
                } else {
                    $up = $con->insert('tb_kategori', ['kategori_nama' => $isi_baris[1]]);
                    $ambilLagi1 = $con->query("SELECT kategori_id FROM tb_kategori ORDER BY kategori_id DESC LIMIT 1")->fetch();
                    $kate = $ambilLagi1['kategori_id'];
                }
                // 
                $divisi = $con->query("SELECT divisi_id FROM `tb_divisi` WHERE divisi_nama = '$isi_baris[2]'")->fetch();
                if ($divisi != NULL) {
                    $div = $divisi['divisi_id'];
                } else {
                    $up = $con->insert('tb_divisi', ['divisi_nama' => $isi_baris[2]]);
                    $ambilLagi2 = $con->query("SELECT divisi_id FROM tb_divisi ORDER BY divisi_id DESC LIMIT 1")->fetch();
                    $div = $ambilLagi2['divisi_id'];
                }
                // 
                $subdivisi = $con->query("SELECT subdivisi_id FROM `tb_subdivisi` WHERE subdivisi_nama = '$isi_baris[3]'")->fetch();
                if ($subdivisi != NULL) {
                    $sub = $subdivisi['subdivisi_id'];
                } else {
                    $up = $con->insert('tb_subdivisi', ['divisi_id' => $divisi['divisi_id'], 'subdivisi_nama' => $isi_baris[3]]);
                    $ambilLagi = $con->query("SELECT subdivisi_id FROM tb_subdivisi ORDER BY subdivisi_id DESC LIMIT 1")->fetch();
                    $sub = $ambilLagi['subdivisi_id'];
                }

                $query = "INSERT INTO tb_all_ukuran (id_merek, id_kategori, id_divisi, id_subdivisi, id_gender, ue, uk, us, cm) VALUES ('$mer','$kate','$div','$sub','$gender','$isi_baris[5]','$isi_baris[6]','$isi_baris[7]','$isi_baris[8]')";

                $simpan = $con->query($query);
            }
        }
        $no++;
    }
    fclose($file);
    header('location:../../ukuran.html');
}
