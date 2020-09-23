<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
tb_transaksi_online_detail.transol_detail_jumlah_beli,
tb_transaksi_online_detail.transol_detail_total_harga,
tb_transaksi_online_detail.transol_detail_diskon1,
tb_transaksi_online_detail.transol_detail_potongan,
tb_gudang.nama,
tb_transaksi_online.transol_cash,
tb_transaksi_online.transol_debit,
tb_transaksi_online.transol_tipe_diskon,
tb_transaksi_online.transol_diskon,
tb_transaksi_online.transol_diskon_bank,
tb_gudang.jual
From
tb_transaksi_online_detail Inner Join
tb_gudang_detail On tb_gudang_detail.id_detail = tb_transaksi_online_detail.id_gudang
Inner Join
tb_gudang On tb_gudang.id = tb_gudang_detail.id Inner Join
tb_transaksi_online On tb_transaksi_online.transol_id = tb_transaksi_online_detail.transol_id WHERE tb_transaksi_online_detail.transol_id = '$_POST[transaksi_id]'")->fetchAll();

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
                <td><?= 'Rp.' . number_format($a['jual']) ?></td>
                <td><?= $a['transol_detail_diskon1'] . '%' ?></td>
                <td><?= 'Rp.' . number_format($a['transol_detail_potongan']) ?></td>
                <td><?= 'Rp.' . number_format($a['transol_detail_total_harga']) ?></td>
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
        tb_transaksi_online_detail.transol_detail_jumlah_beli,
        tb_transaksi_online_detail.transol_detail_total_harga,
        tb_transaksi_online_detail.transol_detail_diskon1,
        tb_transaksi_online_detail.transol_detail_potongan,
        tb_gudang.nama,
        tb_transaksi_online.transol_cash,
        tb_transaksi_online.transol_debit,
        tb_transaksi_online.transol_tipe_diskon,
        tb_transaksi_online.transol_diskon,
        tb_transaksi_online.transol_diskon_bank,
        tb_gudang.jual
        From
        tb_transaksi_online_detail Inner Join
        tb_gudang_detail On tb_gudang_detail.id_detail = tb_transaksi_online_detail.id_gudang
        Inner Join
        tb_gudang On tb_gudang.id = tb_gudang_detail.id Inner Join
        tb_transaksi_online On tb_transaksi_online.transol_id = tb_transaksi_online_detail.transol_id WHERE tb_transaksi_online_detail.transol_id = '$_POST[transaksi_id]' LIMIT 1")->fetch();

$tipe_diskon_manual = $dt['transol_tipe_diskon'];
$diskon_manual = $dt['transol_diskon'];
$diskon_bank = $dt['transol_diskon_bank'];

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