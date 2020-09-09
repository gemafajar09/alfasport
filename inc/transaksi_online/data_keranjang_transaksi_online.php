<?php
include "../../config/koneksi.php";
session_start();
$data = $con->query("SELECT
                        tb_gudang.artikel,
                        tb_gudang.nama,
                        tb_transaksi_online_tmp.transol_tmp_jumlah_beli,
                        tb_gudang.jual,
                        tb_transaksi_online_tmp.transol_tmp_potongan,
                        tb_transaksi_online_tmp.transol_tmp_diskon1,
                        tb_transaksi_online_tmp.transol_tmp_diskon2,
                        tb_transaksi_online_tmp.transol_tmp_total_harga,
                        tb_transaksi_online_tmp.transol_tmp_id,
                        tb_data_toko_online.data_toko_online_nama
                    From
                        tb_transaksi_online_tmp 
                    Join
                        tb_gudang On tb_gudang.id_gudang = tb_transaksi_online_tmp.id_gudang 
                    Join
                    tb_data_toko_online On tb_data_toko_online.data_toko_online_id = tb_transaksi_online_tmp.data_toko_online_id 
                    WHERE 
                        tb_transaksi_online_tmp.id_karyawan = '$_COOKIE[id_karyawan]'
")->fetchAll();

$jumlah = 0;
$subtotal = 0;
foreach ($data as $i => $a) {
    $jumlah += $a['transol_tmp_jumlah_beli'];
    $subtotal += $a['transol_tmp_total_harga'];
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['transol_tmp_jumlah_beli'] ?></td>
        <td><?= 'Rp' . number_format($a['jual']) ?></td>
        <td><?= 'Rp' . number_format($a['transol_tmp_diskon1']) ?></td>
        <td><?= number_format($a['transol_tmp_diskon2']) . '%' ?></td>
        <td><?= $a['transol_tmp_potongan'] . '%' ?></td>
        <td><?= 'Rp' . number_format($a['transol_tmp_total_harga']) ?></td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapusKeranjang('<?= $a['transol_tmp_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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