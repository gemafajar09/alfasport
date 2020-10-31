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
            if (!empty($isi_baris[2])) {
                $merek = $con->query("SELECT merk_id FROM `tb_merk` WHERE merk_nama='$isi_baris[2]'")->fetch();
                if ($merek['merk_id'] != NULL) {
                    $mer = $merek['merk_id'];
                } else {
                    $ups = $con->insert('tb_merk', ['merk_nama' => $isi_baris[2]]);
                    $ambilsaja = $con->query("SELECT merk_id FROM `tb_merk` ORDER BY merk_id DESC LIMIT 1")->fetch();
                    $mer = $ambilsaja['merk_id'];
                }
                // 
                $gender = $con->query("SELECT gender_id FROM `tb_gender` WHERE gender_nama='$isi_baris[6]'")->fetch();
                // 
                $kategori = $con->query("SELECT `kategori_id` FROM `tb_kategori` WHERE kategori_nama= '$isi_baris[3]'")->fetch();
                if ($kategori['kategori_id'] != NULL) {
                    $kate = $kategori['kategori_id'];
                } else {
                    $up = $con->insert('tb_kategori', ['kategori_nama' => $isi_baris[3]]);
                    $ambilLagi1 = $con->query("SELECT kategori_id FROM tb_kategori ORDER BY kategori_id DESC LIMIT 1")->fetch();
                    $kate = $ambilLagi1['kategori_id'];
                }
                // 
                $divisi = $con->query("SELECT divisi_id FROM `tb_divisi` WHERE divisi_nama = '$isi_baris[4]'")->fetch();
                if ($divisi != NULL) {
                    $div = $divisi['divisi_id'];
                } else {
                    $up = $con->insert('tb_divisi', ['divisi_nama' => $isi_baris[4]]);
                    $ambilLagi2 = $con->query("SELECT divisi_id FROM tb_divisi ORDER BY divisi_id DESC LIMIT 1")->fetch();
                    $div = $ambilLagi2['divisi_id'];
                }
                // 
                $subdivisi = $con->query("SELECT subdivisi_id FROM `tb_subdivisi` WHERE subdivisi_nama = '$isi_baris[5]'")->fetch();
                if ($subdivisi != NULL) {
                    $sub = $subdivisi['subdivisi_id'];
                } else {
                    $up = $con->insert('tb_subdivisi', ['divisi_id' => $divisi['divisi_id'], 'subdivisi_nama' => $isi_baris[5]]);
                    $ambilLagi = $con->query("SELECT subdivisi_id FROM tb_subdivisi ORDER BY subdivisi_id DESC LIMIT 1")->fetch();
                    $sub = $ambilLagi['subdivisi_id'];
                }
                // 
                $karakter = '1234567890';
                $shuffle  = substr(str_shuffle($karakter), 0, 14);
                // $data = array(
                //     'id' => $shuffle,
                //     'artikel' => $isi_baris[0],
                //     'nama' => $isi_baris[1],
                //     'id_merek' => $mer,
                //     'modal' => $isi_baris[7],
                //     'jual' => $isi_baris[8],
                //     'id_gender' => $gender['gender_id'],
                //     'id_kategori' => $kate,
                //     'id_divisi' => $div,
                //     'id_sub_divisi' => $sub,
                //     'tanggal' => date('Y-m-d'),
                //     'thubmnail' => $isi_baris[9],
                //     'foto1' => $isi_baris[10],
                //     'foto2' => $isi_baris[11],
                //     'foto3' => $isi_baris[12],
                //     'foto4' => $isi_baris[13],
                //     'foto5' => $isi_baris[14],
                //     'berat' => $isi_baris[15]
                // );
                $tanggal = date('Y-m-d');
                $query = "INSERT INTO tb_gudang_kaos_kaki VALUES ('','$shuffle','$isi_baris[0]','$isi_baris[1]','$mer','$isi_baris[7]','$isi_baris[8]','$gender[gender_id]','$kate','$div','$sub', '$tanggal','$isi_baris[9]','$isi_baris[10]','$isi_baris[11]','$isi_baris[12]','$isi_baris[13]','$isi_baris[14]','$isi_baris[15]' )";
                $simpan = $con->query($query);
                $idBaru = $con->id();
                // $con->query("INSERT `tb_cek_stok_menipis` VALUES ('','$idBaru','$shuffle','0')");
                // var_dump($data); exit;
                // $simpan = $con->insert('tb_gudang',$data);
            }
        }
        $no++;
    }
    fclose($file);
    header('location:../../stok_barang_gudang_kaos_kaki.html');
}
