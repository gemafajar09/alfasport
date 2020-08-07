<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT 
                        a.detail_id, 
                        a.pembelian_no_invoice, 
                        c.artikel, 
                        c.nama, 
                        a.detail_jumlah, 
                        d.satuan_nama 
                        FROM tb_pembelian_detail a 
                        JOIN tb_gudang_detail b ON a.id_gudang_detail = b.id_detail
                        JOIN tb_gudang c ON b.id = c.id
                        JOIN tb_satuan d ON a.satuan_id=d.satuan_id 
                        WHERE a.pembelian_id = :pembelian_id
                        ", array("pembelian_id" => $_POST['pembelian_id']))->fetchAll();
$jumlah = 0;
foreach ($data as $i => $a) {
        $jumlah += $a['detail_jumlah'];
?>
        <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $a['artikel'] ?></td>
                <td><?= $a['nama'] ?></td>
                <td><?= $a['detail_jumlah'] ?></td>
                <td><?= $a['satuan_nama'] ?></td>
        </tr>
<?php } ?>
<tr>
        <th colspan="3">Jumlah</th>
        <th><?= $jumlah ?></th>
        <th>&nbsp;</th>
</tr>