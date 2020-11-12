<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("
SELECT a.transaksi_id,
       a.transaksi_kode,
       b.nama_toko,
       a.transaksi_tipe_bayar,
       a.transaksi_cash,
       a.transaksi_debit,
       a.transaksi_bank,
       a.transaksi_create_at,
       a.transaksi_create_by
FROM tb_transaksi a
JOIN toko b ON a.id_toko=b.id_toko
WHERE a.id_toko = '$_POST[toko]'
")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['transaksi_kode'] ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td><?= $a['transaksi_tipe_bayar'] ?></td>
        <td><?= number_format($a['transaksi_cash']) ?></td>
        <td><?= number_format($a['transaksi_debit']) ?></td>
        <td><?= $a['transaksi_bank'] ?></td>
        <td><?= $a['transaksi_create_at'] ?></td>
        <td><?= $a['transaksi_create_by'] ?></td>
        <!-- <td></td> -->
        <td class="text-center">
            <a href="update-gudang-<?= $a['transaksi_id'] ?>.html" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
            <button type="button" id="hapus" onclick="hapus('<?= $a['transaksi_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['transaksi_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>