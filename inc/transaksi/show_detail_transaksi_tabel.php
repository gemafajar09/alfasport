<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


// $data = $con->query("
//                 SELECT a.detail_id, 
//                         a.detail_kode, 
//                         a.detail_tgl, 
//                         a.transaksi_id, 
//                         d.nama, 
//                         b.nama_toko, 
//                         d.jual, 
//                         a.detail_jumlah_beli, 
//                         a.detail_total_harga 
//                 FROM tb_transaksi_detail a 
//                 JOIN toko b ON a.id_toko=b.id_toko 
//                 JOIN tb_stok_toko c ON a.id_toko=c.id_toko 
//                 JOIN tb_gudang d ON c.id_gudang=d.id_gudang 
//                 WHERE a.transaksi_id = :transaksi_id
//                 ", array("transaksi_id" => $_POST['transaksi_id']))->fetchAll();

$data = $con->query("SELECT
tb_transaksi_detail.detail_jumlah_beli,
tb_transaksi_detail.detail_total_harga,
tb_transaksi_detail.detail_diskon1,
tb_transaksi_detail.detail_potongan,
tb_gudang.nama,
tb_transaksi.transaksi_cash,
tb_transaksi.transaksi_debit,
tb_transaksi.transaksi_tipe_diskon,
tb_transaksi.transaksi_diskon,
tb_transaksi.transaksi_diskon_bank,
tb_gudang.jual
From
tb_transaksi_detail Inner Join
tb_gudang_detail On tb_gudang_detail.id_detail = tb_transaksi_detail.id_gudang
Inner Join
tb_gudang On tb_gudang.id = tb_gudang_detail.id Inner Join
tb_transaksi On tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id WHERE tb_transaksi_detail.transaksi_id = '$_POST[transaksi_id]'")->fetchAll();

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
                <td><?= 'Rp.' . number_format($a['jual']) ?></td>
                <td><?= $a['detail_diskon1'] . '%' ?></td>
                <td><?= 'Rp.' . number_format($a['detail_potongan']) ?></td>
                <td><?= 'Rp.' . number_format($a['detail_total_harga']) ?></td>
        </tr>
<?php } ?>

<tr>
        <th colspan="2">Jumlah</th>
        <th><?= $jumlah ?></th>
        <th colspan="2">&nbsp;</th>
        <th>Subtotal</th>
        <th><b><?= 'Rp.' . number_format($subtotal) ?></b>
                <input type="hidden" id="subtotal" value="<?= $subtotal ?>">
                <input type="hidden" id="jmlTot" value="<?= $jumlah ?>">
        </th>
</tr>
<?php
$dt = $con->query("SELECT
        tb_transaksi_detail.detail_jumlah_beli,
        tb_transaksi_detail.detail_total_harga,
        tb_transaksi_detail.detail_diskon1,
        tb_transaksi_detail.detail_potongan,
        tb_gudang.nama,
        tb_transaksi.transaksi_cash,
        tb_transaksi.transaksi_debit,
        tb_transaksi.transaksi_tipe_diskon,
        tb_transaksi.transaksi_diskon,
        tb_transaksi.transaksi_diskon_bank,
        tb_gudang.jual
        From
        tb_transaksi_detail Inner Join
        tb_gudang_detail On tb_gudang_detail.id_detail = tb_transaksi_detail.id_gudang
        Inner Join
        tb_gudang On tb_gudang.id = tb_gudang_detail.id Inner Join
        tb_transaksi On tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id WHERE tb_transaksi_detail.transaksi_id = '$_POST[transaksi_id]' LIMIT 1")->fetch();

$tipe_diskon_manual = $dt['transaksi_tipe_diskon'];
$diskon_manual = $dt['transaksi_diskon'];
$diskon_bank = $dt['transaksi_diskon_bank'];

// cari diskon bank
$dB = ($subtotal * $diskon_bank) / 100;
$hBank = $subtotal - $dB;
// cari diskon manual
if ($tipe_diskon_manual == 'dis_persen') {
        $dM = ($hBank * $diskon_manual) / 100;
        $dManual = round($dM);
} elseif ($tipe_diskon_manual == 'dis_harga') {
        $dManual = $diskon_manual;
} else {
        $dManual = 0;
}
?>
<tr>
        <th colspan="5">&nbsp;</th>
        <th>Diskon Bank + Diskon Manual</th>
        <th style="float: right;">Rp. <?= number_format($dB + $dManual) ?></th>
</tr>
<tr>
        <th colspan="5">&nbsp;</th>
        <th>Total</th>
        <th style="float: right;">Rp.<?= number_format($subtotal - ($dB + $dManual)) ?></th>
</tr>