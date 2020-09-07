<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


//cek apakah di tb_stok_toko data barang ada atau tidak 
$cek_data_barang = $con->query("SELECT
                                    tb_stok_toko.id_stok_toko,
                                    tb_stok_toko.id_gudang,
                                    tb_stok_toko.id_toko,
                                    tb_stok_toko.jumlah,
                                    tb_stok_toko.id_ukuran,
                                    tb_stok_toko.tanggal,
                                    tb_gudang_detail.id_detail,
                                    tb_gudang_detail.jumlah as jumlah_stok_gudang
                                FROM
                                    tb_stok_toko Join
                                    tb_gudang On tb_gudang.id_gudang = tb_stok_toko.id_gudang Join
                                    tb_gudang_detail On tb_gudang_detail.id = tb_gudang.id Join
                                    toko On tb_stok_toko.id_toko = toko.id_toko
                                Where
                                    tb_stok_toko.id_gudang = '$_POST[gudang]'
                                AND    
                                    tb_gudang_detail.id_detail = '$_POST[id_detail]'
                                AND 
                                    tb_stok_toko.id_toko = '$_POST[toko]'    
                                AND 
                                    tb_stok_toko.id_ukuran = '$_POST[id_ukuran]'")->fetch(PDO::FETCH_ASSOC);

// jika data ada maka update stok
if ($cek_data_barang > 1) {
    $con->update(
        "tb_gudang_detail",
        array(
            "jumlah" => $cek_data_barang['jumlah_stok_gudang'] - $_POST['jumlah']
        ),
        array(
            "id_detail" => $cek_data_barang['id_detail']
        )
    );

    $simpan = $con->update(
        "tb_stok_toko",
        array(
            "jumlah" => $cek_data_barang['jumlah'] + $_POST["jumlah"],
        ),
        array(
            "id_stok_toko" => $cek_data_barang["id_stok_toko"]
        )
    );
}
// jika tidak maka insert
else {

    $cek_stok_gudang = $con->get("tb_gudang_detail", "*", array("id_detail" => $_POST['id_detail']));

    $con->update(
        "tb_gudang_detail",
        array(
            "jumlah" => $cek_stok_gudang['jumlah'] - $_POST['jumlah']
        ),
        array(
            "id_detail" => $_POST['id_detail']
        )
    );
    $simpan = $con->insert(
        "tb_stok_toko",
        array(
            'id_toko' => $_POST['toko'],
            'id_gudang' => $_POST['gudang'],
            'jumlah' => $_POST['jumlah'],
            'id_ukuran' => $_POST['id_ukuran'],
            'tanggal' => date('Y-m-d')
        )
    );
}



// if ($_POST['id_stok_toko'] == NULL) {
//     $simpan = $con->insert('tb_stok_toko', $data);
//     $upstok = $con->query("SELECT * FROM tb_gudang_detail WHERE id_detail='$_POST[id_detail]'")->fetch();
//     $total = $upstok['jumlah'] - $_POST['jumlah'];
//     $con->update('tb_gudang_detail', ['jumlah' => $total], ['id_detail' => $_POST['id_detail']]);
// } else {
//     $where = array('id_stok_toko' => $_POST['id_stok_toko']);
//     $simpan = $con->update('tb_stok_toko', $data, $where);
// }

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
