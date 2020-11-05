<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);



//cek apakah di tb_stok_toko data barang ada atau tidak 
$cek_data_barang = $con->query("SELECT
                                    tb_barang_toko.barang_toko_id,
                                    tb_barang_toko.id_toko,
                                    tb_barang_toko.barang_detail_id,
                                    tb_barang_toko.ukuran_id,
                                    tb_barang_toko.barang_toko_jml,
                                    tb_barang_toko.barang_toko_tgl,
                                    tb_barang_detail.barang_detail_jml
                                From
                                tb_barang_toko Inner Join
                                tb_barang_detail On tb_barang_detail.barang_detail_id =
                                    tb_barang_toko.barang_detail_id Inner Join
                                toko On toko.id_toko = tb_barang_toko.id_toko
                                WHERE
                                tb_barang_toko.barang_detail_id = '$_POST[barang_detail_id]'
                                AND    
                                tb_barang_detail.barang_detail_id = '$_POST[barang_detail_id]'
                                AND 
                                tb_barang_toko.id_toko = '$_POST[id_toko]'    
                                AND 
                                tb_barang_toko.ukuran_id = '$_POST[ukuran_id]'")->fetch(PDO::FETCH_ASSOC);


// jika data ada maka update stok
if ($cek_data_barang > 0) {
    $con->update(
        "tb_barang_detail",
        array(
            "barang_detail_jml" => $cek_data_barang['barang_detail_jml'] - $_POST['barang_toko_jml']
        ),
        array(
            "barang_detail_id" => $cek_data_barang['barang_detail_id']
        )
    );

    $simpan = $con->update(
        "tb_barang_toko",
        array(
            "barang_toko_jml" => $cek_data_barang['barang_toko_jml'] + $_POST["barang_toko_jml"],
        ),
        array(
            "barang_toko_id" => $cek_data_barang["barang_toko_id"]
        )
    );
}
// jika tidak maka insert
else {
    $cek_stok_gudang = $con->get("tb_barang_detail", "*", array("barang_detail_id" => $_POST['barang_detail_id']));

    $con->update(
        "tb_barang_detail",
        array(
            "barang_detail_jml" => $cek_stok_gudang['barang_detail_jml'] - $_POST['barang_toko_jml']
        ),
        array(
            "barang_detail_id" => $_POST['barang_detail_id']
        )
    );
    $simpan = $con->insert(
        "tb_barang_toko",
        array(
            'id_toko' => $_POST['id_toko'],
            'barang_detail_id' => $_POST['barang_detail_id'],
            'ukuran_id' => $_POST['ukuran_id'],
            'barang_toko_jml' => $_POST['barang_toko_jml'],
            'barang_toko_tgl' => date('Y-m-d')
        )
    );
}

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
