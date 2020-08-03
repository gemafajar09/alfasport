<?php
include "../../config/koneksi.php";
if(isset($_POST['upload']))
{
    $file = fopen($_FILES['upload_barang']['tmp_name'],'r');
    $no = 0;
    while(! feof($file))
    {
        $isi_baris = fgetcsv($file);
        // var_dump($isi_baris); exit;
        if($no > 0){
            $merek = $con->query("SELECT merk_id FROM `tb_merk` WHERE merk_nama='$isi_baris[3]'")->fetch();
            if($merek != NULL)
            {
                $mer = $merek['merk_id'];
            }else{
                $ups = $con->insert('tb_merk',['merk_nama'=> $isi_baris[3]]);
                $mer = $con->query("SELECT merk_id FROM `tb_merk` ORDER BY merk_id DESC LIMIT 1")->fetch();
            }
            // 
            $gender = $con->query("SELECT gender_id FROM `tb_gender` WHERE gender_nama='$isi_baris[6]'")->fetch();
            // 
            $kategori = $con->query("SELECT `kategori_id` FROM `tb_kategori` WHERE kategori_nama= '$isi_baris[7]'")->fetch();
            if($kategori != NULL)
            {
                $kate = $kategori['kategori_id'];
            }else{
                $up = $con->insert('tb_kategori',['kategori_nama' => $isi_baris[7]]);
                $ambilLagi1 = $con->query("SELECT kategori_id FROM tb_kategori ORDER BY kategori_id DESC LIMIT 1")->fetch();
                $kate = $ambilLagi1['kategori_id'];
            }
            // 
            $divisi = $con->query("SELECT divisi_id FROM `tb_divisi` WHERE divisi_nama = '$isi_baris[8]'")->fetch();
            if($divisi != NULL)
            {
                $div = $divisi['divisi_id'];
            }else{
                $up = $con->insert('tb_divisi',['divisi_nama' => $isi_baris[7]]);
                $ambilLagi2 = $con->query("SELECT divisi_id FROM tb_divisi ORDER BY divisi_id DESC LIMIT 1")->fetch();
                $div = $ambilLagi2['divisi_id'];
            }
            // 
            $subdivisi = $con->query("SELECT subdivisi_id FROM `tb_subdivisi` WHERE subdivisi_nama = '$isi_baris[9]'")->fetch();
            if($subdivisi != NULL)
            {
                $sub = $subdivisi['subdivisi_id'];
            }else{
                $up = $con->insert('tb_subdivisi',['divisi_id' => $divisi['divisi_id'], 'subdivisi_nama' => $isi_baris[9]]);
                $ambilLagi = $con->query("SELECT subdivisi_id FROM tb_subdivisi ORDER BY subdivisi_id DESC LIMIT 1")->fetch();
                $sub = $ambilLagi['subdivisi_id'];
            }
            // 
            $data = array(
                'id' => $isi_baris[0],
                'artikel' => $isi_baris[1],
                'nama' => $isi_baris[2],
                'id_merek' => $mer,
                'modal' => $isi_baris[4],
                'jual' => $isi_baris[5],
                'id_gender' => $gender['gender_id'],
                'id_kategori' => $kate,
                'id_divisi' => $div,
                'id_sub_divisi' => $sub,
                'tanggal' => date('Y-m-d')
            );
            // var_dump($data); exit;
            $simpan = $con->insert('tb_gudang',$data);
        }
        $no++;
    }
    fclose($file);
    header('location:../../stok_barang_gudang.html');
}

