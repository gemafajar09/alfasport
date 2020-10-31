<?php
include "../../config/koneksi.php";
if (isset($_POST['simpan'])) {
    $ukuran_barang_detail_id = $_POST['ukuran_barang_detail_id'];
    $gudang_lainnya_detail_jumlah = $_POST['gudang_lainnya_detail_jumlah'];
    $gudang_lainnya_detail_barcode = $_POST['gudang_lainnya_detail_barcode'];
    $tanggal = date('Y-m-d');
    foreach ($ukuran_barang_detail_id as $i => $a) {
        $con->insert(
            "tb_gudang_lainnya_detail",
            array(
                "gudang_lainnya_kode" => $_POST['gudang_lainnya_kode'],
                "ukuran_barang_detail_id" => $ukuran_barang_detail_id[$i],
                "gudang_lainnya_detail_jumlah" => $gudang_lainnya_detail_jumlah[$i],
                "gudang_lainnya_detail_barcode" => $gudang_lainnya_detail_barcode[$i],
                "gudang_lainnya_detail_tgl" => $tanggal
            )
        );
    }
    echo "
    <script>
        window.location='../../entry_gudang_lainnya.html'
    </script>
    ";
}
