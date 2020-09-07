<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


$simpan = $con->update(
    "tb_gudang",
    array(
        'id' => $_POST['id'],
        'artikel' => $_POST['artikel'],
        'nama' => $_POST['nama'],
        'id_merek' => $_POST['id_merek'],
        'modal' => $_POST['modal'],
        'jual' => $_POST['jual'],
        'id_gender' => $_POST['id_gender'],
        'id_kategori' => $_POST['id_kategori'],
        'id_divisi' => $_POST['id_divisi'],
        'id_sub_divisi' => $_POST['id_sub_divisi'],
        'tanggal' => $_POST['tanggal'],
        'thumbnail' => $_POST['thumbnail'],
        'foto1' => $_POST['foto1'],
        'foto2' => $_POST['foto2'],
        'foto3' => $_POST['foto3'],
        'foto4' => $_POST['foto4'],
        'foto5' => $_POST['foto5'],
        'berat' => $_POST['berat']
    ),
    array(
        "id_gudang" => $_POST["id_gudang"]
    )
);

if ($simpan == TRUE) {
    echo json_encode('SUCCESS');
} else {
    echo json_encode('ERROR');
}
