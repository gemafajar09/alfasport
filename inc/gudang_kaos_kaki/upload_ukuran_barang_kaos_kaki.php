<?php
include "../../config/koneksi.php";
if (isset($_POST['upload'])) {
    $file = fopen($_FILES['upload_ukuran']['tmp_name'], 'r');
    $no = 0;
    while (!feof($file)) {
        $isi_baris = fgetcsv($file);
        // var_dump($isi_baris);
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
            $ukuran = $con->query("SELECT ukuran_kaos_kaki_id FROM tb_ukuran_kaos_kaki WHERE id_merek='$mer' AND ukuran_kaos_kaki_ue = '$isi_baris[4]' AND ukuran_kaos_kaki_size = '$isi_baris[5]'")->fetch();

            // cari kode barang
            $kode = $con->query("SELECT gudang_kaos_kaki_kode FROM tb_gudang_kaos_kaki WHERE gudang_kaos_kaki_artikel = '$isi_baris[0]'")->fetch();

            $simpan = array(
                'gudang_kaos_kaki_kode' => $kode['gudang_kaos_kaki_kode'],
                'ukuran_kaos_kaki_id' => $ukuran['ukuran_kaos_kaki_id'],
                'gudang_kaos_kaki_detail_jumlah' => $isi_baris[6],
                'gudang_kaos_kaki_detail_barcode' => $isi_baris[1],
                'gudang_kaos_kaki_detail_tgl' => date('Y-m-d')
            );
            $con->insert('tb_gudang_kaos_kaki_detail', $simpan);
        }
        $no++;
    }
    fclose($file);
    header('location:../../stok_barang_gudang_kaos_kaki.html');
}
