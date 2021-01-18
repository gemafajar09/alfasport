<?php
include "../../../config/koneksi.php";

if (isset($_POST['csv_sepatu'])) {
    $file = fopen($_FILES['upload_sepatu']['tmp_name'], 'r');
    $no = 0;
    while (!feof($file)) {
        $isi_baris = fgetcsv($file);
        // var_dump($isi_baris);
        // exit;
        if ($no > 0) {
            if (!empty($isi_baris[2])) {
                // cari id merk
                $merek = $con->query("SELECT merk_id FROM `tb_merk` WHERE merk_nama='$isi_baris[6]'")->fetch();
                if ($merek['merk_id'] != NULL) {
                    $mer = $merek['merk_id'];
                } else {
                    $ups = $con->insert('tb_merk', ['merk_nama' => $isi_baris[6]]);
                    $ambilsaja = $con->query("SELECT merk_id FROM `tb_merk` ORDER BY merk_id DESC LIMIT 1")->fetch();
                    $mer = $ambilsaja['merk_id'];
                }


                // cari id gender
                $gender = $con->query("SELECT gender_id FROM `tb_gender` WHERE gender_nama='$isi_baris[5]'")->fetch();

                // cari kategori
                $kategori = $con->query("SELECT `kategori_id` FROM `tb_kategori` WHERE kategori_nama= '$isi_baris[7]'")->fetch();
                if ($kategori['kategori_id'] != NULL) {
                    $kate = $kategori['kategori_id'];
                } else {
                    $up = $con->insert('tb_kategori', ['kategori_nama' => $isi_baris[7]]);
                    $ambilLagi1 = $con->query("SELECT kategori_id FROM tb_kategori ORDER BY kategori_id DESC LIMIT 1")->fetch();
                    $kate = $ambilLagi1['kategori_id'];
                }
                // cari divisi
                $divisi = $con->query("SELECT divisi_id FROM `tb_divisi` WHERE divisi_nama = '$isi_baris[8]'")->fetch();
                if ($divisi != NULL) {
                    $div = $divisi['divisi_id'];
                } else {
                    $up = $con->insert(
                        "tb_divisi",
                        array(
                            "kategori_id" => $kate,
                            "divisi_nama" => $isi_baris[8],
                        )
                    );
                    $ambilLagi2 = $con->query("SELECT divisi_id FROM tb_divisi ORDER BY divisi_id DESC LIMIT 1")->fetch();
                    $div = $ambilLagi2['divisi_id'];
                }
                // cari subdivisi
                $subdivisi = $con->query("SELECT subdivisi_id FROM `tb_subdivisi` WHERE subdivisi_nama = '$isi_baris[9]'")->fetch();

                if ($subdivisi != NULL) {
                    $sub = $subdivisi['subdivisi_id'];
                } else {
                    $up = $con->insert(
                        'tb_subdivisi',
                        array(
                            'divisi_id' => $div,
                            'subdivisi_nama' => $isi_baris[9]
                        )
                    );
                    $ambilLagi = $con->query("SELECT subdivisi_id FROM tb_subdivisi ORDER BY subdivisi_id DESC LIMIT 1")->fetch();
                    $sub = $ambilLagi['subdivisi_id'];
                }
                // 
                $karakter = '1234567890';
                $shuffle  = substr(str_shuffle($karakter), 0, 14);
                $tanggal = date('Y-m-d');

                $simpan = $con->insert(
                    'tb_barang',
                    array(
                        'barang_kode' => $shuffle,
                        'barang_kategori' => 'Sepatu',
                        'barang_artikel' => $isi_baris[0],
                        'barang_nama' => $isi_baris[1],
                        'barang_modal' => $isi_baris[2],
                        'barang_jual' => $isi_baris[3],
                        'barang_berat' => $isi_baris[4],
                        'barang_tgl' => $isi_baris[16],
                        'gender_id' => $gender['gender_id'],
                        'merk_id' => $mer,
                        'kategori_id' => $kate,
                        'divisi_id' => $div,
                        'subdivisi_id' => $sub,
                        'barang_thumbnail' => $isi_baris[10],
                        'barang_foto1' => $isi_baris[11],
                        'barang_foto2' => $isi_baris[12],
                        'barang_foto3' => $isi_baris[13],
                        'barang_foto4' => $isi_baris[14],
                        'barang_foto5' => $isi_baris[15],
                    )
                );
                $idBaru = $con->id();
                // $con->query("INSERT `tb_cek_stok_menipis` VALUES ('','$idBaru','$shuffle','0')");
                // var_dump($data); exit;
                // $simpan = $con->insert('tb_gudang',$data);
            }
        }
        $no++;
    }
    fclose($file);
    header('location:../../../barang_gudang.html');
}
