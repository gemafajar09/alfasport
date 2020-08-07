<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("
SELECT a.pembelian_id,
       a.pembelian_no_invoice,
       a.pembelian_tgl_beli,
       b.supplier_nama,
       a.pembelian_create_at,
       c.nama
FROM tb_pembelian a
JOIN tb_supplier b ON a.supplier_id=b.supplier_id
JOIN tb_karyawan c ON a.pembelian_create_by = c.id_karyawan
")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['pembelian_no_invoice'] ?></td>
        <td><?= tgl_indo($a['pembelian_tgl_beli']) ?></td>
        <td><?= $a['supplier_nama'] ?></td>
        <td><?= tgl_indo_waktu($a['pembelian_create_at']) ?></td>
        <td><?= $a['nama'] ?></td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapus('<?= $a['pembelian_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['pembelian_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>