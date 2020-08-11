<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_all_ukuran JOIN tb_merk ON tb_merk.merk_id = tb_all_ukuran.id_merek");
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['ue'] ?></td>
        <td><?= $a['uk'] ?></td>
        <td><?= $a['us'] ?></td>
        <td><?= $a['cm'] ?></td>
        <td>
            <button type="button" onclick="edit(<?= $a['id_ukuran'] ?>)" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['id_ukuran'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>