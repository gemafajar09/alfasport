<?php

include "../../../config/koneksi.php";

$data = $con->query("SELECT * FROM tb_barang_toko
                        JOIN tb_barang ON tb_barang_toko.barang_id = tb_barang.barang_id
                        WHERE tb_barang_toko.barang_detail_id = '$_GET[id_gudang]'")->fetch();

echo json_encode($data);
