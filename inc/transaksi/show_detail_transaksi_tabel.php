<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


$data = $con->query("
                SELECT a.detail_id, 
                        a.detail_kode, 
                        a.detail_tgl, 
                        a.transaksi_id, 
                        d.nama, 
                        b.nama_toko, 
                        d.jual, 
                        a.detail_jumlah_beli, 
                        a.detail_total_harga 
                FROM tb_transaksi_detail a 
                JOIN toko b ON a.id_toko=b.id_toko 
                JOIN tb_stok_toko c ON a.id_toko=c.id_toko 
                JOIN tb_gudang d ON c.id_gudang=d.id_gudang 
                WHERE a.transaksi_id = :transaksi_id
                ", array("transaksi_id" => $_POST['transaksi_id']))->fetchAll();

$jumlah = 0;
$subtotal = 0;
foreach ($data as $i => $a) {

        $jumlah += $a['detail_jumlah_beli'];
        $subtotal += $a['detail_total_harga'];
?>
        <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $a['nama'] ?></td>
                <td><?= $a['detail_jumlah_beli'] ?></td>
                <td><?= 'Rp' . number_format($a['jual']) ?></td>
                <td><?= '0' ?></td>
                <td><?= '0' ?></td>
                <td><?= '%' ?></td>
                <td><?= 'Rp' . number_format($a['detail_total_harga']) ?></td>
        </tr>
<?php } ?>

<tr>
        <th colspan="2">Jumlah</th>
        <th><?= $jumlah ?></th>
        <th colspan="3">&nbsp;</th>
        <th>Total</th>
        <th><b><?= 'Rp' . number_format($subtotal) ?></b>
                <input type="hidden" id="subtotal" value="<?= $subtotal ?>">
                <input type="hidden" id="jmlTot" value="<?= $jumlah ?>">
        </th>
</tr>