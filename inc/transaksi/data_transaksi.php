<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("
SELECT a.transaksi_id,
       a.transaksi_kode,
       b.nama_toko,
       a.transaksi_tipe_bayar,
       a.transaksi_cash,
       a.transaksi_debit,
       d.bank,
       a.transaksi_create_at,
       c.nama
FROM tb_transaksi a
JOIN toko b ON a.id_toko=b.id_toko
JOIN tb_karyawan c ON a.transaksi_create_by = c.id_karyawan JOIN tb_bank d ON a.transaksi_bank=d.id_bank
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
        <td><?= $a['bank'] ?></td>
        <td><?= tgl_indo_waktu($a['transaksi_create_at']) ?></td>
        <td><?= $a['nama'] ?></td>
        <!-- <td></td> -->
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapus('<?= $a['transaksi_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['transaksi_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>