<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

//cek apakah di tb_stok_toko data barang ada atau tidak 
$cek_data_barang = $con->query("SELECT
                                    tb_stok_toko_lainnya.stok_toko_lainnya_id,
                                    tb_stok_toko_lainnya.gudang_lainnya_detail_id,
                                    tb_stok_toko_lainnya.id_toko,
                                    tb_stok_toko_lainnya.stok_toko_lainnya_jumlah,
                                    tb_stok_toko_lainnya.ukuran_barang_detail_id,
                                    tb_stok_toko_lainnya.stok_toko_lainnya_tgl,
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_jumlah
                                From
                                tb_stok_toko_lainnya Inner Join
                                tb_gudang_lainnya_detail On tb_gudang_lainnya_detail.gudang_lainnya_detail_id = tb_stok_toko_lainnya.gudang_lainnya_detail_id Inner Join
                                toko On toko.id_toko = tb_stok_toko_lainnya.id_toko
                                WHERE
                                    tb_stok_toko_lainnya.gudang_lainnya_detail_id = '$_POST[gudang_lainnya_detail_id]'
                                AND    
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_id = '$_POST[gudang_lainnya_detail_id]'
                                AND 
                                    tb_stok_toko_lainnya.id_toko = '$_POST[id_toko]'    
                                AND 
                                    tb_stok_toko_lainnya.ukuran_barang_detail_id = '$_POST[ukuran_barang_detail_id]'")->fetch(PDO::FETCH_ASSOC);

// jika data ada maka update stok
if ($cek_data_barang > 0) {
    $con->update(
        "tb_gudang_lainnya_detail",
        array(
            "gudang_lainnya_detail_jumlah" => $cek_data_barang['gudang_lainnya_detail_jumlah'] - $_POST['stok_toko_lainnya_jumlah']
        ),
        array(
            "gudang_lainnya_detail_id" => $cek_data_barang['gudang_lainnya_detail_id']
        )
    );

    $simpan = $con->update(
        "tb_stok_toko_lainnya",
        array(
            "stok_toko_lainnya_jumlah" => $cek_data_barang['stok_toko_lainnya_jumlah'] + $_POST["stok_toko_lainnya_jumlah"],
        ),
        array(
            "stok_toko_lainnya_id" => $cek_data_barang["stok_toko_lainnya_id"]
        )
    );
}
// jika tidak maka insert
else {
    $cek_stok_gudang = $con->get("tb_gudang_lainnya_detail", "*", array("gudang_lainnya_detail_id" => $_POST['gudang_lainnya_detail_id']));

    $con->update(
        "tb_gudang_lainnya_detail",
        array(
            "gudang_lainnya_detail_jumlah" => $cek_stok_gudang['gudang_lainnya_detail_jumlah'] - $_POST['stok_toko_lainnya_jumlah']
        ),
        array(
            "gudang_lainnya_detail_id" => $_POST['gudang_lainnya_detail_id']
        )
    );
    $simpan = $con->insert(
        "tb_stok_toko_lainnya",
        array(
            'id_toko' => $_POST['id_toko'],
            'gudang_lainnya_detail_id' => $_POST['gudang_lainnya_detail_id'],
            'stok_toko_lainnya_jumlah' => $_POST['stok_toko_lainnya_jumlah'],
            'ukuran_barang_detail_id' => $_POST['ukuran_barang_detail_id'],
            'stok_toko_lainnya_tgl' => date('Y-m-d')
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
