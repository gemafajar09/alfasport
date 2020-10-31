<?php
include "../../config/koneksi.php";
if (isset($_POST['upload'])) {
    $file = fopen($_FILES['upload_ukuran']['tmp_name'], 'r');
    $no = 0;
    while (!feof($file)) {
        $isi_baris = fgetcsv($file);
        // var_dump($isi_baris);
        // exit;
        if ($no > 0) {
            // var_dump($isi_baris);
            // exit;
            $merek = $con->query("SELECT merk_id FROM `tb_merk` WHERE merk_nama='$isi_baris[2]'")->fetch();
            if ($merek != NULL) {
                $mer = $merek['merk_id'];
            } else {
                $ups = $con->insert('tb_merk', ['merk_nama' => $isi_baris[2]]);
                $mer = $con->query("SELECT merk_id FROM `tb_merk` ORDER BY merk_id DESC LIMIT 1")->fetch();
            }
            $ukuran = $con->query("SELECT ukuran_barang_detail_id 
                                    FROM tb_ukuran_barang_detail 
                                    JOIN tb_ukuran_barang ON tb_ukuran_barang_detail.ukuran_barang_id = tb_ukuran_barang.ukuran_barang_id 
                                    WHERE tb_ukuran_barang.id_merek = '$mer' AND tb_ukuran_barang_detail.ukuran_barang_detail_nama = '$isi_baris[3]'")->fetch();
            // cari kode barang

            $kode = $con->query("SELECT gudang_lainnya_kode FROM tb_gudang_lainnya WHERE gudang_lainnya_artikel = '$isi_baris[0]'")->fetch();

            $simpan = array(
                'gudang_lainnya_kode' => $kode['gudang_lainnya_kode'],
                'ukuran_barang_detail_id' => $ukuran['ukuran_barang_detail_id'],
                'gudang_lainnya_detail_jumlah' => $isi_baris[4],
                'gudang_lainnya_detail_barcode' => $isi_baris[1],
                'gudang_lainnya_detail_tgl' => date('Y-m-d')
            );
            $con->insert('tb_gudang_lainnya_detail', $simpan);
            // exit;
        }
        $no++;
    }
    fclose($file);
    header('location:../../stok_barang_gudang_lainnya.html');
}
