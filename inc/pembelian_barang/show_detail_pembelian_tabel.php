<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
                        tb_beli_detail.beli_detail_id,
                        tb_beli_detail.beli_invoice,
                        tb_beli_detail.beli_detail_jml,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_satuan.satuan_nama
                        From
                        tb_beli_detail Inner Join
                        tb_barang_detail On tb_barang_detail.barang_detail_id =
                                tb_beli_detail.barang_detail_id Inner Join
                        tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id Inner Join
                        tb_satuan On tb_satuan.satuan_id = tb_beli_detail.satuan_id
                        WHERE tb_beli_detail.beli_id = :beli_id
                        ", array("beli_id" => $_POST['beli_id']))->fetchAll();
$jumlah = 0;
foreach ($data as $i => $a) {
        $jumlah += $a['beli_detail_jml'];
?>
        <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $a['barang_kategori'] ?></td>
                <td><?= $a['barang_artikel'] ?></td>
                <td><?= $a['barang_nama'] ?></td>
                <td><?= $a['beli_detail_jml'] ?></td>
                <td><?= $a['satuan_nama'] ?></td>
        </tr>
<?php } ?>
<tr>
        <th colspan="3"></th>
        <th>Jumlah</th>
        <th><?= $jumlah ?></th>
        <th>&nbsp;</th>
</tr>