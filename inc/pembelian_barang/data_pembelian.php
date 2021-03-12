<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("SELECT
                        tb_beli.beli_id,
                        tb_beli.beli_invoice,
                        tb_beli.beli_tgl_beli,
                        tb_beli.beli_create_at,
                        tb_beli.beli_nota,
                        tb_supplier.supplier_nama,
                        tb_karyawan.nama
                    From
                        tb_beli Inner Join
                        tb_supplier On tb_supplier.supplier_id = tb_beli.supplier_id Inner Join
                        tb_karyawan On tb_karyawan.id_karyawan = tb_beli.beli_create_by
                    ORDER BY tb_beli.beli_id DESC
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['beli_invoice'] ?></td>
        <td><?= tgl_indo($a['beli_tgl_beli']) ?></td>
        <td><?= $a['supplier_nama'] ?></td>
        <td><?= tgl_indo_waktu($a['beli_create_at']) ?></td>
        <td><?= $a['nama'] ?></td>
        <td><a href="img/nota_pembelian/<?= $a['beli_nota'] ?>" target="_blank"><img src="img/nota_pembelian/<?= $a['beli_nota'] ?>" style="width: 100px; height: 100px;"></a></td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapus('<?= $a['beli_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['beli_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>