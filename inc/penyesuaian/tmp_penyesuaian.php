<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT * FROM tb_penyesuaian_stok_detail 
                    JOIN tb_gudang ON tb_gudang.id_gudang = tb_penyesuaian_stok_detail.id_gudang
                    WHERE penyesuaian_stok_id = '$_POST[id]'")->fetchAll();

foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['stok_awal'] ?></td>
        <td><?= $a['stok_penyesuaian'] ?></td>
        <td><?= $a['stok_akhir'] ?></td>
    </tr>
<?php } ?>