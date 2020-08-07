<?php

include "../../../config/koneksi.php";

$data = $con->query("SELECT * FROM tb_stok_toko
                        JOIN tb_gudang ON tb_stok_toko.id_gudang = tb_gudang.id_gudang
                        WHERE tb_stok_toko.id_gudang = '$_GET[id_gudang]'")->fetch();

echo json_encode($data);
