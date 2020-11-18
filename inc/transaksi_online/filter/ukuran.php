<?php

include "../../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
tb_barang_toko.barang_toko_id,
tb_ukuran.*
From
tb_barang Inner Join
tb_barang_detail On tb_barang_detail.barang_id = tb_barang.barang_id Inner Join
tb_barang_toko On tb_barang_detail.barang_detail_id = tb_barang_toko.barang_detail_id Inner Join
tb_ukuran On tb_ukuran.ukuran_id = tb_barang_toko.ukuran_id
WHERE tb_barang.barang_id = '$_POST[id]'
AND tb_barang_toko.id_toko = '$_POST[id_toko]'");


echo "<option value=''>Pilih Ukuran</option>";
foreach ($data as $i => $a) {
    if($a['ukuran_kategori'] == 'Sepatu')
    {
        echo "<option value=" . $a['barang_toko_id'] . ">EU : ". $a['sepatu_ue'] ." | UK : ". $a['sepatu_ue'] ." | US : ". $a['sepatu_us'] ." | CM : ". $a['sepatu_cm'] ."</option>";
    }
    elseif($a['ukuran_kategori'] == 'Kaos Kaki')
    {
        echo "<option value=" . $a['barang_toko_id'] . ">EU : ". $a['kaos_kaki_eu'] ." | Size : ". $a['kaos_kaki_size'] ."</option>";
    }
    elseif($a['ukuran_kategori'] == 'Barang Lainnya')
    {
        echo "<option value=" . $a['barang_toko_id'] . ">Ukuran : ". $a['barang_lainnya_nama_ukuran'] ."</option>";
        
    }

}