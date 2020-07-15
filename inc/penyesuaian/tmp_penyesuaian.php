<?php
include "../../config/koneksi.php";
// aksi di bawah
// $data = $con->query("SELECT * FROM tb_penyesuaian_stok_detail 
//     JOIN tb_gudang ON tb_penyesuaian_stok_detail.id_toko = tb_gudang.id_toko
//     JOIN tb_admin ON tb_admin.id_admin = tb_penyesuaian_stok.penyesuaian_stok_create_by
// ");
// $data = $con->query("SELECT * FROM tb_penyesuaian_stok_detail WHERE ");

// var_dump($_POST['id']);
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT * FROM tb_penyesuaian_stok_detail 
                    JOIN tb_gudang ON tb_gudang.id_gudang = tb_penyesuaian_stok_detail.id_gudang
                    WHERE penyesuaian_stok_id = '$_POST[id]'")->fetchAll();

// $data = $con->get("tb_penyesuaian_stok_detail", "*", array("penyesuaian_stok_id" => $_POST["id"]));

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