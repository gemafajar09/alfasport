<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
                        tb_transaksi_detail.detail_jumlah_beli,
                        tb_transaksi_detail.detail_total_harga,
                        tb_transaksi_detail.detail_potongan,
                        tb_transaksi_detail.detail_diskon1,
                        tb_barang.barang_nama,
                        tb_transaksi.transaksi_cash,
                        tb_transaksi.transaksi_debit,
                        tb_transaksi.transaksi_tipe_diskon,
                        tb_transaksi.transaksi_diskon,
                        tb_transaksi.transaksi_diskon_bank,
                        tb_barang.barang_jual,
                        tb_barang.barang_artikel,  
                        tb_barang_detail.barang_detail_barcode,
                        tb_ukuran.sepatu_ue,
                        tb_ukuran.sepatu_uk,
                        tb_ukuran.sepatu_us,
                        tb_ukuran.sepatu_cm,
                        tb_ukuran.kaos_kaki_eu,
                        tb_ukuran.kaos_kaki_size,
                        tb_ukuran.barang_lainnya_nama_ukuran
                        From
                        tb_transaksi_detail Inner Join
                        tb_barang_detail On tb_barang_detail.barang_detail_id =
                                tb_transaksi_detail.id_gudang Inner Join
                        tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id Inner Join
                        tb_transaksi On tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id
                        Inner Join
                        tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                        WHERE 
                        tb_transaksi_detail.transaksi_id = '$_POST[transaksi_id]'")->fetchAll();

$jumlah = 0;
$subtotal = 0;
foreach ($data as $i => $a) {
        $jumlah += $a['detail_jumlah_beli'];
        $subtotal += $a['detail_total_harga'];
?>
        <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $a['barang_artikel'] ?> - <?= $a['barang_detail_barcode'] ?> - <?= $a['barang_nama'] ?></td>
                <td><?= $a['detail_jumlah_beli'] ?></td>
                <td><?= 'Rp.' . number_format($a['barang_jual']) ?></td>
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
        tb_barang.barang_nama,
        tb_transaksi.transaksi_cash,
        tb_transaksi.transaksi_debit,
        tb_transaksi.transaksi_tipe_diskon,
        tb_transaksi.transaksi_diskon,
        tb_transaksi.transaksi_diskon_bank,
        tb_barang.barang_jual
        From
        tb_transaksi_detail Inner Join
        tb_barang_detail On tb_barang_detail.barang_detail_id = tb_transaksi_detail.id_gudang
        Inner Join
        tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id Inner Join
        tb_transaksi On tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id WHERE tb_transaksi_detail.transaksi_id = '$_POST[transaksi_id]' LIMIT 1")->fetch();

$tipe_diskon_manual = $dt['transaksi_tipe_diskon'];
$diskon_manual = $dt['transaksi_diskon'];
if ($dt['transaksi_diskon_bank'] == null) {
        $diskon_bank = 0;
} else {
        $diskon_bank = $dt['transaksi_diskon_bank'];
}
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