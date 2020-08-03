<?php
include "../../config/koneksi.php";
if(isset($_POST['upload']))
{
    $file = fopen($_FILES['upload_ukuran']['tmp_name'],'r');
    $no = 0;
    while(! feof($file))
    {
        $isi_baris = fgetcsv($file);
        // var_dump($isi_baris); exit;
        if($no > 0)
        {
            $merek = $con->query("SELECT merk_id FROM `tb_merk` WHERE merk_nama='$isi_baris[1]'")->fetch();
            if($merek != NULL)
            {
                $mer = $merek['merk_id'];
            }else{
                $ups = $con->insert('tb_merk',['merk_nama'=> $isi_baris[1]]);
                $mer = $con->query("SELECT merk_id FROM `tb_merk` ORDER BY merk_id DESC LIMIT 1")->fetch();
            }   
            $ukuran = $con->query("SELECT id_ukuran FROM tb_all_ukuran WHERE id_merek='$mer' AND ue = '$isi_baris[2]' AND uk = '$isi_baris[3]'")->fetch(); 

            $simpan = array(
                'id' => $isi_baris[0],
                'id_ukuran' => $ukuran['id_ukuran'],
                'jumlah' => $isi_baris[6],
                'barcode' => $isi_baris[7],
                'tanggal' => date('Y-m-d')
            );
            $con->insert('tb_gudang_detail',$simpan);
        }
        $no++;
    }
    fclose($file);
    header('location:../../stok_barang_gudang.html');
}

