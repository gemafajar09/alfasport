<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

//cek apakah di tb_stok_toko data barang ada atau tidak 
$cek_data_barang = $con->query("SELECT
                                    tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_id,
                                    tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id,
                                    tb_stok_toko_kaos_kaki.id_toko,
                                    tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_jumlah,
                                    tb_stok_toko_kaos_kaki.ukuran_kaos_kaki_id,
                                    tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_tgl,
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_jumlah
                                From
                                tb_stok_toko_kaos_kaki Inner Join
                                tb_gudang_kaos_kaki_detail On tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id =
                                        tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id Inner Join
                                toko On toko.id_toko = tb_stok_toko_kaos_kaki.id_toko
                                WHERE
                                    tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id = '$_POST[gudang_kaos_kaki_detail_id]'
                                AND    
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id = '$_POST[gudang_kaos_kaki_detail_id]'
                                AND 
                                    tb_stok_toko_kaos_kaki.id_toko = '$_POST[id_toko]'    
                                AND 
                                    tb_stok_toko_kaos_kaki.ukuran_kaos_kaki_id = '$_POST[ukuran_kaos_kaki_id]'")->fetch(PDO::FETCH_ASSOC);

// jika data ada maka update stok
if ($cek_data_barang > 0) {
    $con->update(
        "tb_gudang_kaos_kaki_detail",
        array(
            "gudang_kaos_kaki_detail_jumlah" => $cek_data_barang['gudang_kaos_kaki_detail_jumlah'] - $_POST['stok_toko_kaos_kaki_jumlah']
        ),
        array(
            "gudang_kaos_kaki_detail_id" => $cek_data_barang['gudang_kaos_kaki_detail_id']
        )
    );

    $simpan = $con->update(
        "tb_stok_toko_kaos_kaki",
        array(
            "stok_toko_kaos_kaki_jumlah" => $cek_data_barang['stok_toko_kaos_kaki_jumlah'] + $_POST["stok_toko_kaos_kaki_jumlah"],
        ),
        array(
            "stok_toko_kaos_kaki_id" => $cek_data_barang["stok_toko_kaos_kaki_id"]
        )
    );
}
// jika tidak maka insert
else {
    $cek_stok_gudang = $con->get("tb_gudang_kaos_kaki_detail", "*", array("gudang_kaos_kaki_detail_id" => $_POST['gudang_kaos_kaki_detail_id']));

    $con->update(
        "tb_gudang_kaos_kaki_detail",
        array(
            "gudang_kaos_kaki_detail_jumlah" => $cek_stok_gudang['gudang_kaos_kaki_detail_jumlah'] - $_POST['stok_toko_kaos_kaki_jumlah']
        ),
        array(
            "gudang_kaos_kaki_detail_id" => $_POST['gudang_kaos_kaki_detail_id']
        )
    );
    $simpan = $con->insert(
        "tb_stok_toko_kaos_kaki",
        array(
            'id_toko' => $_POST['id_toko'],
            'gudang_kaos_kaki_detail_id' => $_POST['gudang_kaos_kaki_detail_id'],
            'stok_toko_kaos_kaki_jumlah' => $_POST['stok_toko_kaos_kaki_jumlah'],
            'ukuran_kaos_kaki_id' => $_POST['ukuran_kaos_kaki_id'],
            'stok_toko_kaos_kaki_tgl' => date('Y-m-d')
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
