<?php

include "../../../config/koneksi.php";

$data = $con->query("SELECT tb_kategori.kategori_nama 
                    FROM tb_divisi
                    JOIN tb_kategori ON tb_divisi.kategori_id = tb_kategori.kategori_id
                    WHERE tb_divisi.divisi_id = '$_GET[divisi_id]'")->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);
