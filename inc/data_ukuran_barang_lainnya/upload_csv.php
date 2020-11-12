<?php
include "../../config/koneksi.php";

if (isset($_POST['upload'])) {
    $file = fopen($_FILES['upload_barang']['tmp_name'], 'r');
    $no = 0;
    while (!feof($file)) {
        $isi_baris = fgetcsv($file);
        // var_dump($isi_baris);
        // exit;
        if ($no > 0) {
            if (!empty($isi_baris)) {
                // cari merk_id
                $merek = $con->query("SELECT merk_id FROM `tb_merk` WHERE merk_nama = '$isi_baris[1]'")->fetch();
                if ($merek['merk_id'] != NULL) {
                    $merk_id = $merek['merk_id'];
                } else {
                    $ups = $con->insert('tb_merk', ['merk_nama' => $isi_baris[1]]);
                    $ambilsaja = $con->query("SELECT merk_id FROM `tb_merk` ORDER BY merk_id DESC LIMIT 1")->fetch();
                    $merk_id = $ambilsaja['merk_id'];
                }

                // cari gender id
                // pecah data gender
                $pecah = explode(',', $isi_baris[0]);
                // kemudian ubah jadi array
                $gen = implode("','", $pecah);
                // cari di tabel gender dengan nama yang jadi array 
                $e = $con->query("SELECT gender_id FROM `tb_gender` WHERE gender_nama IN('$gen')")->fetchAll();
                $d = [];
                foreach ($e as $no => $a) {
                    $d[] =  $a['gender_id'];
                }
                $gender_id = implode(",", $d);

                $kategori = $con->query("SELECT `kategori_id` FROM `tb_kategori` WHERE kategori_nama = '$isi_baris[2]'")->fetch();
                if ($kategori['kategori_id'] != NULL) {
                    $kategori_id = $kategori['kategori_id'];
                } else {
                    $up = $con->insert('tb_kategori', ['kategori_nama' => $isi_baris[2]]);
                    $ambilLagi1 = $con->query("SELECT kategori_id FROM tb_kategori ORDER BY kategori_id DESC LIMIT 1")->fetch();
                    $kategori_id = $ambilLagi1['kategori_id'];
                }


                //cari divisi 
                $divisi = $con->query("SELECT divisi_id FROM `tb_divisi` WHERE divisi_nama = '$isi_baris[3]' AND kategori_id = '$kategori_id'")->fetch();
                if ($divisi != NULL) {
                    $divisi_id = $divisi['divisi_id'];
                } else {
                    $up = $con->insert(
                        'tb_divisi',
                        [
                            'kategori_id' => $kategori_id,
                            'divisi_nama' => $isi_baris[3]
                        ]
                    );
                    $ambilLagi2 = $con->query("SELECT divisi_id FROM tb_divisi ORDER BY divisi_id DESC LIMIT 1")->fetch();
                    $divisi_id = $ambilLagi2['divisi_id'];
                }


                // cari subdivisi 
                $subdivisi = $con->query("SELECT subdivisi_id FROM `tb_subdivisi` WHERE subdivisi_nama = '$isi_baris[4]' AND divisi_id = '$divisi_id'")->fetch();
                if ($subdivisi != NULL) {
                    $subdivisi_id = $subdivisi['subdivisi_id'];
                } else {
                    $up = $con->insert(
                        'tb_subdivisi',
                        [
                            'divisi_id' => $divisi_id,
                            'subdivisi_nama' => $isi_baris[4]
                        ]
                    );

                    $ambilLagi = $con->query("SELECT subdivisi_id FROM tb_subdivisi ORDER BY subdivisi_id DESC LIMIT 1")->fetch();
                    $subdivisi_id = $ambilLagi['subdivisi_id'];
                }

                $simpan = $con->insert(
                    "tb_ukuran",
                    array(
                        "ukuran_kategori" => 'Barang Lainnya',
                        "gender_id" => $gender_id,
                        "merk_id" => $merk_id,
                        "kategori_id" => $kategori_id,
                        "divisi_id" => $divisi_id,
                        "subdivisi_id" => $subdivisi_id,
                        "barang_lainnya_nama_ukuran" => $isi_baris[5],
                    )
                );
            }
        }
        $no++;
    }
    fclose($file);
    header('location:../../data_ukuran_barang_lainnya.html');
}
