<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// yg baru 14 september 2020
$data = $con->query("SELECT
                        tb_penyesuaian_stok.penyesuaian_stok_tgl,
                        toko.nama_toko,
                        tb_penyesuaian_stok.penyesuaian_stok_tipe
                    From
                        tb_penyesuaian_stok Inner Join
                        tb_penyesuaian_stok_detail On tb_penyesuaian_stok_detail.penyesuaian_stok_id =
                                tb_penyesuaian_stok.penyesuaian_stok_id Inner Join
                        tb_stok_toko On tb_stok_toko.id_stok_toko = tb_penyesuaian_stok_detail.id_toko
                        Inner Join
                        toko On toko.id_toko = tb_penyesuaian_stok.id_toko
                    WHERE tb_penyesuaian_stok.penyesuaian_stok_id = '$_POST[id]'     
                    ")->fetch();

// backup lama
// $cek = $con->query("SELECT b.id_gudang FROM tb_penyesuaian_stok_detail a JOIN tb_stok_toko b ON a.id_toko=b.id_toko WHERE a.penyesuaian_stok_id = '$_POST[id]' ")->fetch();
// $data = $con->query("SELECT a.*, b.*, (SELECT artikel FROM tb_gudang WHERE id_gudang = '$cek[id_gudang]' ) as artikel FROM tb_penyesuaian_stok_detail a JOIN tb_penyesuaian_stok b ON a.penyesuaian_stok_id=b.penyesuaian_stok_id WHERE a.penyesuaian_stok_id = '$_POST[id]'")->fetch();
// $edit1 = $con->get("tb_pakai_sendiri", "*", array("penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"]));

echo json_encode($data);
