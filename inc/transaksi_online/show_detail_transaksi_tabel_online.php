<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


$data = $con->query("SELECT
                        tb_transaksi_online_detail.transol_detail_id,
                        tb_transaksi_online_detail.transol_detail_kode,
                        tb_transaksi_online_detail.transol_detail_tgl,
                        tb_transaksi_online_detail.transol_id,
                        tb_transaksi_online_detail.transol_detail_diskon1,
                        tb_transaksi_online_detail.transol_detail_diskon2,
                        toko.nama_toko,
                        tb_gudang.nama,
                        tb_gudang.jual,
                        tb_transaksi_online_detail.transol_detail_jumlah_beli,
                        tb_transaksi_online_detail.transol_detail_total_harga
                        From
                        tb_transaksi_online_detail 
                        Inner Join
                        toko On toko.id_toko = tb_transaksi_online_detail.id_toko 
                        Inner Join
                        tb_gudang On tb_gudang.id_gudang = tb_transaksi_online_detail.id_gudang 
                        Inner Join
                        tb_stok_toko On toko.id_toko = tb_stok_toko.id_toko
                        WHERE tb_transaksi_online_detail.transol_id = :transol_id 
                ", array("transol_id" => $_POST['transol_id']))->fetchAll();

$jumlah = 0;
$subtotal = 0;
foreach ($data as $i => $a) {

        $jumlah += $a['transol_detail_jumlah_beli'];
        $subtotal += $a['transol_detail_total_harga'];
?>
        <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $a['nama'] ?></td>
                <td><?= $a['transol_detail_jumlah_beli'] ?></td>
                <td><?= 'Rp' . number_format($a['jual']) ?></td>
                <td><?= $a['transol_detail_diskon1'] . ' %' ?></td>
                <td><?= $a['transol_detail_diskon2'] . ' %' ?></td>
                <td><?= 'Rp' . number_format($a['transol_detail_total_harga']) ?></td>
        </tr>
<?php } ?>

<tr>
        <th colspan="2">Jumlah</th>
        <th><?= $jumlah ?></th>
        <th colspan="2">&nbsp;</th>
        <th>Total</th>
        <th><b><?= 'Rp' . number_format($subtotal) ?></b>
                <input type="hidden" id="subtotal" value="<?= $subtotal ?>">
                <input type="hidden" id="jmlTot" value="<?= $jumlah ?>">
        </th>
</tr>