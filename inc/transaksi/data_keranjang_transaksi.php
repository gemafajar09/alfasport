<?php
include "../../config/koneksi.php";
session_start();
$data = $con->query("
                SELECT a.tmp_id, 
                        a.tmp_kode, 
                        d.nama, 
                        d.jual, 
                        a.tmp_jumlah_beli, 
                        a.tmp_total_harga 
                FROM tb_transaksi_tmp a 
                JOIN toko b ON a.id_toko=b.id_toko 
                JOIN tb_stok_toko c ON a.id_toko=c.id_toko 
                JOIN tb_gudang d ON c.id_gudang=d.id_gudang 
                WHERE a.tmp_kode = '$_SESSION[auto_kode]'
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
        <td><?= '0' ?></td>
        <td><?= '0' ?></td>
        <td><?= '%' ?></td>
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