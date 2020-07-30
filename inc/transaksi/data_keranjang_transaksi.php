<?php
include "../../config/koneksi.php";
session_start();
$data = $con->query("
SELECT a.tmp_id, 
a.tmp_kode, 
a.diskon1, 
a.potongan, 
b.nama, 
b.jual, 
a.tmp_jumlah_beli, 
a.tmp_total_harga 
FROM tb_transaksi_tmp a 
JOIN tb_gudang b ON a.id_gudang=b.id_gudang WHERE a.id_karyawan = '$_COOKIE[id_karyawan]'
")->fetchAll();

$jumlah = 0;
$subtotal = 0;
foreach ($data as $i => $a) {

    $jumlah += $a['tmp_jumlah_beli'];
    $subtotal += $a['tmp_total_harga'];
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['tmp_jumlah_beli'] ?></td>
        <td><?= 'Rp' . number_format($a['jual']) ?></td>
        <td><?= 'Rp' .number_format($a['diskon1']) ?></td>
        <td><?= '0' ?></td>
        <td><?= $a['potongan'].'%' ?></td>
        <td><?= 'Rp' . number_format($a['tmp_total_harga']) ?></td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapusKeranjang('<?= $a['tmp_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
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
    <th>&nbsp;</th>
</tr>