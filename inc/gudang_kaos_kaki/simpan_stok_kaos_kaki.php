<?php

include "../../config/koneksi.php";
if (isset($_POST['simpan'])) {
    $ukuran_kaos_kaki_id = $_POST['ukuran_kaos_kaki_id'];
    $gudang_kaos_kaki_detail_jumlah = $_POST['gudang_kaos_kaki_detail_jumlah'];
    $gudang_kaos_kaki_detail_barcode = $_POST['gudang_kaos_kaki_detail_barcode'];
    $tanggal = date('Y-m-d');
    foreach ($ukuran_kaos_kaki_id as $i => $a) {
        $con->insert(
            "tb_gudang_kaos_kaki_detail",
            array(
                "gudang_kaos_kaki_kode" => $_POST['gudang_kaos_kaki_kode'],
                "ukuran_kaos_kaki_id" => $ukuran_kaos_kaki_id[$i],
                "gudang_kaos_kaki_detail_jumlah" => $gudang_kaos_kaki_detail_jumlah[$i],
                "gudang_kaos_kaki_detail_barcode" => $gudang_kaos_kaki_detail_barcode[$i],
                "gudang_kaos_kaki_detail_tgl" => $tanggal
            )
        );
    }

    echo "
    <script>
        window.location='../../entry_gudang_kaos_kaki.html'
    </script>
    ";
}
