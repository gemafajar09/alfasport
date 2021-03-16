<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$cek = $con->query("SELECT * FROM 
                        tb_return_barang 
                    WHERE return_barang_kode = '$_POST[return_barang_kode]'"
                    )->fetch();

if(empty($cek)){
    $con->insert(
        "tb_return_barang",
        array(
            "return_barang_kode" => $_POST['return_barang_kode'],
            "return_barang_tgl" => $_POST['return_barang_tgl'],
            "no_resi" => $_POST['no_resi'],
            "id_toko" => $_POST['id_toko'],
            "id_karyawan" => $_COOKIE['id_karyawan'],
        )
    );
}

