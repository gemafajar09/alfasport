<?php

include "../../config/koneksi.php";
if (isset($_POST['simpan'])) {

    $ukuran_id = $_POST['ukuran_id'];
    $barang_detail_jml = $_POST['barang_detail_jml'];
    $barang_detail_barcode = $_POST['barang_detail_barcode'];
    $tanggal = date('Y-m-d');
    foreach ($ukuran_id as $i => $a) {
        $con->insert(
            "tb_barang_detail",
            array(
                "barang_id" => $_POST['barang_id'],
                "ukuran_id" => $ukuran_id[$i],
                "barang_detail_barcode" => $barang_detail_barcode[$i],
                "barang_detail_jml" => $barang_detail_jml[$i],
                "barang_detail_tgl" => $tanggal
            )
        );
    }
    echo "
    <script>
        window.location='../../entry_barang_gudang.html'
    </script>
    ";
}
