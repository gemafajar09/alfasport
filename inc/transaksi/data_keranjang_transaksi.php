<?php
include "../../config/koneksi.php";
session_start();
$data = $con->query("SELECT
                    tb_transaksi_tmp.tmp_id,
                    tb_transaksi_tmp.tmp_kode,
                    tb_transaksi_tmp.diskon1,
                    tb_transaksi_tmp.potongan,
                    tb_barang.barang_nama,
                    tb_barang.barang_artikel,
                    tb_barang_detail.barang_detail_barcode,
                    tb_barang.barang_jual,
                    tb_transaksi_tmp.tmp_total_harga,
                    tb_transaksi_tmp.tmp_jumlah_beli,
                    tb_transaksi_tmp.id_karyawan
                    From
                    tb_transaksi_tmp Inner Join
                    tb_barang_detail On tb_barang_detail.barang_detail_id = tb_transaksi_tmp.id_gudang
                    Inner Join
                    tb_barang On tb_barang_detail.barang_id = tb_barang.barang_id WHERE tb_transaksi_tmp.id_karyawan = '$_COOKIE[id_karyawan]'
                    ")->fetchAll();

$jumlah = 0;
$subtotal = 0;
foreach ($data as $i => $a) {

    $jumlah += $a['tmp_jumlah_beli'];
    $subtotal += $a['tmp_total_harga'];
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_nama'] ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['tmp_jumlah_beli'] ?></td>
        <td><?= 'Rp. ' . number_format($a['barang_jual']) ?></td>
        <td><?= $a['diskon1'] . '%' ?></td>
        <td><?= 'Rp. ' . number_format($a['potongan']) ?></td>
        <td><?= number_format($a['tmp_total_harga']) ?></td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapusKeranjang('<?= $a['tmp_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>

<tr>
    <th colspan="2">&nbsp;</th>
    <th>Jumlah</th>
    <th><?= $jumlah ?></th>
    <th colspan="2">&nbsp;</th>
    <th>Total</th>
    <th><b><?= 'Rp' . number_format($subtotal) ?></b>
        <input type="hidden" id="subtotal" value="<?= $subtotal ?>">
        <input type="hidden" id="jmlTot" value="<?= $jumlah ?>">
    </th>
    <th>&nbsp;</th>
</tr>